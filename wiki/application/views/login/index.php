<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="container-fluid">


    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="Absolute-Center is-Responsive">

                    <h2>Login to Book Store and Stuff </h2>
                    <p>Please enter your account details.</p>
                    <div class="form-group">
                        <label for="email_address">Email</label>
                        <input type="email" id="email_address" class="form-control" name="email_address" required>
                    </div>

                    <div class="form-group row">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group row">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        <input type="checkbox" checked="checked"> Remember me
                        <input type="checkbox" name="adminCheckBox" value="yes"> Have an Admin Account?
                    </div>
                    <span class="registerAccount"><a href="./register.php">Register an account?</a> </span>
    </form>
</div>
</body>
</html>