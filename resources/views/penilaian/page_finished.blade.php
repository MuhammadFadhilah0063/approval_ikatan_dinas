<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Approval</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/ppa.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: {
          "families": ["Lato:300,400,700,900"]
        },
        custom: {
          "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
            "simple-line-icons"
          ],
          urls: ['/assets/css/fonts.min.css']
        },
        active: function() {
          sessionStorage.fonts = true;
        }
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/atlantis-approval.css">

  </head>

  <body>
    <div class="wrapper">
      <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue" style="background-color: #051937 !important;">
          <a href="index.html" class="logo">
            <div class="avatar-sm text-center" style="margin-bottom: 20px;">
              <img src="/assets/img/icon.png" alt="logo" class="avatar-img rounded-circle">
            </div>
          </a>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" style="background-color: #051937 !important;">

          <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>

      <div class="main-panel">
        <div class="content">
          <div class="panel-header bg-primary-gradient">
            <div class="page-inner text-center py-5">
            </div>
          </div>

          <div class="page-inner mt--5">
            <div class="row justify-content-center">
              <div class="col" style="max-width: 590px;">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center">
                      <span class="fw-bold" style="font-size: 35px; display: block; margin-bottom: 6px;">
                        Terima Kasih!
                      </span>
                      <span style="font-size: 18px;">Sudah mengisi Form Evaluasi Hasil Pelatihan.</span>
                      <span style="display: block; font-size: 14px; font-weight: 600; margin-top: 10px">
                        Form Evaluasi Hasil Pelatihan :&nbsp;
                        <a href="/review-file/evaluasi/{{ $kode }}" class="btn btn-sm btn-danger p-0 text-white btn-lihat-file" target="_blank"
                          style="padding: 1.8px 13px !important; font-size: 13px; font-weight: 600;">
                          Lihat File
                        </a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="text-center">
            2024, made with <i class="fa fa-heart heart text-danger"></i>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Atlantis JS -->
    <script src="/assets/js/atlantis.min.js"></script>

    <script>
      // Setelah 10 detik, kode dibawah dijalankan
      setTimeout(() => {
        window.location.href = "/evaluasi-atasan"; // Pindah halaman
      }, 10000);
    </script>
  </body>

</html>
