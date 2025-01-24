<?php
session_start();
require "config.php";

$mysqli = new mysqli($host, $username, $password, $name);

if (isset($_POST['submit'])) {
    $id_paket = $_POST['id']; 
    ubahStatusTerjual($id_paket);
    header('Location : index.php');
}


if ($mysqli->connect_error) {
    die('Connection Error: ' . $mysqli->connect_error);
}



$paket_test = mysqli_query($mysqli, "SELECT * FROM paket");
$paket = [];
while ($rot = mysqli_fetch_assoc($paket_test)) {
    $rot['status'] = getStatusPenjualan($rot['id']);
    $paket[] = $rot;
}
function getStatusPenjualan($package_id)
{
    $sold = checkIfPackageSold($package_id);
    return $sold ? 'Terjual' : 'Belum Terjual';
}

function checkIfPackageSold($package_id)
{
    return true;
}


$mysqli->close();
?>



<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>DIK STUDIO</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">


</head>

    <!--====== PRELOADER PART START ======-->

    <body>
    <div class="preloader">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER ENDS START ======-->

    <!--====== HEADER PART START ======-->

    <header id="home" class="header-area">
        <div class="navigation fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a> <!-- Logo -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active"><a class="page-scroll" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#about">Tentang</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#service">Layanan</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#work">Portofolio</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#contact">Kontak</a></li>
                                          <li class="nav-item"><a href="login.php">Logout</a></li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navigation -->

        <div id="parallax" class="header-content d-flex align-items-center">
            <div class="header-shape shape-one layer" data-depth="0.10">
                <img src="assets/images/banner/shape/shape-1.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-tow layer" data-depth="0.30">
                <img src="assets/images/banner/shape/shape-2.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-three layer" data-depth="0.40">
                <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-fore layer" data-depth="0.60">
                <img src="assets/images/banner/shape/shape-2.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-five layer" data-depth="0.20">
                <img src="assets/images/banner/shape/shape-1.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-six layer" data-depth="0.15">
                <img src="assets/images/banner/shape/shape-4.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-seven layer" data-depth="0.50">
                <img src="assets/images/banner/shape/shape-5.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-eight layer" data-depth="0.40">
                <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-nine layer" data-depth="0.20">
                <img src="assets/images/banner/shape/shape-6.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="header-shape shape-ten layer" data-depth="0.30">
                <img src="assets/images/banner/shape/shape-3.png" alt="Shape">
            </div> <!-- header shape -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="header-content-right">
                            <h4 class="sub-title">Hallo, Kami</h4>
                            <h1 class="title">DIK STUDIO</h1>
                            <p>Layanan Desain Grafis</p>
                            <a class="main-btn" href="#work">Lihat Pekerjaan Kami</a>
                        </div> <!-- header content right -->
                    </div>
                    <div class="col-lg-6 offset-xl-1">
                        <div class="header-image d-none d-lg-block">
                            <img src="assets/images/banner/hero.png" alt="hero">
                        </div> <!-- header image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-social">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-social-icon">
                            </div> <!-- header social -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- header social -->
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->


    <!--====== ABOUT PART START ======-->
    
    <section id="about" class="about-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title">Tentang Kami</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Halo semua!, Kami Dik Studio</h5>
                        <p>Kami adalah penyedia layanan profesional desain grafis untuk Jenis Pakaian dan Logo sebuah Perusahaan atau Brand.</p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-calendar"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Berdiri sejak:</span> 10 01 2023</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> artdik840@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>HandPhone:</span> +62 812-7732-6796</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-map-marker"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Lokasi:</span> Payakumbuh, INDONESIA</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Photoshop</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">90</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="90"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Adobe Illustrator</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">79</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="79"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Procreate </h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">90</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="90"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Ibis Paint X</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">90</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="90"></div>
                                </div>
                            </div>
                        </div> <!-- skill item -->
                    </div> <!-- about skills -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->
    
    
    
    <section id="service" class="services-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-30">
                        <h2 class="title">Layanan Kami</h2>
                        <p>kami berkomitmen untuk menyediakan layanan yang profesional. Platform kami didesain khusus untuk brand pakaian dan lain lain yang baru mencoba memulai membangun sebuah brand.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
               
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-color-pallet"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#contact">Graphic Design</a></h4>
                            <p>Kami menyediakan jasa Desain Grafis</p>
                        </div>
                    </div> <!-- single service -->
                </div>
               
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-vector"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">Illustration Design</a></h4>
                            <p>Kami menyediakan jasa ilustrasi.</p>
                        </div>
                    </div> <!-- single service -->
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-support"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">Consultancy and Support</a></h4>
                            <p>Kami juga menyediakan jasa konsultasi.</p>
                        </div>
                    </div> <!-- single service -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

