<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="theme-color" content="#070910">

<title>File Upload</title>

<style>

/* =========================================================
   RESET
========================================================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    min-height:100%;
}

body{
    min-height:100vh;
    overflow-x:hidden;
    background:#03050a;
    color:#fff;
    font-family:
        Inter,
        system-ui,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Arial,
        sans-serif;
}


/* =========================================================
   VARIABLES
========================================================= */

:root{

    --red:#e51d32;
    --red2:#ff3348;
    --redGlow:rgba(255,35,57,.45);

    --blue:#1766d9;
    --blue2:#2389ff;
    --blueGlow:rgba(24,119,255,.38);

    --black:#03050a;
    --panel:#0b101b;

    --line:rgba(255,255,255,.13);
}


/* =========================================================
   CINEMATIC BACKGROUND
========================================================= */

.background{
    position:fixed;
    inset:0;
    z-index:0;
    overflow:hidden;
    background:

        radial-gradient(
            ellipse at 50% 28%,
            rgba(28,75,155,.30),
            transparent 35%
        ),

        radial-gradient(
            ellipse at 20% 75%,
            rgba(218,20,45,.13),
            transparent 32%
        ),

        radial-gradient(
            ellipse at 85% 60%,
            rgba(14,87,200,.14),
            transparent 35%
        ),

        #03050a;
}


/* city glow */

.background::before{
    content:"";
    position:absolute;
    inset:0;

    background:

        linear-gradient(
            90deg,
            transparent 0 10%,
            rgba(0,100,255,.08) 11%,
            transparent 12% 21%,
            rgba(255,25,45,.06) 22%,
            transparent 23% 37%,
            rgba(40,110,255,.07) 38%,
            transparent 39% 55%,
            rgba(255,30,50,.06) 56%,
            transparent 57% 72%,
            rgba(25,100,255,.07) 73%,
            transparent 74%
        );

    opacity:.65;
}


/* skyline */

.city{
    position:absolute;
    left:0;
    right:0;
    bottom:0;
    height:27%;

    background:
        linear-gradient(
            to top,
            #020308 0%,
            #03050a 70%,
            transparent
        );

    opacity:.9;
}

.building{
    position:absolute;
    bottom:0;

    background:
        linear-gradient(
            90deg,
            #020307,
            #0a0d15,
            #020307
        );

    border-top:1px solid rgba(93,126,175,.12);
}

.building::before{
    content:"";
    position:absolute;
    inset:8px;

    background:
        repeating-linear-gradient(
            90deg,
            transparent 0 8px,
            rgba(72,119,190,.13) 9px 10px
        ),

        repeating-linear-gradient(
            180deg,
            transparent 0 10px,
            rgba(255,46,61,.10) 11px 12px
        );
}

.b1{
    left:0;
    width:12%;
    height:62%;
}

.b2{
    left:10%;
    width:13%;
    height:42%;
}

.b3{
    left:21%;
    width:11%;
    height:72%;
}

.b4{
    left:31%;
    width:15%;
    height:51%;
}

.b5{
    left:45%;
    width:12%;
    height:80%;
}

.b6{
    left:55%;
    width:14%;
    height:48%;
}

.b7{
    left:68%;
    width:12%;
    height:67%;
}

.b8{
    left:78%;
    width:13%;
    height:45%;
}

.b9{
    left:89%;
    width:11%;
    height:75%;
}


/* =========================================================
   ATMOSPHERIC LIGHT
========================================================= */

.light{
    position:absolute;
    border-radius:50%;
    filter:blur(50px);
    pointer-events:none;
}

.light.red{
    width:240px;
    height:240px;
    left:-80px;
    top:40%;
    background:rgba(232,25,50,.12);
}

.light.blue{
    width:280px;
    height:280px;
    right:-100px;
    top:18%;
    background:rgba(25,105,255,.13);
}


/* =========================================================
   WEB BACKGROUND
========================================================= */

.web-bg{
    position:absolute;
    width:720px;
    height:720px;
    left:50%;
    top:46%;
    transform:translate(-50%,-50%);
    opacity:.16;
    pointer-events:none;
}

.web-bg .circle{
    position:absolute;
    border:1px solid rgba(255,255,255,.34);
    border-radius:50%;
    left:50%;
    top:50%;
    transform:translate(-50%,-50%);
}

.web-bg .c1{
    width:120px;
    height:120px;
}

.web-bg .c2{
    width:220px;
    height:220px;
}

.web-bg .c3{
    width:330px;
    height:330px;
}

.web-bg .c4{
    width:450px;
    height:450px;
}

.web-bg .c5{
    width:590px;
    height:590px;
}

.web-bg .c6{
    width:720px;
    height:720px;
}


/* radial web lines */

.web-line{
    position:absolute;
    width:1px;
    height:720px;
    left:50%;
    top:50%;
    background:
        linear-gradient(
            to bottom,
            transparent,
            rgba(255,255,255,.38),
            transparent
        );
    transform-origin:center;
}

