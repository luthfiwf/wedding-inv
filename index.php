<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>A & L </title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- fontawesome -->
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
  <!-- main css -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- responsive -->
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"> -->
  <!-- default skin -->
  <link rel="stylesheet" class="alternate-style" type="text/css" href="assets/css/skins/pink.css">
  <!-- thema -->
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/setting.css"> -->
  <!-- aos -->
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/aos.css"> -->
  <!-- sweetalert -->
  <!-- <link rel="stylesheet" href="admin/assets/css/sweetalert.css"> -->
</head>

<body>
  <?php
  include "admin/koneksi/koneksi.php";
  ?>
  <!-- preloader -->
  <div class="preloader">
    <div class="loader">
      <i class="fas fa-heart "></i>
    </div>
  </div>
  <!-- end preloader -->

  <!-- header -->
  <nav class="nav">
    <a href="" class="nav__link" data-scroll-nav="0">
      <i class="fa fa-home nav__icon"></i>
      <span>home</span>
    </a>
    <a href="" class="nav__link " data-scroll-nav="1">
      <i class="fa fa-heart nav__icon"></i>
      <span>pasangan</span>
    </a>
    <a href="" class="nav__link" data-scroll-nav="2">
      <i class="fa fa-history nav__icon"></i>
      <span>cerita</span>
    </a>
    <a href="" class="nav__link" data-scroll-nav="3">
      <i class="fa fa-calendar nav__icon"></i>
      <span>acara</span>
    </a>
    <a href="" class="nav__link" data-scroll-nav="4">
      <i class="fa fa-film nav__icon"></i>
      <span>gallery</span>
    </a>
    </a>
    <a href="" class="nav__link" data-scroll-nav="5s">
      <i class="fa fa-book nav__icon"></i>
      <span>buku tamu</span>
    </a>
  </nav>
  <div class="header">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <!-- <div class="logo">
          <a href="index.html"> A & L</a>
        </div> -->
        <!-- <div class="hamburger-btn">
          <span></span>
        </div> -->
        <!-- <div class="nav">
          <ul>
            <li> <a href="" data-scroll-nav="0" class="active" id="nav__link">Home</a></li>
            <li> <a href="" data-scroll-nav="1">Pasangan</a></li>
            <li> <a href="" data-scroll-nav="2">Cerita</a></li>
            <li> <a href="" data-scroll-nav="3">Acara</a></li>
            <li> <a href="" data-scroll-nav="4">Gallery</a></li>
            <li> <a href="" data-scroll-nav="5">Buku tamu </a></li>
          </ul>
        </div> -->


      </div>
    </div>
  </div>
  <!-- endheader -->

  <!-- home -->
  <section class="home-section" data-scroll-index="0">
    <?php
    $slider = mysqli_query($konek, "SELECT * FROM slider");
    while ($s = mysqli_fetch_array($slider)) {
    ?>
      <!-- slide -->
      <div class="slide <?= $s['aktif']; ?>" style="background-image: url('admin/fileUpload/slider/<?= $s['slider']; ?>');">
        <div class="container">
          <div class="row align-items-center">
            <div class="home-content">
              <p><?= $s['judul']; ?></p>
              <h1><?= $s['pasangan']; ?></h1>
              <?php
              $getTanggal = $s['tanggal'];
              $pecahTanggal = explode("-", $getTanggal);
              $tahun = $pecahTanggal[0];
              $bulan = $pecahTanggal[1];
              $tanggal = $pecahTanggal[2];

              if ($bulan == "01") {
                echo "<span class='date'>" . $tanggal . " Januari " . $tahun . "</span>";
              } else if ($bulan == "02") {
                echo "<span class='date'>" . $tanggal . " Februari " . $tahun . "</span>";
              } else if ($bulan == "03") {
                echo "<span class='date'>" . $tanggal . " Maret " . $tahun . "</span>";
              } else if ($bulan == "04") {
                echo "<span class='date'>" . $tanggal . " April " . $tahun . "</span>";
              } else if ($bulan == "05") {
                echo "<span class='date'>" . $tanggal . " Mei " . $tahun . "</span>";
              } else if ($bulan == "06") {
                echo "<span class='date'>" . $tanggal . " Juni " . $tahun . "</span>";
              } else if ($bulan == "07") {
                echo "<span class='date'>" . $tanggal . " Juli " . $tahun . "</span>";
              } else if ($bulan == "08") {
                echo "<span class='date'>" . $tanggal . " Agustus " . $tahun . "</span>";
              } else if ($bulan == "09") {
                echo "<span class='date'>" . $tanggal . " September " . $tahun . "</span>";
              } else if ($bulan == "10") {
                echo "<span class='date'>" . $tanggal . " Oktober " . $tahun . "</span>";
              } else if ($bulan == "11") {
                echo "<span class='date'>" . $tanggal . " November " . $tahun . "</span>";
              } else if ($bulan == "12") {
                echo "<span class='date'>" . $tanggal . " Desember " . $tahun . "</span>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
  <!-- endhome -->

  <!-- countdown -->
  <section class="countdown">
    <div class="container">
      <div class="row">
        <div class="section-tittle" data-aos="zoom-in">
          <div class="con">
            <div class="count">
              <span id="hari">00</span>
              HARI
            </div>
            <div class="count">
              <span id="jam">00</span>
              JAM
            </div>
            <div class="count">
              <span id="menit">00</span>
              MENIT
            </div>
            <div class="count">
              <span id="detik">00</span>
              DETIK
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- endcountdown -->


  <!-- couple -->
  <?php
  $pas = mysqli_query($konek, "SELECT * FROM pasangan");
  while ($p = mysqli_fetch_array($pas)) {
  ?>
    <section class="couple-section" data-scroll-index="1">
      <div class="container">
        <div class="row">
          <div class="section-tittle" data-aos="zoom-in">
            <h2 class="samb">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ </h2>
            <p> Assalamu`alaikum Warahmatullohi Wabarakatuh <br> <span><?= $p['sambutan']; ?></span></p>
          </div>
        </div>

        <div class="row">
          <div class="couple">
            <img src="admin/fileUpload/wanita/<?= $p['foto_wanita']; ?>" alt="Happy Couple" data-aos="fade-down">
            <h3 data-aos="fade-down"><?= $p['nama_wanita']; ?></h3>
            <p data-aos="fade-up"><?= $p['ket_wanita']; ?></p>
            <div class="social-icons" data-aos="fade-up">
              <a href=" #" title="facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" title="twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" title="instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
          <div class="couple">
            <i class="fas fa-heart"></i>
            <img src="admin/fileUpload/pria/<?= $p['foto_pria'];  ?>" alt="Happy Couple" data-aos="fade-up">
            <h3 data-aos="fade-up"><?= $p['nama_pria']; ?></h3>
            <p data-aos="fade-down"><?= $p['ket_pria']; ?></p>
            <div class="social-icons" data-aos="fade-down">
              <a href="#" title="facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" title="twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" title="instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
          <div class="section-tittle" data-aos="zoom-in">
            <h2 class="samb">وَمِنْ اٰيٰتِهٖٓ اَنْ خَلَقَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا لِّتَسْكُنُوْٓا اِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَّوَدَّةً وَّرَحْمَةً ۗاِنَّ فِيْ ذٰلِكَ لَاٰيٰتٍ لِّقَوْمٍ يَّتَفَكَّرُوْنَ </h2>
            <p> Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir.</p>
            <span>(Q.S Ar-Rum 21)</span>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  <!-- end couple -->

  <!-- story -->
  <section class="story-section" data-scroll-index="2">
    <div class="container">
      <div class="row">
        <div class="section-tittle" data-aos="zoom-in">
          <h2> Our Love Story</h2>
        </div>
      </div>

      <div class="row">
        <div class="story-content">
          <div class="row">
            <!-- story item start -->
            <?php
            $cerita = mysqli_query($konek, "SELECT * FROM cerita");
            while ($c = mysqli_fetch_array($cerita)) {
            ?>
              <div class="story-item">
                <i class="fas fa-heart"></i>
                <div class="story-text" data-aos="fade-up" data-aos-duration="2000">

                  <h3> <?= $c['judul']; ?></h3>
                  <span class="date"> <?php
                                      $getTanggal = $c['tanggal'];
                                      $pecahTanggal = explode("-", $getTanggal);
                                      $tahun = $pecahTanggal[0];
                                      $bulan = $pecahTanggal[1];
                                      $tanggal = $pecahTanggal[2];

                                      if ($bulan == "01") {
                                        echo "<span class='date'>" . $tanggal . " Januari " . $tahun . "</span>";
                                      } else if ($bulan == "02") {
                                        echo "<span class='date'>" . $tanggal . " Februari " . $tahun . "</span>";
                                      } else if ($bulan == "03") {
                                        echo "<span class='date'>" . $tanggal . " Maret " . $tahun . "</span>";
                                      } else if ($bulan == "04") {
                                        echo "<span class='date'>" . $tanggal . " April " . $tahun . "</span>";
                                      } else if ($bulan == "05") {
                                        echo "<span class='date'>" . $tanggal . " Mei " . $tahun . "</span>";
                                      } else if ($bulan == "06") {
                                        echo "<span class='date'>" . $tanggal . " Juni " . $tahun . "</span>";
                                      } else if ($bulan == "07") {
                                        echo "<span class='date'>" . $tanggal . " Juli " . $tahun . "</span>";
                                      } else if ($bulan == "08") {
                                        echo "<span class='date'>" . $tanggal . " Agustus " . $tahun . "</span>";
                                      } else if ($bulan == "09") {
                                        echo "<span class='date'>" . $tanggal . " September " . $tahun . "</span>";
                                      } else if ($bulan == "10") {
                                        echo "<span class='date'>" . $tanggal . " Oktober " . $tahun . "</span>";
                                      } else if ($bulan == "11") {
                                        echo "<span class='date'>" . $tanggal . " November " . $tahun . "</span>";
                                      } else if ($bulan == "12") {
                                        echo "<span class='date'>" . $tanggal . " Desember " . $tahun . "</span>";
                                      }

                                      ?></span>
                  <p> <?= $c['isi_cerita']; ?></p>
                </div>
                <div class="story-img" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
                  <img src="admin/fileUpload/cerita/<?= $c['foto']; ?>" width="100%" alt="couple love story">
                </div>
              </div>
            <?php } ?>
            <!-- story item end -->
            <!-- story item start -->

            <!-- story item end -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- endstrory -->

  <!-- event -->
  <section class="event-section" data-scroll-index="3">

    <div class="container">
      <div class="row">
        <div class="section-tittle" data-aos="zoom-in">
          <h2>Celebrate our love</h2>
        </div>
      </div>
      <?php
      $acara = mysqli_query($konek, "SELECT * FROM acara");
      while ($a = mysqli_fetch_array($acara)) {
      ?>
        <div class="row justify-content-center">
          <!-- item event start -->
          <div class="event-item">
            <div class="event-item-inner" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="600" data-aos-offset="0">
              <h3>Akad</h3>
              <span class="date"><?php
                                  $getTanggal = $a['tanggal'];
                                  $pecahTanggal = explode("-", $getTanggal);
                                  $tahun = $pecahTanggal[0];
                                  $bulan = $pecahTanggal[1];
                                  $tanggal = $pecahTanggal[2];

                                  if ($bulan == "01") {
                                    echo "<span class='date'>" . $tanggal . " Januari " . $tahun . "</span>";
                                  } else if ($bulan == "02") {
                                    echo "<span class='date'>" . $tanggal . " Februari " . $tahun . "</span>";
                                  } else if ($bulan == "03") {
                                    echo "<span class='date'>" . $tanggal . " Maret " . $tahun . "</span>";
                                  } else if ($bulan == "04") {
                                    echo "<span class='date'>" . $tanggal . " April " . $tahun . "</span>";
                                  } else if ($bulan == "05") {
                                    echo "<span class='date'>" . $tanggal . " Mei " . $tahun . "</span>";
                                  } else if ($bulan == "06") {
                                    echo "<span class='date'>" . $tanggal . " Juni " . $tahun . "</span>";
                                  } else if ($bulan == "07") {
                                    echo "<span class='date'>" . $tanggal . " Juli " . $tahun . "</span>";
                                  } else if ($bulan == "08") {
                                    echo "<span class='date'>" . $tanggal . " Agustus " . $tahun . "</span>";
                                  } else if ($bulan == "09") {
                                    echo "<span class='date'>" . $tanggal . " September " . $tahun . "</span>";
                                  } else if ($bulan == "10") {
                                    echo "<span class='date'>" . $tanggal . " Oktober " . $tahun . "</span>";
                                  } else if ($bulan == "11") {
                                    echo "<span class='date'>" . $tanggal . " November " . $tahun . "</span>";
                                  } else if ($bulan == "12") {
                                    echo "<span class='date'>" . $tanggal . " Desember " . $tahun . "</span>";
                                  }

                                  ?></span>
              <span class="time"><?= $a['jam']; ?> - <?= $a['jam_sampai']; ?></span>
              <p>{ <?= $a['tempat']; ?> }</p>
              <p><?= $a['alamat']; ?></p>
              <img src="assets/img/icons/flower.svg" alt="event">
            </div>
          </div>
          <!-- item event end -->
          <!-- item event start -->
          <div class="event-item">
            <div class="event-item-inner" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="700" data-aos-offset="0">
              <h3>Resepsi</h3>
              <span class="date"><?php
                                  $getTanggal = $a['tanggal_res'];
                                  $pecahTanggal = explode("-", $getTanggal);
                                  $tahun = $pecahTanggal[0];
                                  $bulan = $pecahTanggal[1];
                                  $tanggal = $pecahTanggal[2];

                                  if ($bulan == "01") {
                                    echo "<span class='date'>" . $tanggal . " Januari " . $tahun . "</span>";
                                  } else if ($bulan == "02") {
                                    echo "<span class='date'>" . $tanggal . " Februari " . $tahun . "</span>";
                                  } else if ($bulan == "03") {
                                    echo "<span class='date'>" . $tanggal . " Maret " . $tahun . "</span>";
                                  } else if ($bulan == "04") {
                                    echo "<span class='date'>" . $tanggal . " April " . $tahun . "</span>";
                                  } else if ($bulan == "05") {
                                    echo "<span class='date'>" . $tanggal . " Mei " . $tahun . "</span>";
                                  } else if ($bulan == "06") {
                                    echo "<span class='date'>" . $tanggal . " Juni " . $tahun . "</span>";
                                  } else if ($bulan == "07") {
                                    echo "<span class='date'>" . $tanggal . " Juli " . $tahun . "</span>";
                                  } else if ($bulan == "08") {
                                    echo "<span class='date'>" . $tanggal . " Agustus " . $tahun . "</span>";
                                  } else if ($bulan == "09") {
                                    echo "<span class='date'>" . $tanggal . " September " . $tahun . "</span>";
                                  } else if ($bulan == "10") {
                                    echo "<span class='date'>" . $tanggal . " Oktober " . $tahun . "</span>";
                                  } else if ($bulan == "11") {
                                    echo "<span class='date'>" . $tanggal . " November " . $tahun . "</span>";
                                  } else if ($bulan == "12") {
                                    echo "<span class='date'>" . $tanggal . " Desember " . $tahun . "</span>";
                                  }

                                  ?></span>
              <span class="time"><?= $a['jam_res']; ?> - <?= $a['jam_res_sampai']; ?></span>
              <p>{ <?= $a['tempat_res']; ?> }</p>
              <p><?= $a['alamat_res']; ?></p>
              <img src="assets/img/icons/flower.svg" alt="event">
            </div>
          </div>
          <!-- item event end -->
        </div>
      <?php } ?>
    </div>
  </section>

  <!-- end-event -->
  <!-- maps -->
  <section class="maps">
    <div class="container">
      <div class="row">
        <div class="section-tittle" data-aos="zoom-in">
          <h2>Find Us on Maps</h2>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="maps-detail">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15845.318206171962!2d107.5751869!3d-6.8510426!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc4e9cf6c4d9b638f!2sVilla%20Joglo%20Sariwangi!5e0!3m2!1sid!2sid!4v1616058592523!5m2!1sid!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- endmaps -->

  <!-- gallery -->
  <section class="gallery-section" data-scroll-index="4">

    <div class="container">
      <div class="row">
        <div class="section-tittle" data-aos="zoom-in">
          <h2>Our Memories</h2>
        </div>
      </div>

      <div class="row">
        <?php
        $gallery = mysqli_query($konek, "SELECT * FROM gallery LIMIT 6");
        while ($g = mysqli_fetch_array($gallery)) {
        ?>
          <!-- gallery item start -->
          <div class=" gallery-item">
            <div class="gallery-item-inner" data-aos="fade-in" data-aos-duration="3000">
              <img src="admin/fileUpload/gallery/<?= $g['foto']; ?>" alt="couple gallery" data-large="admin/fileUpload/gallery/<?= $g['foto']; ?>">
            </div>
          </div>

        <?php } ?>
      </div>
    </div>
    <div class="container">
    </div>
  </section>

  <!-- end gallery -->


  <!-- rspv -->
  <section class="rspv-section" data-scroll-index="5">
    <div class="container">
      <div class="row">
        <div class="section-tittle" data-aos="zoom-in">
          <h2> You Are Invited</h2>
          <!-- <p>Please Kindly Response Before 1 Agustus</p> -->
        </div>
      </div>

      <?php
      if (isset($_POST['tambah'])) {
        $simpan = mysqli_query($konek, "INSERT INTO pesan (nama,jumlah,konfirmasi,pesan) VALUES
                                                                                              ('" . $_POST[nama] . "',
                                                                                               '" . $_POST[jumlah] . "',
                                                                                               '" . $_POST[konfirmasi] . "',
                                                                                               '" . $_POST[pesan] . "')");
        if ($simpan) {
          echo "<script type='text/javascript'>
          setTimeout(function () { 
            swal({
                    title: 'Konfirmasi kehadiran dan Ucapan Berhasil di Simpan.',
                    type: 'success',
                    timer: 3200,
                    showConfirmButton: false
                });   
          },10);  
          window.setTimeout(function(){ 
            window.location.replace('index');
          } ,3000); 
          </script>";
        } else {
          echo "<script>alert ('gagal'); document.location='index'</script>";
        }
      }
      ?>
      <div class="row">
        <div class="rspv-form" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
          <form action="" class="form" method="POST">
            <div class="row">
              <div class="input-group ">
                <input type="text" placeholder="Nama" class="input-control" name="nama">
              </div>
              <!-- <div class="input-group w50">
                <input type="text" placeholder="Email" class="input-control">
              </div> -->
            </div>
            <div class="row">
              <div class="input-group">
                <select name="jumlah" id="" class="input-control">
                  <option value=""> Jumlah Orang</option>
                  <option value="1">1</option>
                  <option value="2">2</option>

                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-group">
                <select name="konfirmasi" id="" class="input-control">
                  <option value="datang">Saya akan hadir</option>
                  <option value="tidak">Maaf saya tidak bisa hadir </option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-group">
                <textarea name="pesan" id="" placeholder="Ucapan & Do'a " class="input-control"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="input-group">
                <button type="submit" name="tambah" class="btn-1">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- list pesan -->

      <br>
      <br>
      <br>
      <div class="container">
        <div class="row">
          <div class="section-tittle" data-aos="zoom-in">
            <h2> Ucapan Selamat & Do'a</h2>
            <!-- <p>Please Kindly Response Before 1 Agustus</p> -->
          </div>
        </div class="row">
        <div class="rspv-form" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
          <div class="row">
            <div class="scroll">
              <div class="content"> <?php
                                    $pesan = mysqli_query($konek, "SELECT * FROM pesan ORDER BY id DESC");
                                    $jumlah = mysqli_num_rows($pesan);

                                    echo "<h3>  $jumlah teman yang mengucapkan</h3>";
                                    echo "<hr class='awal' >";
                                    echo "<br>";
                                    ?>
                <?php
                while ($p = mysqli_fetch_array($pesan)) {
                ?>
                  <p> <i><?= $p['nama']; ?> </i> <span><i class="far fa-clock"></i></i><time class="timeago" datetime="<?= $p['waktu']; ?>"> </span></p>
                  <small> <?= $p['pesan']; ?></small>
                  <hr class="isi">
                  <br>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
  <!-- endrspv -->

  <!-- footer -->
  <footer class="footer">
    <div class="container">
      <div class="row" data-aos="zoom-in" data-aos-duration="2000">
        <div class="footer-content">
          <div class="couple-name">
            <img src="assets/img/flower-circle.png" alt="Wedding Couple">
            <h2>Amel <span>&</span> Lutfi </h2>
          </div>
          <p>Terimakasih</p>
        </div>
      </div>

      <div class="row">
        <div class="footer-content">
          <div class="couple-name">
          <span class="copyright-text"> <?php echo "Copyright &copy;" . (int)date('Y') . " "; ?>  <br> Created By - Lutfi Waziirul Fazri</span> 
        </div>
      </div>
    </div>
  </footer>
  <!-- endfooter -->

  <!-- copyrigth -->

  <!-- endcopyrigth -->

  <!-- gallery popup -->
  <div class="gallery-popup">
    <div class="gp-container">
      <div class="gp-counter"></div>
      <div class="gp-close">&times;</div>
      <img src="assets/img/gallery/large/1.jpg" class="gp-img" alt="gallery img">
      <div class="gp-controls">
        <div class="prev">
          <i class="fas fa-angle-left"></i>
        </div>
        <div class="next">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
  <!-- gallery popup end -->
  <!-- thema -->
  <div class="setting">
    <div class="s-toogle-btn">
      <i class="fas fa-cog fa-spin"></i>
    </div>
    <h4>Theme Color</h4>
    <div class="colors">
    </div>
    <h4>Theme Mode</h4>
    <label for="">
      <input type="radio" name="ld" value="light" class="theme-mode" checked> Light
    </label>
    <label for="">
      <input type="radio" name="ld" value="dark" class="theme-mode"> Dark
    </label>
  </div>
  <!-- endthema -->

  <!-- audio -->
  
  <audio src="assets/audio/law.mp3" id="myAudio" loop="loop" type="audio/mp3"></audio>
  <i class="fa fa fa-music pause"></i>
  <!-- audioend -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/scrollIt.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/setting.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="admin/assets/js/sweetalert.min.js"></script>
  <script src="assets/js/jquery.timeago.js"></script>
  <script>
    AOS.init({
      duration: 1000,
    });
  </script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      $("time.timeago").timeago();
    });
  </script>


</body>

</html>