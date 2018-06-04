<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

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
                <h4>Site Navigation</h4>

                <p>Navigate your site through these routes.</p>

                <ol>
                    <li>
                        <a href="{{ url('/navigation') }}" target="_blank">{{ url('/navigation') }}</a>
                        - Site Navigation
                    </li>
                    <li>
                        <a href="{{ url('/') }}" target="_blank">{{ url('/') }}</a>
                        - Homepage / Subscription Page
                    </li>
                    <li>
                        <a href="{{ url('/send-sms') }}" target="_blank">{{ url('/send-sms') }}</a>
                        - Send SMS Updates to subscribers
                    </li>
                    <li>
                        <a href="{{ url('/candidates') }}" target="_blank">{{ url('/candidates') }}</a>
                        - Check registered candidates, Add new candidate, send expo to candidates
                    </li>
                    <li>
                        <a href="{{ url('/exam') }}" target="_blank">{{ url('/exam') }}</a>
                        - Check Subscription status
                    </li>
                </ol>

            </div>
            <div class="two columns"></div>
        </div>

    </div>

</body>
</html>
