
<?php
    include 'include/db.php';

    //// DELETE ROWS //////
    if(isset($_GET['del_id'])){
        $del_sql = "DELETE FROM comments WHERE id = '$_GET[del_id]'";
        $run_sql = mysqli_query($conn, $del_sql);
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <title>Retrieving Data From Database</title>

    </head>

    <body>
    <div class="container">
        <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>gender</th>
                    <th>Country</th>
                    <th>Access</th>
                    <th>Delete</th>
                </thead>
            
            <tbody>
            <?php 
                $sql = "SELECT * FROM comments";
                $run_sql = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_array($run_sql)){
                    echo '
                        <tr>
                            <td>'.$rows['id'].'</td>
                            <td>'.$rows['name'].'</td>
                            <td>'.$rows['email_address'].'</td>
                            <td>'.$rows['gender'].'</td>';
                            $sel_country = "SELECT * FROM apps_countries WHERE country_code = '$rows[country]'";
                            $run_country = mysqli_query($conn, $sel_country);
                            while($c_rows = mysqli_fetch_assoc($run_country)){
                                echo '<td>'.$c_rows['country_name'].'</td>';
                            }
                    echo '
                            <td><a class="btn btn-info" href="detail.php?user_id='.$rows['id'].'">Access</a></td>
                            <td><a class="btn btn-danger" href="index.php?del_id='.$rows['id'].'">Delete</a></td>
                        </tr>
                    ';
                }
            ?>
            </tbody>
            </table>
    </div>

    </body>

</html>
