<?php
    include( '_config/database_connect.php' );

    session_start();

    $id = $_SESSION[ 'id' ];

    $sql = "SELECT * FROM info WHERE id = '$id'";

    $result = mysqli_query( $connect, $sql );

    $user = mysqli_fetch_assoc( $result );
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <title>User Page</title>
    <?php include( '_templates/start.php' );?>
    <link rel='stylesheet' href='_files/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <style>
        body {
            display: flex;
            flex-direction: row;
            background-color: #E8F6F3;
        }

        header {
            width: 18vw;
            height: 100vh;
            background-color: #00b894;
        }

        main {
            width: 82vw;
            height: 100vh;
            background-color: #E8F6F3;
        }

        .side_nav {
            justify-content: left !important;
            text-align: left !important;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: #1e272e;
        }

        .center {
            justify-content: center !important;
            text-align: center !important;
        }

        .nav_bar {
            top: 0 !important;
            background-color: #55efc4;
            display: flex;
            justify-content: space-around;
        }

        .nav_item {
            padding: 1.2rem;
        }

        .nav_img {
            margin: 1rem;
        }

        .nav_item:hover {
            background-color: #f0f0f0;
            transition: ease-in-out .3s;
            opacity: 1;
        }
        .link2 {
            color: #ffffff;
        }

        .link1 {
            color: #808080;
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .flex1 {
            margin: 10px;
            padding: 20px;
            border-radius: 2%;
            background-color: #f5f5f5;
            min-width: calc(25vw - 20px);
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .table-container {
            width: 90%;
            margin: 20px;
            /* Add a little space */
        }

        .table-table {
            border-collapse: collapse;
            border: 1px solid #ccc;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 100%;
            /* max-width: 600px; */
            border-radius: 20px;
            /* Slightly more rounded */
            margin: auto;
            /* Center the table */
        }

        .table-cell {
            border: 1px solid #e0e0e0;
            height: 50px;
            text-align: center;
            font-size: 14px;
        }

        .table-cell.header {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .table-cell.row-header {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .table-cell.tall {
            height: 100px;
        }

        .table-cell.thick {
            border-bottom-width: 3px;
        }

        @media screen and (max-width: 768px) {
            body {
                overflow: scroll;
            }

            header {
                display: none;
            }

            main {
                width: 100vw;
            }

            .flex {
                margin: 10px;
            }

            .flex1 {
                margin: 10px;
                width: 40vw;
                min-width: 45%;
            }

        }

        @media (min-width: 768px) and (max-width: 1024px) {
            body {
                overflow: scroll;
            }

            header {
                display: none;
            }

            main {
                width: 100vw;
            }

            .flex {
                margin: 10px;
            }

            .flex1 {
                margin: 10px;
                width: 30vw;
                min-width: 40vw;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="center">
                <div class="nav_img">
                    <img src="_files/images/dlhs1.jpg" height="60rem"><br>
                    <?php echo '<h4 class="text-light">&nbsp&nbsp&nbsp' . htmlspecialchars($user['uname']) ?>
                </div>
            </div>

            <div class="side_nav">
                <a href="index.php" class="link2">
                    <div class="nav_item"><span class="fa-solid fa-home fa-bounce"></span><span class="text-light fs-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHome</span></div>
                </a>

                <a href="order.php" class="link2">
                    <div class="nav_item"><span class="fa-solid fa-box fa-fade"></span><span class="text-light fs-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrder</span></div>
                </a>

                <a href=" " class="link2">
                    <div class="nav_item"><span class="fa-solid fa-lock fa-flip"></span><span class="text-light fs-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPassword</span></div>
                </a>
                <a href=" " class="link2">
                    <div class="nav_item"><span class="fa-solid fa-credit-card fa-shake"></span><span class="text-light fs-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspWallet&nbspbalance</span></div>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <nav class="nav_bar text-center">
            <a href="index.php" class="link2">
                <div class="nav_item">🏠 <br><span class="d-lg-none">Home</span></div>
            </a>

            <a href="order.php" class="link2">
                <div class="nav_item">📦 <br><span class="d-lg-none">Order</span></div>
            </a>

            <a href="user.php" class="link2">
                <div class="nav_item">🔐 <br><span class="d-lg-none">Password</span></div>
            </a>

            <a href=" " class="link2">
                <div class="nav_item">💳 <br><span class="d-lg-none">Fund</span></div>
            </a>
            <a href=" " class="link2">
                <div class="nav_item">💰 <br><span class="d-lg-none">Balance</span></div>
            </a>
        </nav>
        <br>
        <?php echo '<h4 class="text-secondary">&nbsp&nbsp&nbsp&nbsp Welcome, ' . htmlspecialchars($user['lname']) . ' ' . htmlspecialchars($user['fname']) . '</h4>' ;?>

        <section class="flex">
            <div class="flex1">
                <span class="start fa-solid fa-user"></span>
                <hr>
                <span class="end">
                    <?php echo htmlspecialchars($user['uname'])?>
                </span>
            </div>
            <div class="flex1">
                <span class="start fa-solid fa-envelope"></span>
                <hr>
                <span class="end">
                    <?php echo htmlspecialchars($user['email'])?>
                </span>
            </div>
            <div class="flex1">
                <span class="start fa-solid fa-phone"></span>
                <hr>
                <span class="end">
                    <?php echo htmlspecialchars($user['phonenum'])?>
                </span>
            </div>
        </section>
        <section class="flex" ;>
            <div class="table-container">
                <h2 class="text-center">Your Statistics</h2>
                <table class="table-table">
                    <tr>
                        <td class="table-cell header"></td>
                        <td class="table-cell header">10</td>
                        <td class="table-cell header">20</td>
                        <td class="table-cell header">30</td>
                        <td class="table-cell header">40</td>
                    </tr>
                    <tr>
                        <td class="table-cell row-header">0</td>
                        <td class="table-cell tall"></td>
                        <td class="table-cell tall thick"></td>
                        <td class="table-cell tall"></td>
                        <td class="table-cell tall"></td>
                    </tr>
                    <tr>
                        <td class="table-cell row-header">10</td>
                        <td class="table-cell"></td>
                        <td class="table-cell thick"></td>
                        <td class="table-cell"></td>
                        <td class="table-cell"></td>
                    </tr>
                    <tr>
                        <td class="table-cell row-header">20</td>
                        <td class="table-cell"></td>
                        <td class="table-cell"></td>
                        <td class="table-cell thick"></td>
                        <td class="table-cell"></td>
                    </tr>
                    <tr>
                        <td class="table-cell row-header">30</td>
                        <td class="table-cell"></td>
                        <td class="table-cell"></td>
                        <td class="table-cell"></td>
                        <td class="table-cell thick"></td>
                    </tr>
                </table>
            </div>
        </section>
        <?php include("_templates/end.php"); ?> <br>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>