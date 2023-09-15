<?php

    include('_config/database_connect.php');

    $sql = 'SELECT * FROM info';

    $result = mysqli_query($connect, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $fname = $lname = $uname = $password = $email  = $form = $phonenum = '';

    $errors = array('fname' => '', 'lname' => '', 'uname' => '', 'password' => '' ,'email' => '','phonenum' => '' );

    if(isset($_POST['submit'])){
        session_start();

        // To check if the username field is empty
        if (empty($_POST['fname'])) {
            $errors['fname'] = "Please enter your Firstname!";
        }else {
            $fname = $_POST['fname'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $fname)) {
                $errors['fname'] = "Only letters and spaces please!";
            }
        }

        // To check if the lastname field is empty
        if (empty($_POST['lname'])) {
            $errors['lname'] = "Please enter your Lastname!";
        }else {
            $lname = $_POST['lname'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $lname)) {
                $errors['lname'] = "Only letters and spaces please!";
            }
        }

        // To check if the username field is empty
        if (empty($_POST['uname'])) {
            $errors['uname'] = "Please enter your desired Username!";
        }else {
            $uname = $_POST['uname'];
        }

        // To check if the password field is empty
        if (empty($_POST['password'])) {
        $errors['password'] = "Please enter your Password!";
        }else {
            $password = $_POST['password'];
            if (!preg_match('/^[A-Z\a-z]+$/', $password)) {
                $errors['password'] = "Only letters and spaces please!";
            }
        }

        // To check if the email field is empty
        if (empty($_POST['email'])) {
            $errors['email'] = "Please enter your E-mail address!";
        }else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Please provide a valid E-mail address!";
            }
        }
        if (empty($_POST['phonenum'])) {
            $errors['phonenum'] = "Please enter your phone number!";
        }else {
            $phonenum = $_POST['phonenum'];
            if (!filter_var($email)) {
                $errors['phonenum'] = "Please provide a valid phine number!";
            }
        }
        // if (empty($_POST['dp'])) {
        //     $errors['dp'] = "Please supply a display picture!";
        // }else {
        //     $errors['email'] = "Please provide a valid E-mail address!";
        // }

        if (array_filter($errors)) {
        
        }else{
            $fname = mysqli_real_escape_string($connect, $_POST['fname']);
            $lname = mysqli_real_escape_string($connect, $_POST['lname']);
            $uname = mysqli_real_escape_string($connect, $_POST['uname']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $phonenum = mysqli_real_escape_string($connect, $_POST['phonenum']);

            $sql = "INSERT INTO info(fname, lname, uname, password, email, phonenum) VALUES('$fname', '$lname', '$uname','$password', '$email', '$phonenum')";

            if (mysqli_query($connect, $sql)) {
                $uname = mysqli_real_escape_string($connect, $_POST['uname']);
                $password = mysqli_real_escape_string($connect, $_POST['password']);
    
                $sql = "SELECT * FROM info WHERE uname = '$uname' and password = '$password'";
    
                $result = mysqli_query($connect, $sql);
    
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
                foreach ($users as $user) {
                    $id = $user ['id'];
                    if ($user) {
                        $_SESSION['id'] = $user['id'];
                        $id = $user ['id'];
                        header("Location: user.php");
                    }else {
                        echo "Sorry, it looks like you don't have an account with us";
                    }    
                }
                mysqli_free_result($result);
            
                mysqli_close($connect);    
            }else {
                echo "Query error : " . mysqli_error($connect);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("_templates/start.php"); ?>
    <link rel="stylesheet" href="_files/Materialize/css/materialize.min.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <title>Sign up</title>
</head>

<body class="bg-light">
    <section class="container grey-text">
        <h3 class="center"><b>Create your tuckshop account!</b></h3>
        <h6 class="center"><a href="index.php" class="grey-text">Go Back</a></h6><br>
        <form action="sign_up.php" method="POST" class="white width-50">
            <div class="center">
                <img src="_files/images/dlhs1.jpg" alt="" height="150rem">
            </div>
                <label for="First name"><h6>First-name</h6></label>
                <input value="<?php echo $fname; ?>" type="text" name="fname" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['fname'] . ' <br> </div>';?>

                <label for="Last name"><h6>Last-name</h6></label>
                <input value="<?php echo $lname; ?>" type="text" name="lname" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['lname'] . ' <br> </div>';?>

                <label for="User-name"><h6>User-name</h6></label>
                <input value="<?php echo $uname; ?>" type="text" name="uname" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['uname'] . ' <br> </div>';?>

                <label for="password"><h6>Password</h6></label>
                <input value="<?php echo $password; ?>" type="password" name="password" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['password'] . ' <br> </div>';?>

                <label for="email"><h6>E-mail</h6></label>
                <input value="<?php echo $email; ?>" type="email" name="email" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['email'] . ' <br> </div>';?>

                <label for="phonenum"><h6>Phone Number</h6></label>
                <input value="<?php echo $phonenum; ?>" type="number" name="phonenum" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['phonenum'] . ' <br> </div>';?>

                <?php if ((array_filter($errors))) :?>
                <?php echo '<div class="text-center red-text">There are errors in the form</div>';?>
                <?php endif?>
                <input type="submit" name="submit" value="Submit" class="btn btn-secondary"><br><br><br><br>
        </form>
        <?php include ('_templates/end.php');?>
    </section>
</body>

</html>