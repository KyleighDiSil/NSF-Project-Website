<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "announcements"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1 id="page-title">Announcements</h1>
        <?php
        if ($ACCESS > 2)
        {
            echo "<div id='create-account'>";
            echo "    <form action='../php-scripts/create_announcement.php' method='POST'>";
            echo "        <input type='text' id='title' name='title' placeholder='Announcement title'>";
            echo "        <input type='text' id='content' name='content' placeholder='Announcement content'>";
            echo "        <input type='submit' id='submit' value='Create Announcement'>";
            echo "    </form>";
            echo "</div>";
        }
        ?>
        <div id="search-bar">
            <i class="fas fa-search" id="search-icon"></i>
            <input type="text" id="search-input" onkeyup="updateSearch()" placeholder="Search for announcements"></input>
        </div>

        <?php
            // Connect to the database
            include_once '../php-scripts/connect_to_database.php';

            $sql = "SELECT Date_announced, Title, Contents FROM Announcements ORDER BY Date_announced DESC";

            // Execute Query and error check
            if (!$result = mysqli_query($conn, $sql))
                {echo (mysqli_error($conn));}
            else
            {
                if ($result->num_rows > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<div id='announcement-container'>";
                        echo "    <h2 id='title'>".$row['Title']."</h2>";
                        echo "    <p id='date'>".$row['Date_announced']."</p>";
                        echo "    <p id='content'>".$row['Contents']."</p>";
                        echo "</div>";
                    }
                }
            }
        ?>
    </main>
    <script>
        function updateSearch()
        {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("search-input");
            filter = input.value.toUpperCase();
            // CDL=> Loop through all cards and selectively show/hide cards depending on search criteria
            // ul = document.getElementById("myUL");
            // li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            // for (i = 0; i < li.length; i++)
            // {
            //     a = li[i].getElementsByTagName("a")[0];
            //     txtValue = a.textContent || a.innerText;
            //     if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //     li[i].style.display = "";
            //     } else {
            //     li[i].style.display = "none";
            //     }
            // }
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>