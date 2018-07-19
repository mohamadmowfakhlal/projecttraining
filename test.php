 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
 <HTML>
<HEAD>
<TITLE>Use PHP in HTML files</TITLE>
</HEAD>

<BODY>
<h1>
<?php 
//open connection with database 
//change here
include '../db_connection.php';
$username=$_GET['username'];
$password=$_GET['password'];
$notes= $_GET['notes'];
$channel_name=$_GET['channelname'];
$sporthigh=$_GET['sporthigh'];
$sportmedium=$_GET['sportmedium'];
$sportlow=$_GET['sportlow'];
$art=$_GET['start'];
$end=$_GET['end'];
echo $sporthigh;
echo $sportmedium;
echo $sportlow;
/*
echo "hi";
echo $channel_name;
echo $end;
echo $art;
*/

//mysql_free_result($result);

$sql="insert into customer (username,password,notes) values ('$username','$password','$notes')";
$result=$con->query($sql);
$customer_id = $con->insert_id;
//echo $customer_id;
if ($result === TRUE) {

  $last_id = $con->insert_id;
  echo "New customer created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
mysql_free_result($result);

if (isset($sporthigh))
{
echo $customer_id;

$sql0="select channel_id from channels where channelName='$sporthigh'";
$result=$con->query($sql0);
$row = $result ->num_rows;
$data=$result -> fetch_assoc();
//echo $row;
$channel_id=$data["channel_id"];
echo $channel_id;


mysql_free_result($result);

$sql2="insert into customer_channel (customer_id,channel_id,subscription_date_start,subscription_date_end) values ('$customer_id','$channel_id','$art','$end')";

$result=$con->query($sql2);
        if ($result === TRUE) {
    echo "New subscriptioncreated successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $con->error;
}
mysql_free_result($result);

}


if (isset($sportlow))
{


$sql0="select channel_id from channels where channelName='$sportlow'";
$result=$con->query($sql0);
$row = $result ->num_rows;
$data=$result -> fetch_assoc();
//echo $row;
$channel_id=$data["channel_id"];
echo $channel_id;

mysql_free_result($result);

$sql2="insert into customer_channel (customer_id,channel_id,subscription_date_start,subscription_date_end) values ('$customer_id','$channel_id','$art','$end')";

$result=$con->query($sql2);
if ($result === TRUE) {
    echo "New subscriptioncreated successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $con->error;
}
mysql_free_result($result);

}

if (isset($sportmedium))
{

$sql0="select channel_id from channels where channelName='$sportmedium'";
$result=$con->query($sql0);
$row = $result ->num_rows;
$data=$result -> fetch_assoc();
//echo $row;
$channel_id=$data["channel_id"];
echo $channel_id;

mysql_free_result($result);


$sql2="insert into customer_channel (customer_id,channel_id,subscription_date_start,subscription_date_end) values ('$customer_id','$channel_id','$art','$end')";

$result=$con->query($sql2);
if ($result === TRUE) {
    echo "New subscriptioncreated successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $con->error;

}
mysql_free_result($result);

}



 ?>
    </h1>
</BODY>
</HTML>
