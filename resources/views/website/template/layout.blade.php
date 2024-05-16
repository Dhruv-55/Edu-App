<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Edustage Education</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/website-assets/css/bootstrap.css" />
    <link rel="stylesheet" href="/website-assets/css/flaticon.css" />
    <link rel="stylesheet" href="/website-assets/css/themify-icons.css" />
    <link rel="stylesheet" href="/website-assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="/website-assets/vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="/website-assets/css/style.css" />
    @notifyCss
  </head>

  <body>
    @include('website.template.header')
    @yield('page-section')
    @include('notify::components.notify')
    <x:notify-messages />

    @include('website.template.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="website-assets/js/jquery-3.2.1.min.js"></script>
    <script src="website-assets/js/popper.js"></script>
    <script src="website-assets/js/bootstrap.min.js"></script>
    <script src="website-assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="website-assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="website-assets/js/owl-carousel-thumb.min.js"></script>
    <script src="website-assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="website-assets/js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="website-assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="website-assets/js/gmaps.min.js"></script>
    <script src="website-assets/js/theme.js"></script>
    @notifyJs
  </body>
</html>
