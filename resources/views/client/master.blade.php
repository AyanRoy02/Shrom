<!doctype html>
<html lang="zxx">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/boxicon.min.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/fonts/flaticon/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/meanmenu.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/nice-select.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/dark.css')}}">

    <link rel="stylesheet" href="{{asset('client/assets/css/responsive.css')}}">

    <title>Jovie - Job Board & Portal HTML Template</title>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('client/assets/img/favicon.png')}}">
</head>
<body>

@include('client.header')

@yield('client')
@include('client.subscribe')


@include('client.footer')
<div class="copyright-text text-center">
    <p>Developed By Ayan Roy</a></p>
</div>


<div class="top-btn">
    <i class='bx bx-chevrons-up bx-fade-up'></i>
</div>


<script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('client/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('client/assets/js/jquery.nice-select.min.js')}}"></script>

<script src="{{asset('client/assets/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('client/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('client/assets/js/form-validator.min.js')}}"></script>

<script src="{{asset('client/assets/js/contact-form-script.js')}}"></script>

<script src="{{asset('client/assets/js/meanmenu.js')}}"></script>

<script src="{{asset('client/assets/js/custom.js')}}"></script>
<script src="{{asset('client/assets/js/master.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
      $('#editor').summernote({
          placeholder: '',
          tabsize: 2,
          height: 100
      });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
      $('#editor1').summernote({
          placeholder: '',
          tabsize: 2,
          height: 100
      });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
      $('#editor2').summernote({
          placeholder: '',
          tabsize: 2,
          height: 100
      });
  });
</script>
</body>

</html>
