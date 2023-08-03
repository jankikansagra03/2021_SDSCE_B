<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ URL::to('/') }}/send_email" method="post">

        @csrf
        Enter Name:: <input type="text" name="nm" id="nm1">
        <br>
        Enter Email :: <input type="email" name="em" id="em1">
        <br>
        <input type="submit" value="Send Email">
    </form>
</body>

</html>