.w1{transform:translate(-50%,-50%) rotate(0deg)}
.w2{transform:translate(-50%,-50%) rotate(22.5deg)}
.w3{transform:translate(-50%,-50%) rotate(45deg)}
.w4{transform:translate(-50%,-50%) rotate(67.5deg)}
.w5{transform:translate(-50%,-50%) rotate(90deg)}
.w6{transform:translate(-50%,-50%) rotate(112.5deg)}
.w7{transform:translate(-50%,-50%) rotate(135deg)}
.w8{transform:translate(-50%,-50%) rotate(157.5deg)}


/* =========================================================
   PARTICLES
========================================================= */

.particle{
    position:absolute;
    width:3px;
    height:3px;
    border-radius:50%;
    background:#fff;
    box-shadow:
        0 0 10px rgba(255,255,255,.7);
    opacity:.35;
    animation:
        particleMove
        linear
        infinite;
}

.p1{left:8%;top:80%;animation-duration:8s}
.p2{left:17%;top:62%;animation-duration:11s}
.p3{left:31%;top:88%;animation-duration:9s}
.p4{left:52%;top:73%;animation-duration:12s}
.p5{left:68%;top:91%;animation-duration:8s}
.p6{left:81%;top:69%;animation-duration:10s}
.p7{left:94%;top:84%;animation-duration:13s}
.p8{left:43%;top:55%;animation-duration:9s}

@keyframes particleMove{

    0%{
        transform:translateY(30px);
        opacity:0;
    }

    20%{
        opacity:.45;
    }

    100%{
        transform:translateY(-120px);
        opacity:0;
    }
}


/* =========================================================
   MAIN
========================================================= */

.container{
    position:relative;
    z-index:5;

    width:min(980px,94%);
    margin:auto;

    min-height:100vh;

    display:flex;
    flex-direction:column;
    align-items:center;

    padding:
        20px
        0
        45px;
}


/* =========================================================
   HERO STAGE
========================================================= */

.hero{
    position:relative;

    width:100%;
    height:470px;

    display:flex;
    justify-content:center;
    align-items:center;

    perspective:1400px;
}


/* =========================================================
   GIANT 3D MASK
========================================================= */

.mask{
    position:absolute;

    width:390px;
    height:440px;

    left:50%;
    top:49%;

    transform:
        translate(-50%,-50%)
        rotateX(4deg)
        rotateY(-5deg);

    transform-style:preserve-3d;

    filter:
        drop-shadow(0 45px 35px rgba(0,0,0,.8))
        drop-shadow(0 0 35px rgba(210,20,45,.14));

    transition:
        transform .45s cubic-bezier(.2,.8,.2,1);
}

.mask:hover{
    transform:
        translate(-50%,-50%)
        rotateX(2deg)
        rotateY(5deg)
        scale(1.015);
}


/* =========================================================
   MASK MAIN SHELL
========================================================= */

.mask-shell{
    position:absolute;
    inset:0;

    border-radius:
        48%
        48%
        43%
        43% / 45%
        45%
        52%
        52%;

    background:

        linear-gradient(
            145deg,
            #ff4353 0%,
            #d20e27 18%,
            #720915 46%,
            #21050b 78%,
            #05070c 100%
        );

    border:
        3px solid
        rgba(255,90,105,.55);

    box-shadow:

        inset
        22px
        15px
        35px
        rgba(255,255,255,.13),

        inset
        -28px
        -35px
        45px
        rgba(0,0,0,.78),

        0
        25px
        45px
        rgba(0,0,0,.6);
}


/* blue lower side armor */

.mask-shell::before{
    content:"";

    position:absolute;

    left:22%;
    right:22%;
    bottom:-2px;

    height:48%;

    border-radius:
        20%
        20%
        42%
        42%;

    background:
        linear-gradient(
            160deg,
            #183d79,
            #0b1c3d 42%,
            #030814 100%
        );

    clip-path:
        polygon(
            15% 0,
            85% 0,
            100% 70%,
            75% 100%,
            25% 100%,
            0 70%
        );

    opacity:.9;

    box-shadow:
        inset 0 10px 15px rgba(255,255,255,.08);
}


/* =========================================================
   FACE FRONT PLATE
========================================================= */

.face{
    position:absolute;

    left:46px;
    right:46px;

    top:42px;
    bottom:39px;

    border-radius:
        48%
        48%
        45%
        45%;

    background:

        linear-gradient(
            135deg,
            rgba(255,57,76,.85),
            rgba(113,8,20,.9) 45%,
            rgba(11,8,14,.95) 100%
        );

    transform:
        translateZ(17px);

    border:
        2px solid
        rgba(255,106,119,.3);

    box-shadow:

        inset
        10px
        5px
        20px
        rgba(255,255,255,.08),

        inset
        -12px
        -18px
        25px
        rgba(0,0,0,.55);
}


