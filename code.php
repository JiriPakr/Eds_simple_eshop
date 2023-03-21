<?php
$sql = "SELECT * FROM `item_model`";
$result = $dbconn->query($sql);
if($result === FALSE) {
    die('chyba sql: '.$dbconn->error);
}
$rows = $result->fetch_all(MYSQLI_ASSOC);

echo "<table border=1>";
echo "<tr>
    <td><b>ID</b></td>
    <td><b>Item_name</b></td>
    <td><b>Sold_since</b></td>
    <td><b>Comments</b></td>
    <td><b>Description</b></td>
    <td><b>Brand_id</b></td>
    <td><b>Category_id</b></td>
    </tr>";
foreach($rows as $row) {
    if($row['Comments'] === NULL) {
        $row['Comments'] = "<i>(empty)</i>";
    }
    if($row['Description'] === NULL) {
        $row['Description'] = "<i>(empty)</i>";
    }
    echo "<tr>"
        ."<td>".$row['id']."</td>"
        ."<td>".$row['Item_name']."</td>"
        ."<td>".$row['Sold_since']."</td>"
        ."<td>".$row['Comments']."</td>"
        ."<td>".$row['Description']."</td>"
        ."<td>".$row['Brand_id']."</td>"
        ."<td>".$row['Category_id']."</td>"
        ."</tr>";
}
echo "</table>";
?>