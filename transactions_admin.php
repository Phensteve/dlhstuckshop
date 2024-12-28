<?php
    include ('_config/database_connect.php');

    session_start();

    if ($_SESSION['admin_id']) {
        $admin_id = $_SESSION['admin_id'];
    
        $sql_admin = "SELECT * FROM admin WHERE id = '$admin_id'";
    
        $result_admin = mysqli_query($connect, $sql_admin);
    
        $admin_user = mysqli_fetch_assoc($result_admin);
    }else{
        $_SESSION['was_redirected'] = '1';
        header("Location: ./index.php");
    }
?>

<?php
    $transaction_history_sql = "SELECT * FROM transaction_history" ;

    $result_transaction_history = mysqli_query($connect, $transaction_history_sql);

    $transaction_history = mysqli_fetch_all($result_transaction_history, MYSQLI_ASSOC);

    // foreach ($transaction_history as $transaction){
        
    $user_orders_sql = "SELECT * FROM user_orders" ;
    
    $result_user_orders = mysqli_query($connect,$user_orders_sql);
    
    $user_orders = mysqli_fetch_all($result_user_orders, MYSQLI_ASSOC);
    
    // foreach ($user_orders as $user_order){

        // $user_order_id = $user_order['order_id'];
        
        $order_items_sql = "SELECT * FROM order_items" ;
    
        $result_order_items = mysqli_query($connect, $order_items_sql);
    
        $order_items = mysqli_fetch_all($result_order_items, MYSQLI_ASSOC);

        // foreach ($order_items as $order_item){
            // $product_id = $order_item['product_id'];

            $product_sql = "SELECT * FROM items" ;
        
            $products_result = mysqli_query($connect, $product_sql);
        
            $products = mysqli_fetch_all($products_result, MYSQLI_ASSOC);
        // }
    // }

    // }

?>
<?php

if (isset($_POST['approve'])) {
        
    $transaction_toApprove_id = mysqli_real_escape_string($connect, $_POST['transaction_toApprove_id']);
    
    // if (empty($_POST[''])) {
    //     $errors[''] = "Please enter !";
    // }else {
        //     $ = $_POST[''];
        // }
        
    $sql = "UPDATE `transaction_history` SET `transaction_status` = 'Approved' WHERE `transaction_history`.`order_id` = $transaction_toApprove_id;";
    
    if (mysqli_query($connect, $sql)) {
        $sql_user = "UPDATE `user_orders` SET `transaction_status` = 'Approved' WHERE `user_orders`.`order_id` = $transaction_toApprove_id;";
        if (mysqli_query($connect, $sql_user)) {
            header('Location: transactions_admin.php');
            $state1 =  ("<div class=\"green\">Transaction has been approved 😁.</div>");
        }else{
            $state1 =  ("<div class=\"red\">.</div>");
        }
    }{
        echo "Query error: " . mysqli_error($connect);
    }
    // $result = mysqli_query($connect, $sql);
}
if (isset($_POST['cancel'])) {
        
    $transaction_toApprove_id = mysqli_real_escape_string($connect, $_POST['transaction_toApprove_id']);
    
    // if (empty($_POST[''])) {
    //     $errors[''] = "Please enter !";
    // }else {
        //     $ = $_POST[''];
        // }
        
    $sql = "UPDATE `transaction_history` SET `transaction_status` = 'Cancelled' WHERE `transaction_history`.`order_id` = $transaction_toApprove_id;";
    
    if (mysqli_query($connect, $sql)) {
        $sql_user = "UPDATE `user_orders` SET `transaction_status` = 'Cancelled' WHERE `user_orders`.`order_id` = $transaction_toApprove_id;";
        if (mysqli_query($connect, $sql_user)) {
            header('Location: transactions_admin.php');
            $state1 =  ("<div class=\"green\">Transaction has been cancelled 😁.</div>");
        }else{
            $state1 =  ("<div class=\"red\">.</div>");
        }
    }{
        echo "Query error: " . mysqli_error($connect);
    }
    // $result = mysqli_query($connect, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transactions</title>
    <?php include('_templates/start.php'); ?>
    <link rel='stylesheet' href='_files/bootstrap-5.0.2-dist/css/bootstrap.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <style>
        #log{
            border:none;
            background-color: transparent;
        }
        body {
            background-color: #E8F6F3;
            overflow-x: hidden;
        }
        
        header {
            background-color: #00b894;
        }

        main {
            background-color: #E8F6F3;
        }
        
        
        .side_nav {
            background-color: #00b894;
        }

        .nav_bar {
            background-color: #55efc4;
            padding: .75vw;
            width: 85vw !important;
            right: 0 !important;
        }


        .link2, nav-link {
            color: #ffffff;
            width: 100%;
        }

        .link1 {
            color: #808080;
        }

        .user {
            border: none;
            background-color: transparent;
        }

        .table_con {
            background-color: #E8F6FF;
        }
        @media (max-width: 1024px) {
            body {
                /* overflow-x: scroll; */
                overflow-x: hidden;
            }
            .table_con {
                width: 100vw !important;
                background-color: #E8F6FF;
                overflow-x: scroll;
                overflow-y: scroll;
            }

            .header {
                display: none;
            }

            .nav_bar{
                width: 100vw !important;
                display: grid;
                /* justify-content: space-evenly; */
                grid-template-columns: 2fr 2fr 2fr;
                /* flex-wrap: wrap; */
            }

            main {
                width: 100vw;
                display: grid !important;
                grid-template-columns: 1fr;
            }

            .nav_item {
                /* padding: .2rem !important; */
                width: 100% !important;
            }
        }
    </style>
