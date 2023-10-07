// fetch data merk motor
// $("#modalResult").modal("show");
bacaKota()
bacaMerk();
bacaType();
bacaTenor();
var counterModel = 0;

$(document).ready(function () {
  console.log("jQuery aman bang !");
  // misal
  var harga_motor;
  var id_motor;
  var tenor;

  $('select[name="tipe"]').change(function () {
    console.log("area select logic running...");
    var merkId = $("#merk").val();
    var tipeId = $(this).val();
    counterModel += 1;
    // panggil function
    findMotorByTypeMerk(merkId, tipeId);
  });

  $('select[name="merk"]').change(function () {
    console.log("merk counter :" + counterModel);
    if (counterModel > 0) {
      var merkId = $(this).val();
      var tipeId = $("#tipe").val();
      return console.log("tipe harus di isi dulu");
      findMotorByTypeMerk(merkId, tipeId);
    } else {
      return;
    }
  });

  // onchange model motor di pilih
  window.formatRupiah = function (angka) {
    var reverse = angka.toString().split("").reverse().join("");
    var ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join(".").split("").reverse().join("");
    return "Rp. " + ribuan;
  };


  // function hitungDiskon(dp, potongan) {
  //   var potongan = dp - (dp * potongan);
  //   return formatRupiah(potongan);
  // }

  $("#model").on("change", function () {
    var id = $(this).val();
    console.log("get dp by model change running  ...");
    fetch("/get-harga/" + id)
      .then((response) => response.json())
      .then((data) => {
        console.log(`harga otrnya : ${data.data.harga}`);
        harga_motor = data.data.harga;
        id_motor = data.data.id;
        tenor = $('select[name="tenor"]').val();
        // Fetch the DP options
        fetch(`/get-dp?tenor=${tenor}&id_motor=${id_motor}`)
          .then((response) => response.json())
          .then((data) => {
            // Clear the select options
            $("#dp").empty();
            console.log(
              "di bawah ini adalah data milik get dp response"
            );
            console.log(data);

            // Add the new options
            data.dp.forEach((option) => {
              var formattedOption = formatRupiah(option);
              $("#dp").append(new Option(formattedOption, option));
              $("#dp option:last-child").data("harga", option);
            });
          })
          .catch((error) => console.error("Error:", error));
      })
      .catch((error) => console.error("Error:", error));
  });

  $("#tenor").on("change", function () {
    var id = $("#model").val();
    console.log("get dp by tenor change running ...");
    getDp(id);
  });

  $("#form-simulasi").on("submit", function (e) {
    e.preventDefault();
    console.log("submit di triger =====================================");
    console.log(`model on change id motor adalah : ${id_motor}`);

    // Mengambil nilai dari setiap input
    var id_lokasi = $("#SelectKota").val();
    var idmotor = id_motor;
    var tenor = $('select[name="tenor"]').val();
    var dp = $("#dp").val();
    console.log("id motornya adalah : " + id_motor);

    // Memeriksa apakah ada input yang kosong
    if (!id_lokasi || !tenor || !dp) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Pastikan semua data sudah terisi !",
      });
      return;
    }

    console.log("ajax di mulai");
    console.log(
      `data di tangkap pada ajax, id_lokasi : ${id_lokasi}, id_motor : ${id_motor}, dp : ${dp}, tenor : ${tenor},`
    );

    $.ajax({
      url: "/cari-cicilan",
      type: "GET",
      data: {
        id_lokasi: id_lokasi,
        id_motor: idmotor,
        dp: dp,
        tenor: tenor,
      },
      success: function (response) {
        $("#modalResult").modal("show");
        const motorData = response.data.motor;
        console.log(motorData.nama);

        const detailMotorElement = document.querySelector("#motor-baru");
        detailMotorElement.innerHTML = `
        														<img src="/assets/images/detail-motor/${motorData.detail_motor.gambar}" class="img-fluid" alt="${motorData.detail_motor.gambar}" srcset=""
																style="max-width: 100%; height: auto;">
														<div class="product-right py-5">
																<div class="d-flex justify-content-between">
																		<p class="text-dark nama-motor fs-lg-4 fw-bold">${motorData.nama}</h>
																		<div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i><span
																						class="ms-2">${response.lokasi}</span>
																		</div>
																</div>
																<div class="d-flex justify-content-between mt-2">
																		<h6 class="product-title nama-motor">Metode Pembayaran :</h6>
																		<span class="badge bg-success nama-motor">Kredit</span>
																</div>
																<div class="d-flex justify-content-between mt-2">
																		<h6 class="fw-bold text-doff nama-motor">Tipe</h6>
																		<p class="nama-motor">${motorData.type}</p>
																</div>
																<div class="d-flex justify-content-between mt-2">
																		<h6 class="fw-bold text-doff nama-motor">Honda</h6>
																		<p class="nama-motor">${motorData.merk}</p>
																</div>
														</div>
    `;



        const cicilanMotorData = response.data.cicilan_motor;
        const leasingContainer = document.querySelector("#leasing-baru");

        cicilanMotorData.forEach(function (leasingData) {
          const leasingElement = document.createElement("div");
          leasingElement.classList.add(
            "d-flex", "justify-content-center", "p-1"
          );
          leasingElement.innerHTML = `
																<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 20px;">
																		<img src="/assets/images/leasing/${leasingData.gambar}" class="card-img-top" alt="${leasingData.gambar}">
																		<div class="card-body">
																				<h5 class="card-title">FIF GROUP</h5>
																		</div>
																		<ul class="list-group list-group-flush">
																				<li class="list-group-item d-flex justify-content-between">
																						<p>DP</p>
																						<p>${formatRupiah(leasingData.dp)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Diskon</p>
																						<p>${formatRupiah(leasingData.diskon)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>DP Bayar</p>
																						<p>${formatRupiah(leasingData.dp_bayar)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Angsuran</p>
																						<p>${formatRupiah(leasingData.angsuran)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Tenor</p>
																						<p>${leasingData.tenor} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Potongan Tenor</p>
																						<p>${leasingData.potongan_tenor} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Total Tenor</p>
																						<p>${leasingData.total_tenor} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Total Bayar</p>
																						<p>${formatRupiah(leasingData.total_bayar)}</p>
																				</li>
																		</ul>
																		<div class="card-body d-flex justify-content-center">
																				<a href="#" class="btn btn-success w-100">Ajukan Sekarang</a>
																		</div>
																</div>
      `;

          leasingContainer.appendChild(leasingElement);
        });
        if (cicilanMotorData.length < 6) {
          const additionalDivs = 6 - cicilanMotorData.length;
          for (let i = 0; i < additionalDivs; i++) {
            const emptyDiv = document.createElement("div");
            leasingContainer.appendChild(emptyDiv);
          }
        }

        // area REKOMENDASI
        const rekomendasiData = response.rekomendasi;
        const rekomendasiWrapper = document.getElementById("rekomendasi-wrapper-baru");

        rekomendasiData.forEach(function (rekomendasiItem) {
          const rekomendasiMotorElement = document.createElement("div");
          rekomendasiMotorElement.classList.add("detail-motor-baru", "row");


          rekomendasiMotorElement.innerHTML = `<hr class="mt-5 mb-5">
                            <div id="motor-baru" class="col-12 col-md-6 col-lg-4 col-xl-3 rounded-3 min-vh-50"
														style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, 0.25); padding: 16px; border-radius: 20px">
                              <img src="/assets/images/detail-motor/${rekomendasiItem.motor.detail_motor.gambar}" class="img-fluid" alt="${rekomendasiItem.motor.detail_motor.gambar}" srcset=""
                                  style="max-width: 100%; height: auto;">
                              <div class="product-right py-5">
                                  <div class="d-flex justify-content-between">
                                      <p class="text-dark nama-motor fs-lg-4 fw-bold">${rekomendasiItem.motor.nama}</h>
                                      <div class="fs-5 nama-motor"><i class="fa text-danger fa-map-marker" aria-hidden="true"></i><span
                                              class="ms-2">${response.lokasi}</span>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between mt-2">
                                      <h6 class="product-title nama-motor">Metode Pembayaran :</h6>
                                      <span class="badge bg-success nama-motor">Kredit</span>
                                  </div>
                                  <div class="d-flex justify-content-between mt-2">
                                      <h6 class="fw-bold text-doff nama-motor">Tipe</h6>
                                      <p class="nama-motor">${rekomendasiItem.motor.type}</p>
                                  </div>
                                  <div class="d-flex justify-content-between mt-2">
                                      <h6 class="fw-bold text-doff nama-motor">Honda</h6>
                                      <p class="nama-motor">${rekomendasiItem.motor.merk}</p>
                                  </div>
                              </div>
                          </div>
                                                                      `;

          const leasingWrapper = document.createElement("div");
          leasingWrapper.classList.add(
            "leasing-baru",
            "col-12",
            "col-md-6",
            "col-lg-8",
            "col-xl-9",
            "d-flex",
            "justify-content-center",
            "slick-result-modal",
            "mt-lg-0",
            "mt-3",
            "flex-row"
          );
          leasingWrapper.style.flexDirection = "row";

          rekomendasiItem.cicilan_motor.forEach(function (rekomendasiLeasingData) {
            const leasingElement = document.createElement("div");
            leasingElement.classList.add("d-flex", "justify-content-center", "p-1");

            leasingElement.innerHTML = `
																<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 20px;">
																		<img src="/assets/images/leasing/${rekomendasiLeasingData.gambar}" class="card-img-top" alt="${rekomendasiLeasingData.gambar}">
																		<div class="card-body">
																				<h5 class="card-title">FIF GROUP</h5>
																		</div>
																		<ul class="list-group list-group-flush">
																				<li class="list-group-item d-flex justify-content-between">
																						<p>DP</p>
																						<p>${formatRupiah(rekomendasiLeasingData.dp)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Diskon</p>
																						<p>${formatRupiah(rekomendasiLeasingData.diskon)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>DP Bayar</p>
																						<p>${formatRupiah(rekomendasiLeasingData.dp_bayar)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Angsuran</p>
																						<p>${formatRupiah(rekomendasiLeasingData.angsuran)}</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Tenor</p>
																						<p>${rekomendasiLeasingData.tenor} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Potongan Tenor</p>
																						<p>${rekomendasiLeasingData.potongan_tenor} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Total Tenor</p>
																						<p>${rekomendasiLeasingData.total_tenor} Bulan</p>
																				</li>
																				<li class="list-group-item d-flex justify-content-between">
																						<p>Total Bayar</p>
																						<p>${formatRupiah(rekomendasiLeasingData.total_bayar)}</p>
																				</li>
																		</ul>
																		<div class="card-body d-flex justify-content-center">
																				<a href="#" class="btn btn-success w-100">Ajukan Sekarang</a>
																		</div>
																</div>
                                                          `;

            leasingWrapper.appendChild(leasingElement);
          });

          // Jika jumlah cicilan_motor kurang dari 6, tambahkan div kosong
          if (rekomendasiItem.cicilan_motor.length < 6) {
            const additionalDivs = 6 - rekomendasiItem.cicilan_motor.length;
            for (let i = 0; i < additionalDivs; i++) {
              const emptyDiv = document.createElement("div");
              leasingWrapper.appendChild(emptyDiv);
            }
          }

          rekomendasiMotorElement.appendChild(leasingWrapper);
          rekomendasiWrapper.appendChild(rekomendasiMotorElement);
        });

      },
      error: function (error) {
        console.log(error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Data cicilan tidak ditemukan",
        });
      },
    });

    //old area start
    // Mengirim data ke endpoint
    // $.ajax({
    //   url: '/cari-cicilan',
    //   type: 'GET',
    //   data: {
    //     id_lokasi: id_lokasi,
    //     id_motor: idmotor,
    //     dp: dp,
    //     tenor: tenor,
    //   },
    //   success: function (response) {
    //     $("#modalResult").modal("show");
    //     console.log(response.data);
    //     // console.log(`total bayar : ${response.total_pembayaran}, cicilan perbulan : ${response.cicilan}`)
    //   },
    //   error: function (error) {
    //     console.log(error);
    //   }
    // });
    // old area end
  });

  // Menambahkan class "popup-open" ke elemen body untuk mengunci laman utama
  // $("body").addClass("popup-open");
  // $("#popupOverlay").fadeIn();

  // Menutup pop-up
  // $("#closePopupBtn").click(function () {
  //   // Menghapus class "popup-open" dari elemen body untuk mengizinkan scrolling kembali
  //   $("body").removeClass("popup-open");
  //   $("#popupOverlay").fadeOut();
  // });
});

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


