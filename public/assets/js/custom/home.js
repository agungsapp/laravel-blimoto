// fetch data merk motor
// $("#modalResult").modal("show");
bacaKota();
bacaMerk();
bacaType();
// bacaTenor();

// setSelectionAfterDelay()
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
                            $("#dp").append(
                                new Option(formattedOption, option)
                            );
                            $("#dp option:last-child").data("harga", option);
                        });
                    })
                    .catch((error) => console.error("Error:", error));
            })
            .catch((error) => console.error("Error:", error));

        // bacaTenor();
    });

    $("#tenor").on("change", function () {
        var id = $("#model").val();
        console.log("get dp by tenor change running ...");
        // getDp(id);
    });

    var storedData = sessionStorage.getItem("formData");
    console.log(storedData);
    if (storedData) {
        var formData = JSON.parse(storedData);
        // Mengisi kembali form dengan data yang disimpan
        // $("#SelectKota").val(formData.SelectKota).trigger("change");
        // $("#merk").val(formData.merk).trigger("change");
        // $("#tipe").val(formData.tipe).trigger("change");
        // $("#pembayaran").val(formData.pembayaran).trigger("change");
        // $("#tenor").val(formData.tenor).trigger("change");
        // $("#model").val(formData.model).trigger("change");
        // $("#dp").val(formData.dp).trigger("change");

        if (storedData) {
            var formData = JSON.parse(storedData);

            setTimeout(function () {
                $("#SelectKota").val(formData.SelectKota).trigger("change");
            }, 2000); // Delay untuk SelectKota

            setTimeout(function () {
                $("#merk").val(formData.merk).trigger("change");
            }, 2500); // Delay untuk merk

            setTimeout(function () {
                $("#tipe").val(formData.tipe).trigger("change");
            }, 3000); // Delay untuk tipe

            setTimeout(function () {
                $("#pembayaran").val(formData.pembayaran).trigger("change");
            }, 3500); // Delay untuk pembayaran

            setTimeout(function () {
                $("#tenor").val(formData.tenor).trigger("change");
            }, 4000); // Delay untuk tenor

            setTimeout(function () {
                $("#model").val(formData.model).trigger("change");
            }, 5000); // Delay untuk model

            setTimeout(function () {
                $("#dp").val(formData.dp).trigger("change");
            }, 9000); // Delay untuk dp

            // Hapus data dari sessionStorage setelah digunakan
            setTimeout(function () {
                sessionStorage.removeItem("formData");
            }, 9500); // Hapus data setelah semua form terisi
        }


        // Hapus data dari sessionStorage setelah digunakan
        // sessionStorage.removeItem("formData");
    }

    $("#form-simulasi").on("submit", function (e) {
        e.preventDefault();

        e.preventDefault();

        var formData = {
            SelectKota: $("#SelectKota").val(),
            merk: $("#merk").val(),
            tipe: $("#tipe").val(),
            pembayaran: $("#pembayaran").val(),
            tenor: $("#tenor").val(),
            model: $("#model").val(),
            dp: $("#dp").val(),
        };

        sessionStorage.setItem("formData", JSON.stringify(formData));

        var id_lokasi = $("#SelectKota").val();
        var idmotor = id_motor;
        var tenor = $('select[name="tenor"]').val();
        var pembayaran = $('select[name="pembayaran"]').val();
        var dp = $("#dp").val();

        var tenor = $("#tenor").val();

        // Redirect to /cari-cicilan with the tenor parameter
        window.location.href = `cari-cicilan?id_lokasi=${id_lokasi}&id_motor=${id_motor}&dp=${dp}&tenor=${tenor}&pembayaran=${pembayaran}`;
    });






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

$("#SelectKota").change(function () {
    $("#form-simulasi select").not(this).prop("selectedIndex", 0);
});

