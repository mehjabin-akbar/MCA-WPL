<!-- Pgm # 15: Design a registration form in HTML, and do necessary server side validations using PHP. -->
 <html>
    <head></head>
    <style>
        body{
            text-align:center;
        }
        table{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            font-size:20px;
        }
        h1{
            color:#1b10b1ff;
            padding-top:50px;
        }
        th{
            text-align:left;
            padding-right:10px;
        }
    </style>
    <body>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <h1>Registration Form</h1>
            <table>
                <tr>
                    <th>Name:</th><td> <input type="text" name="name" ><br><br></td>
                </tr>
                <tr>
                    <th>Email:</th> <td><input type="email" name="email" ><br><br></td>
                </tr>
                <tr>
                    <th>Password:</th> <td><input type="password" name="password" ><br><br></td>
                </tr>
                <tr>
                    <th>Confirm Password:</th> <td><input type="password" name="confirm_password" ><br><br></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            $errors = [];
            if (empty($name)) {
                $errors[] = "Name cant be empty.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
            if (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters long.";
            }
            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match.";
            }
            if (!empty($errors)) {
                echo "<h3>Errors:</h3><ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            } else {
                echo "<h3>Registration Successful!</h3>";
                echo "<p>Name: $name</p>";
                echo "<p>Email: $email</p>";
            }
        }
        ?>
    </body>
</html>