<!DOCTYPE html>
<html>

<head>
    <title>Log here!</title>
</head>

<body>
    <?php
include('header.php');
?>
    <div class="flex-container">
        <div id="wrapper">
            <div id="login">
                <form action="login.php" method="POST">
                    <h3>Already have an account?</h3>
                    <br>
                    <label for="Username" class="sr-only">Username</label>
                    <input type="text" name="Username" class="form-control" placeholder="User Name" required>
                    <br>
                    <br>
                    <label for="Password" class="sr-only">Password</label>
                    <input type="password" name="passWord" class="form-control" placeholder="Password" required>
                    <br>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>

            <div id="register">
                <form action="register.php" method="POST">
                    <h3>Don't have an account? Sign up!</h3>
                    <br>
                    <label for="fullname" class="sr-only">New User</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                    <br>
                    <br>
                    <label for="newusername" class="sr-only">New Username</label>
                    <input type="text" name="newusername" class="form-control" placeholder="Username" required>
                    <br>
                    <br>
                    <label for="newpssw" class="sr-only">New Password</label>
                    <input type="password" name="newpssw" class="form-control" placeholder="Password" required>
                    <br>
                    <br>
                    <label for="chkpssw" class="sr-only">Check Password</label>
                    <input type="password" name="newpssw" class="form-control" placeholder="Re-enter Password" required>
                    <br>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
