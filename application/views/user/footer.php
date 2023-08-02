 </main>
  <!-- Footer Section -->
  <footer class="bg-dark text-light py-2">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>&copy; 2023 Pondok Maharani. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</div>
</body>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>


<script>


//costum alert
function showCustomAlert() {
    Swal.fire({
      title: 'Pesan Kustom!',
      text: 'Ini adalah pesan kustom menggunakan SweetAlert!',
      icon: 'success',
      confirmButtonText: 'Tutup'
    });
  }
  //==========================================

  // Header-Login
  $(document).ready(function() {
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
  if (isLoggedIn === 'true') {
    showUserDropdown();
  } else {
    document.getElementById('user-dropdown').style.display = 'none';
    document.getElementById('login-btn').style.display = 'block';
  }

 });

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


function togglePaymentDetails() {
    var paymentDetails = document.getElementById("paymentDetails");
    var arrowIcon = document.querySelector(".arrow-icon");

    if (paymentDetails.style.display === "none") {
        paymentDetails.style.display = "block";
        arrowIcon.classList.remove("fa-chevron-right");
        arrowIcon.classList.add("fa-chevron-down");
    } else {
        paymentDetails.style.display = "none";
        arrowIcon.classList.remove("fa-chevron-down");
        arrowIcon.classList.add("fa-chevron-right");
    }
}

//slideshow
$(document).ready(function() {
  let slideIndex = 1;
  let maxSlides = document.querySelectorAll(".mySlides").length;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex + n);
  }

  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(n);
  }

  function showSlides(n) {
    slideIndex = n;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    if (n > maxSlides) { slideIndex = 1; }
    if (n < 1) { slideIndex = maxSlides; }

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (let i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }

  // Attach click event handlers to arrow buttons
  $(".prev").on("click", function() {
    plusSlides(-1);
  });

  $(".next").on("click", function() {
    plusSlides(1);
  });

  // Attach click event handlers to thumbnail images
  $(".demo").on("click", function() {
    currentSlide($(this).index() + 1);
  });

  // Trigger the click on the first thumbnail to initialize the slideshow
  $(".demo").first().click();
});

</script>

</html>