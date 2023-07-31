

  //==================================================
  //Halaman User
  //Custom JavaScript for carousel -
  $(document).ready(function () {
    // Initialize the carousel
    $("#carouselExampleIndicators").carousel();

    // Enable the left and right arrows for sliding the carousel
    $(".carousel-control-prev").click(function () {
      $("#carouselExampleIndicators").carousel("prev");
    });

    $(".carousel-control-next").click(function () {
      $("#carouselExampleIndicators").carousel("next");
    });
  });

  // Adjust carousel height on window resize
  $(window).resize(function () {
    var carouselHeight = $("#home").height();
    $(".carousel-item").height(carouselHeight);
  });

  //========================================
  // JS for Reservation Page
 