<?php
    include('_config/database_connect.php');

    session_start();
    
    $id = $_SESSION['user_id'];
    
    $sql = " SELECT * FROM student_data WHERE id = '$id' ";
    
    $result = mysqli_query($connect, $sql);
    
    $user = mysqli_fetch_assoc($result);

    $state1 = "";

    mysqli_free_result($result);

    
    if (isset($_POST['delete'])) {
        
        $id_manipulate = mysqli_real_escape_string($connect, $_POST['id_manipulate']);
        
        // $sql = "DELETE FROM student_data WHERE id = $id_manipulate";
        $sql = "UPDATE `student_data` SET `is_deleted` = 'true' WHERE `student_data`.`id` = $id_manipulate;";
        
        if (mysqli_query($connect, $sql)) {
            header('Location: admin_user_new.php');
        }{
            echo "Query error: " . mysqli_error($connect);
        }
        // $result = mysqli_query($connect, $sql);
    }
    
    if (isset($_POST['activate'])) {

        $id_manipulate = mysqli_real_escape_string($connect, $_POST['id_manipulate']);

        $status = htmlspecialchars($_POST['status']);

        if ($status == 'Activate') {
            $sql = "UPDATE `student_data` SET `status` = 'active' WHERE `student_data`.`id` = $id_manipulate;";
        }

        if ($status == 'Deactivate') {
            $sql = "UPDATE `student_data` SET `status` = 'inactive' WHERE `student_data`.`id` = $id_manipulate;";
        }
        
        if (mysqli_query($connect, $sql)) {
            header('Location: user_info.php');
            $state1 = ("<div class=\"green\">Your student_data has been updated 😁.</div>");
            
        }{
            echo "Query error: " . mysqli_error($connect);
        }
        // $result = mysqli_query($connect, $sql);
    }

    if (isset($_POST['edit'])) {
        
        $id_manipulate = mysqli_real_escape_string($connect, $_POST['id_manipulate']);
        
        $fname = mysqli_real_escape_string($connect, $_POST['fname']);
        
        $lname = mysqli_real_escape_string($connect, $_POST['lname']);
        
        $uname = mysqli_real_escape_string($connect, $_POST['uname']);
        
        $email = mysqli_real_escape_string($connect, $_POST['email']);

        $phonenum = mysqli_real_escape_string($connect, $_POST['phonenum']);
        
        $current_class = mysqli_real_escape_string($connect, $_POST['current_class']);

        $campus = mysqli_real_escape_string($connect, $_POST['campus']);
        
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        
        // if (empty($_POST[''])) {
        //     $errors[''] = "Please enter !";
        // }else {
            //     $ = $_POST[''];
            // }
            
        $sql = "UPDATE `student_data` SET `fname` = '$fname' , `lname` = '$lname', `uname` = '$uname', `email` = '$email', `password` = '$password' , `phonenum` = '$phonenum' , `current_class` = '$current_class' , `campus` = '$campus' WHERE `student_data`.`id` = $id_manipulate;";
        
        if (mysqli_query($connect, $sql)) {
            header('Location: user_info.php');
            $state1 =  ("<div class=\"green\">Your student_data has been updated 😁.</div>");
        }{
            echo "Query error: " . mysqli_error($connect);
        }
        // $result = mysqli_query($connect, $sql);
    }
    mysqli_close($connect);
    
    // print_r($user);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel='stylesheet' href='_files/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <title><?php echo htmlspecialchars($user['fname']) . "'s information";?></title>
        <style>
            body {
                background-color: #E8F6F3;
            }

            .main {
                margin-left: 20vw;
                margin-right: 20vw;
                padding: 20px;
                /* width: 30vw; */
                border-radius: 2%;
                background-color: #F0FAF8;
            }
            
            .green{
                opacity: .8;
                margin: 2rem;
                color: #ffffff;
                padding: 1.5rem;
                font-size: 1.2rem;
                border-radius: 1.5%;
                text-align: center;
                border: transparent 1px solid;
            }

            .edit{
                display: none;
            }

            .flex1 {
                margin: 10px;
                padding: 20px;
                border-radius: 2%;
                background-color: #F0FAF8;
                min-width: calc(25vw - 20px);
            }
            
            .flex1:hover{
                cursor: pointer;
                transition: ease-in-out .3s;
                box-shadow: 0px 2px 10px;
            }

            @media screen and (max-width: 768px) {
                body{
                    font-size: 1rem;
                }
                .main {
                    margin-left: 3vw;
                    margin-right: 3vw;
                    padding: 20px;
                    height: fit-content;
                    /* width: 30vw; */
                    border-radius: 2%;
                    background-color: #F0FAF8;
                }
            }
        </style>
    </head>

    <body>
        <span class="text-start"><a class="nav-link text-secondary " href="admin_user_new.php">Go Back</a></span>
        <section class="justify-content-center text-center main mx-6">
            <?php echo($state1)?>
            <div class="text-center justify-content-center">

                <form action="user_info.php" method="POST" class="text-center">
                    <?php if ($user) {?>
                        <h2><?php echo htmlspecialchars($user['status']);?> user</h2>
                        
                        <p>Lastname : <?php echo htmlspecialchars($user['lname']);?></p>
                        <label for="lname" class="edit">Edit Lastname : </label>
                        <input type="text" id="lname" name="lname" class="edit form-control w-100" value="<?php echo htmlspecialchars($user['lname']);?>">

                        <p>Firstname : <?php echo htmlspecialchars($user['fname']);?></p>
                        <label for="fname" class="edit">Edit Firstname : </label>
                        <input type="text" id="fname" name="fname" class="edit form-control w-100" value="<?php echo htmlspecialchars($user['fname']);?>">
                        
                        <p>Username : <?php echo htmlspecialchars($user['uname']);?></p>
                        <label for="uname" class="edit">Edit Username : </label>
                        <input type="text" id="uname" name="uname" class="edit form-control w-100" value="<?php echo htmlspecialchars($user['uname']);?>">

                        <p>Phone Number : <?php echo htmlspecialchars($user['phonenum']);?></p>
                        <label for="phonenum" class="edit">Edit Phone Number : </label>
                        <input type="text" id="phonenum" name="phonenum" class="edit form-control w-100" value="<?php echo htmlspecialchars($user['phonenum']);?>">
                        
                        <p>Email : <?php echo htmlspecialchars($user['email']);?></p>
                        <label for="email" class="edit">Edit Email : </label>
                        <input type="email" id="email" name="email" class="edit form-control w-100" value="<?php echo htmlspecialchars($user['email']);?>">
                        
                        <p>Current class : <?php echo htmlspecialchars($user['current_class']);?></p>
                        <label for="current_class" class="edit">Edit current class : </label>
                        <select name="current_class" class="browser-default edit form-control">
                            <option value="">Current class :</option>
                            <option value="Junior Secondary Class 1">Junior Secondary Class 1</option>
                            <option value="Junior Secondary Class 2">Junior Secondary Class 2</option>
                            <option value="Junior Secondary Class 3">Junior Secondary Class 3</option>
                            <option value="Senior Secondary Class 1">Senior Secondary Class 1</option>
                            <option value="Senior Secondary Class 2">Senior Secondary Class 2</option>
                            <option value="Senior Secondary Class 3">Senior Secondary Class 3</option>
                        </select>
                        
                        <p>Campus : <?php echo htmlspecialchars($user['campus']);?></p>
                        <label for="campus" class="edit">Edit campus : </label>
                        <select name="campus" class="browser-default edit form-control">
                            <option value="">Campus :</option>
                            <option value="Aba">Aba</option>
                            <option value="Abeokuta">Abeokuta</option>
                            <option value="Ibadan">Ibadan</option>
                            <option value="Lagos">Lagos</option>
                        </select>

                        <p>Password : <?php echo htmlspecialchars($user['password']);?></p>
                        <label for="password" class="edit">Edit Password : </label>
                        <input type="password" id="password" name="password" class="edit form-control w-100 mb-2" value="<?php echo htmlspecialchars($user['password']);?>">

                        <p><?php echo 'Joined on : ' . htmlspecialchars($user['datejoined']) .' at ' . htmlspecialchars($user['timejoined']);?></p>

                        <?php
                            // $delete_status
                            if ($user['is_deleted'] == 'true' && $user['status'] == 'active') {

                                echo "<h6 class=\"bg-warning text-white\">" . htmlspecialchars($user['status']) . " but deleted </h6>'";
                                
                            }else if ($user['is_deleted'] == 'true' && $user['status'] == 'inactive') {
                                
                                echo "<h6 class=\"bg-danger text-white\">" . htmlspecialchars($user['status']) . " and deleted </h6>'";
                                
                            }else if ($user['is_deleted'] == 'false' && $user['status'] == 'inactive') {
                                
                                echo "<h6 class=\"bg-warning text-white\">" . htmlspecialchars($user['status']) . " but running </h6>'";
                                
                            }else if ($user['is_deleted'] == 'false' && $user['status'] == 'active') {
                                
                                echo "<h6 class=\"bg-success text-white\">" . htmlspecialchars($user['status']) . " and running </h6>'";

                            }else{

                                $delete_status = "False account";

                            }
                        ?>
                        <!-- <?php  #echo htmlspecialchars($delete_status) ?> -->
                            <!-- <h6 class="bg-danger text-white"><?php echo htmlspecialchars($user['status'] . $user['is_deleted']);?></h6> -->
                        <input type="hidden" name="id_manipulate" value=<?php echo $user['id'];?>>
                        
                        <?php 
                            if ($user['status'] == 'active') {
                                $status = 'Deactivate';
                            }
                            else {
                                $status = 'Activate';
                            }
                            ?>
                        <input type="hidden" name="status" value="<?php echo $status;?>">

                        <input type="submit" name="edit" value="Confirm Edit" class="edit w-100 btn btn-secondary">
                        
                        <input type="submit" name="activate" value="<?php echo $status?>" class="btn btn-dark mt-2">
                        
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger mt-2">

                    <?php } ?>
                    </form>
                    <button type="button" class="btn btn-success mt-2 w-50" onclick="edit()">Edit</button>
            </div>
        </section>    
        <script>
            function edit() {
                var edit = document.getElementsByClassName("edit");
                edit[0].style.display="block";
                edit[1].style.display="block";
                edit[2].style.display="block";
                edit[3].style.display="block";
                edit[4].style.display="block";
                edit[5].style.display="block";
                edit[6].style.display="block";
                edit[7].style.display="block";
                edit[8].style.display="block";
                edit[9].style.display="block";
                edit[10].style.display="block";
                edit[11].style.display="block";
                edit[12].style.display="block";
                edit[13].style.display="block";
                edit[14].style.display="block";
                edit[15].style.display="block";
                edit[16].style.display="block";

                var p = document.getElementsByTagName("p");
                p[0].style.display="none";
                p[1].style.display="none";
                p[2].style.display="none";
                p[3].style.display="none";
                p[4].style.display="none";
                p[5].style.display="none";
                p[6].style.display="none";
                p[7].style.display="none";
                p[8].style.display="none";
                p[9].style.display="none";
                p[10].style.display="none";
                p[11].style.display="none";
                p[12].style.display="none";
                p[13].style.display="none";
                p[14].style.display="none";
            }
        </script>
    </body>
    <?php include('_templates/end.php'); ?>
</html>