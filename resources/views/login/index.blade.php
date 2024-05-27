<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  {{-- CSRF --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="/assets/img/ppa.ico" type="image/x-icon" />

  <title>Login || Approval Ikatan Dinas</title>

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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="/assets/css/ready.css">
  <link rel="stylesheet" href="/assets/css/loader.css">

  <style>
    body {
      background-image: radial-gradient(circle, #0b2e63, #082958, #07234d, #061e42, #051937);
    }

    .card {
      background-color: rgb(255, 255, 255);
      border: 2px solid rgba(255, 255, 255, .2);
      border-radius: 10px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 10px rgba(0, 0, 0, .2);
      padding: 30px 40px;
      color: #fff;
    }

    .card h2 {
      font-size: 50px;
      font-weight: bold;
      text-transform: uppercase;
      transition: transform 0.3s ease;
      margin-bottom: 17px;
    }

    .card h2:hover {
      transform: scale(1.2);
    }

    .btn-login {
      background-color: rgba(236, 31, 38, 0.885);
      color: #fff;
      font-weight: 600;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-login:hover {
      transform: scale(1.05);
      background-color: #262626;
      color: white;
    }
  </style>
</head>

<body>

  {{-- Loader --}}
  @include('loader')

  <div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh;">
      <div class="col d-flex justify-content-center">
        <div class="card shadow-sm" style="width: 420px;">
          <div class="card-body text-center">
            <h2><img src="/assets/img/icon.png" height="50px" alt="Logo"></h2>
            <span class="text-dark">Silakan login dengan nrp dan password Anda</span>
            <form class="needs-validation" novalidate>
              <div class="form-group">
                <input type="text" class="form-control input-pill" id="nrp" name="nrp" placeholder="NRP" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control input-pill" id="password" name="password"
                  placeholder="Password">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-round btn-login btn-block">
                  LOGIN
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- JQuery Validate -->
  <script src="/assets/js/plugin/jquery.validate.min.js"></script>

  <!-- Helper JS -->
  <script src="/assets/helpers/helper.js"></script>

  <script>
    $(document).ready(function() {

      // Proses login - Start
      $(".needs-validation").validate({
        ignore: [],
        // Deklarasi rules untuk validasi
        rules: {
          nrp: {
            required: true,
            minlength: 2
          },
          password: {
            required: true,
          }
        },
        // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
        messages: {
          nrp: {
            required: "NRP harus diisi",
            minlength: "Panjang NRP minimal 2 karakter"
          },
          password: {
            required: "Password harus diisi",
          }
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

          // Mengambil data dari form
          var formData = $(form).serialize();

          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: window.location.href,
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            success: function(response) {

              if (response.status === "success") {

                // Notif sukses
                notifySuccess(response.message);

                // Setelah 1 detik, kode dibawah dijalankan
                setTimeout(() => {
                  hideLoader(); // Sembunyikan loader
                  window.location.href = "{{ route('ikatan_dinas') }}"; // Pindah halaman
                }, 1000);
              } else {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            },
            error: function(xhr, status, error) {
              // Menampilkan notif dan hilangkan loader
              notifyFailedWithHideLoader(response.message);
            }
          });
        }
      });
      // Proses login - End

    });
  </script>
</body>

</html>