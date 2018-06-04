<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Check Subscription Status | MySchoolWap.com</title>

    <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>

    <div class="container">

        <div class="row">
            <div class="two columns"></div>
            <div class="eight columns">
                <h4>Check your subscription status</h4>

                <p>Input your phone number in the field provided below to check your WAEC subscription status</p>

                @if (Session::has('success'))
                    <h6><i class="fa fa-check"></i> {{ Session::get('success') }}</h6>
                @elseif (Session::has('error'))
                    <h6><i class="fa fa-warning"></i>{{ Session::get('error') }}</h6>
                @endif

                <form action="{{ route('check_status') }}" method="post">
                    {{ csrf_field() }}
                    <label>Phone</label>
                    <input type="tel" name="phone" class="u-full-width">

                    <br><br>

                    <input class="button-primary" type="submit" value="Search">
                </form>

                <hr>

                @if (Session::has('candidate'))
                    <h5>Subscription Details</h5>
                    <p>Dear {{ Session::get('candidate')->name }}, Congratulations. You have been registered to the Myschoolwap WAEC Assistance Programme.</p>
                    <p>Below are your credentials for confirmation:</p>
                    <ul>
                        <li>Name: <strong>{{ Session::get('candidate')->name }}</strong></li>
                        <li>Phone: <strong>{{ Session::get('candidate')->phone }}</strong></li>
                        <li>Subjects: <strong>{{ Session::get('candidate')->subjects }}</strong></li>
                        <li>Exam: <strong>WAEC</strong></li>
                    </ul>
                @endif

            </div>
            <div class="two columns"></div>
        </div>

    </div>

</body>
</html>
