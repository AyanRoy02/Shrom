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
<div class="signin-section ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                <form class="signin-form" action="{{url('/client/logincheck')}}" method="post">
                    <img src="{{ asset('admin/images/lock.jpg') }}" style="height: auto;width:100%;"  alt="logo">
                    @csrf
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                    </div>
                    <div class="signin-btn text-center">
                        <button type="submit">Sign In</button>
                    </div>
                </form>
                    <div class="create-btn text-center">
                        <p>Don't have an account?
                            <a href="{{ url('/client/signup') }}">
                            signup
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
