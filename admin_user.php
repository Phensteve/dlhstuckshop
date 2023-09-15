<?php
    include( '_config/database_connect.php' );
    
    
    $sql = 'SELECT * FROM items ORDER BY datejoined';
    
    $result = mysqli_query($connect, $sql);
    
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    
    mysqli_close($connect);
?>
<?php
    include( '_config/database_connect.php' );
    
    // session_start();
   
    // $id = $_SESSION[ 'id' ];

    $sql = "SELECT * FROM admin WHERE id = 1";

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
            /* background-color: #00b894; */
        }
        
        main {
            width: 82vw;
            height: 100vh;
            background-color: #E8F6F3;
        }
        
        .side_nav {
            /* justify-content: left !important; */
            /* text-align: left !important; */
            background-color: #00b894;
            height: fit-content;
            position: fixed;
            width: 18vw;
            height: 100vh;
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
            width: 100%;
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
            width: 100%;
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
            
            
            <div class="nav"> 
                <div class="center">
                <div class="nav_img">
                    <img src="_files/images/dlhs1.jpg" height="60rem"><br>
                    <?php echo '<a href="" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home" role="tab" aria-controls="home"
                        aria-selected="true">' . htmlspecialchars($user['name']) . '</a>'?>
                </div>
            </div>
                <?php foreach ($users as $user) :?>
                    <?php echo '<a href="" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile" role="tab" aria-controls="profile"
                        aria-selected="false" class="link2">'.'<div class="nav_item"> &nbsp&nbsp&nbsp' . htmlspecialchars($user['lname']) . ' ' .htmlspecialchars($user['fname']) . '</div>'.'
                        </a>'?>
                <?php endforeach?>

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
        
        <section class="tab-content">
            <!-- Home info -->
        <section class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="fs1">Welcome</h1>
                        <h5>Ipsum</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore perspiciatis corrupti
                                fugiat ea dolorem reprehenderit deleniti eveniet laudantium amet dolore. Quas aliquid,
                                rem voluptatem praesentium cum quidem dolor deserunt beatae! Lorem, ipsum dolor sit amet
                                consectetur adipisicing elit. Error laborum, accusantium eos rerum mollitia odit
                                provident nostrum asperiores ut tenetur earum culpa beatae similique porro, repellendus
                                dolore nihil quis reprehenderit! Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Cumque vitae placeat voluptatem doloremque similique ea id esse sed pariatur sint
                                natus vel est, soluta exercitationem, accusantium cupiditate corporis. Inventore,
                                cupiditate? Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro iste soluta
                                numquam, id praesentium nam modi debitis architecto voluptas rem ad omnis ipsa explicabo
                                nihil natus aliquid ut! Perspiciatis, odio! Lorem ipsum dolor, sit amet consectetur
                                adipisicing elit. Nemo non facere est consectetur modi quos voluptas fuga, reprehenderit
                                distinctio doloremque quidem optio deserunt rerum deleniti eaque ea officiis molestias
                                quisquam!</p>
                            <h3 class="mt-5">Lorem</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ipsum et dignissimos
                                natus voluptates totam reprehenderit corporis est qui nam, esse soluta modi deserunt
                                neque. Debitis et quia a doloremque.</p>
                            </div>
                    <div class="col-sm-12">
                        <h1 class="fs1">How we started ?</h1>
                        <h5>Ipsum</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore perspiciatis corrupti
                                fugiat ea dolorem reprehenderit deleniti eveniet laudantium amet dolore. Quas aliquid,
                                rem voluptatem praesentium cum quidem dolor deserunt beatae! Lorem, ipsum dolor sit amet
                                consectetur adipisicing elit. Error laborum, accusantium eos rerum mollitia odit
                                provident nostrum asperiores ut tenetur earum culpa beatae similique porro, repellendus
                                dolore nihil quis reprehenderit! Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Cumque vitae placeat voluptatem doloremque similique ea id esse sed pariatur sint
                                natus vel est, soluta exercitationem, accusantium cupiditate corporis. Inventore,
                                cupiditate? Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro iste soluta
                                numquam, id praesentium nam modi debitis architecto voluptas rem ad omnis ipsa explicabo
                                nihil natus aliquid ut! Perspiciatis, odio! Lorem ipsum dolor, sit amet consectetur
                                adipisicing elit. Nemo non facere est consectetur modi quos voluptas fuga, reprehenderit
                                distinctio doloremque quidem optio deserunt rerum deleniti eaque ea officiis molestias
                                quisquam!</p>
                            <h3 class="mt-5">Lorem</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ipsum et dignissimos
                                natus voluptates totam reprehenderit corporis est qui nam, esse soluta modi deserunt
                                neque. Debitis et quia a doloremque.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Profile Info -->
        <section class="tab-pane" id="profile" role="" aria-labelledby="profile-tab">
            <div class="mt-3 container-fluid">
                <div class="row">
                    <div class="col-sm-3 card1 m-2 p-4 rounded">
                        <h1 class="fs1">Welcome</h1>
                        <h5>Ipsum</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore perspiciatis
                                corrupti fugiat ea dolorem reprehenderit deleniti eveniet laudantium amet dolore.
                                Quas aliquid, rem voluptatem praesentium cum quidem dolor deserunt beatae! Lorem,
                                ipsum dolor sit amet consectetur adipisicing elit. Error laborum, accusantium eos
                                rerum mollitia odit provident nostrum asperiores ut tenetur earum culpa beatae
                                similique porro, repellendus dolore nihil quis reprehenderit! Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Cumque vitae placeat voluptatem doloremque
                                similique ea id esse sed pariatur sint natus vel est, soluta exercitationem,
                                accusantium cupiditate corporis.
                            </p>
                    </div>

                    <div class="col-sm-3 card2 m-2 p-4 rounded"> 
                        <h1 class="fs1">Welcome</h1>
                        <h5>Ipsum</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore perspiciatis
                            corrupti fugiat ea dolorem reprehenderit deleniti eveniet laudantium amet dolore.
                            Quas aliquid, rem voluptatem praesentium cum quidem dolor deserunt beatae! Lorem,
                            ipsum dolor sit amet consectetur adipisicing elit. Error laborum, accusantium eos
                            rerum mollitia odit provident nostrum asperiores ut tenetur earum culpa beatae
                            similique porro, repellendus dolore nihil quis reprehenderit! Lorem ipsum dolor sit
                            amet consectetur adipisicing elit. Cumque vitae placeat voluptatem doloremque
                            similique ea id esse sed pariatur sint natus vel est, soluta exercitationem,
                            accusantium cupiditate corporis.
                        </p>
                    </div>

                    <div class="col-sm-4 card3 m-2 p-4 rounded">
                        <h1 class="fs1">Welcome</h1>
                  bundle.      <h5>Ipsum</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore perspiciatis
                            corrupti fugiat ea dolorem reprehenderit deleniti eveniet laudantium amet dolore.
                            Quas aliquid, rem voluptatem praesentium cum quidem dolor deserunt beatae! Lorem,
                            ipsum dolor sit amet consectetur adipisicing elit. Error laborum, accusantium eos
                            rerum mollitia odit provident nostrum asperiores ut tenetur earum culpa beatae
                            similique porro, repellendus dolore nihil quis reprehenderit! Lorem ipsum dolor sit
                            amet consectetur adipisicing elit. Cumque vitae placeat voluptatem doloremque
                            similique ea id esse sed pariatur sint natus vel est, soluta exercitationem,
                            accusantium cupiditate corporis.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </section>
        <?php include("_templates/end.php"); ?> <br>
    </main>
    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>