</head>

<body class="body">
    <section class="header">
        <nav class="side_nav">
            <!-- <div class="nav">  -->
            <div class="center">
                <div class="nav_img">
                    <img src="_files/images/dlhs1.jpg" height="60rem"><br>
                    <?php echo '<h4 class="text-light">&nbsp&nbsp&nbsp' . htmlspecialchars($admin_user['uname']) ?>
                </div>
            </div>
        </nav>
    </section>

    <main class="main">
        <nav class="nav_bar text-center">
            <a href="index.php" class="link2 nav-link">
                <div class="nav_item"><span class="fa-solid fa-home">🏡</span><br><span class="d-lg-none">Home</span>
                </div>
            </a>
            
            <a href="add_product.php" class="link2 nav-link">
                <div class="nav_item"><span class="fa-solid fa-cart-shopping">🛒</span><br><span
                class="d-lg-none">Add&nbspProduct</span></div>
            </a>
            
            <a href="catalogue.php" class="link2 nav-link">
                <div class="nav_item"><span class="fa-solid fa-store">📇</span><br><span
                class="d-lg-none">Catalogue</span></div>
            </a>

            <a href="admin_user_new.php" class="link2 nav-link">
                <div class="nav_item"><span class="fa-solid fa-house-chimney-user">📈</span><br><span class="d-lg-none">Dashboard</span>
                </div>
            </a>

            <a href="" class="link2 nav-link">
                <form action="transactions_admin.php" method="post" class="nav_item">
                    <span><input type="submit" value="🪵" id="log" class="fa-solid" name="logout"></span><br><span
                    class="d-lg-none">Logout</span>
                </form>
            </a>
            </nav>

            <br>

            <section class="table_con">
                <table class="table fs-6">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Order Id</th>
                            <th>Amount spent</th>
                            <th>User Id</th>
                            <th>Item purchased</th>
                            <th>Quantity</th>
                            <th>Transaction status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaction_history as $transaction): ?>
                            <tr>
                                <!-- <td><?php echo str_pad(htmlspecialchars($transaction['transaction_id']), 7, '0', STR_PAD_LEFT); ?></td> -->

                                <td><?php echo str_pad(htmlspecialchars($transaction['order_id']), 7, '0', STR_PAD_LEFT); ?></td>

                                <td>
                                    <?php
                                    foreach ($user_orders as $user_order) {
                                        if ($user_order['order_id'] == $transaction['order_id']) {
                                            echo '₦' . htmlspecialchars($user_order['amount_spent']);
                                            // break;
                                        }
                                    }
                                    ?>
                                </td>
                                
                                <td>
                                    <?php
                                    foreach ($user_orders as $user_order) {
                                        if ($user_order['order_id'] == $transaction['order_id']) {
                                            echo '<a href="admin_user_new.php#' . htmlspecialchars($user_order['user_id']) . '">' . htmlspecialchars($user_order['user_id']) . '</a>';
                                            // break;
                                        }
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    // if (count($items_of_order) > 1) {
                                    // $items_of_order = [];
                                        echo "<ol style=\"list-style-type:lower-alpha !important;\">";
                                    // }
                                    foreach ($order_items as $order_item) {
                                        if ($order_item['order_id'] == $transaction['order_id']) {
                                            
                                            // array_unshift($items_of_order, $order_item['order_id']);
                                            
                                            for ($i=0; $i<=(count($products)-1); $i++){

                                                if ($products[$i]['product_id'] == $order_item['product_id']) {

        
                                                    // $product_list = [];
                                                    // $product_list[$i] = $products[$i]['product_name'];

                                                    // if (count($items_of_order) > 1) {
                                                    //     // echo count($items_of_order);
                                                    //     echo "<li>" . htmlspecialchars($products[$i]['product_name']) . "</li>";
                                                    // }else{
                                                        //     // echo count($items_of_order);
                                                        //     echo htmlspecialchars($products[$i]['product_name']);
                                                        // }
                                                        
                                                    echo "<li>" . htmlspecialchars($products[$i]['product_name']) . "</li>";
                                                    // break;
                                                }
                                            }
                                        }
                                    }
                                    // if (count($items_of_order) > 1) {
                                        echo "</ol>";
                                    // }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    // if (count($order_items) > 1) {
                                        echo "<ol style=\"list-style-type:none !important;\">";
                                    // }
                                    foreach ($order_items as $order_item) {
                                        if ($order_item['order_id'] == $transaction['order_id']) {
                                            // if (count($order_items) > 1) {
                                            //     echo "<li>" . htmlspecialchars($order_item['quantity_ordered']) . "</li>";
                                            // }else{
                                                //     echo htmlspecialchars($order_item['quantity_ordered']);
                                            // }
    
                                            echo "<li>" . htmlspecialchars($order_item['quantity_ordered']) . "</li>";
                                        }
                                    }
                                    // if (count($order_items) > 1) {
                                        echo "</ol>";
                                    // }
                                    ?>
                                </td>
                                <td class="stuff"><?php 
                                if ($transaction['transaction_status'] == "Approved") {
                                    echo "<span class=\"text-white bg-success\">".htmlspecialchars($transaction['transaction_status'])."</span>"; 
                                }if ($transaction['transaction_status'] == "Pending"){
                                    echo "<span class=\"text-white bg-warning\">".htmlspecialchars($transaction['transaction_status'])."</span>"; 
                                    
                                }if ($transaction['transaction_status'] == "Cancelled"){
                                    echo "<span class=\"text-white bg-danger\">".htmlspecialchars($transaction['transaction_status'])."</span>"; 

                                }
                                
                                ?></td>
                                
                                <td>
                                    
                                    <form method="POST" action="transactions_admin.php">
                                        <input type="hidden" value="<?php echo $transaction['order_id'] ?>"
                                        name="transaction_toApprove_id">
                                        <?php
                                        if ($transaction['transaction_status'] == "Approved") {
                                            echo '<input type="submit" name="cancel" id="cancel" class="btn btn-danger h6 btn-sm m-1" value="cancel">';
                                        }if ($transaction['transaction_status'] == "Pending"){
                                            echo '<input type="submit" name="approve" id="approve" class="btn btn-success h6 btn-sm m-1" value="approve">'; 
                                            echo '<input type="submit" name="cancel" id="cancel" class="btn btn-danger h6 btn-sm m-1" value="cancel">';
                                            
                                        }if ($transaction['transaction_status'] == "Cancelled"){
                                            echo '<input type="submit" name="approve" id="approve" class="btn btn-success h6 btn-sm m-1" value="approve">'; 
        
                                        }
                                        ?>
        
                                        
                                </form>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
<!-- 
        <section class="table_con">
            <table class="table fs-6">
                <tr>
                    <th>ID</th>
                    <th>Order Id</th>
                    <th>Amount spent</th>
                    <th>User Id</th>
                    <th>Item purchased</th>
                    <th>Quantity</th>
                    <th>Transaction status</th>
                </tr>
                <tbody>
                    <?php foreach ($transaction_history as $transaction ): ?>
                        <tr>
                            
                            <td><?php echo str_pad(htmlspecialchars($transaction['transaction_id']),7,'0',STR_PAD_LEFT); ?></td>
                                
                                <td><?php echo str_pad(htmlspecialchars($transaction['order_id']),7,'0',STR_PAD_LEFT); ?></td>
                            
                                <td><?php foreach ($user_orders as $user_order): ?>
                            ₦<?php echo htmlspecialchars($user_order['amount_spent']); ?><?php endforeach ?></td>
                            
                            <td><?php foreach ($user_orders as $user_order): ?><a href="<?php echo ('admin_user_new.php#' . htmlspecialchars($user_order['user_id']) . '_' . htmlspecialchars($user_order['user_id']));?>"><?php echo htmlspecialchars($user_order['user_id']); ?></a><?php endforeach ?></td>
                            
                            <td><?php foreach ($products as $product): ?><?php echo htmlspecialchars($product['product_name']); ?><?php endforeach ?></td>
                            
                            <td><?php foreach ($order_items as $order_item): ?><?php echo htmlspecialchars($order_item['quantity_ordered']); ?><?php endforeach ?></td>

                            <td><?php echo htmlspecialchars($transaction['transaction_status']); ?></td>

                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </section> -->
        <?php include("_templates/end.php"); ?> <br>

    </main>

    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>