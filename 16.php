<!-- Pgm # 16: Develop a user-friendly electricity bill calculator using HTML and PHP. Collect the consumer data, and the units used, through an input form. Based on the given tariff, calculate the consumer bill amount.
Tariff:
Rate of electricity  for 1-100 units: Rs.5/unit
Rate of electricity from 101 units  to 200 units: Rs. 7.5/unit
Rate of electricity from 201 units: Rs.10/unit -->
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
    
        
        <?php
            $result_str = $result = '';
            if (isset($_POST['unit-submit'])) {
                $units = $_POST['units'];
                if (!empty($units)) {
                    $result = calculate_bill($units);
                    $result_str = 'Total amount of ' . $units . ' : ' . $result;
                }
            }
            function calculate_bill($units)
            {
                $unit_cost_first = 3.50;
                $unit_cost_second = 4.00;
                $unit_cost_third = 5.20;
                $unit_cost_fourth = 6.50;
                if($units <= 50) {
                    $bill = $units * $unit_cost_first;
                }
                else if($units > 50 && $units <= 100) {
                    $temp = 50 * $unit_cost_first;
                    $remaining_units = $units - 50;
                    $bill = $temp + ($remaining_units * $unit_cost_second);
                }
                else if($units > 100 && $units <= 200) {
                    $temp = (50 * 3.5) + (100 * $unit_cost_second);
                    $remaining_units = $units - 150;
                    $bill = $temp + ($remaining_units * $unit_cost_third);
                }
                else {
                    $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
                    $remaining_units = $units - 250;
                    $bill = $temp + ($remaining_units * $unit_cost_fourth);
                }
                return number_format((float)$bill, 2, '.', '');
            }
         ?>
    <body>
      
<body>
    <h1>Calculate Electricity Bill</h1>
    <form action="" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table>
            <tr>
                <td><b>Enter the number of units consumed:</b></td>
                <td><input type="number" name="units" id="units" placeholder="Please enter no. of Units" /><br></tr>
                <tr>
            <td><input type="submit" name="unit-submit" id="unit-submit" value="Submit"><td></tr>
    </table>
    </form>
    <?php echo '<br />' . $result_str; ?>
    </body>
</html>