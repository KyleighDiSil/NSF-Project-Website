<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "home"?>

<?php require "../php-snippets/top_template.php"; ?>
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
                    <?php echo "<h1 id='welcome'>$STATUS $ACCESS</h1>"; ?>
                    <img id="clarkson-img" src="https://www.clarkson.edu/sites/default/files/media/image/2017-06/aerial2.jpg"/>
                </div>

        <img id="home-image" src="../images/summary.PNG"/>
        <p id="summary"><b>Fig. 1.</b> Software engineering PBL scaffolded via active learning activities in classroom and lab and supported by project-specific guidance from instructors during offic hours (Right), increases academic rigor and produces higher level of students learning and thus success in PBL. Scaffolding and supports for PBL are provided as part of the curated course projects produced by this project.</p>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>
