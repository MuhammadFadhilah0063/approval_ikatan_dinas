<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>{{ $title }}</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="/assets/img/ppa.ico" type="image/x-icon" />

  {{-- CSRF --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Fonts and icons -->
  <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/atlantis.css">
  <link rel="stylesheet" href="/assets/css/loader.css">

  <!-- Select2 -->
  <link href="/assets/js/plugin/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

  {{-- Jquery Signature --}}
  <link rel="stylesheet" type="text/css" href="/assets/css/jquery.signature.css">

  {{-- Custom CSS --}}
  <style>
    .btn-export:focus {
      color: white;
    }
  </style>
</head>

<body>

  {{-- Loader --}}
  @include('loader')

  <div class="wrapper">
    {{-- Main Header --}}
    <div class="main-header">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="blue" style="background-color: #051937 !important;">
        <a href="{{ route('ikatan_dinas') }}" class="logo">
          <div class="avatar-sm text-center" style="margin-bottom: 20px;">
            <img src="/assets/img/icon.png" alt="logo" class="avatar-img rounded-circle">
          </div>
        </a>
        <button type="button" class="topbar-toggler more btn-vertical"><i class="icon-options-vertical"></i></button>
      </div>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg" style="background-color: #051937 !important;">

        <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" aria-expanded="false">
                <div class="avatar-sm">
                  <img src="/assets/img/user.jpg" alt="image profile" class="avatar-img rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg"><img src="/assets/img/user.jpg" alt="image profile"
                          class="avatar-img rounded"></div>
                      <div class="u-text" style="max-width: 165px">
                        <h4>{{ ucwords($user['nama']) }}</h4>
                        <p class="text-muted">
                          {{ ucwords($user['level']) }}
                        </p>
                        <button type="button" class="btn btn-xs btn-primary btn-sm fw-bold" data-toggle="modal"
                          data-target="#modalPengaturan">
                          Pengaturan Akun
                        </button>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item btn-logout fw-bold" style="cursor: pointer;">Logout</a>
                  </li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>
    {{-- Main Header End --}}

    {{-- Main Panel --}}
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner text-center py-5">
            <h2 class="text-white pb-2 fw-bold h1">Data Ikatan Dinas</h2>
          </div>
        </div>

        <div class="page-inner mt--5">
          {{-- Content --}}
          @yield('content')
        </div>
      </div>

      <footer class="footer">
        <div class="text-center">
          {{ date('Y') }}, made with <i class="fa fa-heart heart text-danger"></i>
        </div>
      </footer>
    </div>
    {{-- Main Panel End --}}
  </div>

  <!-- Modal Pengaturan Akun -->
  <div class="modal fade" id="modalPengaturan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pengaturan Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <ul class="nav nav-pills nav-primary nav-pills-no-bd nav-pills-icons justify-content-center mt-2"
            id="pills-tab-with-icon" role="tablist">
            <li class="nav-item">
              <a class="nav-link text-center active" id="pills-nama-tab-icon" data-toggle="pill" href="#pills-nama-icon"
                role="tab" aria-controls="pills-nama-icon" aria-selected="true">
                Ubah<br>Nama
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" id="pills-password-tab-icon" data-toggle="pill"
                href="#pills-password-icon" role="tab" aria-controls="pills-password-icon" aria-selected="false">
                Ubah<br>Password
              </a>
            </li>
            @if ($user->level != "Administrasi")
            <li class="nav-item">
              <a class="nav-link text-center" id="pills-ttd-tab-icon" data-toggle="pill" href="#pills-ttd-icon"
                role="tab" aria-controls="pills-ttd-icon" aria-selected="false">
                Ubah<br>Tanda Tangan
              </a>
            </li>
            @endif
          </ul>
          <hr>
          <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
            <!-- Ubah Nama -->
            <div class="tab-pane fade show active" id="pills-nama-icon" role="tabpanel"
              aria-labelledby="pills-nama-tab-icon">
              <form class="needs-validation-nama" novalidate>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>

                <div class="form-group d-flex justify-content-center">
                  <button type=" submit" class="btn btn-primary btn-submit" data-action="add">Simpan</button>
                </div>
              </form>
            </div>
            <!-- Ubah Password -->
            <div class="tab-pane fade" id="pills-password-icon" role="tabpanel"
              aria-labelledby="pills-password-tab-icon">
              <form class="needs-validation-password" novalidate>
                <div class="form-group">
                  <label for="password_lama">Password Lama</label>
                  <input type="password" class="form-control" id="password_lama" name="password_lama"
                    placeholder="Password Lama" required>
                </div>
                <div class="form-group">
                  <label for="password_baru">Password Baru</label>
                  <input type="password" class="form-control" id="password_baru" name="password_baru"
                    placeholder="Password Baru" required>
                </div>

                <div class="form-group d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-submit" data-action="add">Simpan</button>
                </div>
              </form>
            </div>
            <!-- Ubah TTD -->
            @if ($user->level != "Administrasi")
            <div class="tab-pane fade" id="pills-ttd-icon" role="tabpanel" aria-labelledby="pills-ttd-tab-icon">
              <form class="needs-validation-ttd" novalidate>
                <div class="form-group">
                  <label for="nama">Tanda Tangan</label>
                  <div>
                    <div id="sig" class="d-flex mb-2" style="height: 170px"></div>
                    <button id="clear" class="btn btn-danger btn-sm">Bersihkan</button>
                    <textarea id="signature64" name="ttd" style="display: none" required></textarea>
                  </div>
                </div>

                <div class="form-group d-flex justify-content-center">
                  <button type=" submit" class="btn btn-primary btn-submit" data-action="add">Simpan</button>
                </div>
              </form>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Pengaturan Akun End -->

  <!--   Core JS Files   -->
  <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery UI -->
  <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Datatables -->
  <script src="/assets/js/plugin/datatables/datatables.min.js"></script>

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

  <!-- Select2 -->
  <script src="/assets/js/plugin/select2/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {

      // Inisiasi Signature
      var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG', background:'transparent'});

      // Proses Logout
      $(".btn-logout").on("click", function() {
        // Tampil loader
        showLoader();

        $.ajax({
          type: "GET",
          url: "{{ route('logout') }}",
          dataType: "json",
          success: function(response) {

            if (response.status === "success") {
              // Notify
              notifySuccess(response.message);

              setTimeout(() => {
                hideLoader(); // Sembunyikan loader
                window.location.href = "{{ route('login') }}";
              }, 1000);
            }
          },
          error: function(xhr, status, error) {
            // Menampilkan notif dan hilangkan loader
            notifyFailedWithHideLoader(response.message);
          }
        });
      });
      // Proses Logout - End

      // Proses ketika modal pengaturan akun ditutup
      $('#modalPengaturan').on('hidden.bs.modal', function() {

        // Menghapus kelas is-valid dari setiap elemen input dan select dalam formulir
        $(".needs-validation-nama :input, .needs-validation-nama select").removeClass("is-valid");
        $(".needs-validation-nama :input, .needs-validation-nama select").removeClass("is-invalid");
        $(".needs-validation-password :input, .needs-validation-password select").removeClass("is-valid");
        $(".needs-validation-password :input, .needs-validation-password select").removeClass("is-invalid");
        $(".invalid-feedback").remove();

        // Input
        $('#modalPengaturan input[name="nama"]').val("");
        $('#modalPengaturan input[name="password_lama"]').val("");
        $('#modalPengaturan input[name="password_baru"]').val("");
      });
      // Proses ketika modal pengaturan akun ditutup - End

      // Proses ubah nama
      $(".needs-validation-nama").validate({
        ignore: [],
        // Deklarasi rules untuk validasi
        rules: {
          nama: {
            required: true,
          },
        },
        // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
        messages: {
          nama: {
            required: "Nama harus diisi",
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
          formData.append("nrp", "{{ $user['nrp'] }}");
          formData.append("_method", "PUT");
          
          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: "{{ route('change_name') }}",
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(response) {

              if (response.status === "success") {

                hideModal("#modalPengaturan");
                notifySuccessWithHideLoader(response.message);
              } else {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            },
            error: function(xhr, status, error) {
              // Menampilkan notif dan hilangkan loader
              notifyFailedWithHideLoader("Terjadi kesalahan pada server.");
            }
          });
        }
      });
      // Proses ubah nama - End

      // Proses ubah password
      $(".needs-validation-password").validate({
        ignore: [],
        // Deklarasi rules untuk validasi
        rules: {
          password_lama: {
            required: true,
          },
          password_baru: {
            required: true,
          },
        },
        // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
        messages: {
          password_lama: {
            required: "Password Lama harus diisi",
          },
          password_baru: {
            required: "Password Baru harus diisi",
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
          formData.append("nrp", "{{ $user['nrp'] }}");
          formData.append("_method", "PUT");
          
          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: "{{ route('change_password') }}",
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(response) {

              if (response.status === "success") {

                hideModal("#modalPengaturan");
                notifySuccessWithHideLoader(response.message);
              } else {
                hideModal("#modalPengaturan");
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            },
            error: function(xhr, status, error) {
              // Menampilkan notif dan hilangkan loader
              notifyFailedWithHideLoader("Terjadi kesalahan pada server.");
            }
          });
        }
      });
      // Proses ubah password - End

      // Proses ubah ttd
      $(".needs-validation-ttd").validate({
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
          formData.append("nrp", "{{ $user['nrp'] }}");
          formData.append("_method", "PUT");
          
          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: "{{ route('change_ttd') }}",
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(response) {

              if (response.status === "success") {

                hideModal("#modalPengaturan");
                notifySuccessWithHideLoader(response.message);
              } else {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            },
            error: function(xhr, status, error) {
              // Menampilkan notif dan hilangkan loader
              notifyFailedWithHideLoader("Terjadi kesalahan pada server.");
            }
          });
        }
      });
      // Proses ubah ttd - End

      // Proses Clear Signature
      $('#clear').click(function(e) {
          e.preventDefault();
          sig.signature('clear');
          $("#signature64").val('');
      });
      // Proses Clear Signature - End

    });
  </script>

  <script>
    // Fungsi append option pada select posisi
    function setSelectPosisi(departemen) {
        
      var posisiSelect = $(`select[name="posisi"]`);

      // Kosongkan Option Select Posisi
      posisiSelect.empty();
      posisiSelect.append(`<option value="">Pilih Posisi</option>`);

      // Inisiasi posisi sesuai departemen
      if (departemen === 'PRODUKSI') {
          var posisi = ['PRODUCTION SECTION HEAD', 'OPERATOR DT 30 - 50', 'PRODUCTION GL', 'OPERATOR HD 785', 'OPERATOR GD 825', 'PRODUCTION GL (ACT)', 'PRODUCTION SECTION HEAD (ACT)', 'PIT SERVICE GL', 'OPERATOR D155', 'OPERATOR HD 465', 'OPERATOR BW 211D', 'MANPOWER GL', 'OPERATOR PC 2000', 'OPERATOR PC 1250', 'HRM SECTION HEAD (ACT)', 'PRODUCTION DEPT HEAD', 'DRILL & BLAST GL', 'OPERATOR DT 20T', 'OPERATOR CAT 777', 'OPERATOR WATER TRUCK', 'OPERATOR DT 20', 'OPERATOR D85', 'OPERATOR GD 705', 'OPERATOR PC 500', 'OPERATOR PC 200', 'OPERATION INSTRUCTOR', 'DRILL & BLAST SECTION HEAD (ACT)', 'OPERATOR A2B'];

      } else if (departemen === 'PLANT') {
          var posisi = ['MECHANIC WHEEL', 'PLANT WHEEL EQUIPMENT GL', 'PLANT FABRICATION GL', 'PLANT ADMIN', 'MECHANIC TRACK', 'OPERATOR MANITOU', 'OPERATOR LUBE TRUCK', 'TYRE MAN', 'PLANT TRACK EQUIPMENT SECTION HEAD', 'WELDER', 'PLANT SUPPORT EQUIPMENT GL', 'OPERATOR CT 50T', 'MECHANIC SUPPORT', 'PLANT DEPT HEAD', 'PLANT TRACK EQUIPMENT GL', 'PLANT FABRICATION GL (ACT)', 'PLANT HEAVY EQUIPMENT GL', 'PLANT ENGINEER GL', 'PLANT FABRICATION SECTION HEAD', 'PLANT PEOPLE DEVELOPMENT GL', 'PLANT TRACK EQUIPMENT GL (ACT)', 'PLANT SUPPORT EQUIPMENT SECTION HEAD (ACT)', 'PLANT WHEEL EQUIPMENT GL (ACT)', 'OPERATOR WATER TRUCK', 'OPERATOR LOWBOY', 'OPERATOR CT 10T', 'OPERATOR FORKLIFT', 'PLANT GL', 'PLANT PLANNER GL', 'PLANT TYRE GL', 'PLANT SUPPORT EQUIPMENT GL (ACT)', 'PLANT SUPPORT EQUIPMENT SECTION HEAD', 'PLANT TYRE SECTION HEAD', 'PLANT TRACK EQUIPMENT SECTION HEAD (ACT)', 'OPERATOR MERLO', 'PLANT ENGINEER GL (ACT)', 'PLANT TYRE GL (ACT)', 'PLANT WHEEL EQUIPMENT SECTION HEAD', 'PLANT ENGINEER SECTION HEAD', 'PLANT PEOPLE DEVELOPMENT SECTION HEAD', 'PLDP PLANT'];

      } else if (departemen === 'HCGA') {
          var posisi = ['RECRUITMENT & DEVELOPMENT GL', 'GENERAL SERVICE GL', 'CHIEF SECURITY', 'SECURITY', 'GENERAL AFFAIRS SECTION HEAD', 'COMBEN ADMIN', 'TRANSPORTATION GL', 'GENERAL SERVICE GL (ACT)', 'GA ELECTRICIAN', 'CORPORATE SOCIAL RESPONSIBILITY GL', 'COMPENSATION & BENEFIT GL', 'INDUSTRIAL RELATION GL', 'HUMAN CAPITAL SECTION HEAD', 'PLDP HCGA', 'HCGA DEPT HEAD', 'RECRUITMENT & DEVELOPMENT GL (ACT)'];

      } else if (departemen === 'SHE') {
          var posisi = ['K3P SECTION HEAD', 'K3P GL', 'SHE DEPT HEAD', 'SHE ADMIN', 'EMERGENCY RESPONSE CREW', 'SHE HELPER', 'KOP SECTION HEAD', 'KOP GL', 'EMERGENCY RESPONSE GL (ACT)', 'K3P SECTION HEAD (ACT)', 'PARAMEDIC', 'EMERGENCY RESPONSE GL', 'SHE GL', 'ENVIRONMENT GL', 'DOCTOR', 'PLDP SHE'];

      } else if (departemen === 'COE') {
          var posisi = ['ICT GL', 'OPERATION DISPATCH GL', 'CENTER OF EXCELLENCE SECTION HEAD', 'DATA PROCESSOR', 'CENTER OF EXCELLENCE SECTION HEAD (ACT)', 'MANAGEMENT DEVELOPMENT GL', 'SYSTEM DEVELOPER', 'ICT GL (ACT)', 'DISPATCH ANALYST GL', 'ICT TECHNICIAN', 'DISPATCH ANALYST GL (ACT)', 'PLDP COE'];

      } else if (departemen === 'ENGINEERING') {
          var posisi = ['MINE PLAN SECTION HEAD', 'MINE PLAN GL', 'SURVEY GL', 'PIT CONTROL GL', 'MINE PLAN SECTION HEAD (ACT)', 'ENGINEERING DEPT HEAD', 'SURVEY SECTION HEAD', 'SURVEY SECTION HEAD (ACT)', 'MINEPLAN DRAFTER', 'SURVEY DRAFTER', 'CIVIL ENGINEER GL', 'DRILL & BLAST ENGINEER GL', 'GEOTECHNOLOGY & DEVELOPMENT ENGINEER GL', 'PLDP ENGINEERING', 'SURVEY INSTRUMENT MAN'];

      } else if (departemen === 'FA & LOGISTIK') {
          var posisi = ['FUEL ADMIN', 'FUEL GL', 'OPERATOR FUEL TRUCK', 'FALOG DEPT HEAD', 'FUEL MAN', 'LOGISTIC GL', 'LOGISTIC ADMIN', 'LOGISTIC GL (ACT)', 'FUEL GL (ACT)', 'FINANCE & ACCOUNTING SECTION HEAD (ACT)', 'PURCHASING ADMIN', 'LOGISTIC SECTION HEAD (ACT)', 'PURCHASING GL', 'FINANCE & ACCOUNTING GL', 'PURCHASING GL (ACT)', 'PLDP FALOG', 'FINANCE & ACCOUNTING GL (ACT)'];
      }else {
          var posisi = [];
      }

      // Loop posisi dan append ke select posisi
      posisi.forEach(function(item) {
        posisiSelect.append(`<option value="${item}">${item}</option>`);
      });
    }
    // Fungsi Append Options ada Select Posisi End

    // Proses Inisiasi Option Select Posisi
    if($(`select[name="departemen"]`)) {
      $(`select[name="departemen"]`).on("change", function() {

        var departemen = $(this).val();
        setSelectPosisi(departemen);
      });
    }
    // Proses Inisiasi Option Select Posisi End
  </script>

  {{-- Script --}}
  @stack('scripts')
</body>

</html>