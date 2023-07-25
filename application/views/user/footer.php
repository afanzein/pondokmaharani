 </main>
  <!-- Footer Section -->
  <footer class="bg-dark text-light py-3">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>&copy; 2023 Your Company. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</div>
</body>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script>
  
  // Function to add/remove the "sticky" class to the navbar
  function toggleStickyNavbar() {
    var navbar = document.querySelector('.navbar');
    if (window.pageYOffset >= navbar.offsetTop) {
      navbar.classList.add('sticky-top');
    } else {
      navbar.classList.remove('sticky-top');
    }
  }
  // Add an event listener for scroll
  window.addEventListener('scroll', toggleStickyNavbar);

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

</script>

</html>