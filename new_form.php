
<?php
    include 'include/db.php';

    if(isset($_GET['edit_id'])){
        $edit_sql = "SELECT * FROM comments WHERE id = '$_GET[edit_id]'";
        $run_sql = mysqli_query($conn, $edit_sql);
        while($rows = mysqli_fetch_assoc($run_sql)){
            $name = $rows['name'];
            $email_address = $rows['email_address'];
            $subject = $rows['subject'];
            $gender = $rows['gender'];
            $country = $rows['country'];
            $comments = $rows['comments'];

            if($gender == 'male'){
                $select_tag = '<select><option value="male" selected>Male</option><option value="female">Female</option></select>';
            }else{
                $select_tag = '<select><option value="male">Male</option><option value="female" selected>Female</option></select>';
            }
        }
    } else {
            $name = '';
            $email_address = '';
            $subject = '';
            $gender = '';
            $country = '';
            $comments = '';
            $select_tag = '<select class="form-control" name="gender" required>
                <option value="">Your gender</option>
                <option value="Male">Male</option>
                <option value="female">Female</option>
                </select>
                ';
    }
?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        <script src="include/js/jquery.js"></script>

        <title>Retrieving Data From Database</title>

        <style>
            .my-fixed {
                resize: none;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <h1>Submit Form</h1>
            <form class="form-horizontal" action="form_process.php" method="post" role="form">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Name *</label>
                    <div class="col-sm-5">
                        <input type="text" id="name" class="form-control" name="name" placeholder="Full Name" value="<?php echo $name; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">E-mail *</label>
                    <div class="col-sm-5">
                        <input type="text" id="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $email_address; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject" class="control-label col-sm-2">Subject *</label>
                    <div class="col-sm-5">
                        <input type="text" id="subject" class="form-control" name="subject" placeholder="Add your subject" value="<?php echo $subject; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="control-label col-sm-2">Gender *</label>
                    <div class="col-sm-2">
                        <?php echo $select_tag; ?>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Skills</label>
                    <div class="col-sm-5">
                        <label class="checkbox-inline"><input type="checkbox" name="skill1" value="HTML">HTML</label>
                        <label class="checkbox-inline"><input type="checkbox" name="skill2" value="CSS">CSS</label>
                        <label class="checkbox-inline"><input type="checkbox" name="skill3" value="PHP">PHP</label>
                        <label class="checkbox-inline"><input type="checkbox" name="skill4" value="JAVASCRIPT">JAVASCRIPT</label>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="country" class="control-label col-sm-2">Select Your Country</label>
                    <div class="col-sm-3">
                        
                        <select class="form-control" name="country" required>
                        <option value="">Your Country</option>
                        <?php
                            $sel_countries = "SELECT * FROM apps_countries";
                            $run_sql = mysqli_query($conn, $sel_countries);
                            while($rows=mysqli_fetch_assoc($run_sql)){
                                if($country == $rows['country_code']){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }
                                echo '<option value="'.$rows['country_code'].'" '.$selected.'>'.$rows['country_name'].'</option>';
                            }
                        ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Comments</label>
                    <div class="col-sm-5">
                        <textarea class="form-control my-fixed" name="comments" rows="8"><?php echo $comments; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-default btn-block" name="submit_form" value="Submit Form">
                    </div>
                </div>

            </form>
        </div>    

    </body>

</html>