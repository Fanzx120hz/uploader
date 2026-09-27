<?php

$uploadDir = __DIR__ . '/uploads/';

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit('Invalid file ID.');
}

$id = $_GET['id'];

/*
 * Hanya izinkan karakter ID yang dibuat oleh upload.php.
 */
if (!preg_match('/^[a-f0-9]{12}$/', $id)) {
    http_response_code(400);
    exit('Invalid file ID.');
}

/*
 * Cari file berdasarkan ID.
 */
$matches = glob($uploadDir . $id . '.*');

if (!$matches || !isset($matches[0])) {
    /*
     * Coba file tanpa ekstensi.
     */
    $plainFile = $uploadDir . $id;

    if (file_exists($plainFile)) {
        $filePath = $plainFile;
    } else {
        http_response_code(404);
        exit('File tidak ditemukan.');
    }
} else {
    $filePath = $matches[0];
}

if (!is_file($filePath)) {
    http_response_code(404);
    exit('File tidak ditemukan.');
}

$fileName = basename($filePath);

/*
 * Gunakan MIME type file jika tersedia.
 */
$mime = 'application/octet-stream';

if (function_exists('mime_content_type')) {
    $detectedMime = mime_content_type($filePath);

    if ($detectedMime) {
        $mime = $detectedMime;
    }
}

header('Content-Description: File Transfer');
header('Content-Type: ' . $mime);
header('Content-Disposition: attachment; filename="' . addslashes($fileName) . '"');
header('Content-Length: ' . filesize($filePath));
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: public');

readfile($filePath);
exit;