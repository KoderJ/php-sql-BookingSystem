<?php

include 'database.php';
$zone = $conn->real_escape_string($_POST["zone"]);
$sql = sprintf("SELECT RowNumber From Seat Where Zone='%s'", $zone);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row = $row["RowNumber"];
        echo "<option>" . $row . "</option>";
    }
}
?>
