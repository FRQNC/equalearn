@extends("layouts.landing-layout")
@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <img src="{{ asset('assets/landing/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

    <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
        <p data-aos="fade-up" data-aos-delay="200"></p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
            <a href="posts.html" class="btn-get-started">Get Started</a>
        </div>
    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                <img src="{{asset('assets/landing/img/about.jpg')}}" class="img-fluid" alt="">
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

<!-- Posts Section -->
<section id="posts" class="posts section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Posts</h2>
        <p>Popular Posts</p>
    </div><!-- End Section Title -->

    <div class="container">
        @foreach($posts as $p)
        <div class="row border rounded border-2 my-3 py-2 px-2 post-item" onclick="goToPost('{{$p->user->username}}/{{$p->title}}')">
            <div class="col">
                <div class="row mb-2">
                    <div class="col">
                    <span class="d-inline mx-3"><img src="{{asset('storage/'.$p->user->photo)}}" alt="" style="max-height:20px;" class="d-inline"></span><span class="d-inline"><a href="{{'/@'.$p->user->username}}">{{$p->user->username}}</a></span>
                    </div>
                </div>
                <div class="row ps-3">
                    <div class="col">
                        <h5>{{ $p->title }}</h5>
                    </div>
                </div>
                <div class="row ps-3">
                    <div class="col">
                        <p class="text-secondary">{{ $p->topic->name }} | {{ $p->grade->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <i class='bx bxs-like fs-3 mx-2'></i>
                <p class="pt-3 me-2">{{$p->like_data['like_count']}}</p>
                <i class='bx bxs-dislike fs-3 mx-2'></i>
                <p class="pt-3">{{$p->like_data['dislike_count']}}</p>
            </div>
        </div>

        @endforeach
    </div>

</section>
<!-- /Posts Section -->
@endsection
