<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin/Petugas</title>
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7Rxnatzj" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class ="row w-100 wrapper">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="card-container">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="container">
                    <div class="log-card">
                        <p class="heading">Welcome Back! Admin/Petugas </p>
                        <p>We are you to see you again</p>
                        <form action="proses_login_petugas.php" method="post">
                            <div class="input-group">
                                <p class="text">Username</p>
                                <input class="input" type="username" name="username" placeholder="for ex : 90243746" />
                                <p class="text">Password</p>
                                <input class="input" type="password" name="password" placeholder="enter password" />
                            </div>
                            <a href="index.php">Login User</a>
                            <div class="w-100">
                                <button type="submit" class="btn btn-primary w-100">Sign IN</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="img-left img col-md-6 d-flex justify-content-start align-items-center">
            <img src="loginvector.jpg" alt="">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>