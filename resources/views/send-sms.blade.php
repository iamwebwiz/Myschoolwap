<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Send SMS Update | MySchoolWap.com</title>

    <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>

    <div class="container">

        <div class="row">
            <div class="two columns"></div>
            <div class="eight columns">
                <h4>Send SMS Update</h4>

                @if (Session::has('success'))
                    <h6><i class="fa fa-check"></i> {{ Session::get('success') }}</h6>
                @elseif (Session::has('error'))
                    <h6><i class="fa fa-warning"></i>{{ Session::get('error') }}</h6>
                @endif

                <form action="{{ route('send_sms') }}" method="post">
                    {{ csrf_field() }}
                    <label>Subscriber</label>
                    <select class="u-full-width" name="subscriber">
                        <option value="">Choose Subscriber</option>
                        @foreach ($subscribers as $option)
                            <option value="{{ $option->phone }}">{{ $option->name }}</option>
                        @endforeach
                    </select>

                    <br><br>

                    <label>Message</label>
                    <textarea class="u-full-width" name="message" placeholder="Hello..."></textarea>

                    <br><br>

                    <input class="button-primary" type="submit" value="Send Update">
                </form>
            </div>
            <div class="two columns"></div>
        </div>

    </div>
</body>
</html>
