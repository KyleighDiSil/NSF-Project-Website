<?php $PAGE_NAME = "create_review"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <div class="seperation">
            <div class="ddm-wrap">
                
            </div>
            <div class="review-wrap">
                <div class="seperation">
                    <input class="title-input" type="text" name="title" placeholder="Title"/>
                </div>
                <div class="seperation">
                    <textarea class="content-input" name="content" cols="40" rows="8" placeholder="Text Here"></textarea>
                </div>
                    <!-- <label for="rating">Rating</label> -->
                <!-- <div>
                    <span class='fa fa-star'></span>
                    <span class='fa fa-star'></span>
                    <span class='fa fa-star'></span>
                    <span class='fa fa-star'></span>
                    <span class='fa fa-star'></span>
                </div> -->
                <div class="btn-wrap">
                    <input name="post" class="post-input" type="button" value="Post" onclick="post()">
                    <input name="cancel" class="cancel-input" type="button" value="Cancel" onclick="cancelPost()">
                </div>
            </div>
        </div>
    </main>
    <script>
        function post() {
            //will add insert functionality later
            window.location.href = "http://localhost/pages/review.php";
        }
        function cancelPost() {
            window.location.href = "http://localhost/pages/review.php";
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>