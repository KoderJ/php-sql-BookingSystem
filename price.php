<?php

include 'database.php';
$zone = $conn->real_escape_string($_POST["zone"]);
$title = $conn->real_escape_string($_POST["title"]);
$sql = "SELECT PriceMultiplier From Zone Where Name='" . $zone . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $multiplier = $row["PriceMultiplier"];
        $sql = "SELECT BasicTicketPrice From Production Where Title='" . $title . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $price = $row["BasicTicketPrice"];
                echo $price * $multiplier;
            }
        }
    }
}
?>
