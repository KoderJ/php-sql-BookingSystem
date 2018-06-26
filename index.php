<!doctype html>
<?php
include 'database.php';
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

        <table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">           
            <tr>
                <td colspan="5" align="center">
                    <table width="100%" border="0" cellpadding="2">  
                        <thead>    
                            <tr>
                                <td colspan="5" align="center"><h1>Production & Performance</h1></td>
                            </tr>
                            <tr class="header"><td>No</td><td>Date</td><td>Time</td><td>Title</td><td></td></tr>
                        </thead>
                        <?php
                        $sql = "SELECT PerfDate, PerfTime, Title From Performance Order By PerfDate DESC, PerfTime DESC, Title ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {
                                $date = $row["PerfDate"];
                                $time = $row["PerfTime"];
                                $title = $row["Title"];
                                echo "<tr><td>" . $i . "</td><td>" . $date . "</td><td>" . $time . "</td><td>" . $title . "</td><td><a href='book.php?date=" . $date . "&time=" . $time . "&title=" . $title . "'>Book</a></td></tr>";
                                $i = $i + 1;
                            }
                        }
                        ?>
                    </table>

                </td>
            </tr>
        </table>
    </body>
</html>