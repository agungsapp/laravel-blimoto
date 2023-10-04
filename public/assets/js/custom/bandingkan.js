import { bacaMerk, bacaType, findMotorByTypeMerk } from "./function.js";

var counterModel = 0;


bacaMerk();

bacaType();


$(document).ready(function () {
  console.log('aman bang...')
})

// $('#modalku').show()

// document.getElementById('vehicleForm').addEventListener('submit', function (event) {
//   event.preventDefault();

//   var merk = document.getElementById('merk').value;
//   var type = document.getElementById('type').value;
//   var nama = document.getElementById('nama').value;

//   fetch('/get-motor', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json',
//     },
//     body: JSON.stringify({
//       merk: merk,
//       type: type,
//       nama: nama
//     }),
//   })
//     .then(response => response.json())
//     .then(data => {
//       // Display the result in the 'hasil-pilihan1' element
//       document.getElementById('hasil-pilihan1').classList.remove('d-none');
//       // Update the content of 'hasil-pilihan1' with the data
//       // This depends on the structure of the data returned from the endpoint
//     })
//     .catch((error) => {
//       console.error('Error:', error);
//     });
// });

$('#tipe').change(function () {
  console.log("area select logic running...");
  var merkId = $("#merk").val();
  var tipeId = $(this).val();
  counterModel += 1;
  // panggil function
  findMotorByTypeMerk(merkId, tipeId);
});

$('#merk').change(function () {
  console.log("merk counter :" + counterModel);
  if (counterModel > 0) {
    var merkId = $(this).val();
    var tipeId = $("#tipe").val();
    // return console.log("tipe harus di isi dulu");
    findMotorByTypeMerk(merkId, tipeId);
  } else {
    return;
  }
});

$('#cariMotor').on('submit', function (e) {
  e.preventDefault()
  var merkId = $("#merk").val();
  var tipeId = $("#tipe").val();

  var id_motor = $('#model').val();//0
  var selectMotor = $('#select-motor1');
  var hasilPilihan = $('#hasil-pilihan1')
  console.log(id_motor)
  console.log(!id_motor)
  console.log(!merkId)
  console.log(!tipeId)
  if (!id_motor && !merkId && !tipeId) {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Isi data dengan benar !",
    });
    return;
  }

  fetch(`/get-motor/${id_motor}`)
    .then((response) => response.json())
    .then((data) => {
      $('#modalCariMotor').modal('hide');
      console.log(data.data);
      var motor = data.data;
      selectMotor.addClass('d-none');
      hasilPilihan.removeClass('d-none');
      var hasilContent = `
                          <img class="img-fluid" src="/assets/images/detail-motor/${motor.detail_motor.gambar}" />
                      <h5 class="card-product-title text-center">${motor.nama}</h5>
                      <div style="padding-left: 12px;">
                      <h5 style="font-size: 12px; padding-top: 12px;">Harga</h5>
                      <h5 style="font-size: 14px; color: deeppink">
                      <b>Rp. ${motor.harga}</b>
                      </h5>
                      </div>
    `

      hasilPilihan.html(hasilContent);

    })
    .catch((error) => console.error("Error:", error));
})
// function temp
$('#btn-close-modal').on('click', function () {
  $('#modalCariMotor').modal('hide');
})