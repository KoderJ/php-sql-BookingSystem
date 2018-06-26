<!doctype html>
<?php
include 'database.php';
$title = $_GET["title"];
$date = $_GET["date"];
$time = $_GET["time"];
?>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <script src="js/jquery-latest.min.js" type="text/javascript"></script>
        <title>Theatre Booking System</title>
        <script>
            function loadSeat() {
                $.ajax({
                    type: "POST",
                    url: "seat.php",
                    data: {zone: $(".zone").val()},
                    success: function (result) {
                        $(".seat").html(result);
                    }
                });
            }
            function loadPrice() {
                $.ajax({
                    type: "POST",
                    url: "price.php",
                    data: {
                        zone: $(".zone").val(),
                        title: '<?php echo $title ?>'
                    },
                    success: function (result) {
                        $("#cost").val(result);
                    }
                });
            }
            $(document).ready(function () {
                loadSeat();
                loadPrice();
                $(".zone").change(function () {
                    loadSeat();
                    loadPrice();
                });
            });
        </script>
    </head>
    <body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">
        <form action="bookcomplete.php" method="POST">
            <table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">           
                <tr>
                    <td colspan="5" align="center">
                        <table width="100%" border="0" cellpadding="2" class="orderform">  
                            <tr>
                                <td></td>
                                <td align="center" class="formheader">Book</td>
                            </tr>            
                            <tr>
                                <td class="label">Title:</td><td><?php echo "<input class='formitem' type='text' value='" . $title . "' name='title' id='title'readonly/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label">Date:</td><td><?php echo "<input class='formitem' type='text' value='" . $date . "' name='date' id='date' readonly/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label">Time:</td><td><?php echo "<input class='formitem' type='text' value='" . $time . "' name='time' id='time' readonly/>" ?></td>
                            </tr>
                            <tr>
                                <td class="label">Zone:</td>
                                <td>
                                    <select class="zone formitem" name="zone">
                                        <?php
                                        $sql = "SELECT Name From Zone";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $name = $row["Name"];
                                                echo "<option>" . $name . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Seat:</td>
                                <td>
                                    <select class="seat formitem" name="seat">
                                    </select>
                                </td>
                            </tr>                            
                            <tr>
                                <td class="label">Cost:</td>
                                <td><input class="formitem" type="text" id="cost" readonly name="cost"></td>
                            </tr>
                            <tr>
                                <td class="label">Customer Name:</td>
                                <td><input class="formitem" type="text" id="customer" name="customer"></td>
                            </tr>
                            <tr>
                                <td class="label">Customer Email:</td>
                                <td><input class="formitem" type="email" id="email" name="email"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit"/>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table></form>
    </body>
</html>