/* =========================================================
   3D EDGE PANELS
========================================================= */

.edge{
    position:absolute;

    background:
        linear-gradient(
            145deg,
            rgba(255,89,102,.7),
            rgba(86,5,17,.9)
        );

    border:
        1px solid
        rgba(255,145,154,.28);

    box-shadow:
        inset 3px 2px 5px rgba(255,255,255,.12),
        inset -4px -5px 7px rgba(0,0,0,.45);
}

.edge.left{
    width:39px;
    height:270px;
    left:24px;
    top:93px;

    border-radius:20px;

    transform:
        rotate(-13deg)
        translateZ(8px);
}

.edge.right{
    width:39px;
    height:270px;
    right:24px;
    top:93px;

    border-radius:20px;

    transform:
        rotate(13deg)
        translateZ(8px);
}


/* =========================================================
   FOREHEAD ARMOR
========================================================= */

.forehead{
    position:absolute;

    width:180px;
    height:92px;

    left:105px;
    top:25px;

    transform:
        translateZ(28px);

    clip-path:
        polygon(
            50% 0,
            100% 35%,
            82% 100%,
            18% 100%,
            0 35%
        );

    background:
        linear-gradient(
            145deg,
            #ff6672,
            #a30b20 42%,
            #360610
        );

    border:2px solid rgba(255,121,131,.3);

    box-shadow:
        inset
        8px
        4px
        15px
        rgba(255,255,255,.15),

        inset
        -10px
        -10px
        15px
        rgba(0,0,0,.5);
}


/* =========================================================
   WEB LINES ON MASK
========================================================= */

.face-web{
    position:absolute;

    inset:0;

    transform:
        translateZ(35px);

    pointer-events:none;
}


/* vertical web lines */

.face-web .v{
    position:absolute;

    width:2px;

    top:20px;
    bottom:35px;

    left:50%;

    background:
        linear-gradient(
            to bottom,
            transparent,
            rgba(8,8,13,.72) 18%,
            rgba(255,255,255,.18) 50%,
            rgba(0,0,0,.7) 82%,
            transparent
        );

    transform-origin:center;
}

.v1{transform:rotate(-36deg)}
.v2{transform:rotate(-23deg)}
.v3{transform:rotate(-11deg)}
.v4{transform:rotate(0)}
.v5{transform:rotate(11deg)}
.v6{transform:rotate(23deg)}
.v7{transform:rotate(36deg)}


/* horizontal curved-looking web bars */

.arc{
    position:absolute;

    left:27px;
    right:27px;

    height:42px;

    border:
        2px solid
        rgba(8,8,13,.65);

    border-left-color:transparent;
    border-right-color:transparent;
    border-bottom-color:transparent;

    border-radius:50%;

    transform:rotateX(63deg);

    opacity:.8;
}

.a1{top:72px}
.a2{top:111px}
.a3{top:153px}
.a4{top:198px}
.a5{top:244px}
.a6{top:291px}
.a7{top:337px}


/* =========================================================
   EYE SOCKETS
========================================================= */

.eye-socket{
    position:absolute;

    width:130px;
    height:105px;

    top:132px;

    transform:
        translateZ(45px);

    background:
        linear-gradient(
            145deg,
            #25050b,
            #05070d
        );

    border:
        3px solid
        rgba(0,0,0,.85);

    box-shadow:
        inset
        8px
        8px
        15px
        rgba(0,0,0,.8),

        0 4px 10px rgba(0,0,0,.5);
}

.eye-socket.left{
    left:45px;

    clip-path:
        polygon(
            0 38%,
            94% 0,
            100% 22%,
            72% 100%,
            27% 92%,
            4% 68%
        );

    transform:
        translateZ(45px)
        rotate(-8deg);
}

.eye-socket.right{
    right:45px;

    clip-path:
        polygon(
            6% 0,
            100% 38%,
            96% 68%,
            73% 92%,
            28% 100%,
            0 22%
        );

    transform:
        translateZ(45px)
        rotate(8deg);
}


/* =========================================================
   EYE LENSES
========================================================= */

.eye{
    position:absolute;

    inset:7px;

    background:

        linear-gradient(
            145deg,
            #ffffff 0%,
            #dceaff 35%,
            #8ca8c5 70%,
            #3f5165 100%
        );

    border:
        3px solid
        #06080d;

    box-shadow:

        inset
        7px
        5px
        12px
        rgba(255,255,255,.8),

        inset
        -8px
        -8px
        15px
        rgba(0,0,0,.4),

        0 0 15px
        rgba(255,255,255,.14);

    overflow:hidden;

    transition:
        clip-path .12s ease,
        transform .12s ease;
}


/* lens reflection */

