<?php

$conn = mysql_connect("localhost", "root", "College@2015");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("ESPDB")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}

$sql = "SELECT unit.ut_id, unit.type, unit.tw_id, unit.floor, unit.area, unit.status, tower.name as tname, type.name, type.price from unit LEFT JOIN tower on unit.tw_id = tower.tw_id LEFT JOIN type on unit.type=type.type_id;";

$result = mysql_query($sql);
echo "Result";

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

echo mysql_num_rows($result);
if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus
while ($row = mysql_fetch_assoc($result)) {
    echo $row;
    echo $row["ut_id"];
    echo $row["tname"];
    echo $row["unit.tw_id"];
}

mysql_free_result($result);

?>
