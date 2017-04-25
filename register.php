<html>
<form action="registerConfirm.php" method="POST">
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
</html>