$('#SelectKota').change(function () {
  $('#form-simulasi select').not(this).prop('selectedIndex', 0);
});


window.formatToRupiah = function (value) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  }).format(value);
};

// $(document).ready(function () {
//   // Temukan tombol "Tampilkan Pop-up" berdasarkan ID
//   $("#showPopupBtn").click(function () {
//     // Tampilkan modal dengan menggunakan ID
//     $("#modalResult").modal("show");
//   })
// })

function closeModal() {
  $("#modalResult").modal("hide");
  clearModalContent("motor-baru");
  clearModalContent("leasing-baru");
  clearModalContent("rekomendasi-wrapper-baru");
}

function bacaMerk() {
  const merkSelect = document.getElementById("merk");
  const endpoint = "get-merk";
  fetch(endpoint)
    .then((response) => response.json())
    .then((data) => {
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

function bacaType() {
  const tipeSelect = document.querySelector('select[name="tipe"]');
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

function bacaTenor() {
  const tenorSelect = document.getElementById('tenor');
  const tenorEndpoint = "/get-tenor";
  fetch(tenorEndpoint)
    .then((response) => response.json())
    .then((data) => {
      const tenorMotor = data;
      tenorMotor.forEach((tenor) => {
        const option = document.createElement("option");
        option.value = tenor.tenor;
        option.textContent = tenor.tenor + ' Bulan';
        tenorSelect.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Terjadi kesalahan:", error);
    });
}

function bacaKota() {
  const kotaSelect = document.getElementById('SelectKota');
  const kotaEndpoint = "/get-kota";
  fetch(kotaEndpoint)
    .then((response) => response.json())
    .then((data) => {
      const kotaMotor = data;
      console.log(kotaMotor);
      kotaMotor.forEach((kota) => {
        const option = document.createElement("option");
        option.value = kota.id;  // Menggunakan properti "nama" sebagai nilai
        option.textContent = kota.nama;  // Menggunakan properti "nama" sebagai teks
        kotaSelect.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Terjadi kesalahan:", error);
    });
}


// func get nama motor dari database by triger change merk & type
function findMotorByTypeMerk(merkId, tipeId) {
  var modelSelect = $('select[name="model"]');
  // console.log(merkId + tipeId);
  modelSelect.empty();
  modelSelect.append('<option value="0" selected>-- Pilih Model --</option>');
  // console.log("sebelum if");
  if (merkId !== "0" && tipeId !== "0") {
    // console.log("get jalan!");
    $.get(
      "/get-model-options",
      {
        merk_id: merkId,
        tipe_id: tipeId,
      },
      function (data) {
        // console.log(data);
        console.log("done bang!");
        $.each(data, function (key, value) {
          // console.log(`id nya : ${value.id} nama nya : ${value.nama}`);
          console.log(`harga otr nya ${value.harga}`);
          modelSelect.append(
            '<option value="' +
            value.id +
            '">' +
            value.nama +
            "</option>"
          );
        });
      }
    );
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Merk dan Type harus di isi terlebih dahulu ...",
    });
  }
}

function getDp(id) {
  fetch("/get-harga/" + id)
    .then((response) => response.json())
    .then((data) => {
      console.log(`harga otrnya : ${data.data.harga}`);
      harga_motor = data.data.harga;
      id_motor = data.data.id;
      tenor = $('select[name="tenor"]').val();
      // Fetch the DP options
      fetch(`/get-dp?tenor=${tenor}&id_motor=${id_motor}`)
        .then((response) => response.json())
        .then((data) => {
          // Clear the select options
          $("#dp").empty();
          console.log(
            "di bawah ini adalah data milik get dp response"
          );
          console.log(data);

          // Add the new options
          data.dp.forEach((option) => {
            var formattedOption = formatToRupiah(option);
            $("#dp").append(new Option(formattedOption, option));
            $("#dp option:last-child").data("harga", option);
          });
        })
        .catch((error) => console.error("Error:", error));
    })
    .catch((error) => console.error("Error:", error));
}

function clearModalContent(elementId) {
  const parentElement = document.getElementById(elementId);
  while (parentElement.firstChild) {
    parentElement.removeChild(parentElement.firstChild);
  }
}
