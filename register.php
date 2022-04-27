<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="validation.js"></script>
    <style>  
    </style>
</head>
<body>
    <div class="jumbotron jumbotron-fluid vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mt-5">Signup</h2>
                    <form action="regInsert.php" name = "register"  method="post">
                        <div class="form-group">
                            <label>name</label>
                            <input type="text" name="name" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" class="form-control">
                        </div>     
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        </div>
                        <div class="form-group">
                            <span>If already user ? <a href="login.php">login here</a></span>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

