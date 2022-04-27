<?php
require_once "config.php";
$link = mysqli_connect('localhost', 'root','','user');
$name = $address = $mobile = $name_err = $address_err = $mobile_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_name = trim($_POST["name"]);
    if(empty($input_name) || !preg_match ("/^[a-zA-z]*$/", $input_name)){
        $name_err = "cant be blank and only alphabets and whitespace are allowed";
    }else{
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    $input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile) || !preg_match ("/^[0-9]*$/", $input_mobile)){
        $mobile_err = "Please enter the mobile no.";     
    } else{
        $mobile = $input_mobile;
    }

   
    
    if(empty($name_err) && empty($address_err) && empty($mobile_err)){

        $query = "INSERT INTO `users` (`name`,`address`,`mobile`) VALUES ('$input_name','$input_address','$input_mobile')";

        if (mysqli_query($link, $query)) { 
            header("location: indexx.php");
                exit();
            } else{
                echo "something wrong ! try again laterr.";
            }
        }
    }
    mysqli_close($link);

?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <style>
        .error {color: #FF0001;}  
    </style>
    <script type="text/javascript">
    </script>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create User</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" method="post" novalidate>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                            <div class="valid-feedback">Looks good!</div>
                            <span class="error" ><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="error"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
                            <span class="error" ><?php echo $mobile_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexx.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>