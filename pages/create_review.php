<?php $PAGE_NAME = "create_review"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
            <form id="post-review" action="../php-scripts/post_review.php" method="post">
                <?php
                    $review_title = $_GET['title'];
                    $review_content = $_GET['content'];
                    $review_item = $_GET['item'];
                    $review_item_name = $_GET['name'];
                    $rating = $_GET['rating'];
                ?>
                    <h1>Create Review</h1>
                    <div id="selections">
                        <select name="items" id="items" onChange="getNames(this.value)">
                            <?php
                                if($review_item == "") {
                                    echo "<option value disabled selected>--Select--</option>";
                                    echo "<option value=\"Course\">Course</option>";
                                    echo "<option value=\"Projects\">Project</option>";
                                } else if($review_item == "Course") {
                                    echo "<option value disabled selected>--Select--</option>";
                                    echo "<option value=\"Course\" selected>Course</option>";
                                    echo "<option value=\"Projects\">Project</option>";
                                } else {
                                    echo "<option value disabled selected>--Select--</option>";
                                    echo "<option value=\"Course\">Course</option>";
                                    echo "<option value=\"Projects\" selected>Project</option>";
                                }
                            ?>
                        </select>
                        <select name="item-name" id="item-name">
                            <?php
                                if($review_item == "") {
                                    echo "<option value disabled selected>--Select--</option>";
                                } else {
                                    echo "<option value disabled selected>--Select--</option>";
                                    $query = "SELECT * FROM ".$review_item." ORDER BY Name ASC;";
                                    if (!$result = mysqli_query($conn, $query)) {
                                        echo "Error";
                                    } else {
                                        while($name_row = $result->fetch_assoc()) {
                                            if($name_row['Name'] == $review_item_name) {
                                                echo "<option value=\"".$name_row['Name']."\" selected>".$name_row['Name']."</option>";
                                            } else {
                                                echo "<option value=\"".$name_row['Name']."\">".$name_row['Name']."</option>";
                                            }
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                        <textarea class="title-input" id="title" name="title" cols="40" rows="2" placeholder="Title"><?php echo $review_title?></textarea>
                        <textarea class="content-input" id="content" name="content" cols="40" rows="8" placeholder="Text Here"><?php echo $review_content?></textarea>
                        <label for="rating">Rating: </label>
                    <div id="stars">    
                        <?php
                            if($rating == "") {
                                $i = 0;
                                echo "<input type=\"hidden\" name=\"rating-num\" value=".$i.">";
                                while($i < 5) {
                                    $i++;
                                    echo "<button type=\"button\" class=\"rating-button\" aria-label=\"Left Align\" onclick=\"addRating(".$i.")\">";
                                    echo "<span class='fa fa-star' aria-hidden=\"true\"></span>";
                                    echo "</button>";
                                }
                            } else {
                                $rating_value = intval( $rating );
                                $i = 0;
                                echo "<input type=\"hidden\" name=\"rating-num\" value=".$rating_value.">";
                                while($i < $rating_value) {
                                    $i++;
                                    echo "<button type=\"button\" class=\"rating-button\" aria-label=\"Left Align\" onclick=\"addRating(".$i.")\">";
                                    echo "<span class='fa fa-star checked' aria-hidden=\"true\"></span>";
                                    echo "</button>";
                                }
                                while($i < 5) {
                                    $i++;
                                    echo "<button type=\"button\" class=\"rating-button\" aria-label=\"Left Align\" onclick=\"addRating(".$i.")\">";
                                    echo "<span class='fa fa-star' aria-hidden=\"true\"></span>";
                                    echo "</button>";
                                }
                            }
                        ?>
                    </div>
                    <input name="confirm" id="confirm-input" type="submit" value="Confirm">
                    <input name="cancel" id="cancel-input" type="button" value="Cancel" onclick="cancelPost()">
            </form>
    </main>
    <script src="..\js-scripts\jquery.js" type="text/javascript"></script>
    <script>
        function getNames(val) {
            const urlParams = new URLSearchParams(window.location.search);
            const title = document.getElementById("title").value;
            const content = document.getElementById("content").value;
            const rating = urlParams.get('rating');
            window.location.href = "../pages/create_review.php?title="+title+"&content="+content+"&item="+val+"&name=&rating="+rating;
        }

        function cancelPost() {
            window.location.href = "../pages/review.php?item=&name=";
        }

        function addRating(val) {
            const urlParams = new URLSearchParams(window.location.search);
            const title = document.getElementById("title").value;
            const content = document.getElementById("content").value;
            const item = urlParams.get('item');
            const name = document.getElementById("item-name").value;

            window.location.href = "../pages/create_review.php?title="+title+"&content="+content+"&item="+item+"&name="+name+"&rating="+val;
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>