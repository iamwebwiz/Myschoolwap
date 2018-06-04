<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Candidates | MySchoolWap.com</title>

    <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>

    <div class="container">

        <div class="row">
            <div class="two columns"></div>
            <div class="eight columns">
                <h4>Add New Candidate</h4>

                @if (Session::has('success'))
                    <h6><i class="fa fa-check"></i> {{ Session::get('success') }}</h6>
                @elseif (Session::has('error'))
                    <h6><i class="fa fa-warning"></i>{{ Session::get('error') }}</h6>
                @endif

                <form action="{{ route('new_candidate') }}" method="post">
                    {{ csrf_field() }}
                    <label>Name</label>
                    <input type="text" name="candidate_name" class="u-full-width">

                    <br><br>

                    <label>Phone</label>
                    <input type="tel" name="candidate_phone" class="u-full-width">

                    <br><br>

                    <label>Subjects</label>
                    <textarea class="u-full-width" name="subjects" placeholder="Enter subjects"></textarea>

                    <br><br>

                    <input class="button-primary" type="submit" value="Send Update">
                </form>

                <hr>

                <h4>Send Expo</h4>

                <form action="{{ route('send_expo') }}" method="post">
                    {{ csrf_field() }}
                    <label>Candidates</label>
                    <input type="text" name="candidates" class="u-full-width" placeholder="Separate phone numbers with commas only">

                    <br><br>

                    <label>Message</label>
                    <textarea class="u-full-width" name="message" placeholder="Message"></textarea>

                    <br><br>

                    <input class="button-primary" type="submit" value="Send Expo">
                </form>

            </div>
            <div class="two columns"></div>
        </div>

        <hr>

        <div class="row">
            <div class="twelve columns">
                <h4>Registered Candidates</h4>

                <table class="u-full-width">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Subjects</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ str_limit($row->subjects, 45) }}</td>
                                <td>{{ $row->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $candidates->links() }}
            </div>
        </div>

    </div>

</body>
</html>
