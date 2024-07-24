isDev && console.log("aman running")
var lokasiNow = 1;

var locationLinks = document.querySelectorAll('.select-lokasi-user li a');
var defaultLocationId = '1';
var currentLocationId = sessionStorage.getItem('lokasiUser');

if (!currentLocationId) {
  currentLocationId = defaultLocationId;
  sessionStorage.setItem('lokasiUser', defaultLocationId);
  console.log("change lokasi di tangkap !!!!!!!!!!!")
}
// Set nilai lokasi ke dalam input field dan teks menu saat halaman dimuat
setLokasiToInput();
setTeksMenuLokasi();
updateLokasi(sessionStorage.getItem('lokasiUser'))

isDev && console.log("aman running")
var lokasiNow = 1;

for (var i = 0; i < locationLinks.length; i++) {
  locationLinks[i].addEventListener('click', function (e) {
    e.preventDefault();
    var id = this.dataset.id;
    var location = this.textContent;
    sessionStorage.setItem('lokasiUser', id);
    var selectElement = document.querySelector('.lokasiTextShow');
    selectElement.textContent = location;
    var stickyNav = document.getElementById('lokasiTextShow2');
    stickyNav.textContent = location;

    // Update nilai variabel global saat lokasi berubah
    lokasiNow = id;
    setLokasiToInput();
    updateLokasi(lokasiNow);
    isDev && console.log(`behasil ubah id lokasi ke ${lokasiNow}`);
  });
}

function setLokasiToInput() {
  // Mendapatkan nilai dari session
  var lokasiId = sessionStorage.getItem('lokasiUser');

  var inputElement = document.getElementById('lokasi-user-pencarian');
  inputElement.value = lokasiId;
  window.idLokasi = lokasiId;
  isDev && console.log(`input elemen search id lokasi berhasil di ubah ${lokasiId}`);
  $('input[name="id_lokasi"]').val(lokasiId);
}

function setTeksMenuLokasi() {
  // Mendapatkan nilai dari session
  var lokasiId = sessionStorage.getItem('lokasiUser');

  // Mendapatkan elemen link berdasarkan id lokasi
  var linkElement = document.querySelector('.select-lokasi-user li a[data-id="' + lokasiId + '"]');

  // Mendapatkan teks lokasi dari elemen link
  var lokasiText = linkElement.textContent;

  // Men-set teks tersebut ke dalam elemen menu
  var selectElement = document.querySelector('.lokasiTextShow');
  selectElement.textContent = lokasiText;
  var stickyNav = document.getElementById('lokasiTextShow2');
  stickyNav.textContent = lokasiText;

}

// ROMBAK START
// request ke server untuk melakukan update session lokasi user 
function updateLokasi(lokasiUser) {
  $.ajax({
    type: 'POST',
    url: '/updateLokasi',
    data: {
      lokasiUser: lokasiUser,
      _token: '{{ csrf_token() }}'
    },
    success: function (response) {
      console.log('Data berhasil dikirim ke server');
    },
    error: function (xhr, status, error) {
      console.error('Terjadi kesalahan:', error);
    }
  });
}
// ROMBAK END


// manipulasi navigasi
$(document).ready(function () {
  $('#lokasi-ambang').hide();

  $(window).scroll(function () {
    var currentPosition = $(window).scrollTop();
    var triggerElementPosition = $('#stickyheader').offset().top;

    if (currentPosition >= triggerElementPosition) {
      $('#lokasi-ambang').show();
    } else {
      $('#lokasi-ambang').hide();
    }
  });

  watchTextChanges();


  // Attach a click event listener to the section with class 'video-banner'
  $('.video-banner').on('click', function (event) {
    // Prevent the default action and stop event propagation
    event.preventDefault();
    event.stopPropagation();

    // Trigger the click event of the anchor tag with class 'video-btn'
    $(this).find('.video-btn').trigger('click');
  });


  $(document).ready(function () {
    $('.sosiyal li').click(function (e) {
      // Mencegah aksi default jika targetnya bukan <a>
      if (!$(e.target).is('a')) {
        e.preventDefault();
        $(this).find('a')[0].click();
      }
    });
  });
});


function watchTextChanges() {
  var previousText = $('#lokasiTextShow').text();
  // Set interval untuk memeriksa perubahan setiap detik
  setInterval(function () {
    // Periksa apakah teks telah berubah
    var currentText = $('#lokasiTextShow').text();
    if (currentText !== previousText) {
      // Jika teks berubah, lakukan reload halaman
      location.reload();
    }
  }, 1000); // Interval dapat disesuaikan sesuai kebutuhan
}