.eye::before{
    content:"";

    position:absolute;

    width:55px;
    height:12px;

    background:
        rgba(255,255,255,.75);

    border-radius:50%;

    left:13px;
    top:15px;

    transform:rotate(-19deg);

    filter:blur(1px);

    opacity:.7;
}


/* lens small reflection */

.eye::after{
    content:"";

    position:absolute;

    width:17px;
    height:7px;

    background:white;

    border-radius:50%;

    right:14px;
    bottom:17px;

    opacity:.45;
}


/* =========================================================
   BLINK
========================================================= */

.eye.blink{

    clip-path:
        polygon(
            0 47%,
            20% 44%,
            50% 42%,
            80% 44%,
            100% 47%,
            80% 53%,
            50% 57%,
            20% 53%
        );

    transform:
        scaleY(.18);

}


/* =========================================================
   CHEEK ARMOR
========================================================= */

.cheek{
    position:absolute;

    width:90px;
    height:125px;

    top:225px;

    transform:
        translateZ(27px);

    background:
        linear-gradient(
            145deg,
            #e32439,
            #760a19 52%,
            #16040a
        );

    border:
        1px solid
        rgba(255,106,119,.3);

    box-shadow:
        inset
        7px
        6px
        12px
        rgba(255,255,255,.08),

        inset
        -8px
        -12px
        15px
        rgba(0,0,0,.55);
}

.cheek.left{
    left:43px;

    clip-path:
        polygon(
            0 8%,
            100% 0,
            83% 82%,
            50% 100%,
            15% 75%
        );

    transform:
        translateZ(27px)
        rotate(-7deg);
}

.cheek.right{
    right:43px;

    clip-path:
        polygon(
            0 0,
            100% 8%,
            85% 75%,
            50% 100%,
            17% 82%
        );

    transform:
        translateZ(27px)
        rotate(7deg);
}


/* =========================================================
   MOUTH / LOWER MASK
========================================================= */

.mouth{
    position:absolute;

    left:106px;
    top:330px;

    width:178px;
    height:63px;

    transform:
        translateZ(40px);

    clip-path:
        polygon(
            15% 0,
            85% 0,
            100% 50%,
            78% 100%,
            22% 100%,
            0 50%
        );

    background:
        linear-gradient(
            145deg,
            #183b72,
            #0b1b39 48%,
            #02060f
        );

    border:
        2px solid
        rgba(61,132,230,.4);

    box-shadow:
        inset
        8px
        5px
        13px
        rgba(255,255,255,.08),

        inset
        -8px
        -8px
        15px
        rgba(0,0,0,.6);
}


/* mouth armor lines */

.mouth::before{
    content:"";

    position:absolute;

    left:30px;
    right:30px;

    top:27px;

    height:2px;

    background:#0a0e18;

    box-shadow:
        0 -10px 0 rgba(80,135,205,.22),
        0 10px 0 rgba(80,135,205,.18);
}


/* =========================================================
   SIDE WEB DETAIL
========================================================= */

.side-web{
    position:absolute;

    width:110px;
    height:150px;

    top:165px;

    transform:
        translateZ(24px);

    opacity:.65;
}

.side-web.left{
    left:0;
}

.side-web.right{
    right:0;
    transform:
        translateZ(24px)
        scaleX(-1);
}

.side-web span{
    position:absolute;

    height:2px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(4,5,9,.8),
            transparent
        );

    transform-origin:left center;
}

.side-web span:nth-child(1){
    width:100px;
    top:20px;
    left:5px;
    transform:rotate(12deg);
}

.side-web span:nth-child(2){
    width:105px;
    top:52px;
    left:2px;
    transform:rotate(18deg);
}

.side-web span:nth-child(3){
    width:100px;
    top:87px;
    left:5px;
    transform:rotate(25deg);
}

.side-web span:nth-child(4){
    width:88px;
    top:120px;
    left:11px;
    transform:rotate(32deg);
}


/* =========================================================
   CENTER SPIDER EMBLEM
========================================================= */

.emblem{
    position:absolute;

    width:70px;
    height:70px;

    left:160px;
    top:251px;

    transform:
        translateZ(52px)
        rotate(180deg);

    opacity:.55;
}

.emblem::before{
    content:"";

    position:absolute;

    left:26px;
    top:10px;

    width:19px;
    height:46px;

    border-radius:50%;

    background:
        linear-gradient(
            90deg,
            #03050a,
            #101521,
            #020308
        );

    box-shadow:
        -16px 4px 0 -4px #05070c,
        16px 4px 0 -4px #05070c;
}

.emblem::after{
    content:"";

    position:absolute;

    width:8px;
    height:43px;

    left:31px;
    top:3px;

    background:#02040a;

    box-shadow:
        -19px 17px 0 -2px #02040a,
        19px 17px 0 -2px #02040a;
}


/* =========================================================
   MASK EDGE HIGHLIGHTS
========================================================= */

