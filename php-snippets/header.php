<header id="header" class="header">
    <nav>
        <a href="../index.php"><img id="logo" src="../images/NSF_logo.png" alt="logo"></a>
        <div class="nav-links">
            <ul>
                <?php
                    if ($STATUS)
                    {
                        echo "<li><a href='./course.php'>Course</a></li>";
                        echo "<li><a href='./project_list.php'>Project List</a></li>";
                        echo "<li><a href='./contact.php'>Contact Us</a></li>";
                        echo "<li><a href='./review.php'>Reviews</a></li>";
                        echo "<li><a href='./account_management.php'>Manage Account</a></li>";
                    }
                    else
                    {
                        echo "<li><a href='./login.php'>Reference Course</a></li>";
                        echo "<li><a href='./login.php'>Project List</a></li>";
                        echo "<li><a href='./contact.php'>Contact Us</a></li>"; // CDL=> Unauthorized users can see contact page right?
                        echo "<li><a href='./login.php'>Reviews</a></li>";
                        echo "<li><a href='./login.php'>Login</a></li>";
                    }
                    
                ?>
            </ul>
        </div>
    </nav>
</header>