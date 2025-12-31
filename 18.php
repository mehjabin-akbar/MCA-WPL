<!-- Pgm #18: Develop an application in PHP and MySQL, to accept book details viz. Book id, title, authors, edition and publisher from an HTML form in a web page and save the records in a MySQL database on submission. The program also should include a search function given the author's name, and display the search results. -->
<html>
    <head><title>
        Book Details Application
    </title></head>
    <style>
        body{
            text-align:center;
        }
        h1{
            color:#1b10b1ff;
            padding-top:50px;
        }
        form{
            margin-top:20px;
        }
        table{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            font-size:20px;
        }
    </style>
    <body>
        <h1 style="text-align:center;">Book Details Form</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table border="0" cellpadding="8" cellspacing="0" style="margin:auto;">
                <tr>
                    <td><label for="book_id">Book ID:</label></td>
                    <td><input type="text" id="book_id" name="book_id" required></td>
                </tr>
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td><input type="text" id="title" name="title" required></td>
                </tr>
                <tr>
                    <td><label for="authors">Authors:</label></td>
                    <td><input type="text" id="authors" name="authors" required></td>
                </tr>
                <tr>
                    <td><label for="edition">Edition:</label></td>
                    <td><input type="text" id="edition" name="edition" required></td>
                </tr>
                <tr>
                    <td><label for="publisher">Publisher:</label></td>
                    <td><input type="text" id="publisher" name="publisher" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            $con = mysqli_connect("localhost","root","","mca");
            if(!$con)
            {
                die("Connection failed ");
            }
            echo "Connection Successful to Data base..<br>";

            if (isset($_POST['submit'])) {
                $book_id = $_POST['book_id'];
                $title = $_POST['title'];
                $authors = $_POST['authors'];
                $edition = $_POST['edition'];
                $publisher = $_POST['publisher'];

                $sql = "INSERT INTO book (book_id, title, author, edition, publisher) VALUES ('$book_id', '$title', '$authors', '$edition', '$publisher')";

                if (mysqli_query($con, $sql)) {
                    echo "New record created successfully<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            }

        ?>

        <h2>Search Books by Author</h2>
        <form method="post" action="18.php">
            <label for="search_author">Author Name:</label><br>
            <input type="text" id="search_author" name="search_author" required><br><br>
            <input type="submit" name="search"  value="Search">
        </form>
        <?php
        if (isset($_POST['search']))
            {
                $author = $_POST['search_author'];

                $sql1 = "SELECT * FROM book WHERE author='$author'";
                $res = mysqli_query($con,$sql1);

                if(mysqli_num_rows($res) > 0)
                {
                    echo "<h3>Search Results:</h3>";

                    // TABLE START
                    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse:collapse; text-align:center;'>
                            <tr style='background:#f2f2f2; font-weight:bold;'>
                                <td>Book ID</td>
                                <td>Title</td>
                                <td>Author</td>
                                <td>Edition</td>
                                <td>Publisher</td>
                            </tr>";

                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "<tr>
                                <td>".$row['book_id']."</td>
                                <td>".$row['title']."</td>
                                <td>".$row['author']."</td>
                                <td>".$row['edition']."</td>
                                <td>".$row['publisher']."</td>
                            </tr>";
                    }

                    echo "</table>";
                }
                else
                {
                    echo "<br>No Record Found.";
                }
            }

            mysqli_close($con);
        ?>
    </body>
</html>