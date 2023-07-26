

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
  //JS for Reservation Page
  var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("thumbnail");
            if (n > x.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = x.length }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].style.borderColor = "#ddd";
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].style.borderColor = "black";
        }

        //JS untuk halaman Bayar
        document.addEventListener("DOMContentLoaded", function() {
            const toggleDetail = document.querySelector(".toggle-detail");
            const detailPembayaran = document.querySelector(".detail-pembayaran");

            toggleDetail.addEventListener("click", function() {
                detailPembayaran.classList.toggle("show");
            });
        });
