@php 
    $footer_icons =  DB::table('home_footer_images')->where('status',1)->get();
    $footer_links =  DB::table('menus')->where('txtpostion',3)->where('menu_status',1)->get();
@endphp
<!-- quick link section -->
  <!-- card section end -->
  <!-- footer -->
  <section class="py-4 bg-white">
    <!-- container -->
    <div class="container">
      <div class="row">
        <div class="offset-xl-1 col-xl-10 col-md-12 col-12">
          <!-- row -->
          <div class="row text-center">
            <!-- col -->
            @foreach($footer_icons as $i => $footer_icon)
            <div class="col align-self-center">
              <div class="mb-3 mt-3">
                <img src="{{ asset('assets/images/brand/' . $footer_icon->image) }}" alt="logo" class="w-75">
              </div>
            </div>
            @endforeach              
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer class="pt-2 pb-3 bg-white">
    <div class="container">
      <div class="row justify-content-center text-center align-items-center">
        <div class="col-12 col-md-12 px-0">
          <!-- <div class="mb-4">
            <a href="index.html">
              <img src="assets/images/lbsnaa_logo_new.png" alt="logo" class="mb-4 logo-inverse" width="200">
            </a>
          </div> -->
          <nav class="nav nav-footer justify-content-center">
          @foreach($footer_links as $i => $footer_link)
            @if($i > 0)
              <span class="my-2 vr opacity-50"></span>   
            @endif
              <a class="nav-link" href="#">{{$footer_link->menutitle}}</a>
          @endforeach 
          </nav>
        </div>
      </div>
      <!-- Desc -->
      <hr class="mt-6 mb-3">
      <div class="row align-items-center">
        <!-- Desc -->
        <div class="col-lg-6 col-md-6 col-12">
          <span>
            ©
            <span id="copyright4">
              <script>
                document.getElementById("copyright4").appendChild(document.createTextNode(new Date().getFullYear()));
              </script>
            </span>
            <span style="color: #af2910;">Lal Bahadur Shastri National Academy of Administration</span>. All Rights
            Reserved
          </span>
        </div>

        <!-- Links -->
        <div class="col-lg-6 col-md-12 col-12 d-lg-flex justify-content-end">
          <div>
            <!--Facebook-->
            <a href="#" class="me-2">
              <i class="bi bi-facebook fa-2x" style="color: #af2910;"></i>
            </a>
            <!--Twitter-->
            <a href="#" class="me-2">
              <i class="bi bi-twitter" style="color: #af2910;"></i>
            </a>

            <!--GitHub-->
            <a href="#">
              <i class="bi bi-youtube" style="color:#af2910;"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Links -->
    </div>
  </footer>

  <!-- Scroll top -->
  <div class="btn-scroll-top">
    <svg class="progress-square svg-content" width="100%" height="100%" viewbox="0 0 40 40">
      <path
        d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z">
      </path>
    </svg>
  </div>

  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>

  <!-- Theme JS -->
  <script src="assets/js/theme.min.js"></script>


  <script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>

  <script src="assets/js/vendors/tooltip.js"></script>
  <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
  <script src="assets/js/vendors/tnsSlider.js"></script>
  <script src="assets/libs/glightbox/dist/js/glightbox.min.js"></script>
  <script src="assets/js/vendors/glight.js"></script>

</body>
</html>