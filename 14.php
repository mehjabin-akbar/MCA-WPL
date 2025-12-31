<!-- Pgm# 14: Build a PHP code to store name of Indian Cricket players in an array and display the same in HTML table. -->
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
    </style>
    <body>
        <?php
            $players = array("Virat Kohli", "Rohit Sharma", "Jasprit Bumrah", "MS Dhoni", "Hardik Pandya");
        ?>
        <h1>Indian Cricket Players</h1>
        <table border="1" cellpadding="10">
            <tr>
                <th><b>Player Name</b></th>
            </tr>

            <?php
                foreach ($players as $player) {
                    echo "<tr><td>$player</td></tr>";
                }
            ?>
        </table>
 </html>