.highlight{
    position:absolute;

    pointer-events:none;

    z-index:20;

    border-radius:50%;

    filter:blur(1px);

    opacity:.7;
}

.highlight.h1{
    width:150px;
    height:22px;

    left:65px;
    top:65px;

    transform:
        rotate(-19deg)
        translateZ(65px);

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.25),
            transparent
        );
}

.highlight.h2{
    width:95px;
    height:15px;

    right:45px;
    top:275px;

    transform:
        rotate(68deg)
        translateZ(65px);

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,90,103,.3),
            transparent
        );
}


/* =========================================================
   GLOW UNDER MASK
========================================================= */

.mask-glow{
    position:absolute;

    width:360px;
    height:100px;

    left:50%;
    bottom:15px;

    transform:
        translateX(-50%);

    background:
        radial-gradient(
            ellipse,
            rgba(20,100,255,.24),
            transparent 70%
        );

    filter:blur(20px);

    pointer-events:none;
}


/* =========================================================
   UPLOAD CARD
========================================================= */

.card{
    position:relative;

    z-index:30;

    width:min(650px,100%);

    margin-top:-28px;

    padding:31px;

    border-radius:30px;

    background:
        linear-gradient(
            145deg,
            rgba(12,18,30,.92),
            rgba(3,6,12,.95)
        );

    border:
        1px solid
        rgba(255,255,255,.12);

    backdrop-filter:blur(22px);

    box-shadow:

        0 35px 90px
        rgba(0,0,0,.7),

        inset
        0 1px 0
        rgba(255,255,255,.08);
}


/* card top red/blue line */

.card::before{
    content:"";

    position:absolute;

    left:35px;
    right:35px;

    top:0;

    height:2px;

    background:
        linear-gradient(
            90deg,
            transparent,
            var(--red),
            #fff,
            var(--blue2),
            transparent
        );

    box-shadow:
        0 0 14px rgba(255,40,60,.4);

    opacity:.8;
}


/* =========================================================
   TITLE
========================================================= */

h1{
    font-size:31px;
    font-weight:850;
    letter-spacing:-.8px;

    margin-bottom:8px;

    background:
        linear-gradient(
            90deg,
            #fff,
            #e7edf8,
            #9dc5ff
        );

    -webkit-background-clip:text;
    background-clip:text;

    color:transparent;
}

.subtitle{
    color:#8291a8;
    font-size:14px;
    margin-bottom:24px;
}


/* =========================================================
   FILE BOX
========================================================= */

.file-box{
    position:relative;

    padding:28px 18px;

    border-radius:20px;

    border:
        1px dashed
        rgba(79,130,205,.35);

    background:
        linear-gradient(
            145deg,
            rgba(26,44,73,.09),
            rgba(0,0,0,.2)
        );

    transition:.25s;
}

.file-box:hover{
    border-color:
        rgba(65,145,255,.75);

    box-shadow:
        inset
        0 0 25px
        rgba(30,105,220,.06);
}

input[type=file]{
    width:100%;
    color:#9aaac0;
}


/* =========================================================
   BUTTON
========================================================= */

button{
    position:relative;

    width:100%;

    margin-top:17px;

    padding:17px;

    border:0;

    border-radius:17px;

    cursor:pointer;

    color:#fff;

    font-size:16px;
    font-weight:850;

    background:
        linear-gradient(
            100deg,
            #b90e25,
            #ed263c 48%,
            #145ec6
        );

    box-shadow:

        0 8px 0 #550814,

        0 18px 35px
        rgba(0,0,0,.45);

    overflow:hidden;

    transition:
        transform .12s,
        filter .15s;
}


/* button shine */

button::before{
    content:"";

    position:absolute;

    top:0;
    bottom:0;

    width:70px;

    left:-90px;

    transform:skewX(-20deg);

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.35),
            transparent
        );

    animation:
        buttonShine
        4s
        ease-in-out
        infinite;
}

@keyframes buttonShine{

    0%,65%{
        left:-90px;
    }

    85%,100%{
        left:110%;
    }
}

button:hover{
    filter:brightness(1.1);
    transform:translateY(-2px);
}

button:active{
    transform:
        translateY(7px)
        scale(.98);

    box-shadow:
        0 2px 0 #550814;
}

button:disabled{
    opacity:.6;
    cursor:not-allowed;
}


/* =========================================================
   RESULT
========================================================= */

#result,
#error{
    display:none;

    margin-top:17px;

    padding:16px;

    border-radius:16px;

    background:
        rgba(0,0,0,.28);

    border:
        1px solid
        rgba(255,255,255,.08);
}

#result{
    color:#dce9f8;
}

#result a{
    color:#63b7ff;
    word-break:break-all;
}

#error{
    color:#ff8d99;
}


/* =========================================================
   SOCIALS
========================================================= */

