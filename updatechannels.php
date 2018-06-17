<?php

include '../db_connection.php';
$username=$_GET['username'];
$password=$_GET['password'];
$found=false;
$sql="select ch.channelLink,ch.channelName,ch.channel_id,c.customer_id from customer c ,channels ch ,customer_channel cust_ch  where c.customer_id = cust_ch.customer_id and ch.channel_id = cust_ch.channel_id and   c.username='$username' and c.password='$password'";
$result=$con->query($sql);
$row = $result -> num_rows;
//$data=$result -> fetch_assoc();

if ($row >= 1)
{

//while($row = $result -> fetch_assoc()) {
     
//echo  $row["channelLink"]."#". $row["channelName"]. ";";
echo "<form class='form' method='get'>";
echo "<h2>Update channel for customer</h2>";
echo "<hr/>";
while($row = $result -> fetch_assoc()) {
//echo"<input class='input' type='hidden' name='customer_id' value='{$row['customer_id']}' />";
//echo"<input class='input' type='hidden' name='channel_id' value='{$row['channel_id']}' />";
echo "<br />";
echo "<label>" . "{$row['channelName']}" . "</label>";
echo"<input class='input' type='checkbox' name='{$row['channelName']}' value='{$row['channelName']}' />";
//echo "<input type="checkbox" name='test' value='{$row['customer_id']}' />";
echo "<br />";
}
//echo"<input class='input' type='hidden' name='customer_id' value='{$row['customer_id']}' />";
//echo"<input class='input' type='hidden' name='channel_id' value='{$row['channel_id']}' />";

echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";

//echo $data["channelLink"];
}
else
echo "REFUSED";



/*
while ($row1 = mysql_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo "<h2>Update Form</h2>";
echo "<hr/>";
echo"<input class='input' type='hidden' name='did' value='{$row1['employee_id']}' />";
echo "<br />";
echo "<label>" . "Name:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dname' value='{$row1['employee_name']}' />";
echo "<br />";
echo "<label>" . "Email:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='demail' value='{$row1['employee_email']}' />";
echo "<br />";
echo "<label>" . "Mobile:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dmobile' value='{$row1['employee_contact']}' />";
echo "<br />";
echo "<label>" . "Address:" . "</label>" . "<br />";
echo "<textarea rows='15' cols='15' name='daddress'>{$row1['employee_address']}";
echo "</textarea>";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
*/
?>
