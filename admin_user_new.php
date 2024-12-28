<?php
    include('_config/database_connect.php');
    
    session_start();

    if ($_SESSION['admin_id']) {
        $admin_id = $_SESSION['admin_id'];
    
        $sql_admin = "SELECT * FROM admin WHERE id = '$admin_id'";
    
        $result_admin = mysqli_query($connect, $sql_admin);
    
        $admin_user = mysqli_fetch_assoc($result_admin);
    }else{
        $_SESSION['was_redirected'] = 'true';
        header("Location: index.php");
    }
?>

<?php
    $sql = 'SELECT * FROM student_data ORDER BY id';
    
    $result = mysqli_query($connect, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($connect);
?>

<?php

    if (isset($_POST['edit'])){

        include( '_config/database_connect.php' );

        $_SESSION['user_id'] =  $_POST['user_toEdit_id'];
        
        header("Location:user_info.php");

    }

?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Admin User Page</title>
    <?php include('_templates/start.php'); ?>
    <link rel='stylesheet' href='_files/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
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
                width: 99vw;
                height: 100vh;
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

            <a href="transactions_admin.php" class="link2 nav-link">
                <div class="nav_item"><span class="fas fa-archive">🗃️</span><br><span
                        class="d-lg-none">Transactions</span></div>
            </a>

            <a href="" class="link2 nav-link">
            <form action="admin_user_new.php" method="post" class="nav_item">
                <span><input type="submit" value="🪵" id="log" class="fa-solid" name="logout"></span><br><span
                class="d-lg-none">Logout</span>
            </form>
            </a>
        </nav>

        <br>

        <section class="table_con">
            <table class="table fs-6">
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Campus</th>
                    <th>Class</th>
                    <th>State</th>
                    <th>Edit</th>
                </tr>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr id="<?php echo (htmlspecialchars($user['id']) . '_' . htmlspecialchars($user['id'])); ?>">

                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['fname']); ?></td>
                            <td><?php echo htmlspecialchars($user['lname']); ?></td>
                            <td><?php echo htmlspecialchars($user['uname']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['phonenum']); ?></td>
                            <td><?php echo htmlspecialchars($user['campus']); ?></td>
                            <td><?php echo htmlspecialchars($user['current_class']); ?></td>
                            <td>  <?php
                            // $delete_status
                            if ($user['is_deleted'] == 'true' && $user['status'] == 'active') {

                                echo "<h6 class=\"bg-danger text-white\">" . htmlspecialchars($user['status']) . "&nbsp;but&nbsp;deleted</h6>";
                                
                            }else if ($user['is_deleted'] == 'true' && $user['status'] == 'inactive') {
                                
                                echo "<h6 class=\"bg-danger text-white\">" . htmlspecialchars($user['status']) . "&nbsp;and&nbsp;deleted</h6>";
                                
                            }else if ($user['is_deleted'] == 'false' && $user['status'] == 'inactive') {
                                
                                echo "<h6 class=\"bg-warning text-white\">" . htmlspecialchars($user['status']) . "&nbsp;but running</h6>";
                                
                            }else if ($user['is_deleted'] == 'false' && $user['status'] == 'active') {
                                
                                echo "<h6 class=\"bg-success text-white\">" . htmlspecialchars($user['status']) . "&nbsp;and&nbsp;running</h6>";

                            }else{

                                $delete_status = "False account";

                            }
                        ?></td>
                            <td>
                                <form method="POST" action="admin_user_new.php">
                                    <input type="hidden" value="<?php echo $user['id'] ?>"
                                        name="user_toEdit_id">
                                    <input type="submit" name="edit" class="btn btn-primary btn-sm" value="edit">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </section>
        <?php include("_templates/end.php"); ?> <br>

    </main>
    
    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>