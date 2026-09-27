<?php

header('Content-Type: application/json; charset=utf-8');

$uploadDir = __DIR__ . '/uploads/';

if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0755, true)) {
        echo json_encode([
            'success' => false,
            'message' => 'Folder uploads tidak bisa dibuat.'
        ]);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Method tidak valid.'
    ]);
    exit;
}

if (!isset($_FILES['file'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Tidak ada file yang dikirim.'
    ]);
    exit;
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode([
        'success' => false,
        'message' => 'Upload error: ' . $file['error']
    ]);
    exit;
}

/*
 * Batas file: 100 MB
 */
$maxSize = 100 * 1024 * 1024;

if ($file['size'] > $maxSize) {
    echo json_encode([
        'success' => false,
        'message' => 'Ukuran file terlalu besar. Maksimal 32 MB.'
    ]);
    exit;
}

/*
 * Generate ID acak.
 */
$id = bin2hex(random_bytes(6));

$originalName = basename($file['name']);

/*
 * Ambil ekstensi asli.
 */
$extension = pathinfo($originalName, PATHINFO_EXTENSION);

$extension = preg_replace('/[^a-zA-Z0-9]/', '', $extension);

if ($extension !== '') {
    $storedName = $id . '.' . $extension;
} else {
    $storedName = $id;
}

$target = $uploadDir . $storedName;

if (!move_uploaded_file($file['tmp_name'], $target)) {
    echo json_encode([
        'success' => false,
        'message' => 'File gagal disimpan di server.'
    ]);
    exit;
}

/*
 * URL download.
 */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    ? 'https://'
    : 'http://';

$host = $_SERVER['HTTP_HOST'];

$downloadUrl = $protocol . $host . '/download.php?id=' . urlencode($id);

echo json_encode([
    'success' => true,
    'message' => 'File berhasil diupload.',
    'id' => $id,
    'filename' => $originalName,
    'size' => $file['size'],
    'download_url' => $downloadUrl
], JSON_UNESCAPED_SLASHES);

exit;