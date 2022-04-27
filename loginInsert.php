<?php
 if(!isset($_SESSION)){
 	session_start();
 }
 $_SESSION["logged"] = true;

 if ($_SESSION['logged'] == true) {
 
    header('location: indexx.php');
 	exit();
}
require_once "config.php";
 
$email = $password = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(!empty(trim($_POST["email"]))){
		$email = trim($_POST["email"]);
    }
    
    if(!empty(trim($_POST["password"]))){
    	$password = trim($_POST["password"]);
    }

    $sql = "SELECT id, email, password FROM register WHERE email = ?";

    if($stmt = mysqli_prepare($link, $sql)){

        $param_email = $email;
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){

                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_pass);
                
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_pass)){

                        $_SESSION["logged"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;                            
                      
                        header("location: indexx.php");
                    }
                }
            }
        } else{
            echo "Something wrong. Please try again.";
        }
        mysqli_stmt_close($stmt);
    }
   /* if (mysqli_query($link, $sql)) {
        header("location: indexx.php");
            exit();
        } else{
            echo "something wrong";
        }*/
    
    mysqli_close($link);
}
?>