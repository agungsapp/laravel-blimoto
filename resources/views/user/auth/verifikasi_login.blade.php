<!DOCTYPE html>
<html lang="en">

<head>
  <title>BliMoto</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="Blimoto adalah startup pembelian motor baru dengan harga terbaik, proses cepat dan mudah serta terpercaya untuk wilayah jabodetabek " />
  <meta name="keywords" content="Blimoto" />
  <meta name="author" content="Blimoto" />
  <link rel="icon" href="assets/images/favicon/favicon.webp" type="image/x-icon" />
  <link rel="shortcut icon" href="assets/images/favicon/favicon.webp" type="image/x-icon" />
  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <!--icon css-->
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/themify.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <!--Slick slider css-->
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" />
  <!--Animate css-->
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="assets/css/color10.css" media="screen" id="color" />

  <!-- select 2 css & js -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

  <!-- css custom agung -->
  <link rel="stylesheet" type="text/css" href="assets/css/custom/custom.css" />

  <link rel="stylesheet" href="assets/owl/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/owl/owl.theme.default.min.css" />

</head>

<body class="bg-light">


  <div class="container mt-5 text-center">
    <img src="assets/images/logo/Logo-blimoto.webp" class="mt-5" alt="logo blimoto">
  </div>


  <!--section start-->
  <section class="login-page section-big-py-space b-g-light">
    <div class="custom-container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="theme-card">
            <h3 class="mb-1 text-center">Verifikasi Nomor HP</h3>
            <form id="form-verifikasi" class="theme-form" action="{{ route('verifyOTP') }}" method="POST">
              @csrf

              <input type="hidden" id="nomor" name="nomor" value="{{ $nomor }}">
              <input type="hidden" id="otp" name="otp" value="{{ $otp }}">
              <div class="row g-3">
                @error('otp')
                <div class="col-md-12 form-group">
                  <div class="alert alert-danger">{{ $message }}</div>
                </div>
                @enderror
                {{-- form otp --}}
                <div class="col-md-12 form-group">
                  <label for="otp_user">Masukan Kode OTP</label>
                  <input type="text" class="form-control" id="otp_user" name="otp_user" value="{{ old('otp') }}" placeholder="Masukan 4 Digit Kode OTP" required>

                  <div id="otpUserFeedback" class="invalid-feedback d-none">
                    Kode otp yang anda masukan salah !
                  </div>
                </div>
                <div class="col-md-12 form-group d-flex justify-content-between">
                  <button class="btn btn-warning btn-block rounded-lg py-1" id="kirim" type="button">KIRIM
                    KODE
                    OTP</button>
                </div>
              </div>
              <div class="row g-3">
                <div class="col-md-12 form-group">
                  <button type="submit" class="btn btn-rounded">
                    Verifikasi
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Section ends-->




  <!-- add to  setting bar  end-->
  <!-- latest jquery-->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!-- slick js-->
  <script src="assets/js/slick.js"></script>

  <!-- tool tip js -->

  <script src="assets/js/tippy-popper.min.js"></script>
  <script src="assets/js/tippy-bundle.iife.min.js"></script>

  <!-- popper js-->
  <script src="assets/js/popper.min.js"></script>

  <!-- menu js-->
  <script src="assets/js/menu.js"></script>

  <!-- father icon -->
  <script src="assets/js/feather.min.js"></script>
  <script src="assets/js/feather-icon.js"></script>

  <!-- Bootstrap js-->
  <script src="assets/js/bootstrap.js"></script>
  <!-- Bootstrap js-->
  <script src="assets/js/bootstrap-notify.min.js"></script>
  <!-- Theme js-->
  <script src="assets/js/slider-animat-three.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/modal.js"></script>

  <!-- select 2 js  -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="assets/js/custom/custom.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <script src="assets/owl/owl.carousel.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      function sendOtp() {
        const nomor = $('#nomor').val();
        const otp = $('#otp').val();
        console.log(nomor);
        console.log(otp);

        $.ajax({
          url: '/send-whasapp',
          type: 'POST',
          data: {
            nomor: nomor,
            otp: otp
          },
          success: function(response) {
            console.log(response);
          },
          error: function(error) {
            console.error(error);
          }
        });
      }

      $('#kirim').on('click', sendOtp)


      // Jika Anda memiliki tombol atau elemen pemicu, tambahkan event listener disini
      // Contoh: $('#tombolKirim').on('click', sendOtp);

      // Fungsi ini akan dijalankan ketika tombol "Verifikasi" ditekan
      // Fungsi ini akan dijalankan ketika tombol "Verifikasi" ditekan
      $("#form-verifikasi").submit(function(e) {
        // Menghentikan aksi default form (prevent form submission)
        e.preventDefault();

        // Mendapatkan nilai input otp_user
        var otpUser = $("#otp_user").val();

        // Mendapatkan nilai input nomor dan otp (untuk dikirim dalam request)
        var nomor = $("#nomor").val();
        var otp = $("#otp").val();

        // Membuat objek data yang akan dikirim dalam request
        var data = {
          nomor: nomor,
          otp: otp,
          kode_otp: otpUser
        };

        // Melakukan request ke endpoint "/register-verified" dengan method POST
        $.ajax({
          url: "/register-verified",
          type: "POST",
          data: data,
          dataType: "json",
          success: function(response) {
            console.log(response);
            // Handle response jika verifikasi berhasil
            window.location.href = "/home";

            $('#otp_user').addClass('is-valid');
          },
          error: function(xhr, status, error) {
            // Handle error jika request gagal
            console.error("Error:", error);

            // alert("Verifikasi gagal. " + response.message);
            $('#otp_user').addClass('is-invalid');
            $('#otpUserFeedback').removeClass('d-none');


            // Tampilkan alert jika terjadi kesalahan pada server
            // alert("Terjadi kesalahan pada server. Mohon coba lagi.");

            // Tampilkan respons JSON yang dikirim oleh server di konsol
            console.log("XHR Response:", xhr.responseText);
          }
        });
      });



      const errotOtp = () => {
        $('#otp_user').addClass('is-invalid')
      }




    });
  </script>



</body>

</html>