<?php
    include('_config/database_connect.php');
    $fname = $lname = $uname = $password = $email  = $form = '';

    $errors = array('uname' => '', 'password' => '');

    if(isset($_POST['submit'])){
        session_start();

        // To check if the username field is empty
        if (empty($_POST['uname'])) {
            $errors['uname'] = "Please enter your Username!";
        }else {
            $uname = $_POST['uname'];
        }

        // To check if the password field is empty
        if (empty($_POST['password'])) {
            $errors['password'] = "Please enter your Password!";
        }else {
            $password = $_POST['password'];
        }

        // If there are items in the above errors array
        if (array_filter($errors)) {
            $sql = 'SELECT * FROM info';

            $result = mysqli_query($connect, $sql);
            
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);
            
            $errors = array('uname' => '', 'password' => '');
        }else{
            $uname = mysqli_real_escape_string($connect, $_POST['uname']);

            $password = mysqli_real_escape_string($connect, $_POST['password']);

            $sql = "SELECT * FROM info WHERE uname = '$uname' and password = '$password'";

            $result = mysqli_query($connect, $sql);

            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
            $count = mysqli_num_rows($result);

            foreach ($users as $user) {
                if ($count >= 1) {
                    $_SESSION['id'] = $user['id'];
                    $id = $user ['id'];
                    echo "You have been successfully logged in";
                    header("Location: user.php");
                } 
            }
            if (!$count == 1) {
                echo "<div class=\"red-text p-2 center grey-text fs-3\"><h5> Sorry, it looks like you, <code class=\"red-text\">\"" . $_POST ['uname'] . "\"</code> don't have an account with us or you have supplied a wrong password</h5></div>";
            }
            mysqli_free_result($result);
        
            mysqli_close($connect);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("_templates/start.php"); ?>
    <link rel="stylesheet" href="_files/Materialize/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <title>Sign in</title>

</head>

<body>
    <section class="container grey-text">
        <h3 class="center"><b>Login portal!</b></h3>
        <h6 class="center"><a href="index.php" class="grey-text">Go Back</a></h6>
        <form action="sign_in.php" method="POST" class="white width-50">
            <div class="center">
                <img src="_files/images/dlhs1.jpg" alt="" height="150rem">
            </div><br>

            <label>
                <h6>User-name </h6>
            </label>
            <input value="<?php echo $uname; ?>" type="text" name="uname" id="uname">
            <?php echo '<div class="text-danger">' . $errors['uname'] . ' <br> </div>';?>

            <label>
                <h6>Password </h6>
            </label>
            <input value="" type="password" name="password" id="password">
            <?php echo '<div class="text-danger">' . $errors['password'] . ' <br> </div>';?>


            <?php if ((array_filter($errors))) :?>
            <?php echo '<div class="text-center text-danger">There are errors in the form</div>';?>
            <?php endif?>
            <input type="submit" name="submit" value="Submit" class="btn btn-secondary" class="material-icons right">
            </div>
        </form>
        <?php include("_templates/end.php"); ?>
    </section>
</body>

</html>