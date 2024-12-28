<?php
    include('_config/database_connect.php');

    session_start();

    $id = $_SESSION['admin_id'];

    $sql = "SELECT * FROM items ORDER BY product_id";

    $result = mysqli_query($connect, $sql);

    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    
    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_templates/start.php"); ?> <br>
    <link rel='stylesheet' href='_files/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body {
            width: 100vw;
            overflow-x: hidden;
            background-color: #f0f0f0;
        }

        main {
            width: 100vw;
            height: 100vh;
            background-color: #f0f0f0;
            /* justify-content: center; */
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        .flex1 {
            position: relative;
            width: 23vw;
            margin: 5px;
            padding: 20px;
            border-radius: 2%;
            background-color: #f5f5f5;
            min-width: calc(25vw - 100px);
            border: 1px solid transparent;
        }

        .flex1:hover {
            border: 1px solid #ccc;
            cursor: pointer;
            transition: ease-in-out .3s;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .flex1 img {
            width: 10rem;
            height: 10rem;
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
                width: 29vw;
                /* min-width: 1vw; */
            }
        }
    </style>
    <title>Catalogue</title>
</head>

<body>
    <main>
        <nav class="nav_bar">
            <h6><a href="admin_user.php" class="nav-link text-secondary">Go Back</a></h6>   
        </nav> 
        <br>
        <div class="flex">
            <?php foreach ($items as $item) :?>
                <form action="catalogue_details.php" method="GET">
                    <button type="submit" class="flex1" name="submit">
                        <input type="hidden" name="product_id" value="<?php echo $item['product_id']?>">
                        <h4 class="text-secondary fs-6"><?php echo  htmlspecialchars($item['product_category'])?></h4>
                        <b class="text-secondary fs-4 text-center"><?php echo  htmlspecialchars($item['product_name'])?></b>
                        <h4 class="text-secondary fs-6"><?php echo  htmlspecialchars($item['product_price'])?></h4>
                    </button>
                </form>
            <?php endforeach?>
        </div>
        <?php include("_templates/end.php"); ?>
    </div>
    </main>
</body>

</html>