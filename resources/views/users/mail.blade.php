<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>Welcome to Expense Manager</h1>
        <h2> Hi {{ $data['email'] }}, we’re glad you’re here!: <br>
            <button><a class="btn btn-dark" href="{{ url('home') }}">Accept</a></button>
    </center>
</body>

</html>
