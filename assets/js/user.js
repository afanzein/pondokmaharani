

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
$(document).ready(function() {
  // Set initial slide index
  var slideIndex = 1;
  // Show the initial slide
  showSlides(slideIndex);

  function plusSlides(n) {
      showSlides(slideIndex += n);
  }

  function currentSlide(n, id_tipe_kamar) {
      showSlides(slideIndex = n, id_tipe_kamar);
  }

  function showSlides(n, id_tipe_kamar) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      var captionText = document.getElementById("caption");

      // Filter the slides based on the selected id_tipe_kamar
      var filteredSlides = [];
      for (i = 0; i < slides.length; i++) {
          var slideId = slides[i].getAttribute("data-id");
          if (parseInt(slideId) === parseInt(id_tipe_kamar)) {
              filteredSlides.push(slides[i]);
          }
      }

      if (n > filteredSlides.length) {
          slideIndex = 1;
      }
      if (n < 1) {
          slideIndex = filteredSlides.length;
      }
      for (i = 0; i < filteredSlides.length; i++) {
          filteredSlides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      filteredSlides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
  }
});
