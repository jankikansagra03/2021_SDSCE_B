<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="javascript" src="js/myjs.js"></script>
</head>

<body>
    <h1>hello</h1>
    <img src="images/logo.png" alt="">
    <form action="/fetch_value" method="post">
        @csrf
        Fullname:: <input type="text" name="fn" id="fn1">
        <br>
        email :: <input type="email" name="em" id="em1">
        <br>
        <input type="submit" value="Register">
    </form>
</body>

</html>
