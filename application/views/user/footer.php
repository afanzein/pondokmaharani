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
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  // Function to add/remove the "sticky" class to the navbar
  function toggleStickyNavbar() {
    var navbar = document.querySelector('.navbar');
    if (navbar !== null) {
    if (window.pageYOffset >= navbar.offsetTop) {
      navbar.classList.add('sticky-top');
    } else {
      navbar.classList.remove('sticky-top');
     }
    }   
  }
  // Add an event listener for scroll
  window.addEventListener('scroll', toggleStickyNavbar);

  //==========================================
  // Header-Login
    // Set the JavaScript variables using PHP
    var isLoggedIn = '<?php echo $this->session->userdata('role') ? 'true' : 'false'; ?>';
    var username = '<?php echo $this->session->userdata('username'); ?>';
    // Your function to show the user dropdown
    function showUserDropdown() {
      document.getElementById('userDropdownMenu').textContent = username;
      document.getElementById('login-btn').style.display = 'none';
      document.getElementById('user-dropdown').style.display = 'block';
    }

    // Check if the user is logged in and show the user dropdown if necessary
    if (isLoggedIn) {
      showUserDropdown();
    }

    // Set JS for Product Card
  $(document).ready(function() {
    // Inisialisasi Slick Carousel untuk setiap slider dengan class unik berdasarkan data-id
    $('[data-id]').each(function() {
      var id = $(this).data('id');
      var slideCount = $('.slider-products[data-id="' + id + '"] > div').length;

      // Mengatur slidesToShow sesuai dengan jumlah gambar yang ada
      var slidesToShow = slideCount >= 2 ? 2 : slideCount; // Tampilkan 3 slide jika ada 3 atau lebih gambar, jika tidak tampilkan jumlah gambar yang ada
      $('.slider-products[data-id="' + id + '"]').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        infinite: true,
        slidesToShow: slidesToShow,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1, // Ketika lebar layar <= 768px, tampilkan 2 slide
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1, // Ketika lebar layar <= 576px, tampilkan 1 slide
            }
          }
        ]
      });
    });
  });


    // Set JS for Reservation Image Slider
    $(document).ready(function() {
        // Inisialisasi Slick Carousel untuk setiap slider dengan class .slide-pemesanan
        $('.mySlides').each(function() {
            var id = $(this).data('id');
            var slideCount = $('.slider-pemesanan[data-id="' + id + '"] > div').length;

            // Mengatur slidesToShow sesuai dengan jumlah gambar yang ada
            var slidesToShow = slideCount >= 2 ? 2 : slideCount; // Tampilkan 3 slide jika ada 3 atau lebih gambar, jika tidak tampilkan jumlah gambar yang ada
            $(this).slick({
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                infinite: true,
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1, // Ketika lebar layar <= 768px, tampilkan 2 slide
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1, // Ketika lebar layar <= 576px, tampilkan 1 slide
                        }
                    }
                ]
            });
        });
    });

</script>

</html>