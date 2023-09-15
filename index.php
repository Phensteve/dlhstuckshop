<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("_templates/start.php"); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="_files/bootstrap-5.0.2-dist/css/bootstrap.css">
    <title>DLHS Tuck-Shop</title>
    <style>
        .title{
            font-size: 60px;
            font-weight: 600;
            transition: text-shadow: 0px 0px 9px red 4s;
            animation: title 4s infinite alternate;
        }
        @keyframes title{
            100%{
                text-shadow: 0px 0px 9px red;;
            }
        }
        @media screen and (max-width: 768px) {
            .title{
                display: none;
            }
        }
        @media (min-width: 768px) and (max-width: 1024px) {
            .title{
                display: none;
            }
        }
    </style>
</head>

<body id="body">
    <header>
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="Fourth slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="4" aria-label="Fifth slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="_files/images/carousel_img/carousel_img1.jpg" class="w-100 d-block" alt="First slide"
                        height="455rem">
                    <div class="carousel-caption d-md-block">
                        <div class="text-center">
                            <img src="./_files/images/dlhs2.png" alt="" class="d-none d-md-inline" height="70rem">
                        </div>
                        <h3>Friendship</h3>
                        <p>
                        <h6 class="d-none d-md-block">Make no friendship with an angry man; and with a furious man thou
                            shalt not go.
                        </h6>
                        </p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="_files/images/carousel_img/carousel_img2.jpg" class="w-100 d-block" alt="Second slide"
                        height="455rem">
                    <div class="carousel-caption d-md-block">
                        <div class="text-center">
                            <img src="./_files/images/dlhs2.png" alt="" class="d-none d-md-inline" height="70rem">
                        </div>
                        <h3>Fortification</h3>
                        <p>
                        <h5 class="d-none d-md-block">Draw thee waters for the siege, fortify thy strong holds: go into
                            clay, and tread
                            the morter, make strong the brickkiln.</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="_files/images/carousel_img/carousel_img3.jpg" class="w-100 d-block" alt="Third slide"
                        height="455rem">
                    <div class="carousel-caption d-md-block">
                        <div class="text-center">
                            <img src="./_files/images/dlhs2.png" alt="" class="d-none d-md-inline" height="70rem">
                        </div>
                        <h3>Fruitfulness</h3>
                        <p>
                        <h5 class="d-none d-md-block">But the fruit of the Spirit is love, joy, peace, patience,
                            kindness, goodness, faithfulness, gentleness, self-control; against such things there is no
                            law.</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="_files/images/carousel_img/carousel_img4.jpg" class="w-100 d-block" alt="Fourth slide"
                        height="455rem">
                    <div class="carousel-caption d-md-block">
                        <div class="text-center">
                            <img src="./_files/images/dlhs2.png" alt="" class="d-none d-md-inline" height="70rem">
                        </div>
                        <h3>Fellowship</h3>
                        <p>
                        <h5 class="d-none d-md-block">But if we walk in the light, as he is in the light, we have
                            fellowship with one another, and the blood of Jesus his Son cleanses us from all sin.</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="_files/images/carousel_img/carousel_img5.jpg" class="w-100 d-block" alt="Fifth slide"
                        height="455rem">
                    <div class="carousel-caption d-md-block">
                        <div class="text-center">
                            <img src="./_files/images/dlhs2.png" alt="" class="d-none d-md-inline" height="70rem">
                        </div>
                        <h3>Freedom</h3>
                        <p>
                        <h5 class="d-none d-md-block">For freedom Christ has set us free; stand firm therefore, and do
                            not submit again to a yoke of slavery.</h5>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm nav-tabs">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="_files/images/dlhs2.png" alt="" height="50rem"
                        class="d-lg-none"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNavDropdown">
                    <ul class="nav justify-content-center text-center">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-secondary active" role="button">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="sign_up.php" class="nav-link text-secondary">
                                Sign up
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="sign_in.php" class="nav-link text-secondary">
                                Log in
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link text-secondary" data-bs-toggle="modal" data-bs-target="#modal3"
                                role="button">
                                Contact us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link text-secondary" data-bs-toggle="modal" data-bs-target="#modal4"
                                role="button">
                                About us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div role="dialog" class="modal fade bg-info" id="modal2" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="mymodal">Fill in this form to log in to your DLHS
                                Tuckshop Account</h5>
                            <button class="close btn btn-danger btn-close" type="button"
                                data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <label for="User-name">Username</label>
                            <input type="id" class="w-100" placeholder="Your username"><br><br>

                            <label for="Password">Password</label>
                            <input type="password" class="w-100" placeholder="Please enter your password"><br><br>
                        </div>
                        <div class="modal-footer">
                            <a href="./_files/user.html" type="submit" class="btn btn-primary">Log in</a>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div role="dialog" class="modal fade bg-info" id="modal3" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title">
                                <b class="fs-2">DLHS Tuck shop</b>
                                <button class="close btn btn-danger btn-close" type="button"
                                    data-bs-dismiss="modal"></button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h6 class="nav-item active">
                                Contact us on the following social media platforms :<br><br>
                                <img src="./_files/images/dlhs1.jpg" alt="" height="50cm" width="50cm">
                                <img src="./_files/images/dlhs1.jpg" alt="" height="50cm" width="50cm">
                                <img src="./_files/images/dlhs1.jpg" alt="" height="50cm" width="50cm">
                            </h6>
                            <span style="padding-left: 10px"><b>nbspOur E-mail accounts :</b> <br>
                                attendant@gmail.com <br>
                                oluyo.thebest@gmail.com<br></span>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div role="dialog" class="modal fade bg-secondary" id="modal4" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="mymodal">About us</h5>
                            <button class="close btn btn-danger btn-close" type="button"
                                data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            &nbspThis ingeious idea was a product of Deeper Life High School
                            Ibadan Campus launched on the First of April 2022 (April 1<sup>st</sup>) <br>&nbspThe idea was brought up
                            as a result of the stress students pass through writing cheques, going to submit their
                            cheques in tuckshop and on getting to the tuckshop, they meet a long line and later coming
                            back sometimes to discover that the next period is almost over. They might get punished by
                            teachers for an offense they did not commit.<br>&nbspAnother reason
                            this idea was brought up was becase the world is becoming automated and as huma beings we
                            should follow thw train of development.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main style="background-color: whitesmoke;">
        <div class="text-center title">
            Welcome To DLHS Tuck Shop Logging Page
        </div>
        <div class="fs-4 p-3" style="font-weight: normal;text-align:justify;">
            <p>
                &nbsp&nbsp&nbsp&nbsp&nbspThe Deeper Life High School Ibadan (a mission Co-educational full boarding
                system) is among the pioneering Campuses established by the Deeper Christian Life Ministry under the
                proprietorship of Pastor (Dr) W.F Kumuyi in September, 2010. <br>

                &nbsp&nbsp&nbsp&nbsp&nbspThe School is located at Km 10, Ibadan-Oyo Express way, opposite Deeper Life Camp Ground, Otun Agbaakin,
                near Moniya Ibadan, Oyo State. Though at the beginning, there were no much developments, but we thank
                God today for diverse improvements and progress in all ramifications.
                Some of our recent achievements include the following: <br><br>

                � Standard classrooms for conducive learning <br>
                � Standard boys and girls hostels <br>
                � Standard Science Laboratories <br>
                � Fully equipped ICT rooms <br>
                � Well stocked library <br>
                � Standard Administrative block <br>
                � Standard Multi-purpose hall <br>
                � Standard Staff quarters <br>
                � Standard Health bay <br>
                � Pure water factory <br>
                � School farm <br>
                � Modern sport complex and facilities <br>
                � Installation of CCTV <br>
                � Close to 300 students population <br>
                � Availability of Internet service for effective e-learning (Every child has a laptop)<br>
                � Approval by Government for Junior and Senior Secondary Schools Certificate
                Examinations and lots more...<br><br>

                &nbsp&nbsp&nbsp&nbsp&nbspTo the glory of God Almighty, all these achievements lend credence to the
                popular verse of
                the Scriptures which says "Though nbspthy beginning was small, yet thy latter end should greatly
                increase"Job 8:7
                PRAISE THE LORD!
            </p>
        </div>
        <?php include("_templates/end.php"); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <script src="_files/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    </main>
</body>

</html>