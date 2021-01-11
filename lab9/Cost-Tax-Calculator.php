<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulb Order Form</title>
    <style>
        html,
        body {
            width: 50%;
            margin: 0 auto;
            padding: 0;
            height: 100%;
        }

        table,
        td,
        th {
            margin: 0px auto;
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px;
        }
        h2,h3,h4,h5 {
            text-align: center;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["order-bulb"])) {
        $name = $_POST["name"];
        $bulb = $_POST["bulb"];
        $pmode = $_POST["pmt"];
        // print_r($bulb); echo $name;
        $how_many = count($bulb);
        if ($how_many > 0) {
            echo "<h3>Thanks! $name for Shopping.<br><br><h4>You choose the following bulbs!</h4><h4>Your order is Placed!</h4>";
        }
    ?>
        <table>
            <thead>
                <tr>
                    <th> S.no </th>
                    <th> Bulbs Type / Quantity </th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            for ($i = 0; $i < $how_many; $i++) {
                echo "<tr>";
                echo "<td>" . ($i + 1) . "</td>";
                echo "<td>" . $bulb[$i] . "</td>";
                echo "</tr>";
                if($i == 0 && $bulb[$i] != null){
                    $total += 2.39 * 4;
                }
                if($i == 1 && $bulb[$i] != null){
                    $total += 4.29 * 8;
                }
                if($i == 2 && $bulb[$i] != null){
                    $total += 3.95 * 4;
                }
                if($i == 3 && $bulb[$i] != null){
                    $total += 7.49 * 8;
                }
            }
            echo "</tbody></table>";
            echo "<br/><h5>6.2% Sales Tax</h5>";
            if(isset($pmode)){
            echo "<br/><h5>You Payment through $pmode.</h5>";
            }
            $totaltax = 6.2 / 100 * $total;
            $totalcost = $total + $totaltax;
            echo "<br/><h4>The total cost is: " . $totalcost."</h4>";
        }
            ?>
             <br>
        <form action="" method="POST">
            <h3>Form</h3>
            <label for="username">Your Name: </label>
            <input type="text" name="name" id="name">
            <br><br>
            <b>Select your bulbs</b>
            <p>
                <label><input name="bulb[]" value="Four 25-watt light bulbs for $2.39" type="checkbox"> Four 25-watt light bulbs for $2.39 </label><br>

                <label><input name="bulb[]" value="Eight 25-watt light bulbs for $4.29" type="checkbox"> Eight 25-watt light bulbs for $4.29 </label><br>

                <label><input name="bulb[]" value="Four 25-watt light long-life bulbs for $3.95" type="checkbox"> Four 25-watt light long-life bulbs for $3.95 </label><br>

                <label><input name="bulb[]" value="Eight 25-watt long-life light bulbs for $7.49" type="checkbox"> Eight 25-watt long-life light bulbs for $7.49 </label><br>
            </p>
            <b>Select Payment Method</b>
            <p>
                <label><input name="pmt" value="visa" type="radio"> Visa </label><br>

                <label><input name="pmt" value="mastercard" type="radio"> Mastercard </label><br>

                <label><input name="pmt" value="discover" type="radio"> Discover </label><br>

                <label><input name="pmt" value="Paypal" type="radio"> UnionPay </label><br></p>
            </p>
            <input type="submit" name="order-bulb" value="Submit">
            <input type="reset" value="Reset Form">
        </form>
</body>

</html>