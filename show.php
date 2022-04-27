<?php

if(isset($_GET["id"])){
    require_once "config.php";
    $sql = "SELECT * FROM users WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){

        $param_id = trim($_GET["id"]);

        mysqli_stmt_bind_param($stmt, "i", $param_id);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $name = $row["name"];
                $address = $row["address"];
                $mobile = $row["mobile"];
            }
            
        } else{
            echo "sometihng wrong";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View list</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row card bg-light text-dark">
                <div class="col-md-12 alert alert-darker">
                    <h1 class="mt-3 mb-3 card-header">View record</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $row["address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <p><b><?php echo $row["mobile"]; ?></b></p>
                    </div>
                    <p><a href="indexx.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

<table class="table table-striped table-hover">
  ...
</table>
