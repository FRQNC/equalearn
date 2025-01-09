@extends("layouts.landing-layout")
@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <img src="{{ asset('assets/landing/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
      <p data-aos="fade-up" data-aos-delay="200"></p>
      <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        <a href="courses.html" class="btn-get-started">Get Started</a>
      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
          <h3>Transformasikan cara Anda belajar dengan Equalearn</h3>
          <p class="fst-italic">
            Platform berbagi materi online yang menyediakan pengalaman berbagi pengetahuan secara fleksibel, interaktif, dan berfokus pada kualitas konten. Bergabunglah dengan Equalearn dan mulai perjalanan berbagi wawasan Anda sekarang.
        </p>
        <ul>
            <li><i class="bi bi-check-circle"></i> <span>Materi yang dapat disesuaikan dengan kebutuhan dan minat pembaca, memberikan pengalaman membaca yang lebih relevan dan bermanfaat.</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Anda dapat belajar dan berbagi dari para penulis serta praktisi berpengalaman di bidangnya, memastikan konten yang dibagikan tidak hanya teoritis tetapi juga aplikatif.</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Equalearn kami dilengkapi dengan fitur-fitur seperti like, dan analitik untuk membantu meningkatkan keterlibatan dan dampak materi yang dibagikan.</span></li>
        </ul>
        
          <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </div>

  </section><!-- /About Section -->

  {{-- <!-- Counts Section -->
  <section id="counts" class="section counts light-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>
        </div><!-- End Stats Item -->

      </div>

    </div>

  </section><!-- /Counts Section --> --}}

  {{-- <!-- Why Us Section -->
  <section id="why-us" class="section why-us">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="why-box">
            <h3>Mengapa harus Equalearn?</h3>
            <p>
                Karena kami memberikan pengalaman belajar yang fleksibel, dipandu oleh instruktur ahli, dan
                didukung oleh fitur interaktif yang membuat pembelajaran lebih efektif!
            </p>
            <div class="text-center">
              <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
            </div>
          </div>
        </div><!-- End Why Box -->

        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

            <div class="col-xl-4">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-clipboard-data"></i>
                <h4>Kurikulum Terpersonalisasi dan Terstruktur</h4>
                <p>Kursus yang disesuaikan dengan tujuan belajar Anda</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-gem"></i>
                <h4>Instruktur Profesional</h4>
                <p>Belajar langsung dari para ahli berpengalaman</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-inboxes"></i>
                <h4>Pembelajaran Interaktif</h4>
                <p>Fitur-fitur yang meningkatkan keterlibatan dan pemahaman</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>

    </div>

  </section><!-- /Why Us Section -->

  <!-- Features Section -->
  <section id="features" class="features section">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="features-item">
            <i class="bi bi-eye" style="color: #ffbb2c;"></i>
            <h3><a href="" class="stretched-link">Web Devleopment</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="features-item">
            <i class="bi bi-infinity" style="color: #5578ff;"></i>
            <h3><a href="" class="stretched-link">UI/UX Design</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="features-item">
            <i class="bi bi-mortarboard" style="color: #e80368;"></i>
            <h3><a href="" class="stretched-link">Data Science</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
          <div class="features-item">
            <i class="bi bi-nut" style="color: #e361ff;"></i>
            <h3><a href="" class="stretched-link">Cloud Computing</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
          <div class="features-item">
            <i class="bi bi-shuffle" style="color: #47aeff;"></i>
            <h3><a href="" class="stretched-link">Marketing & SEO</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
          <div class="features-item">
            <i class="bi bi-star" style="color: #ffa76e;"></i>
            <h3><a href="" class="stretched-link">Cybersecurity</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
          <div class="features-item">
            <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
            <h3><a href="" class="stretched-link">Project Management</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
          <div class="features-item">
            <i class="bi bi-camera-video" style="color: #4233ff;"></i>
            <h3><a href="" class="stretched-link">Video Editing</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
          <div class="features-item">
            <i class="bi bi-command" style="color: #b2904f;"></i>
            <h3><a href="" class="stretched-link">Artificial Intelligence (AI)</a></a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
          <div class="features-item">
            <i class="bi bi-dribbble" style="color: #b20969;"></i>
            <h3><a href="" class="stretched-link">Machine Learning</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
          <div class="features-item">
            <i class="bi bi-activity" style="color: #ff5828;"></i>
            <h3><a href="" class="stretched-link">Mobile Apps Development</a></h3>
          </div>
        </div><!-- End Feature Item -->

        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
          <div class="features-item">
            <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
            <h3><a href="" class="stretched-link">Copywriting</a></h3>
          </div>
        </div><!-- End Feature Item -->

      </div>

    </div>

  </section><!-- /Features Section -->

  <!-- Courses Section -->
  <section id="courses" class="courses section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Courses</h2>
      <p>Popular Courses</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Web Development</p>
                <p class="price">$169</p>
              </div>

              <h3><a href="course-details.html">Website Design</a></h3>
              <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
                  <a href="" class="trainer-link">Antonio</a>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bi bi-person user-icon"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bi bi-heart heart-icon"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="course-item">
            <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Marketing</p>
                <p class="price">$250</p>
              </div>

              <h3><a href="course-details.html">Search Engine Optimization</a></h3>
              <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-2-2.jpg" class="img-fluid" alt="">
                  <a href="" class="trainer-link">Lana</a>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bi bi-person user-icon"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bi bi-heart heart-icon"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="course-item">
            <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Content</p>
                <p class="price">$180</p>
              </div>

              <h3><a href="course-details.html">Copywriting</a></h3>
              <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-3-2.jpg" class="img-fluid" alt="">
                  <a href="" class="trainer-link">Brandon</a>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bi bi-person user-icon"></i>&nbsp;20
                  &nbsp;&nbsp;
                  <i class="bi bi-heart heart-icon"></i>&nbsp;85
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

      </div>

    </div>

  </section><!-- /Courses Section -->

  <!-- Trainers Index Section -->
  <section id="trainers-index" class="section trainers-index">

    <div class="container">

      <div class="row">

        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>Walter White</h4>
              <span>Web Development</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Team Member -->

        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>Sarah Jhinson</h4>
              <span>Marketing</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Team Member -->

        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
            <div class="member-content">
              <h4>William Anderson</h4>
              <span>Content</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div><!-- End Team Member --> --}}

      </div>

    </div>

  </section><!-- /Trainers Index Section -->
@endsection
