<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>LEAF Test</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Records</h1>
                </div>
                <div class="col text-right">
                    <input id="other_btn" type="button" value="Other Portal results" />
                    <script type="text/javascript">
                        document.getElementById('other_btn').addEventListener('click', function() {
                            // alert('hi');
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    console.log(this.responseText);
                                }
                            };
                            xhttp.open("GET", "/api/VISN2/Facility1/records");
                            xhttp.send();

                        });

                    </script>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>date</th>
                            <th>service</th>
                            <th>user</th>
                            <th>title</th>
                            <th>priority</th>
                            <th>last status</th>
                            <th>submitted</th>
                            <th>deleted</th>
                            <th>is writable user</th>
                            <th>is writable group</th>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $record->recordID }}</td>
                                    <td>{{ $record->date}}</td>
                                    <td>{{ $record->serviceID }}</td>
                                    <td>{{ $record->userID }}</td>
                                    <td>{{ $record->title }}</td>
                                    <td>{{ $record->priority}}</td>
                                    <td>{{ $record->lastStatus}}</td>
                                    <td>{{ $record->submitted}}</td>
                                    <td>{{ $record->deleted}}</td>
                                    <td>{{ $record->isWritableUser}}</td>
                                    <td>{{ $record->isWritableGroup}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </body>
</html>