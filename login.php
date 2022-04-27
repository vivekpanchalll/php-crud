<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
                    <h2 class="mt-5">login</h2>
                    <form action="loginInsert.php" name="login" method="post">
		            <div class="form-group">
		                <label>email</label>
		                <input type="text" name="email" class="form-control">
		                
		            </div>    
		            <div class="form-group">
		                <label>Password</label>
		                <input type="password" name="password" class="form-control">
		              
		            </div>
		            <div class="form-group">
		                <input type="submit" class="btn btn-primary" value="Login">
		            </div>
		            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
		        </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

