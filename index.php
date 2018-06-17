
<?php 
//open connection with database 
include 'db_connection.php';
$username=$_GET['username'];
$password=$_GET['password'];
$andriod_id=$_GET['android_id'];
$mac_address=$_GET['mac_address'];
//echo $andriod_id;
$sql="select c.mac_address,c.andriod_id,ch.channelLink,ch.channelName from customer c ,channels ch ,customer_channel cust_ch  where c.customer_id = cust_ch.customer_id and ch.channel_id = cust_ch.channel_id and   c.username='$username' and c.password='$password'";

//echo $sql;

/*
$sql="select ch.channelLink,ch.channelName from customer c ,channels ch ,customer_channel cust_ch  where c.customer_id = cust_ch.customer_id and ch.channel_id = cust_ch.channel_id and   c.username='$username' and c.password='$password'";
*/

$accepted= false;
$result=$con->query($sql);
$row = $result -> num_rows;
$data=$result -> fetch_assoc();
if ($row >= 1)
{

	//echo $row["andriod_id"];
    if ($data["andriod_id"] != null && $data["andriod_id"] != ''){
	if($data["andriod_id"] != $andriod_id)
	
	{
		echo "REFUSED";
	}
	else {
                  echo  $data["channelLink"]."#". $data["channelName"]. ";";
		  while($row = $result -> fetch_assoc()) {

        		echo  $row["channelLink"]."#". $row["channelName"]. ";";

        }

		
	}
	}

    else{
	//echo $row["andriod_id"];
	//echo $andriod_id;
	$accepted= true;
	echo  $data["channelLink"]."#". $data["channelName"]. ";";
        while($row = $result -> fetch_assoc()) {

        echo  $row["channelLink"]."#". $row["channelName"]. ";";

	}
	

    }
//echo $data["channelLink"];
}
else
{
echo "REFUSED";

}
mysql_free_result($result);

if($accepted){
$sql="update customer set andriod_id='$andriod_id',mac_address='$mac_address' where username='$username' and password='$password'";
$con->query($sql);
$row = $result -> num_rows;
}?>
