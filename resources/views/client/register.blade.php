<!doctype html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/boxicon.min.css">

    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">

    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/meanmenu.css">

    <link rel="stylesheet" href="assets/css/nice-select.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/dark.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <title>Jovie - Job Board & Portal HTML Template</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>
<body>

{{-- <div class="loader-content">
    <div class="d-table">
    <div class="d-table-cell">
    <div class="sk-circle">
    <div class="sk-circle1 sk-child"></div>
    <div class="sk-circle2 sk-child"></div>
    <div class="sk-circle3 sk-child"></div>
    <div class="sk-circle4 sk-child"></div>
    <div class="sk-circle5 sk-child"></div>
    <div class="sk-circle6 sk-child"></div>
    <div class="sk-circle7 sk-child"></div>
    <div class="sk-circle8 sk-child"></div>
    <div class="sk-circle9 sk-child"></div>
    <div class="sk-circle10 sk-child"></div>
    <div class="sk-circle11 sk-child"></div>
    <div class="sk-circle12 sk-child"></div>
    </div>
    </div>
    </div>
</div> --}}







<div class="signin-section ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
               
                <form class="signin-form" action="{{url('/client/registration')}}" method="post">
                    @csrf
                    <img src="{{ asset('admin/images/reg.jpg') }}" style="height: auto;width:50%; "  alt="logo">
            
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" name="name"  class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                        <p style="color: red;">*password must be minimum 6 characters</p>
                    </div>
                    <div class="signin-btn text-center">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
                    <div class="create-btn text-center">
                        <p>Already have an account?
                            <a href="{{ route('cllogin') }}">
                            signin
                                <i class='bx bx-chevrons-right bx-fade-right'></i>
                            </a>
                        </p>
                    </div>

            </div>
        </div>
    </div>
</div>







<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/jquery.nice-select.min.js"></script>

<script src="assets/js/jquery.magnific-popup.min.js"></script>

<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/form-validator.min.js"></script>

<script src="assets/js/contact-form-script.js"></script>

<script src="assets/js/meanmenu.js"></script>

<script src="assets/js/custom.js"></script>
</body>

</html>
