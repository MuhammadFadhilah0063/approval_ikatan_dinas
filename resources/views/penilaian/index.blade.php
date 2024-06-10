<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Penilaian Evaluasi Hasil Pelatihan</title>
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
              <h2 class="text-white pb-2 fw-bold h1">Penilaian Evaluasi Hasil Pelatihan</h2>
            </div>
          </div>

          <div class="page-inner mt--5">
            <div class="row justify-content-center">
              <div class="col" style="max-width: 690px;">
                <div class="card">
                  <div class="card-body">
                    <span style="display: block; margin-left: 8px;">Silahkan mengisi data dibawah.</span>

                    <form class="needs-validation-cari" novalidate>
                      <div class="row mt-3">
                        <div class="col">
                          <div class="form-group">
                            <label for="nrp">Kode Evaluasi Atasan</label>
                            <div class="row no-gutters mb-3">
                              <div class="col-7 col-sm-9">
                                <input type="text" class="form-control" name="kode_evaluasi_atasan"
                                  placeholder="Kode Evaluasi Atasan">
                              </div>
                              <div class="col-5 col-sm-3">
                                &nbsp;
                                <button class="btn btn-outline-primary" type="submit">
                                  <i class="fas fa-search"></i> Cari
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row row-review-file d-none" style="margin-top: -15px;">
                        <div class="col">
                          <div class="form-group">
                            <span>
                              Form Evaluasi Hasil Pelatihan :&nbsp;
                              <a class="btn btn-sm btn-danger p-0 text-white btn-lihat-file" target="_blank"
                                style="padding: 1.8px 13px !important; font-size: 13px; font-weight: 600;">
                                Lihat File
                              </a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <form class="needs-validation mt-1 d-none" novalidate>
              <div class="row justify-content-center">
                <div class="col" style="max-width: 690px;">
                  <div class="card">
                    <div class="card-header custom-header">
                      Rating Penilaian
                    </div>
                    <div class="card-body">

                      <span class="d-block font-weight-bold" style="font-size: 15px; margin-left: 9px;">
                        Keterangan :
                      </span>
                      <span class="d-block" style="font-size: 14px; margin-left: 20px;">
                        Nilai 1 <span class="d-inline-block ml-4">Turun</span>
                      </span>
                      <span class="d-block" style="font-size: 14px; margin-left: 20px;">
                        Nilai 2 <span class="d-inline-block ml-4">Tetap</span>
                      </span>
                      <span class="d-block mb-4" style="font-size: 14px; margin-left: 20px;">
                        Nilai 3 <span class="d-inline-block ml-4">Naik</span>
                      </span>

                      <span style="display: block; margin-left: 9px;">Silahkan mengisi data dibawah.</span>

                      <div class="row mt-1">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-0 fw-bold">PEMAHAMAN MATERI <code>*</code></label>
                            <select name="penilaian_1" class="custom-select" required>
                              <option value="">Pilih Penilaian</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-0 fw-bold">IMPLEMENTASI MATERI DI LAPANGAN <code>*</code></label>
                            <select name="penilaian_2" class="custom-select" required>
                              <option value="">Pilih Penilaian</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-0 fw-bold">IMPROVEMENT <code>*</code></label>
                            <select name="penilaian_3" class="custom-select" required>
                              <option value="">Pilih Penilaian</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-0 fw-bold">KINERJA <code>*</code></label>
                            <select name="penilaian_4" class="custom-select" required>
                              <option value="">Pilih Penilaian</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col" style="max-width: 690px;">
                  <div class="card">
                    <div class="card-header custom-header">
                      Kesimpulan
                    </div>
                    <div class="card-body">

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-0 fw-bold">Apakah pelatihan perlu dievaluasi ulang ?
                              <code>*</code></label>
                            <select name="kesimpulan_1" class="custom-select" required>
                              <option value="">Pilih Jawaban</option>
                              <option value="Ya">Ya</option>
                              <option value="Tidak">Tidak</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row" style="margin-top: -8px;">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-1 fw-bold">Alasan <code>*</code></label>
                            <textarea class="form-control" name="alasan_1" required rows="3"></textarea>
                          </div>
                        </div>
                      </div>


                      <div class="row mt-3">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-0 fw-bold">Apakah hasil dari pelatihan ini sesuai harapan ?
                              <code>*</code></label>
                            <select name="kesimpulan_2" class="custom-select" required>
                              <option value="">Pilih Jawaban</option>
                              <option value="Ya">Ya</option>
                              <option value="Tidak">Tidak</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row" style="margin-top: -8px;">
                        <div class="col">
                          <div class="form-group">
                            <label class="pb-1 fw-bold">Alasan <code>*</code></label>
                            <textarea class="form-control" name="alasan_2" required rows="3"></textarea>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col" style="max-width: 690px;">
                  <div class="card">
                    <div class="card-header custom-header">
                      Pengesahan
                    </div>
                    <div class="card-body">
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

                      <div class="text-center mt-3">
                        <button class="btn btn-primary fw-bold btn-simpan" type="submit">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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

        // Proses pencarian evaluasi atasan
        $(".needs-validation-cari").validate({
          ignore: [],
          // Deklarasi rules untuk validasi
          rules: {
            kode_evaluasi_atasan: {
              required: true,
            },
          },
          // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
          messages: {
            kode_evaluasi_atasan: {
              required: "Kode evaluasi atasan harus diisi",
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
              url: "/evaluasi-atasan/data",
              headers: {
                'X-CSRF-TOKEN': csrfToken
              },
              data: formData,
              dataType: "JSON",
              contentType: false,
              processData: false,
              success: function(response) {

                if (response.status === "success") {

                  var kode = btoa($(`input[name="kode_evaluasi_atasan"]`).val());

                  $(`form.needs-validation`).removeClass('d-none');
                  $(`.row-review-file`).removeClass('d-none');
                  $(`.row-review-file a`).attr('href', `/review-file/evaluasi/${kode}`);
                  $('.needs-validation')[0].reset();
                  notifySuccessWithHideLoader(response.message, "Berhasil", "center");
                } else {
                  // Menampilkan notif dan hilangkan loader
                  notifyFailedWithHideLoader(response.message, "Gagal", "center");
                  $(`form.needs-validation`).addClass('d-none');
                  $(`.row-review-file`).addClass('d-none');
                  $('.needs-validation')[0].reset();
                }
              },
              error: function(xhr, status, error) {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader("Terjadi kesalahan pada server.", "Gagal", "center");
              }
            });
          }
        });
        // Proses pencarian evaluasi atasan - End


        // Proses penilaian
        $(".needs-validation").validate({
          ignore: [],
          // Deklarasi rules untuk validasi
          rules: {
            ttd: {
              required: true,
            },
            penilaian_1: {
              required: true,
            },
            penilaian_2: {
              required: true,
            },
            penilaian_3: {
              required: true,
            },
            penilaian_4: {
              required: true,
            },
            kesimpulan_1: {
              required: true,
            },
            kesimpulan_2: {
              required: true,
            },
            alasan_1: {
              required: true,
            },
            alasan_2: {
              required: true,
            },
          },
          // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
          messages: {
            ttd: {
              required: "Tanda tangan harus diisi",
            },
            penilaian_1: {
              required: "Penilaian harus diisi",
            },
            penilaian_2: {
              required: "Penilaian harus diisi",
            },
            penilaian_3: {
              required: "Penilaian harus diisi",
            },
            penilaian_4: {
              required: "Penilaian harus diisi",
            },
            kesimpulan_1: {
              required: "Kesimpulan harus diisi",
            },
            kesimpulan_2: {
              required: "Kesimpulan harus diisi",
            },
            alasan_1: {
              required: "Alasan harus diisi",
            },
            alasan_2: {
              required: "Alasan harus diisi",
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
            var kodeEvaluasiAtasan = $(`input[name="kode_evaluasi_atasan"]`).val();
            formData.append("kode_evaluasi_atasan", kodeEvaluasiAtasan)

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

                  // encode base64
                  var kode = btoa(kodeEvaluasiAtasan);

                  $(`form.needs-validation`).addClass('d-none');
                  $(`.row-review-file`).addClass('d-none');
                    $('.needs-validation')[0].reset();
                  $(`input[name="kode_evaluasi_atasan"]`).val("");
                  notifySuccessWithHideLoader(response.message, "Berhasil", "center");

                  setTimeout(() => {
                    window.location.href = `/evaluasi-atasan/selesai?kode=${kode}`; // Pindah halaman
                  }, 2000);
                } else {
                  // Menampilkan notif dan hilangkan loader
                  notifyFailedWithHideLoader(response.message, "Gagal", "center");
                }
              },
              error: function(xhr, status, error) {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader("Terjadi kesalahan pada server.", "Gagal", "center");
              }
            });
          }
        });
        // Proses penilaian - End


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

      });
    </script>
  </body>

</html>
