<!-- Pgm 17#: Develop a PHP program to connect to a database and retrieve data from a table and show the details in a neat format. -->
<html>
    <head><title>connection to Data-base</title></head>
    <style>
        body{
            text-align:center;
        }
        h1{
            color:#1b10b1ff;
            padding-top:50px;
        }
        table{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            font-size:20px;
        }
    </style>
    <body>
        <?php
            $con = mysqli_connect("localhost","root","","mca");
            if(!$con)
            {
                die("Connection failed ");
            }
            echo "Connection Successful to Data base..<br>";
            echo "<h1> Student Details </h1>";

            $sql = "SELECT * FROM students";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0)
            {
                echo "
                <table border='1' cellpadding='10' cellspacing='0'>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                    </tr>
                ";

                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "
                    <tr>
                        <td>".$row['roll_no']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['course']."</td>
                    </tr>
                    ";
                }

                echo "</table>";   
            }
            else{
                echo "No rows found";
            }

            mysqli_close($con);
      
        ?>
    </body>
</html>