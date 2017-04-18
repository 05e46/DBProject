<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- top bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="home.php">DBProject</a> </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">Hot</a></li>
                    <li><a href="#">New</a></li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tags<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">#yes</a></li>
                            <li><a href="#">#No</a></li>
                            <li><a href="#">#what</a></li>
                            <li><a href="#">more...</a></li>
                        </ul>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search"> </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                    <li><a href="#">Sign in</a></li>
                    <li><a href="#">Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end top bar -->
    <!-- When the posts begin -->
    <div class="flex-container">
        <article class="posts">
            <h1>First post</h1>
            <p>Please use the database to have the text pop here</p>
            <p>Please note that there are other things that should be in this page</p>
            <p><strong>Get this shit done!!!</strong></p>
        </article>
    </div>
    <div class="flex-container">
        <article class="posts">
            <h1>Second post</h1>
            <p>Please use the database to have the text pop here</p>
            <p>Please note that there are other things that should be in this page</p>
            <p><strong>Get this shit done!!!</strong></p>
        </article>
    </div>
    <div class="flex-container">
        <article class="posts">
            <h1>Third post</h1>
            <p>Please use the database to have the text pop here</p>
            <p>Please note that there are other things that should be in this page</p>
            <p><strong>Get this shit done!!!</strong></p>
        </article>
    </div>
    <!-- end of posts -->
</body>
</html>