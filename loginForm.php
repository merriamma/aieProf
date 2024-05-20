<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assests/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Form</title>
</head>

<body>




    <div class="form-container">
        <form action="login.php" method="post" class="form">
            <h3 class="title">Login Now</h3>
            <div class="mb-3">

                <label for="username">Username</label>

                <input type="text" name="nom" id="nom" required placeholder="enter your username" class="form-control" aria-required="true" autocomplete="off">
            </div>
            <div class="mb-3">

                <label for="password">Password</label>
                <input type="password" name="code" id="code" required placeholder="enter your password" class="form-control" aria-required="true" autocomplete="new-password" autofill="off">
            </div>

            <a href="prof.php "><button type="submit" href="prof.php" class="sign">Log In</button></a>
            <!-- <button class="sign">Login</button> -->


        </form>
    </div>
</body>

</html>