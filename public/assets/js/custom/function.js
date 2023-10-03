export const bacaMerk = () => {
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


export const bacaType = () => {
  const tipeSelect = document.getElementById("tipe")
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

export const findMotorByTypeMerk = (merkId, tipeId) => {
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

// export default { bacaMerk, bacaType };