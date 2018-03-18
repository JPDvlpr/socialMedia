<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
          rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/project.css">
    <script src="model/validator.js"></script>
</head>
<body BACKGROUND="images/clouds.jpg">
<nav>
    <div class="navbar  text-primary navbar-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main"></button>
                <a class="navbar-brand" href="#">IT/328 Dating</a>
            </div>
            <div class="pull-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./view" class="navbar-brand"><h4>View Profile</h4></a>
                    </li>
                    <li>
                        <button type="submit" class="btn navbar-btn btn-primary" name="logout" id="logout"
                                value="Log Out">Log Out
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!---->
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
                    <input type="submit" class="btn btn-block btn-primary pull-right" name="post" id="post"
                           value="Post">
                </div>
            </form>
            <br><br>
            <hr>
            <div>
                <repeat group="@$_SESSION['row']" value="@item ">
                    <h3> {{@item.email}}
                    </h3><br>
                    <p class="text-capitalize">
                        {{@item.post}}
                    </p><br>
                    <hr>
                </repeat>
                <div>
                </div>
            </div>
        </div>
        <script>
            var texts = document.getElementById("idea");
            texts.onkeypress = validText;

            function validText() {
                var text = texts.value;
                if (text.length > 10) {
                    texts.style.borderColor = "green";
                } else {
                    texts.style.borderColor = "red";
                    texts.style.borderStyle = "solid";
                    texts.style.borderWidth = "2px";
                }
            }
        </script>
</body>
</html>