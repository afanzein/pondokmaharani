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
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>
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
</script>

</html>