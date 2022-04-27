<?php
require_once "config.php";
 
$name = $address = $mobile = $name_err = $address_err = $mobile_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
	$id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

    $input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile)){
        $mobile_err = "Please enter the mobile.";     
    }else{
        $mobile = $input_mobile;
    }

    if(empty($name_err) && empty($address_err) && empty($mobile_err)){
    	$sql = "UPDATE users SET name=?, address=?, mobile=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_add, $param_mobile, $param_id);

            $param_name = $name;
            $param_add = $address;
            $param_mobile = $mobile;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                header("location: indexx.php");
                exit();
            } else{
                echo "try again ,there is problem";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["name"];
                    $address = $row["address"];
                    $mobile = $row["mobile"];
                } else{
                    echo "there is something went";
                }
                
            } else{
                echo "try again later.";
            }
        }
 
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .error {color: #FF0001;}  
    </style>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <h2 class="mt-5">Update Record</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control " value="<?php echo $name; ?>">
                            <span class="error"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="error"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
                            <span class="error"><?php echo $mobile_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexx.php" class="btn btn-secondary ">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>