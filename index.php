<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xfig</title>
    <link rel="icon" href="images/NSF_logo.png">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/common.css"/>
    <!--Font Awesome is where you can get all kinds of different Fonts to use in websites and icons-->
    <script src="https://use.fontawesome.com/1c8abdfb6d.js"></script>
    <script src="https://kit.fontawesome.com/3247a548fe.js" crossorigin="anonymous"></script>
    <script src="../JS/main.js"></script>
</head>

<body>
    <header id="header" class="header">
        <nav>
            <a href="index.php"><img id="logo" src="images/NSF_logo.png" alt="logo"></a>
            <div class="nav-links">
                <ul>
                    <!--We would make a html file for each href-->
                    <li><a href="html/course.html">Course</a></li>
                    <li><a href="html/projectList.html">Project List</a></li>
                    <li><a href="html/contact.html">Contact Us</a></li>
                    <li><a href="html/review.html">Reviews</a></li>
                    <?php if ($_SESSION["loggedin"] == true) {echo "<li><a href="html/account_manage.html">Manage Account</a></li>"} else {echo "<li><a href="html/login.html">Login</a></li>"} ?>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main">
        <style>
            #summary{
                width: 500px;
                margin: 10px auto;
            }
            #home-image{
                width: 500px;
                height: 300px;
                display: flex;
                margin: 10px auto;
            }
            #welcome{
                position: absolute;
            }
            #clarkson-img{
                width: 100vw;
                max-height: 400px;
                margin: 0 auto;
            }
        </style>
                <div id="welcome-page">
                    <h1 id="welcome">Welcome</h1>
                    <img id="clarkson-img" src="https://www.clarkson.edu/sites/default/files/media/image/2017-06/aerial2.jpg"/>
                </div>

        <img id="home-image" src="images/summary.PNG"/>
        <p id="summary"><b>Fig. 1.</b> Software engineering PBL scaffolded via active learning activities in classroom and lab and supported by project-specific guidance from instructors during offic hours (Right), increases academic rigor and produces higher level of students learning and thus success in PBL. Scaffolding and supports for PBL are provided as part of the curated course projects produced by this project.</p>
    </main>

    <footer>
        <div class="social-links">
            <ul>
                <li class="social-items"><a href="https://linkedin.com/in/kyleigh-disilvestro-8aa044191" style="color: #0072b1;"><i class="fab fa-linkedin"></i></a></li>
                <li class="social-items"><a href="#" style="color: 	#1DB954;"><i class="fab fa-spotify"></i></a></li>
            </ul>
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#header">Return to Top</a></li>
                <li><a href="html/contact.html">Contact Us</a></li>
            </ul>
        </div>

        <p id="Copyright">Copyright &copy; <script>document.write(new Date().getFullYear());</script></p>
    </footer>
</body>
</html>
