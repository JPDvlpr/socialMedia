<!--
Name: Jhakon Pappoe & Navtej Singh
Project: IT328 Dating website
Date:  3.19.18
Url: http://nsinghvirk.greenriverdev.com/328/home
-->

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/project.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">

</head>
<body BACKGROUND="images/clouds.jpg">
<nav>
    <div class="navbar  text-primary navbar-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main"></button>
                <a class="navbar-brand w3-lobster" href="#">
                    <p class="w3-xxxlarge text-info">IT/328 Dating</Dating></p></a>
            </div>
            <div class="navbar-collapse collapse " id="navbar-main">
                <h2 class="text-center text-info w3-lobster">Welcome, {{ @fname }} {{ @lname }}</h2>
            </div>
            <div class="pull-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./view" class="navbar-brand w3-lobster">
                            <p class="w3-xxxlarge text-info">View Profile</p></a>
                    </li>
                    <li>
                        <form method="post" action="#">
                            <button type="submit" class="btn  text-info btn-basic w3-lobster w3-large"
                                    name="logout">
                                Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <div class="row" id="m4">
        <div class="col-md-8">
            <form action="#" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="idea" name="idea"
                              placeholder="
 Share an article or idea...."></textarea>
                    <check if="{{ isset(@errors['text']) }}">
                        <h6 class="text-primary">Please Share your ideas..!</h6>
                    </check>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn  btn-block text-info btn-basic w3-lobster w3-large" name="post"
                           id="post"
                           value="Post">
                </div>
            </form>
            <hr>
            <repeat group="@$_SESSION['row']" value="@item">
                <div class="panel panel-default w3-lobster" id="mouse">
                    <h3 class="panel-heading w3-xlarge ">
                        {{@item.lastName}} {{@item.firstName}}
                    </h3>
                    <p class="panel-body">
                        {{@item.post}}
                    </p>
                </div>
                <br>

            </repeat>
            <div>
            </div>

            <footer class="bg-light">
                <p class="text-center">Contact information: <a href="mailto:someone@example.com">N.S & J.P @ 2018</a>
                </p>
            </footer>
        </div>

        <script src="js/validator.js"></script>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="js/jquery.js"></script>
</body>
</html>