<!--====== SERVICES PART END ======-->

<!--====== WORK PART START ======-->

<section id="work" class="work-area pt-125 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title pb-25">
                        <h2 class="title">Hasil Pekerjaan Terakhir</h2>
                        <p>Beberapa hasil pekerjaan terakhir kami yang cukup tinggi diminati.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-1.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">DESAIN LOGO</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-1.png"><i class="lni-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-2.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">DESAIN SATU SET</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-2.jpg"><i class="lni-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-3.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">DESAIN LOGO</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-3.jpeg"><i class="lni-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-4.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">DESAIN KUPLUK</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-4.jpg"><i class="lni-plus"></i></a></li>
                                 </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-5.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">DESAIN KAOS</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-5.jpg"><i class="lni-plus"></i></a></li>
                                 </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="assets/images/work/w-6.jpg" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">DESAIN</h3>
                                <ul>
                                    <li><a class="image-popup" href="assets/images/work/w-6.jpg"><i class="lni-plus"></i></a></li>
                                 
                                </ul>
                            </div>
                        </div>
                    </div> <!-- single work -->
                </div>
            </div> <!-- row -->
            <div class="row">
           
        </div> <!-- container -->
    </section>

    <!--====== WORK PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    
    <section id="pricing" class="pricing-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">PAKET HARGA</h2>
                        </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <?php foreach($paket as $p) :?>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30">
                    <form action="index.php" method="post">
                        <div class="pricing-package">
                            <h4 class="package-title"><?= $p['jenis'] ;?></h4>
                        </div>
                        <div class="pricing-package"  >
                            <img src="<?= $p['gambar'] ;?>" style="width:300px; height: 330px;margin:0; border-radius:30px;" class="package-title">
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p><?= $p['fungsi'] ;?></p>
                                <span class="price">$<?= $p['harga'] ;?></span>
                            </div>
                            <div class="pricing-list">
                               <p><?= $p['include'] ;?></p>
                            </div>
                            <input type="hidden" name="package_id" value="<?= $p['id']; ?>">
                            <div class="pricing-btn">
                                <!-- <a class="main-btn" href="#contact">Dapatkan penawaran</a> -->
                                <button type="submit" class="main-btn" name="submit_offer" onclick="showSuccessAlert()">Dapatkan penawaran</button>
                            </div>
                        </div>
                    </form>
                    </div> <!-- single pricing -->
                </div>
                <?php endforeach ; ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRICING PART ENDS ======-->

    













    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">HUBUNGI KAMI </h2>
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-map-marker"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Alamat</h6>
                            <p>MHWV + Q3P Tungka, Kabupaten Lima Puluh Kota, Sumatera Barat , INDONESIA</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-phone"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Telepon</h6>
                            <p>+62 812-7732-6799</p>
                            <p>+62 822-5899-2631</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Email</h6>
                            <p>artdik840@gmail.com</p>
                            <p>artdikserved@gmail.com</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
            </div> <!-- row -->
            <div class="row">
             
               
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->


















    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-130 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="index.html">
                                <img src="assets/images/logo 2.png" alt="Logo">
                            </a>
                            <p class="mt-">MELAYANI DENGAN SEPENUH HATI DAN DENGAN SELURUH KEMAMPUAN.</p>

                        </div> <!-- footer content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        <div class="footer-copyright pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center pt-20">
                            <p>Copyright ©2023 Dik Studio All Reserved <a href="https://www.instagram.com/dik.std_/" rel="nofollow">Dik Studio</a></p>
                        </div> <!-- copyright text -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->




    
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->







    <script>
        function showSuccessAlert() {
            const firstName = prompt("Siapa nama depanmu?");
        const lastName = prompt("Siapa nama belakangmu?");
        const language = prompt("Bisa berbahasa apa?");

        const user = {
        name: {
                first : firstName,
                last: lastName,
            },
        language: language
        };

        if (user.language == "English"){
            alert(`${user.name.first} ${user.name.last} managed to buy!`);
        }
        else if (user.language == "Korea"){
            alert(`${user.name.first} ${user.name.last} gumaehaessseubnida!`);
        }
        else if (user.language == "Jepang"){
            alert(`${user.name.first} ${user.name.last}, nantoka kaemashita!`);
        }
        else if (user.language == "Jawa"){
            alert(`${user.name.first} ${user.name.last} kasil tuku!`);
        }
        else {
            alert(`${user.name.first} ${user.name.last} berhasil membeli!`);
        }
        }
    </script>
    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Parallax js ======-->
    <script src="assets/js/parallax.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>


    <!--====== Appear js ======-->
    <script src="assets/js/jquery.appear.min.js"></script>

    <!--====== Scrolling js ======-->
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>


    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>
