<?php 
    session_start();

    $_SESSION['logged'] == false ? header("location:login.php") :"" ;

    if (!isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                buttons:[
                    {
                        extend: 'searchBuilder',
                        config: {
                            depthLimit: 2
                        }
                    }
                ],
                dom: 'Bfrtip',
            });
        } );

        function chkDelete(){
            return confirm('are u want to delete ?' );
        }
    </script>
    <style>
    </style>
</head>
<body>
 
<div class="jumbotron jumbotron-fluid vh-100"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">User Details</h2>
                    <a href = "create.php" class = "btn btn-success pull-right">Add User</a>
                    <a href = "logout.php" name = "logout" class="btn btn-primary mr-2 pull-right"><i class="fa fa-sign-out" aria-hidden="true">Sign out</i></a>
                </div>
                <?php
                require_once "config.php";

                $sql = "SELECT * FROM users";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                      //  echo '<table class="table table-bordered table-striped">';
                        echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>No</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Address</th>";
                                    echo "<th>Mobile</th>";
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['mobile'] . "</td>";
                                    echo "<td>";
                                        echo '<a href="show.php?id='. $row['id'] .'" class="mr-3" title="View Record"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record"><span class="fa fa-pencil"></span></a>';
                                    
                                        echo '<a href="delete.php?id='. $row['id'] .'" onclick = "chkDelete()" title="Delete Record"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="alert alert-danger"><em>No records found.</em></div>';
                    }
                } else{
                    echo "Please try again later.";
                }

                mysqli_close($link);
                ?>
            </div>
        </div>        
    </div>
</div>
   
</body>
</html>