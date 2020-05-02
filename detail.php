
<?php
    include 'include/db.php';
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
        

        <?php
            if(isset($_GET['user_id'])){
                $sql = "SELECT * FROM comments WHERE id = '$_GET[user_id]'";
                $run = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($run)){
                    echo '

                    <div class="jumbotron">
                        <h2>User Details</h2>
                        <p>Detail user information here: </p>
                        <a href="new_form.php?edit_id='.$rows['id'].'" class="btn btn-warning">Edit '.$rows['name'].'</a>
                    </div>
            
                    <div class="row">
                        <strong class="col-sm-3">Name:</strong>
                        <div class="col-sm-3">'.$rows['name'].'</div>
                    </div>
                    <div class="row">
                        <strong class="col-sm-3">E-mail Address:</strong>
                        <div class="col-sm-3">'.$rows['email_address'].'</div>
                    </div>
                    <div class="row">
                        <strong class="col-sm-3">Subject:</strong>
                        <div class="col-sm-3">'.$rows['subject'].'</div>
                    </div>
                    <div class="row">
                        <strong class="col-sm-3">Gender:</strong>
                        <div class="col-sm-3">'.$rows['gender'].'</div>
                    </div>
                    <div class="row">
                        <strong class="col-sm-3">Skills:</strong>
                        <div class="col-sm-3">'.$rows['skill1'].'</div>
                    </div>
                    ';
                    $sel_country = "SELECT * FROM apps_countries WHERE country_code = '$rows[country]' ";
                    $run_sql = mysqli_query($conn, $sel_country);
                    while($c_rows = mysqli_fetch_assoc($run_sql)){
                        echo '<div class="row">
                            <strong class="col-sm-3">Country:</strong>
                            <div class="col-sm-3">'.$c_rows['country_name'].'</div>
                        </div>
                        ';
                    }
                    

                    echo '
                    
                    <div class="row">
                        <strong class="col-sm-3">Comments:</strong>
                        <div class="col-sm-3">'.$rows['comments'].'</div>
                    </div>
                    ';
                }
            }
        ?>
     
    </div>

    </body>

</html>