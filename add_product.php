<?php
    include('_config/database_connect.php');

    $sql = 'SELECT * FROM items';

    $result = mysqli_query($connect, $sql);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $product_category=  $product_name  = $product_price = '';

    $errors = array( 'product_category' => '', 'product_name' => '', 'product_price' => '');

    if(isset($_POST['submit']) && isset($_FILES['product_image'])){
        session_start();

        if (empty($_POST['product_category'])) {
            $errors['product_category'] = "Please enter this product's category!";
        }else {
            $product_category = $_POST['product_category'];
            // if (!preg_match('/^[a-zA-Z\s]+$/', $product_price)) {
            //     $errors['product_name'] = "Only letters and spaces please!";
            // }
        }

        // To check if the product name field is empty
        if (empty($_POST['product_name'])) {
            $errors['product_name'] = "Please enter this product's name!";
        }else {
            $product_name = $_POST['product_name'];
            // if (!preg_match('/^[a-zA-Z\s]+$/', $product_name)) {
            //     $errors['product_name'] = "Only letters and spaces please!";
            // }
        }

        if (empty($_POST['product_price'])) {
            $errors['product_price'] = "Please enter this product's price";
        }else {
            $product_price = $_POST['product_price'];
            // if (!preg_match('/^[a-zA-Z\s]+$/', $product_price)) {
            //     $errors['product_name'] = "Only letters and spaces please!";
            // }
        }

        // if (empty($_POST['product_image'])) {
        //     $errors['product_image'] = "Please supply an image of this product!";
        // }else {
        //     $product_image = $_POST['product_image'];
        //     // if (!preg_match('/^[a-zA-Z\s]+$/', $product_price)) {
        //     //     $errors['product_name'] = "Only letters and spaces please!";
        //     // }
        // }


        if (array_filter($errors)) {
        
        }else{
            $product_category = mysqli_real_escape_string($connect, $_POST['product_category']);
            $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
            $product_price = mysqli_real_escape_string($connect, $_POST['product_price']);
            // $product_image = ($connect, $_POST['product_image']);

            $sql = "INSERT INTO items(product_category, product_name, product_price) VALUES('$product_category', '$product_name', '$product_price')";

            if (mysqli_query($connect, $sql)) {
                $product_category = mysqli_real_escape_string($connect, $_POST['product_category']);
                $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    
                $sql = "SELECT * FROM items WHERE product_category = '$product_category' and product_category = '$product_category'";
    
                $result = mysqli_query($connect, $sql);
    
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
                foreach ($products as $product) {
                    $id = $product ['product_category'];
                    if ($product) {
                        $_SESSION['id'] = $product['id'];
                        $id = $product ['id'];
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
        <h3 class="center"><b>Add new product!</b></h3>
        <h6 class="center"><a href="admin_user.php" class="grey-text">Go Back</a></h6><br>
        <form action="add_product.php" method="POST" class="white width-50" enctype="multipart/from-data">
            <div class="center">
                <img src="_files/images/dlhs1.jpg" alt="" height="150rem">
            </div>
                <label for=""><h6>Product category</h6></label>
                <input value="<?php echo $product_category; ?>" type="text" name="product_category" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['product_category'] . ' <br> </div>';?>

                <label for=""><h6>Product name</h6></label>
                <input value="<?php echo $product_name; ?>" type="text" name="product_name" value="" class="w-100 form-control">
                <?php echo '<div class="red-text">' . $errors['product_name'] . ' <br> </div>';?>

                <label for=""><h6>Product price</h6></label>
                <input value="<?php echo $product_price; ?>" type="text" name="product_price" value="" class="">
                <?php echo '<div class="red-text">' . $errors['product_price'] . ' <br> </div>';?>

                <label for=""><h6>Product Image</h6></label>
                <input value="<?php echo $product_image; ?>" type="file" name="product_image" value="" class="">
                <?php echo '<div class="red-text">' . $errors['product_price'] . ' <br> </div>';?>

                <?php if ((array_filter($errors))) :?>
                <?php echo '<div class="text-center red-text">There are errors in the form</div>';?>
                <?php endif?>
                <input type="submit" name="submit" value="Submit" class="btn btn-secondary"><br><br><br><br>
        </form>
        <?php include ('_templates/end.php');?>
    </section>
</body>

</html>