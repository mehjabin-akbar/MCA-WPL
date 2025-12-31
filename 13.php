<!-- Pgm # 13: Build a PHP code to store name of students in an array and display it using print_r function. Sort and display the same using asort & arsort functions -->
<html>
    <head>
        <title>Student Names Sorting</title>
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #1b10b1ff;
            padding-top: 50px;
        }
        h2{
            font-size: 20px;
        }
    </style>
    <body>
            <h1>Student Names Sorting</h1>
        <?php

            $students = array("David", "Eve", "Charlie", "Alice", "Bob");
            echo "<b>Original Array:</b><br>";
            print_r($students);
            echo "<br><br>";

            asort($students);
            echo "<b>Ascending Order (asort function):</b><br>";
            print_r($students);
            echo "<br><br>";

            arsort($students);
            echo "<b>Descending Order (arsort function):</b><br>";
            print_r($students);
            echo "<br><br>";
        ?>
    </body>
</html>