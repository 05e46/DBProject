<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="flex-container">

<form action="dashboard.php" method="POST">
    <h3>Please enter the following fields</h3>
    <label for="fullname" class="sr-only">New User</label>
    <input type="text" name="fullname"  class="form-control" placeholder="Full Name" required>
    <br>
    <br>
    <label for="newusername" class="sr-only">New Username</label>
    <input type="text" name="newusername" class="form-control" placeholder="New Username" required>
    <br>
    <br>
    <label for="newpssw" class="sr-only">New Password</label>
    <input type="password" name="newpssw" class="form-control" placeholder="New Password" required>
    <br>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>
</div>

</body>

</html>