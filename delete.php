<?php echo $_GET["id"]; 
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once "config.php";

    $sql = "DELETE FROM users WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        $param_id = trim($_GET["id"]);
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        if(mysqli_stmt_execute($stmt)){
            header("location: indexx.php");
            exit();
        } else{
            echo "Something went wrong.try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
