<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/profileWeb/css/style.css">

    <script src="https://kit.fontawesome.com/3cb3312b09.js" crossorigin="anonymous"></script>
    <title>Mau Cafe | SMKN 4 Malang</title>
    <link rel="shortcut icon" type="image/x-icon" href="/profileWeb/img/icon1.png">
    <!-- AOS CSS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="mt-5">
    <!-- Navbar -->
    <header>
        <a class="navbar-brand" href="#">
            <img src="/profileWeb/img/icon1.png" width="30" height="30" class="d-inline-block align-top" alt=""
                loading="lazy"><span class="span1">Mau Cafe</span>
        </a>
        <ul class="navigation">

            <li><a href="">HOME</a></li>
            <li><a href="#History">HISTORY</a></li>
            <li><a href="#Menu">MENU</a></li>
            <li><a href="#Contact">CONTACT US</a></li>

        </ul>
    </header>
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="font1" style=" margin-top: 300px;">
            <h1 class="display-4">Mau Cafe</h1>
            <hr color="white" width="300px">
            <p>Tempat Nongki Paling Santuy. Ya di Mau Kopi</p>
        </div>
    </div>
    <!-- History -->

    <div class="about-us-section" id="History">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-4 mb-lg-0" style="margin-left: 80px;">
                    <div class="img-head">
                        <img src="/profileWeb/img/sejarah.jpg">
                    </div>
                </div>
                <div class="col-12 col-lg-6" style="margin-left: 30px;">
                    <h2 class="txthead">HISTORY</h2>
                    <div class="break-small mb-2"></div>
                    <p class="txtpara">
                        SMKN 4 Malang berdiri pada tahun 1938,dengan nama Sekolah Teknik Pertama Percetakan (STTP) yang
                        didirikan oleh
                        Gereja Katolik dibawah keuskupan Malang,yang dipimpin oleh Mrg. Aliers,O.Cam,dengan Fr.
                        Cicilianus H.C.A Lommelars
                        sebagai kepala sekolah.
                    </p>
                    <p class="txtpara">
                        Pada tahun 1996 STM Grafika berubah nama menjadi SMK Negeri 4 Malang,
                        bersama dengan itu lokasi juga pindah ke Jl. Tanimbar No. 22 Malang hingga saat ini.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- List Menu -->
    <div class="menu" id="Menu">
        <section id="list">
            <div class="container">
                <div class="title">
                    <h1>List Menu</h1>
                    <p>Rekomendasi Menu Untuk Kamu</p>
                </div>
                <div class="row">
                    <?php if($menu){?>
                    <?php foreach($menu as $m){ ?>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="/img/<?= $m['gambar'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $m['nama'] ?></h5>
                                <p class="card-text">Rp. <?= $m['harga'] ?></p>

                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php }else{?>
                    <p style="color:#cecece;margin:auto">Belum Ada Menu Favorite</p>
                    <?php }?>
                </div>
            </div>
        </section>
    </div>
    <br>
    <br>
    <!-- Contact -->
    <section class="ftco-section" id="Contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12"
                    style="position: absolute; background-color: #603601; padding-top: 70px; color: white; ">
                    <div class="wrapper">
                        <div class="row no-gutters mb-5">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4 ">
                                    <h1>Contact Us</h1>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Kami akan selalu ada dan siap untuk melayanimu kapan pun
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama"
                                                        placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="telepon">No Telepon</label>
                                                    <input type="telepon" class="form-control" name="telepon"
                                                        id="telepon" placeholder="No Telepon">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Pesan</label>
                                                    <textarea name="pesan" class="form-control" id="pesan" cols="30"
                                                        rows="4" placeholder="Pesan Anda"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Kirim Pesan" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-end justify-content-center ">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.0850497893216!2d112.62499331415677!3d-7.990153581897506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6281b75ea5485%3A0x90fd5c6fcedf6acf!2sSMK%20Negeri%204%20Kota%20Malang!5e0!3m2!1sid!2sid!4v1647338177204!5m2!1sid!2sid"
                                    width="700" height="600" style="border:0;" allowfullscreen=""
                                    loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text">
                                    <p>Adress: Jl. Tanimbar No.22, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Footer -->
    <script type="text/javascript">
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script>
    AOS.init();
    </script>
</body>

</html>