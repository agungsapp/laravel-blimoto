$(document).ready(function () {

  // var kotaList = ['jakarta', 'bogor', 'depok', 'tanggerang', 'bekasi']


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

  $(document).ready(function () {
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
  console.log("slick jalan..")
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
});



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