<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- endinject -->
  
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    @include('admin.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @yield('admin.content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       {{-- @include('admin.footer') --}}
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @include('admin.footer')
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/js/data-table.js')}}"></script>
  <script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
  <!-- End custom js for this page-->

  <script src="{{asset('admin/js/jquery.cookie.js" type="text/javascript')}}"></script>
  <script src="../../js/file-upload.js')}}"></script>
  //desription
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
<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45",
          "ctaText":"WhatsApp Us",
          "cornerRadius":40,
          "marginBottom":20,
          "marginRight":20,
        //   "marginLeft":20,
          "btnPosition":"right",
          "whatsAppNumber":"+8801777762200",
          "welcomeMessage":"Hello",
          "zIndex":999999,
          "btnColorScheme":"light"};
          var wa_widgetSetting = {"title":"Shrom",
          "subTitle":"Typically replies in a day",
          "headerBackgroundColor":"#0a5f54",
          "headerColorScheme":"light",
          "greetingText":"Hi there! \nHow can I help you?",
          "ctaText":"Start Chat",
          "btnColor":"#57c251",
          "cornerRadius":40,
          "welcomeMessage":"Hello",
          "btnColorScheme":"light",
        //   "brandImage":"https://ucarecdn.com/7c8ee41c-e7bb-4ff9-ae30-db8f4ec0eda6/WhatsAppImage20221111at112629AM.jpeg",
          "darkHeaderColorScheme":{"title":"#333333","subTitle":"#4F4F4F"}};
          window.onload = () => {
            _waEmbed(wa_btnSetting, wa_widgetSetting);
          };
        </script>
</body>

</html>

