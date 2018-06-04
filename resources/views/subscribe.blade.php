
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>MySchoolWap Subscription</title>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ultra-modern Subscribe Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta Tags -->
<!-- font-awesome-stylesheet -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-stylesheet -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
<!--//fonts-->

{{-- TinyMCE --}}
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
</head>
<body>
    <!-- main-content -->
        <h1>MySchoolWap Subscription</h1>
            <div class="main-content-agileits">
            <!-- left-content -->
            <div class="left-text-w3ls">
                @if (Session::has('success'))
                    <h3 align="center"><i class="fa fa-check fa-4x"></i><br>Dear {{ Session::get('subscriber_name') }}, You have successfully submitted your subscription request</h3>
                @endif

            </div>
            <!-- //left-content -->
            <!-- form -->
            <div class="login-w3l">
            <div class="top-img-agileits-w3layouts">
                <h2 class="sub-head-w3-agileits">Enroll For our <span>WAEC subscription</span></h2>
            </div>
            <div class="login-form">
                <form action="{{ route('subscribe') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="subscriber_name" placeholder="Name" required />
                    <input type="text" name="subscriber_phone" placeholder="Phone Number" required />
                    <input type="submit" value="Subscribe">
                </form>
            </div>
                </div>
            <!-- //form -->
                <div class="clear"></div>
            </div>

    <!--// main-content -->
            <!--Copyright-->
            <div class="footer-agileits">
            <p>&copy; 2018 MySchoolWap Subscription. All Rights Reserved | Design by <a href="//twitter.com/iamwebwiz" target="_blank"> Webwiz</a></p>
            </div>
            <!--//Copyright-->
</body>
</html>