.socials{
    display:flex;

    justify-content:center;

    gap:11px;

    margin-top:23px;
}

.social{
    position:relative;

    width:47px;
    height:47px;

    display:flex;

    justify-content:center;
    align-items:center;

    border-radius:15px;

    color:#a9b7c9;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.075),
            rgba(255,255,255,.025)
        );

    border:
        1px solid
        rgba(255,255,255,.11);

    box-shadow:
        inset
        0 1px 0
        rgba(255,255,255,.07);

    transition:.2s;
}

.social:hover{
    color:#fff;

    transform:
        translateY(-5px)
        rotate(-2deg);

    border-color:
        rgba(255,62,82,.55);

    background:
        linear-gradient(
            145deg,
            rgba(205,23,45,.18),
            rgba(25,91,190,.14)
        );

    box-shadow:
        0 12px 28px
        rgba(0,0,0,.35),

        0 0 18px
        rgba(230,30,55,.12);
}

.social svg{
    width:22px;
    height:22px;

    fill:currentColor;
}


/* =========================================================
   CLICK FLASH
========================================================= */

.click-flash{
    position:fixed;

    z-index:100;

    width:20px;
    height:20px;

    border-radius:50%;

    pointer-events:none;

    background:
        radial-gradient(
            circle,
            rgba(255,255,255,.8),
            rgba(255,25,50,.22),
            transparent 70%
        );

    transform:
        translate(-50%,-50%)
        scale(.3);

    animation:
        clickFlash
        .45s
        ease-out
        forwards;
}

