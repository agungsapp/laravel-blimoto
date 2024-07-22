$(document).ready(function () {

  // var kotaList = ['jakarta', 'bogor', 'depok', 'tanggerang', 'bekasi']



  $(".owl-carousel-leasing").owlCarousel({
    nav: false,
    navText: ['prev', 'next'],
    // margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: false,
    loop: false,
    items: 5,
    merge: true,
    // stagePadding: 1,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 1,
        nav: false
      },
      1000: {
        items: 3,
        nav: true,
        loop: false
      },
      1500: {
        items: 4,
        nav: true,
        loop: false
      },
      1700: {
        items: 5,
        nav: true,
        loop: false
      }
    },

  });


  $(".js-example-basic-single").select2(
    {
      placeholder: 'Select an option'
    }
  );

  // $('#kotaSelect').select2({ data: kotaList })

  $('.selectpicker').selectpicker();



  // new owl style home page
  $('.owl-home-slider').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    navText: [
      '<i class="fa fa-arrow-left text-black" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right text-black" aria-hidden="true"></i>'
    ],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      },
      1500: {
        items: 4
      },
      1700: {
        items: 5
      }
    }
  })



  var owl3 = $('.owl-carousel-3');
  owl3.owlCarousel({
    items: 5,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  });
  $('.play').on('click', function () {
    owl3.trigger('play.owl.autoplay', [1000])
  })
  $('.stop').on('click', function () {
    owl3.trigger('stop.owl.autoplay')
  })

  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 4,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  });
  $('.play').on('click', function () {
    owl.trigger('play.owl.autoplay', [1000])
  })
  $('.stop').on('click', function () {
    owl.trigger('stop.owl.autoplay')
  })


  $('#modalResult').on('shown.bs.modal', function () {
    $('.slick-result-modal').slick({
      centerMode: false,
      centerPadding: '10px',
      infinite: true,
      autoplay: false,
      autoplaySpeed: 2000,
      slidesToShow: 5,
      slidesToScroll: 1,
      prevArrow: '#prev',
      nextArrow: '#next',
      // variableWidth: '18rem'
      responsive: [
        {
          breakpoint: 500,
          settings: {
            centerMode: false,
            centerPadding: '10px',
            slidesToShow: 1,
            slidesToScroll: 3,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            prevArrow: '#prev',
            nextArrow: '#next',
            // dots: true

          }
        },
        {
          breakpoint: 650,
          settings: {
            centerMode: false,
            centerPadding: '10px',
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            prevArrow: '#prev',
            nextArrow: '#next',
            // dots: true

          }
        },
        {
          breakpoint: 1000,
          settings: {
            centerMode: false,
            centerPadding: '10px',
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            prevArrow: '#prev',
            nextArrow: '#next',
            // dots: true

          }
        },
        {
          breakpoint: 1300,
          settings: {
            centerMode: false,
            centerPadding: '10px',
            slidesToShow: 3,
            slidesToScroll: 2,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            prevArrow: '#prev',
            nextArrow: '#next',
            // dots: true

          }
        },
        {
          breakpoint: 1500,
          settings: {
            centerMode: false,
            centerPadding: '10px',
            slidesToShow: 4,
            slidesToScroll: 2,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            prevArrow: '#prev',
            nextArrow: '#next',
            // dots: true

          }
        },
      ]
    });
  });




  $('.slide-download-populer').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 3,
          infinite: true,
          dots: true

        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });




  $('.slide-mitra-kami').slick({
    slidesToShow: 8,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 3,
          infinite: true,
          dots: true

        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,

          dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  $('.leasing-slick-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
  });


});

$(document).ready(function () {
  isDev && console.log("slick jalan..")
  $('.slick-cari-diskon').each(function (index, element) {
    var slideCount = $(element).find('.slick-slide').length; // get the number of slides
    $(element).slick({
      centerMode: false,
      centerPadding: '10px',
      infinite: true,
      autoplay: slideCount >= 4, // set autoplay to false if slideCount is less than 4
      autoplaySpeed: 2000,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: $(element).find('.prev'),
      nextArrow: $(element).find('.next'),
      // variableWidth: '18rem'
      responsive: [
        // your responsive settings
      ]
    });
  });
});


$(document).ready(function () {
  // Sembunyikan navigasi saat halaman dimuat
  $('.prev, .next').hide();

  // Tampilkan navigasi saat mouse masuk ke dalam elemen .slider_content
  $('.slick-cari-diskon').hover(
    function () { // Saat mouse masuk
      $('.prev, .next').show();
    },
    function () { // Saat mouse keluar
      $('.prev, .next').hide();
    }
  );




  $('.slick-card-home').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1700,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 3,
          infinite: true,
          dots: true

        }
      },
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

});


















// =============>>> MODAL TIRUAN OTO COM START <<<====================================


