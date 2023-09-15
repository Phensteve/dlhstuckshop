<?php
    include('_config/database_connect.php');

    session_start();

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM info WHERE id = '$id'";

    $result = mysqli_query($connect, $sql);

    $user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <?php include('_templates/start.php')?>
    <link rel='stylesheet' href='_files/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: row;
            background-color: #f0f0f0;
        }

        header {
            width: 18vw;
            height: 100vh;
            background-color: #808e9b;
        }

        main {
            width: 82vw;
            height: 100vh;
            background-color: #f0f0f0;
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
            background-color: #b2bec3;
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
        
        .link1 {
            color: #ffffff;
        }

        .link2 {
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
        <nav class="side_nav">
            <div class="center">
                <div class="nav_img">
                    <img src="_files/images/dlhs1.jpg" height="60rem">
                    <?php echo '<h4 class="text-light">&nbsp&nbsp&nbsp' . htmlspecialchars($user['uname']) ?>
                </div>
            </div>

            <div>
                <a href="index.php" class="link1">
                    <div class="nav_item">🏠&nbsp&nbsp Home </div>
                </a>

                <a href="user.php" class="link1">
                    <div class="nav_item">📈&nbsp&nbsp Dashboard </div>
                </a>

                <a href="user.php" class="link1">
                    <div class="nav_item">🔐&nbsp&nbsp Password </div>
                </a>

                <a href="index.php" class="link1">
                    <div class="nav_item">💳&nbsp&nbsp Fund wallet </div>
                </a>

                <a href="index.php" class="link1">
                    <div class="nav_item">💰&nbsp&nbsp Wallet balance </div>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <nav class="nav_bar text-center">
            <a href="index.php" class="link1">
                <div class="nav_item">🏠 <br><span class="d-lg-none">Home</span></div>
            </a>
            <a href="user.php" class="link1">
                <div class="nav_item">📈<br><span class="d-lg-none">Dash</span></div>
            </a>
            <a href="" class="link1">
                <div class="nav_item">🔐 <br><span class="d-lg-none">Password</span></div>
            </a>
            <a href="" class="link1">
                <div class="nav_item">💳<br><span class="d-lg-none">Fund</span></div>
            </a>
            <a href="" class="link1">
                <div class="nav_item">💰<br><span class="d-lg-none">Balance</span></div>
            </a>
        </nav>
        <br>
        <?php echo '<h4 class="text-secondary">&nbsp&nbsp&nbsp&nbsp Welcome, ' . htmlspecialchars($user['lname']) . ' ' . htmlspecialchars($user['fname']) . '</h4>' ;?>

        <div id="carouselId" class="carousel slide text-center justify-content-center" data-bs-ride="carousel"
            style="font-size: 2rem;">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    🍬 🍿 🍕 🍔 🍟 🌮 🌯 🥪 🍧 🍨 🍩 🍯 🍪 🧁 🥧 🍫
                </div>
                <div class="carousel-item">
                    🍰 🍯 🥖 🍞 🥨 🧀 🥓 🥩 🍗 🍖 🍤 🍬 🍭 🍯 🌯 🥧
                </div>
                <div class="carousel-item">
                    🍣 🍱 🍦 🍧 🍨 🍩 🍪 🍰 🧁 🍗 🍯 🥓 🥩 🍗 🍖 🍤
                </div>
            </div> <br>
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
            </ol>
        </div>
        <section class="flex">
            <!-- <main> -->
            <a href="_orders/cookie.php" class="link2">
                <div class=" flex1">
                    <img src="_files/images/_items/item1.png" alt="" height="200rem">
                    <h2>🍪<br>Cookies</h2>
                </div>
            </a>
            <a href="_orders/others.php" class="link2">
                <div class=" flex1">
                    <img src="_files/images/_items/item3.png" alt="" height="200rem">
                    <h2>🍭<br>Sweets</h2>
                </div>
            </a>
            <a href="_orders/others.php" class="link2">
                <div class=" flex1">
                    <img src="_files/images/_items/item3.png" alt="" height="200rem">
                    <h2>🥤<br>Drinks</h2>
                </div>
            </a>
            <a href="_orders/others.php" class="link2">
                <div class=" flex1">
                    <img src="_files/images/_items/item3.png" alt="" height="200rem">
                    <h2>🍫<br>Chocolates</h2>
                </div>
            </a>
            <a href="_orders/others.php" class="link2">
                <div class=" flex1">
                    <img src="_files/images/_items/item5.png" alt="" height="200rem">
                    <h2>✏️<br>Stationary</h2>
                </div>
            </a>
            <a href="_orders/others.php" class="link2">
                <div class=" flex1">
                    <img src="_files/images/_items/item5.png" alt="" height="200rem">
                    <h2>🧼<br>Sanitaries</h2>
                </div>
            </a>
        </section>
        <?php include("_templates/end.php"); ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</body>

</html>