@keyframes clickFlash{

    0%{
        opacity:.8;
        transform:
            translate(-50%,-50%)
            scale(.3);
    }

    100%{
        opacity:0;
        transform:
            translate(-50%,-50%)
            scale(6);
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:700px){

    .container{
        width:94%;
        padding-top:5px;
    }

    .hero{
        height:370px;
    }

    .mask{
        width:315px;
        height:355px;
    }

    .face{
        left:37px;
        right:37px;
    }

    .forehead{
        width:145px;
        left:85px;
    }

    .eye-socket{
        width:105px;
        height:86px;
        top:110px;
    }

    .eye-socket.left{
        left:37px;
    }

    .eye-socket.right{
        right:37px;
    }

    .cheek{
        width:72px;
        height:100px;
        top:190px;
    }

    .cheek.left{
        left:34px;
    }

    .cheek.right{
        right:34px;
    }

    .mouth{
        width:145px;
        height:52px;
        left:85px;
        top:278px;
    }

    .emblem{
        transform:
            translateZ(52px)
            rotate(180deg)
            scale(.8);

        left:123px;
        top:210px;
    }

    .edge.left{
        width:31px;
        height:215px;
        top:78px;
        left:18px;
    }

    .edge.right{
        width:31px;
        height:215px;
        top:78px;
        right:18px;
    }

    .card{
        margin-top:-8px;
        padding:23px;
        border-radius:24px;
    }

    h1{
        font-size:25px;
    }

    .subtitle{
        font-size:13px;
    }

    .web-bg{
        width:600px;
        height:600px;
    }
}


/* =========================================================
   SMALL PHONE
========================================================= */

@media(max-width:390px){

    .hero{
        height:340px;
    }

    .mask{
        transform:
            translate(-50%,-50%)
            scale(.86)
            rotateX(4deg)
            rotateY(-5deg);
    }

    .mask:hover{
        transform:
            translate(-50%,-50%)
            scale(.88)
            rotateX(2deg)
            rotateY(5deg);
    }

    .card{
        padding:20px;
    }
}

</style>
</head>


<body>


<!-- =====================================================
     BACKGROUND
===================================================== -->

<div class="background">

    <div class="light red"></div>
    <div class="light blue"></div>

    <div class="web-bg">

        <div class="circle c1"></div>
        <div class="circle c2"></div>
        <div class="circle c3"></div>
        <div class="circle c4"></div>
        <div class="circle c5"></div>
        <div class="circle c6"></div>

        <div class="web-line w1"></div>
        <div class="web-line w2"></div>
        <div class="web-line w3"></div>
        <div class="web-line w4"></div>
        <div class="web-line w5"></div>
        <div class="web-line w6"></div>
        <div class="web-line w7"></div>
        <div class="web-line w8"></div>

    </div>


    <div class="particle p1"></div>
    <div class="particle p2"></div>
    <div class="particle p3"></div>
    <div class="particle p4"></div>
    <div class="particle p5"></div>
    <div class="particle p6"></div>
    <div class="particle p7"></div>
    <div class="particle p8"></div>


    <div class="city">

        <div class="building b1"></div>
        <div class="building b2"></div>
        <div class="building b3"></div>
        <div class="building b4"></div>
        <div class="building b5"></div>
        <div class="building b6"></div>
        <div class="building b7"></div>
        <div class="building b8"></div>
        <div class="building b9"></div>

    </div>

</div>



<!-- =====================================================
     MAIN
===================================================== -->

<div class="container">


    <!-- =================================================
         HERO
    ================================================== -->

    <section class="hero">


        <div class="mask-glow"></div>


        <!-- =============================================
             GIANT 3D MASK
        ============================================== -->

        <div class="mask" id="mask">


            <!-- main shell -->
            <div class="mask-shell"></div>


            <!-- face -->
            <div class="face"></div>


            <!-- side armor -->
            <div class="edge left"></div>
            <div class="edge right"></div>


            <!-- forehead -->
            <div class="forehead"></div>


            <!-- web lines -->
            <div class="face-web">

                <span class="v v1"></span>
                <span class="v v2"></span>
                <span class="v v3"></span>
                <span class="v v4"></span>
                <span class="v v5"></span>
                <span class="v v6"></span>
                <span class="v v7"></span>

                <span class="arc a1"></span>
                <span class="arc a2"></span>
                <span class="arc a3"></span>
                <span class="arc a4"></span>
                <span class="arc a5"></span>
                <span class="arc a6"></span>
                <span class="arc a7"></span>

            </div>


            <!-- eyes -->

            <div class="eye-socket left">

                <div class="eye" id="eyeLeft"></div>

            </div>


            <div class="eye-socket right">

                <div class="eye" id="eyeRight"></div>

            </div>


            <!-- cheeks -->

            <div class="cheek left"></div>
            <div class="cheek right"></div>


            <!-- side web -->

            <div class="side-web left">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

            </div>


            <div class="side-web right">

                <span></span>
                <span></span>
                <span></span>
                <span></span>

            </div>


            <!-- mouth armor -->

            <div class="mouth"></div>


            <!-- emblem -->

            <div class="emblem"></div>


            <!-- highlights -->

            <div class="highlight h1"></div>
            <div class="highlight h2"></div>


        </div>

    </section>



    <!-- =================================================
         UPLOAD CARD
    ================================================== -->

    <div class="card">


        <h1>Upload Your File</h1>

        <p class="subtitle">
            Select a file and send it to the system.
        </p>


        <form id="uploadForm">


            <div class="file-box">

                <input
                    type="file"
                    id="file"
                    name="file"
                    required
                >

            </div>


            <button
                type="submit"
                id="uploadBtn"
            >
                Upload File
            </button>


        </form>


        <div id="result"></div>

        <div id="error"></div>



        <!-- =================================================
             SOCIAL
        ================================================== -->

        <div class="socials">


            <!-- DISCORD -->

            <a
                class="social"
                href="https://discord.gg/3dF2z3s5"
                target="_blank"
                aria-label="Discord"
            >

                <svg viewBox="0 0 24 24">

                    <path d="M19.54 4.28A16.8 16.8 0 0 0 15.43 3l-.5 1.02a15.4 15.4 0 0 0-5.86 0L8.57 3a16.8 16.8 0 0 0-4.11 1.28C1.85 8.1 1.15 11.82 1.52 15.49a16.6 16.6 0 0 0 5.05 2.55l1.23-1.67c-.68-.25-1.33-.57-1.94-.95l.47-.36c3.74 1.73 7.81 1.73 11.5 0l.48.36c-.61.38-1.26.7-1.94.95l1.23 1.67a16.6 16.6 0 0 0 5.05-2.55c.43-4.25-.73-7.93-3.11-11.21ZM8.5 13.92c-1.1 0-2-.98-2-2.19s.88-2.19 2-2.19 2 .98 2 2.19-.9 2.19-2 2.19Zm7 0c-1.1 0-2-.98-2-2.19s.88-2.19 2-2.19 2 .98 2 2.19-.9 2.19-2 2.19Z"/>

                </svg>

            </a>



            <!-- GITHUB -->

            <a
                class="social"
                href="https://github.com/Fanzx120hz"
                target="_blank"
                aria-label="GitHub"
            >

                <svg viewBox="0 0 24 24">

                    <path d="M12 .5A11.5 11.5 0 0 0 8.36 22.9c.58.1.79-.25.79-.56v-2.17c-3.22.7-3.9-1.55-3.9-1.55-.53-1.38-1.29-1.75-1.29-1.75-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.2 1.77 1.2 1.03 1.76 2.69 1.25 3.35.96.1-.75.4-1.25.73-1.54-2.57-.29-5.28-1.28-5.28-5.7 0-1.26.45-2.29 1.2-3.1-.12-.29-.52-1.46.11-3.05 0 0 .98-.31 3.17 1.18a11 11 0 0 1 5.76 0c2.19-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.75.81.11 2.76.11 3.05.75.81 1.2 1.84 1.2 3.1 0 4.43-2.71 5.4-5.29 5.69.42.36.78 1.08.78 2.18v3.23c0 .31.21.67.8.56A11.5 11.5 0 0 0 12 .5Z"/>

                </svg>

            </a>



            <!-- TIKTOK -->

            <a
                class="social"
                href="https://tiktok.com/@irpangeer"
                target="_blank"
                aria-label="TikTok"
            >

                <svg viewBox="0 0 24 24">

                    <path d="M16.6 5.82A4.84 4.84 0 0 1 14.1 3h-3.2v12.28a2.85 2.85 0 1 1-2-2.72V9.3a6.05 6.05 0 1 0 5.2 6V9.1a8 8 0 0 0 4.7 1.52V7.4a4.8 4.8 0 0 1-2.2-1.58Z"/>

                </svg>

            </a>



            <!-- TELEGRAM -->

            <a
                class="social"
                href="https://t.me/IrpaNny"
                target="_blank"
                aria-label="Telegram"
            >

                <svg viewBox="0 0 24 24">

                    <path d="M21.4 4.6 18.2 20c-.24 1.09-.87 1.36-1.77.85l-4.85-3.58-2.34 2.25c-.26.26-.48.48-.98.48l.35-4.93 8.97-8.1c.39-.35-.09-.54-.6-.19L6 13.72 1.25 12.2c-1.03-.32-1.05-1.03.22-1.53L20 3.48c.87-.32 1.63.19 1.4 1.12Z"/>

                </svg>

            </a>


        </div>

    </div>

</div>



<script>

/* =========================================================
   ELEMENTS
========================================================= */

const eyeLeft =
    document.getElementById("eyeLeft");

const eyeRight =
    document.getElementById("eyeRight");

const mask =
    document.getElementById("mask");


/* =========================================================
   BLINK
========================================================= */

let blinking = false;

function blink(){

    if(blinking) return;

    blinking = true;

    eyeLeft.classList.add("blink");
    eyeRight.classList.add("blink");


    setTimeout(() => {

        eyeLeft.classList.remove("blink");
        eyeRight.classList.remove("blink");

    },130);


    setTimeout(() => {

        blinking = false;

    },180);

}


/* =========================================================
   RANDOM NATURAL BLINK
========================================================= */

function randomBlink(){

    const delay =
        2200 +
        Math.random() * 4300;

    setTimeout(() => {

        blink();

        randomBlink();

    },delay);
}

randomBlink();


/* =========================================================
   CLICK ANYWHERE = BLINK
========================================================= */

document.addEventListener("click",(event) => {

    blink();


    /* visual click pulse */

    const flash =
        document.createElement("div");

    flash.className =
        "click-flash";

    flash.style.left =
        event.clientX + "px";

    flash.style.top =
        event.clientY + "px";

    document.body.appendChild(flash);


    setTimeout(() => {

        flash.remove();

    },500);

});


/* =========================================================
   SUBTLE MOUSE PARALLAX
========================================================= */

document.addEventListener(
    "mousemove",
    (event) => {

        if(window.innerWidth < 700)
            return;

        const x =
            (event.clientX / window.innerWidth - .5);

        const y =
            (event.clientY / window.innerHeight - .5);


        mask.style.transform =
            `
            translate(-50%,-50%)
            rotateX(${4 - y * 5}deg)
            rotateY(${-5 + x * 9}deg)
            `;
    }
);


/* =========================================================
   UPLOAD
========================================================= */

const form =
    document.getElementById("uploadForm");

const fileInput =
    document.getElementById("file");

const uploadBtn =
    document.getElementById("uploadBtn");

const result =
    document.getElementById("result");

const error =
    document.getElementById("error");


form.addEventListener(
    "submit",
    async (e) => {

        e.preventDefault();


        result.style.display =
            "none";

        error.style.display =
            "none";


        if(!fileInput.files.length){

            error.textContent =
                "Pilih file dulu.";

            error.style.display =
                "block";

            return;
        }


        const formData =
            new FormData();

        formData.append(
            "file",
            fileInput.files[0]
        );


        uploadBtn.disabled =
            true;

        uploadBtn.textContent =
            "Uploading...";


        try{

            const response =
                await fetch(
                    "upload.php",
                    {
                        method:"POST",
                        body:formData
                    }
                );


            const data =
                await response.json();


            if(data.success){

                result.innerHTML =
                    `
                    File berhasil diupload!
                    <br><br>
                    <a
                        href="${data.download_url}"
                        target="_blank"
                    >
                        ${data.download_url}
                    </a>
                    `;

                result.style.display =
                    "block";

            }else{

                error.textContent =
                    data.message ||
                    "Upload gagal.";

                error.style.display =
                    "block";
            }


        }catch(err){

            error.textContent =
                "Terjadi kesalahan saat upload.";

            error.style.display =
                "block";

        }


        uploadBtn.disabled =
            false;

        uploadBtn.textContent =
            "Upload File";

    }
);

</script>

</body>
</html>