$(document).ready(function () {
  $('#modalDaftarLokasi').hide(); // Sembunyikan modal saat halaman dimuat

  $('.trigerModalLokasi').click(function (event) {
    // alert("click di trigger...")
    event.preventDefault(); // Cegah perilaku default tautan <a> (mengikuti URL)
    $('#modalDaftarLokasi').show(); // Tampilkan modal
    $('body').addClass('no-scroll'); // Tambahkan kelas no-scroll ke body

    // Jika ingin input pencarian langsung aktif saat modal terbuka:
    $('.form-control').focus();

    // Fetch data dari API dan perbarui konten modal
    fetchLokasi();
  });

  // Pencarian real-time
  $('.form-control').on('input', function () {
    var value = $(this).val().toLowerCase();
    $("#select-lokasi-user li").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  // Tutup modal ketika overlay diklik
  $('#modalDaftarLokasi').click(function (event) {
    if ($(event.target).is('#modalDaftarLokasi')) {
      $('#modalDaftarLokasi').hide();
      $('body').removeClass('no-scroll'); // Hapus kelas no-scroll dari body
    }
  });

  $('#containerModalLokasi').click(function (event) {
    if ($(event.target).is('#containerModalLokasi')) {
      $('#modalDaftarLokasi').hide();
      $('body').removeClass('no-scroll'); // Hapus kelas no-scroll dari body
    }
  });

  // Delegasi event untuk menangkap klik pada elemen <a> dalam #select-lokasi-user
  $(document).on('click', '#select-lokasi-user a', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    var location = $(this).text();
    sessionStorage.setItem('lokasiUser', id);
    $('#lokasiTextShow').text(location); // Perbarui teks lokasi yang ditampilkan
    $('#modalDaftarLokasi').hide(); // Sembunyikan modal setelah lokasi dipilih
    $('body').removeClass('no-scroll'); // Hapus kelas no-scroll dari body

    updateLokasi(id); // Panggil fungsi updateLokasi dengan id baru
    isDev && console.log(`Berhasil ubah id lokasi ke ${id}`);
  });

  // Set nilai lokasi ke dalam input field dan teks menu saat halaman dimuat
  setLokasiToInput();
  setTeksMenuLokasi();
  updateLokasi(sessionStorage.getItem('lokasiUser'));

  // Fungsi untuk fetch data dari API dan perbarui konten modal
  function fetchLokasi() {
    $.ajax({
      url: 'http://localhost:8000/api/semua-kota',
      method: 'GET',
      success: function (response) {
        var lokasiList = response.lokasi;
        var lokasiHtml = '';
        lokasiList.forEach(function (lokasi) {
          lokasiHtml += '<li><a href="#" data-id="' + lokasi.id + '">' + lokasi.nama + '</a></li>';
        });
        $('#select-lokasi-user').html(lokasiHtml);
      },
      error: function (error) {
        console.error('Error fetching data:', error);
      }
    });
  }

  function setLokasiToInput() {
    // Mendapatkan nilai dari session
    var lokasiId = sessionStorage.getItem('lokasiUser');

    var inputElement = document.getElementById('lokasi-user-pencarian');
    if (inputElement) {
      inputElement.value = lokasiId;
    }
    window.idLokasi = lokasiId;
    isDev && console.log(`input elemen search id lokasi berhasil di ubah ${lokasiId}`);
    $('input[name="id_lokasi"]').val(lokasiId);
  }

  function setTeksMenuLokasi() {
    // Mendapatkan nilai dari session
    var lokasiId = sessionStorage.getItem('lokasiUser');

    // Mendapatkan elemen link berdasarkan id lokasi
    var linkElement = document.querySelector('.select-lokasi-user li a[data-id="' + lokasiId + '"]');

    // Jika link tidak ditemukan, ambil data dari API
    if (!linkElement) {
      fetchLokasiFromAPI(lokasiId);
    } else {
      updateLocationText(linkElement.textContent);
    }
  }

  function updateLocationText(lokasiText) {
    // Men-set teks tersebut ke dalam elemen menu
    var selectElement = document.querySelector('.lokasiTextShow');
    if (selectElement) {
      selectElement.textContent = lokasiText;
    }
    var stickyNav = document.getElementById('lokasiTextShow2');
    if (stickyNav) {
      stickyNav.textContent = lokasiText;
    }
  }

  function fetchLokasiFromAPI(lokasiId) {
    $.ajax({
      url: 'http://localhost:8000/api/semua-kota',
      method: 'GET',
      success: function (response) {
        var lokasiList = response.lokasi;
        var found = lokasiList.find(function (lokasi) {
          return lokasi.id == lokasiId;
        });
        if (found) {
          updateLocationText(found.nama);
        } else {
          console.error('Lokasi dengan ID ' + lokasiId + ' tidak ditemukan dalam data API');
        }
      },
      error: function (error) {
        console.error('Error fetching data:', error);
      }
    });
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

  $('.sosiyal li').click(function (e) {
    // Mencegah aksi default jika targetnya bukan <a>
    if (!$(e.target).is('a')) {
      e.preventDefault();
      $(this).find('a')[0].click();
    }
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

  $('#kategoriPencarian').on('invalid', function () {
    this.setCustomValidity('Silakan pilih kategori dahulu untuk melanjutkan.');
  }).on('change', function () {
    this.setCustomValidity('');
  });
});