window.formatToRupiah = function (value) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};



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
    var id_motor = $('select[name="model"]').val();
    var id_lokasi = $("#SelectKota").val();
    const tenorSelect = document.getElementById("tenor");
    const tenorEndpoint = `/get-tenor?id_lokasi=${id_lokasi}&id_motor=${id_motor}`;
    fetch(tenorEndpoint)
        .then((response) => response.json())
        .then((data) => {
            const tenorMotor = data;
            tenorMotor.forEach((tenor) => {
                const option = document.createElement("option");
                option.value = tenor.tenor;
                option.textContent = tenor.tenor + " Bulan";
                tenorSelect.appendChild(option);
            });
        })
        .catch((error) => {
            console.error("Terjadi kesalahan:", error);
        });
}

function bacaKota() {
    const kotaSelect = document.getElementById("SelectKota");
    const kotaEndpoint = "/get-kota";
    fetch(kotaEndpoint)
        .then((response) => response.json())
        .then((data) => {
            const kotaMotor = data;
            console.log(kotaMotor);
            kotaMotor.forEach((kota) => {
                const option = document.createElement("option");
                option.value = kota.id; // Menggunakan properti "nama" sebagai nilai
                option.textContent = kota.nama; // Menggunakan properti "nama" sebagai teks
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


// ubah ini ////// warnning revisi area ==============!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

function getDp(id) {
    var id_lokasi = $("#SelectKota").val();

    fetch("/get-harga/" + id)
        .then((response) => response.json())
        .then((data) => {
            console.log(`harga otrnya : ${data.data.harga}`);
            harga_motor = data.data.harga;
            id_motor = data.data.id;
            tenor = $('select[name="tenor"]').val();
            // Fetch the DP options
            fetch(
                `/get-dp?tenor=${tenor}&id_motor=${id_motor}&id_lokasi=${id_lokasi}`
            )
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
                        var formattedOption = option.nama + " : " + formatToRupiah(option.min_dp);
                        $("#dp").append(new Option(formattedOption, option.min_dp));
                        $("#dp option:last-child").data("harga", option.min_dp);
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

// handle click dari prev & next
$("#prev").on("click", function () {
    $(".slick-result-modal").slick("slickPrev");
});
$("#next").on("click", function () {
    $(".slick-result-modal").slick("slickNext");
});

$(document).ready(function () {
    // Sembunyikan navigasi saat halaman dimuat
    $(".prev, .next").css("opacity", 0);

    // Tampilkan navigasi saat mouse masuk ke dalam elemen .slider_content
    $(".slick-result-modal").hover(
        function () {
            $(".prev, .next").css("opacity", 1);
        },
        function () {
            $(".prev, .next").css("opacity", 0);
        }
    );
});

// $(document).ready(function () {
//   var detailLink = document.getElementById("detail-link");
//   detailLink.href += lokasiNow;
// })slide-mitra-kami

// testing input form diskon
function setSelectionAfterDelay() {
    console.log("mode testing auto fill active ...........");
    const selections = [
        { selector: "#SelectKota", value: "1", delay: 2000 },
        { selector: "#merk", value: "1", delay: 2500 },
        { selector: "#tipe", value: "1", delay: 3000 },
        { selector: "#pembayaran", value: "2", delay: 3500 },
        { selector: "#tenor", value: "11", delay: 4000 },
        { selector: "#model", value: "1", delay: 5000 },
        { selector: "#dp", value: "2200000", delay: 9000 },
    ];

    selections.forEach((item) => {
        setTimeout(function () {
            $(item.selector).val(item.value).trigger("change");
        }, item.delay);
    });
}

$(document).ready(function () {
    $("#btn-reset").click(function () {
        $("#tenor").empty();
        $("#model").empty();
        $("#dp").empty();

        const selections = [
            { selector: "#SelectKota", value: "1", delay: 2000 },
            { selector: "#merk", value: "1", delay: 2500 },
            { selector: "#tipe", value: "1", delay: 3000 },
            { selector: "#pembayaran", value: "2", delay: 3500 },
            { selector: "#tenor", value: "11", delay: 4000 },
            { selector: "#model", value: "1", delay: 5000 },
            { selector: "#dp", value: "2200000", delay: 9000 },
        ];

        selections.forEach((item) => {
            $(item.selector).val("").trigger("change");
        });
    });
});



