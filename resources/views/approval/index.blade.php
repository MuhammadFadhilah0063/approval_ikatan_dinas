<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Approval Ikatan Dinas</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/ppa.ico" type="image/x-icon" />

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="/assets/css/loader.css">

    {{-- Jquery Signature --}}
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.signature.css">
  </head>

  {{-- Loader --}}
  @include('loader')

  <body>
    <div class="wrapper">
      <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue" style="background-color: #051937 !important;">
          <a href="" class="logo">
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
              <h2 class="text-white pb-2 fw-bold h1">Persetujuan Pernyataan Ikatan Dinas</h2>
            </div>
          </div>

          <div class="page-inner mt--5">
            <div class="row justify-content-center">
              <div class="col" style="max-width: 590px;">
                <div class="card">
                  <div class="card-body">
                    <span style="display: block; margin-left: 8px;">Silahkan mengisi data dibawah.</span>

                    <form class="needs-validation-cari" novalidate>
                      <div class="row mt-3">
                        <div class="col">
                          <div class="form-group">
                            <label for="nrp">Kode Ikatan Dinas</label>
                            <div class="row no-gutters mb-3">
                              <div class="col-7 col-sm-8">
                                <input type="text" class="form-control" name="kode_ikatan_dinas"
                                  placeholder="Kode Ikatan Dinas">
                              </div>
                              <div class="col-5 col-sm-4">
                                &nbsp;
                                <button class="btn btn-outline-primary" type="submit">
                                  <i class="fas fa-search"></i> Cari
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                    <form class="needs-validation d-none" novalidate>

                      <span style="display: block; margin-left: 8px; font-size: 14px; font-weight: 600;">
                        Form Pernyataan Ikatan Dinas :&nbsp;
                        <a class="btn btn-sm btn-danger p-0 text-white btn-lihat-file" target="_blank"
                          style="padding: 1.8px 13px !important; font-size: 13px; font-weight: 600;">Lihat
                          File</a>
                      </span>

                      {{-- TTD --}}
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="ttd">Tanda Tangan</label>
                            <div>
                              <div id="sig" class="d-flex mb-2" style="height: 170px"></div>
                              <button id="clear" class="btn btn-danger btn-sm">Bersihkan</button>
                              <textarea id="signature64" name="ttd" style="display: none" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- TTD --}}

                      {{-- Checkbox --}}
                      <div class="row mt-3">
                        <div class="col">
                          <div class="form-check d-flex">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="check" value="" required>
                              <span class="form-check-sign" style="font-size: 13px;"></span>
                            </label>

                            <span>
                              Saya telah menerima dan menyetujui isi Form Pernyataan Ikatan Dinas dengan
                              seksama, dan mengetahui isinya.
                            </span>
                          </div>
                        </div>
                      </div>
                      {{-- Checkbox --}}

                      <div class="text-center mt-3">
                        <button class="btn btn-primary fw-bold btn-simpan" type="submit" disabled>Simpan</button>
                      </div>
                    </form>
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

    <!-- Bootstrap Notify -->
    <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="/assets/js/atlantis.min.js"></script>

    {{-- Jquery Signature --}}
    <script type="text/javascript" src="/assets/js/jquery.signature.min.js"></script>

    <!-- JQuery Validate -->
    <script src="/assets/js/plugin/jquery.validate.min.js"></script>

    <!-- Helper JS -->
    <script src="/assets/helpers/helper.js"></script>

    <script>
      $(document).ready(function() {

        // Proses pencarian ikatan dinas
        $(".needs-validation-cari").validate({
          ignore: [],
          // Deklarasi rules untuk validasi
          rules: {
            kode_ikatan_dinas: {
              required: true,
            },
          },
          // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
          messages: {
            kode_ikatan_dinas: {
              required: "Kode ikatan dinas harus diisi",
            },
          },
          // Element errornya berupa div
          errorElement: "div",
          errorPlacement: function(error, element) {
            // Menyisipkan class invalid-feedback di element error
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
              error.insertAfter(element.parent("label"));
            } else {
              error.insertAfter(element);
            }
          },
          // Menyisipkan class is-invalid pada element form yang valuenya error
          highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
          },
          // Menyisipkan class is-valid pada element form yang valuenya sudah benar
          unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
          },
          // Menjalankan fungsi ketika form valid
          submitHandler: function(form) {

            // Tampil loader
            showLoader();

            // Mengambil data dari form menggunakan FormData
            var formData = new FormData(form);

            // Mengambil nilai token CSRF dari tag meta
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
              type: "POST",
              url: "/ikatan-dinas",
              headers: {
                'X-CSRF-TOKEN': csrfToken
              },
              data: formData,
              dataType: "JSON",
              contentType: false,
              processData: false,
              success: function(response) {

                if (response.status === "success") {

                  $(`a.btn-lihat-file`).attr('href',
                    `/ikatan-dinas/review-file/${response.kode_ikatan_dinas}`);
                  $(`form.needs-validation`).removeClass('d-none');
                  notifySuccessWithHideLoader(response.message, "Berhasil", "center");
                } else {
                  // Menampilkan notif dan hilangkan loader
                  notifyFailedWithHideLoader(response.message, "Gagal", "center");
                  $(`form.needs-validation`).addClass('d-none');
                }
              },
              error: function(xhr, status, error) {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader("Terjadi kesalahan pada server.", "Gagal", "center");
              }
            });
          }
        });
        // Proses pencarian ikatan dinas - End

        // Proses approval
        $(".needs-validation").validate({
          ignore: [],
          // Deklarasi rules untuk validasi
          rules: {
            ttd: {
              required: true,
            },
          },
          // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
          messages: {
            ttd: {
              required: "Tanda tangan harus diisi",
            },
          },
          // Element errornya berupa div
          errorElement: "div",
          errorPlacement: function(error, element) {
            // Menyisipkan class invalid-feedback di element error
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
              error.insertAfter(element.parent("label"));
            } else {
              error.insertAfter(element);
            }
          },
          // Menyisipkan class is-invalid pada element form yang valuenya error
          highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
          },
          // Menyisipkan class is-valid pada element form yang valuenya sudah benar
          unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
          },
          // Menjalankan fungsi ketika form valid
          submitHandler: function(form) {

            // Tampil loader
            showLoader();

            // Mengambil data dari form menggunakan FormData
            var formData = new FormData(form);
            formData.append("kode_ikatan_dinas", $(`input[name="kode_ikatan_dinas"]`).val())

            // Mengambil nilai token CSRF dari tag meta
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
              type: "POST",
              url: "{{ url()->current() }}",
              headers: {
                'X-CSRF-TOKEN': csrfToken
              },
              data: formData,
              dataType: "JSON",
              contentType: false,
              processData: false,
              success: function(response) {

                if (response.status === "success") {

                  notifySuccessWithHideLoader(response.message, "Berhasil", "center");

                  setTimeout(() => {
                    $(`a.btn-lihat-file`).attr('href', ``);
                    $(`form.needs-validation`).addClass('d-none');
                  }, 2000);

                  setTimeout(() => {
                    window.location.href = "{{ route('finish') }}"; // Pindah halaman
                  }, 2001);
                } else {
                  // Menampilkan notif dan hilangkan loader
                  notifyFailedWithHideLoader(response.message, "Gagal", "center");
                  $(`form.needs-validation`).addClass('d-none');
                }
              },
              error: function(xhr, status, error) {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader("Terjadi kesalahan pada server.", "Gagal", "center");
              }
            });
          }
        });
        // Proses approval - End

        // Signature
        var sig = $('#sig').signature({
          syncField: '#signature64',
          syncFormat: 'PNG',
          background: 'transparent'
        });
        $('#clear').click(function(e) {
          e.preventDefault();
          sig.signature('clear');
          $("#signature64").val('');
        });

        // Checkbox
        $(`input[name="check"]`).on("click", function() {
          if ($(this).is(':checked')) {
            $('.btn-simpan').removeAttr('disabled');
          } else {
            $('.btn-simpan').attr('disabled', 'disabled');
          }
        });

      });
    </script>
  </body>

</html>
