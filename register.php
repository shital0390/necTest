<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>User Registration</title>
</head>
<body>
    <!-- <h2>Register</h2>
    <form action="register_process.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit" name="register">Register</button>
    </form> -->

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Register</h2>
            <form action="register_process.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <br/>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
           
            <a href="index.php" class="btn btn-secondary mt-3">Go to Homepage</a>
           
        </div>
    </div>
</div>

</body>
</html>