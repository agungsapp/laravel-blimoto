import { findMotorByTypeMerk } from "./function.js";

var counterModel = 0;


bacaMerk(1);
bacaMerk(2);
bacaMerk(3);
bacaMerk(4);

bacaType(1);
bacaType(2);
bacaType(3);
bacaType(4);

function bacaMerk(urutan) {
  const merkSelect = document.getElementById("merk" + urutan);
  const endpoint = "get-merk";
  fetch(endpoint)
    .then((response) => response.json())
    .then((data) => {
      console.log(data)
      const merkMotor = data.merk_motor;
      merkMotor.forEach((merk) => {
        const option = document.createElement("option");
        option.value = merk.id;
        option.textContent = merk.nama;
        merkSelect.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Terjadi kesalahan:", error);
    });
}

function bacaType(urutan) {
  const tipeSelect = document.getElementById("tipe" + urutan);
  const tipeEndpoint = "/get-type";
  fetch(tipeEndpoint)
    .then((response) => response.json())
    .then((data) => {
      const typeMotor = data.type_motor;
      typeMotor.forEach((type) => {
        const option = document.createElement("option");
        option.value = type.id;
        option.textContent = type.nama;
        tipeSelect.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Terjadi kesalahan:", error);
    });
}

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

// tipe change 
$('#tipe1').change(function () {
  console.log("area select logic running...");
  var merkId = $("#merk1").val();
  var tipeId = $(this).val();
  counterModel += 1;
  // panggil function
  findMotorByTypeMerk(merkId, tipeId);
});
$('#tipe2').change(function () {
  console.log("area select logic running...");
  var merkId = $("#merk2").val();
  var tipeId = $(this).val();
  counterModel += 1;
  // panggil function
  findMotorByTypeMerk(merkId, tipeId);
});
$('#tipe3').change(function () {
  console.log("area select logic running...");
  var merkId = $("#merk3").val();
  var tipeId = $(this).val();
  counterModel += 1;
  // panggil function
  findMotorByTypeMerk(merkId, tipeId);
});
$('#tipe4').change(function () {
  console.log("area select logic running...");
  var merkId = $("#merk4").val();
  var tipeId = $(this).val();
  counterModel += 1;
  // panggil function
  findMotorByTypeMerk(merkId, tipeId);
});

// merk change
$('#merk1').change(function () {
  console.log("merk counter :" + counterModel);
  if (counterModel > 0) {
    var merkId = $(this).val();
    var tipeId = $("#tipe1").val();
    // return console.log("tipe harus di isi dulu");
    findMotorByTypeMerk(merkId, tipeId);
  } else {
    return;
  }
});

$('#merk2').change(function () {
  console.log("merk counter :" + counterModel);
  if (counterModel > 0) {
    var merkId = $(this).val();
    var tipeId = $("#tipe2").val();
    // return console.log("tipe harus di isi dulu");
    findMotorByTypeMerk(merkId, tipeId);
  } else {
    return;
  }
});

$('#merk3').change(function () {
  console.log("merk counter :" + counterModel);
  if (counterModel > 0) {
    var merkId = $(this).val();
    var tipeId = $("#tipe3").val();
    // return console.log("tipe harus di isi dulu");
    findMotorByTypeMerk(merkId, tipeId);
  } else {
    return;
  }
});

$('#merk4').change(function () {
  console.log("merk counter :" + counterModel);
  if (counterModel > 0) {
    var merkId = $(this).val();
    var tipeId = $("#tipe4").val();
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

  fetch(`/get-single-motor/${id_motor}`)
    .then((response) => response.json())
    .then((data) => {
      $('#modalCariMotor').modal('hide');
      console.log(data.data);
      var motor = data.data;
      selectMotor.addClass('d-none');
      hasilPilihan.removeClass('d-none');
      var hasilContent = `
                          <img class="img-fluid" src="/assets/images/detail-motor/${motor.detail_motor[0].gambar}" alt="${motor.detail_motor[0].gambar}" />
                      <h4 class="card-product-title text-center mt-2">${motor.nama}</h4>
                      <div style="padding-left: 12px;">
                      <h5 class="text-doff" style="font-size: 12px; padding-top: 12px;">Harga</h5>
                      <h5 style="font-size: 14px;" class="text-basic">
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