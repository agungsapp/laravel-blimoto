

$(document).ready(function () {

  console.log('jQuery aman bang !')
  // misal
  var harga_motor;
  var id_motor;
  var tenor;




  $('select[name="tipe"]').change(function () {
    console.log("area select logic running...");
    var merkId = $('#merk').val();
    var tipeId = $(this).val();
    var modelSelect = $('select[name="model"]');
    // console.log(merkId + tipeId);
    modelSelect.empty();
    modelSelect.append('<option value="0" selected>-- Pilih Model --</option>');
    // console.log("sebelum if");
    if (merkId !== '0' && tipeId !== '0') {
      // console.log("get jalan!");
      $.get('/get-model-options', {
        merk_id: merkId,
        tipe_id: tipeId
      }, function (data) {
        // console.log(data);
        console.log("done bang!")
        $.each(data, function (key, value) {
          // console.log(`id nya : ${value.id} nama nya : ${value.nama}`);
          console.log(`harga otr nya ${value.harga}`)
          modelSelect.append('<option value="' + value.id + '">' + value.nama + '</option>');
        });

      });
    }
  });

  // onchange model motor di pilih 
  function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
      ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return "Rp. " + ribuan;
  }

  $('#model').on('change', function () {
    var id = $(this).val();
    console.log("onchange model berjalan ...")
    fetch('/get-harga/' + id)
      .then(response => response.json())
      .then(data => {
        console.log(`harga otrnya : ${data.data.harga}`)
        harga_motor = data.data.harga;
        id_motor = data.data.id;
        tenor = $('select[name="tenor"]').val();
        // Fetch the DP options
        fetch(`/get-dp?tenor=${tenor}&id_motor=${id_motor}`)
          .then(response => response.json())
          .then(data => {
            // Clear the select options
            $('#dp').empty();
            console.log("di bawah ini adalah data milik get dp response")
            console.log(data)

            // Add the new options
            data.dp.forEach(option => {
              var formattedOption = formatRupiah(option);
              $('#dp').append(new Option(formattedOption, option));
              $('#dp option:last-child').data('harga', option);
            });
          })
          .catch(error => console.error('Error:', error));
      })
      .catch(error => console.error('Error:', error));
  });



  $('#form-simulasi').on('submit', function (e) {
    e.preventDefault();
    console.log("submit di triger =====================================")
    console.log(`model on change id motor adalah : ${id_motor}`)


    // Mengambil nilai dari setiap input
    var id_lokasi = $('#SelectKota').val();
    var idmotor = id_motor; // Gantilah 'nilai_yang_anda_inginkan' dengan nilai yang sesuai
    var tenor = $('select[name="tenor"]').val();
    var dp = $('#dp').val();
    console.log("id motornya adalah : " + id_motor)

    // Memeriksa apakah ada input yang kosong
    if (!id_lokasi || !tenor || !dp) {
      alert('Semua input harus diisi!');
      return;
    }

    console.log("ajax di mulai")
    console.log(
      `data di tangkap pada ajax, id_lokasi : ${id_lokasi}, id_motor : ${id_motor}, dp : ${dp}, tenor : ${tenor},`
    )

    // Mengirim data ke endpoint
    $.ajax({
      url: '/cari-cicilan',
      type: 'GET',
      data: {
        id_lokasi: id_lokasi,
        id_motor: idmotor,
        dp: dp,
        tenor: tenor,
      },
      success: function (response) {
        console.log(response);
        console.log(`total bayar : ${response.total_pembayaran}, cicilan perbulan : ${response.cicilan}`)
      },
      error: function (error) {
        console.log(error);
      }
    });
  });

  // Menambahkan class "popup-open" ke elemen body untuk mengunci laman utama
  // $("body").addClass("popup-open");
  // $("#popupOverlay").fadeIn();


  // Menutup pop-up
  $("#closePopupBtn").click(function () {
    // Menghapus class "popup-open" dari elemen body untuk mengizinkan scrolling kembali
    $("body").removeClass("popup-open");
    $("#popupOverlay").fadeOut();
  });


})



// range function

function updateBubble(input) {
  const val = input.value;
  const bubble = document.getElementById("bubble");

  // Konversi nilai ke format mata uang Rupiah
  const formattedValue = formatToRupiah(val);
  bubble.textContent = formattedValue;

  // Sorta magic numbers based on size of the native UI thumb
  const min = input.min ? parseFloat(input.min) : 0;
  const max = input.max ? parseFloat(input.max) : 100;
  const newVal = ((val - min) * 100) / (max - min);
  bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}


function formatToRupiah(value) {
  // Gunakan metode Intl.NumberFormat untuk mengonversi nilai menjadi format mata uang Rupiah
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  }).format(value);
}