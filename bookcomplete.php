<?php
include 'database.php';
$title = $conn->real_escape_string($_POST["title"]);
$date = $conn->real_escape_string($_POST["date"]);
$time = $conn->real_escape_string($_POST["time"]);
$zone = $conn->real_escape_string($_POST["zone"]);
$seat = $conn->real_escape_string($_POST["seat"]);
$customer = $conn->real_escape_string($_POST["customer"]);
$email = $conn->real_escape_string($_POST["email"]);
$cost = $conn->real_escape_string($_POST["cost"]);
$sql = "Insert Into Booking(PerfDate, PerfTime, Name, Email, RowNumber) Values('$date','$time', '$customer', '$email', '$seat')";
$result = $conn->query($sql);
?>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <script src="js/jquery-latest.min.js" type="text/javascript"></script>
        <title>Theatre Booking System</title>        
    </head>
    <body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">
        <form action="bookcomplete.php" method="POST">
            <table width="100%" cellpadding="10" cellspacing="0" border="0">           
                <tr>
                    <td colspan="5" align="center">
                        <table width="100%" border="0" cellpadding="2">  
                            <tr>
                                <td></td>
                                <td class="formheader" >Book Successfully</td>
                            </tr>            
                            <tr>
                                <td class="label">Title:</td><td><?php echo "<input class='formitem' type='text' value='" . $title . "' name='title' id='title' disabled='true'/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label">Date:</td><td><?php echo "<input class='formitem' type='text' value='" . $date . "' name='date' id='date' disabled='true'/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label" >Time:</td><td><?php echo "<input class='formitem'  type='text' value='" . $time . "' name='time' id='time' disabled='true'/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label">Zone:</td>
                                <td>
                                    <?php echo "<input class='formitem'  type='text' value='" . $zone . "' name='zone' id='time' disabled='true'/>" ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Seat:</td>
                                <td>
                                    <?php echo "<input class='formitem'  type='text' value='" . $seat . "' name='seat' id='seat' disabled='true'/>" ?>
                                </td>
                            </tr>                            
                            <tr>
                                <td class="label">Cost:</td>
                                <td>
                                    <?php echo "<input class='formitem'  type='text' value='" . $cost . "' name='cost' id='cost' disabled='true'/>" ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Customer Name:</td>
                                <td>  <?php echo "<input class='formitem'  type='text' value='" . $customer . "' name='customer' id='customer' disabled='true'/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label">Customer Email:</td>
                                <td><?php echo "<input class='formitem'  type='text' value='" . $email . "' name='email' id='email' disabled='true'/>" ?></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table></form>
    </body>
</html>