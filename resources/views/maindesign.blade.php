<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One Health</title>
    <link rel="stylesheet" href="frontend/assets/css/maicons.css">
    <link rel="stylesheet" href="frontend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="frontend/assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="frontend/assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="frontend/assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@onehealth.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

                {{-- <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                            aria-describedby="icon-addon1">
                    </div>
                </form> --}}

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('view_doctors') }} ">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-warning ml-lg-3" href="{{ route('dashboard') }}">Dashboard</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger ml-lg-3">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-secondary ml-lg-3" href="{{ route('login') }}">Login</a>
                                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif

                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <!-- Hero -->
    @yield('hero')
    <!-- Doctors -->
    @yield('index')
    @yield('view_doctors')
    @yield('news')

    <div class="page-section bg-light">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Latest News</h1>
            <div class="row mt-5">
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="frontend/assets/img/blog/blog_1.jpg" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">List of Countries without Coronavirus
                                    case</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="frontend/assets/img/person/person_1.jpg" alt="">
                                    </div>
                                    <span>Roger Adams</span>
                                </div>
                                <span class="mai-time"></span> 1 week ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="frontend/assets/img/blog/blog_2.jpg" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">Recovery Room: News beyond the
                                    pandemic</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="frontend/assets/img/person/person_1.jpg" alt="">
                                    </div>
                                    <span>Roger Adams</span>
                                </div>
                                <span class="mai-time"></span> 4 weeks ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">Covid19</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="frontend/assets/img/blog/blog_3.jpg" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">What is the impact of eating too much
                                    sugar?</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="frontend/assets/img/person/person_2.jpg" alt="">
                                    </div>
                                    <span>Diego Simmons</span>
                                </div>
                                <span class="mai-time"></span> 2 months ago
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mt-4 wow zoomIn">
                    <a href="blog.html" class="btn btn-primary">Read More</a>
                </div>

            </div>
        </div>
    </div> <!-- .page-section -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

            <form class="main-form">
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" class="form-control" placeholder="Email address..">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="departement" id="departement" class="custom-select">
                            <option value="general">General Health</option>
                            <option value="cardiology">Cardiology</option>
                            <option value="dental">Dental</option>
                            <option value="neurology">Neurology</option>
                            <option value="orthopaedics">Orthopaedics</option>
                        </select>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" class="form-control" placeholder="Number..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
            </form>
        </div>
    </div> <!-- .page-section -->

    <div class="page-section banner-home bg-image"
        style="background-image: url(frontend/assets/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="frontend/assets/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application
                    </h1>
                    <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="frontend/assets/img/app_store.svg"
                            alt=""></a>
                </div>
            </div>
        </div>
    </div> <!-- .banner-home -->

    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Company</h5>
                    <ul class="footer-menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Editorial Team</a></li>
                        <li><a href="#">Protection</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>More</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Join as Doctors</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Our partner</h5>
                    <ul class="footer-menu">
                        <li><a href="#">One-Fitness</a></li>
                        <li><a href="#">One-Drugs</a></li>
                        <li><a href="#">One-Live</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Contact</h5>
                    <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
                    <a href="#" class="footer-link">701-573-75821</a>
                    <a href="#" class="footer-link">healthcare@onehealth.com</a>

                    <h5 class="mt-3">Social Media</h5>
                    <div class="footer-sosmed mt-3">
                        <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-between">
                <p id="copyright">Copyright &copy; 2025 <a href="#" target="_blank">One Health</a>. All right
                    reserved</p>
                <p id="copyright">Developed by <a href="https://jabedhosen.netlify.app/" target="_blank">Jabed
                        Hosen</a></p>
            </div>
        </div>
    </footer>

    <script src="frontend/assets/js/jquery-3.5.1.min.js"></script>
    <script src="frontend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="frontend/assets/vendor/wow/wow.min.js"></script>
    <script src="frontend/assets/js/theme.js"></script>

</body>

</html>
