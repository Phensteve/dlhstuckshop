<?php
    include('../_config/database_connect.php');

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
    <?php include("start.php"); ?> <br>
    <link rel='stylesheet' href='../_files/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: row;
            background-color: #f0f0f0;
        }

        header {
            width: 18vw;
            height: 100vh;
            /* background-color: #808e9b; */
        }

        main {
            width: 82vw;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .side_nav {
            justify-content: left !important;
            text-align: left !important;
            height: fit-content;
            position: fixed;
            width: 18vw;
            height: 100vh;
            background-color: #808e9b;
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

        .flexe {
            display: grid;
            grid-template-columns: 3fr 1fr;
            /* flex-wrap: no-wrap; */
            justify-content: center;
        }

        .flex1 {
            width: 30px;
            margin: 5px;
            padding: 20px;
            border-radius: 2%;
            background-color: #f5f5f5;
            min-width: calc(25vw - 100px);
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .flex1 img {
            width: 10rem;
            height: 10rem;
        }

        .tuck_bag {
            font-size: 15px !important;
            padding: .5rem;
            position: relative;
        }

        .tuck_bag section {
            position: fixed;
        }

        .tuck_bag section ol {
            overflow-y: scroll;
            height: 60vh;
            width: 230px;
            padding: 2rem;
            padding-top: 4.5rem;
            background-color: #f9f9f9;
        }

        .handle {
            width: 40px; /* Adjust the size of the handle */
            height: 10px; /* Adjust the height of the handle */
            background-color: #888; /* Color of the handle */
            position: absolute;
            top: 50px; /* Adjust the handle's vertical position */
            left: 80px; /* Adjust the handle's horizontal position */
            border-radius: 5px; /* Rounded corners for the handle */
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
                width: 50vw;
                min-width: 45%;
            }

            .tuck_bag {
                text-align: center;
                font-size: 15px !important;
                 /* margin-right: -7rem; */
                /* padding: .5rem; */
                position: relative;
            }

            .tuck_bag section {
                /* position: fixed; */
                overflow: scroll;
            }

            .tuck_bag section ol {
                overflow: scroll;
                height: 60vh;
            }

            .bottom {
                left: 10px;
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
                /* min-width: 1vw; */
            }

            .link1 div span {
                display: block;
            }
        }
    </style>
    <title>Student Order Page</title>
</head>

<body>
    <header>
        <nav class="side_nav">
            <div class="center">
                <div class="nav_img">
                    <img src="images/dlhs1.jpg" height="60rem">
                    <?php echo '<h4 class="text-light">&nbsp&nbsp&nbsp' . htmlspecialchars($user['uname']) ?>
                </div>
            </div>

            <div class="side_nav">
                <a href="../index.php" class="link1">
                    <div class="nav_item">🏠&nbsp&nbsp Home </div>
                </a>

                <a href="../user.php" class="link1">
                    <div class="nav_item">📈&nbsp&nbsp Dashboard </div>
                </a>

                <a href="../order.php" class="link1">
                    <div class="nav_item">📦&nbsp&nbsp Order </div>
                </a>
                <a href="../user.php" class="link1">
                    <div class="nav_item">🔐&nbsp&nbsp Password </div>
                </a>

                <a href="../cookie.php" class="link1">
                    <div class="nav_item">💳&nbsp&nbsp Fund wallet </div>
                </a>

                <a href="../cookie.php" class="link1">
                    <div class="nav_item">💰&nbsp&nbsp Wallet Balance </div>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <nav class="nav_bar text-center">
            <a href="../index.php" class="link1">
                <div class="nav_item">🏠 <br><span class="d-lg-none">Home</span></div>
            </a>

            <a href="../order.php" class="link1">
                <div class="nav_item">📦 <br><span class="d-lg-none">Order</span></div>
            </a>
            <a href="../user.php" class="link1">
                <div class="nav_item">📈<br><span class="d-lg-none">Dash</span></div>
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
        <div class="flexe">
            <!-- <div class="tuck_bag d-lg-none">
                <section>
                    <b>Your&nbspTuckshop&nbspBag</b>
                    <ol id="cart-list"></ol>
                    <p>Total: <span id="cart-total">₦0.00</span></p>
                    <button class="btn btn-outline-dark" onclick="checkout()">Checkout</button>
                </section>
            </div> -->
            <div class="flex">
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4 text-center">Maryland</b>
                    <img src="./images/cookie/maryland.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Maryland', 500.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Choco&nbspRings</b>
                    <img src="./images/cookie/chocorings.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Choco rings', 50.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Pure&nbspBliss</b>
                    <img src="./images/cookie/purebliss.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Pure Bliss', 100.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Digestives</b>
                    <img src="./images/cookie/digestives.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Digestives', 150.00 )">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Fox's Crunnch</b>
                    <img src="./images/cookie/fox.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Fox', 350.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Cream&nbspCrackers</b>
                    <img src="./images/cookie/creamcrackers.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Cream Crackers', 50.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4 text-center">Maryland</b>
                    <img src="./images/cookie/maryland.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Maryland', 500.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Choco&nbspRings</b>
                    <img src="./images/cookie/chocorings.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Choco rings', 50.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Pure&nbspBliss</b>
                    <img src="./images/cookie/purebliss.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Pure Bliss', 100.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Digestives</b>
                    <img src="./images/cookie/digestives.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Digestives', 150.00 )">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Fox</b>
                    <img src="./images/cookie/fox.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Fox', 350.00)">Order</button>
                </div>
                <div class="flex1" id="item">
                    <b class="text-secondary fs-4">Cream&nbspCrackers</b>
                    <img src="./images/cookie/creamcrackers.jpg" alt=""><br>
                    <button class="btn btn-dark" onclick="addToCart('Cream Crackers', 50.00)">Order</button>
                </div>
            </div>

            <div class="tuck_bag ">
                <section>
                <b><h4>Your&nbspTuckshop&nbspBag</h4></b>
                    <div class="bag-body">
                        <div class="handle"></div>
                        <ol id="cart-list"></ol>
                        <p>Total: <span id="cart-total">₦0.00</span></p>
                        <button class="btn btn-outline-dark" onclick="checkout()">Checkout</button>
                    </div>
                </section>
            </div>
            <!-- <div class="tuck_bag ">
                <section>
                    <b>Your&nbspTuckshop&nbspBag</b>
                    
                    <p>Total: <span id="cart-total">₦0.00</span></p>
                    <button class="btn btn-outline-dark" onclick="checkout()">Checkout</button>
                </section>
            </div> -->
            <?php include("end.php"); ?>
        </div>
    </main>

    <script>
        const cart = [];
        const cartList = document.getElementById("cart-list");
        const cartTotal = document.getElementById("cart-total");

        function addToCart(itemName, price) {
            cart.push({ name: itemName, price: price });
            updateCart();
        }

        function updateCart() {
            cartList.innerHTML = "";
            let total = 0;
            cart.forEach(item => {
                cartList.innerHTML += `<b><li>${item.name} - ₦${item.price.toFixed(2)}</li></b><br>`;
                total += item.price;
            });
            cartTotal.innerText = `₦${total.toFixed(2)}`;
        }

        function checkout() {

            alert("Thank you for your order!");
            cart.length = 0;
            updateCart();
        }
    </script>
</body>

</html>