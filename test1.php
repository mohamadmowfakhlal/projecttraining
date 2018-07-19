<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <script type="text/javascript">
        //we call api gate way in the backend fd

        function registerCustomer(theUrl)
        {
            var customerName = document.getElementById("myform").elements.namedItem("customerName").value;
            var password = document.getElementById("myform").elements.namedItem("password").value;
            var note = document.getElementById("myform").elements.namedItem("note").value;
            var channelLink = document.getElementById("myform").elements.namedItem("channelLink").value;
            var theUrl1= "http://149.169.152.10/football/test.php"
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("POST", theUrl1, false);
            xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xmlHttp.send(JSON.stringify({customerName:customerName, password:password, note:note,channelLink:channelLink}));

        }
           function search() {
            var severity = document.getElementById("myform").elements.namedItem("severity").value;
            var accountID = document.getElementById("myform").elements.namedItem("accountID").value;
            var instanceID = document.getElementById("myform").elements.namedItem("instanceID").value;
           if(instanceID){
                var url = "https://loh45wkr94.execute-api.eu-west-1.amazonaws.com/test/external_instanceid/"+ instanceID
            } else {
                var url = "https://loh45wkr94.execute-api.eu-west-1.amazonaws.com/test/Fidning"
            }
            
            httpGet(url);
        }
        function httpGet(theUrl)
        {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
            xmlHttp.send( null );
            var myDiv = document.getElementById("result");
            var result=JSON.parse(xmlHttp.responseText);
            var items = result["Items"];
            var oldfinding = "finding"
            removeTable(oldfinding)
            if(items != null){
                tableCreate(items.length,items);
            }
            return xmlHttp.responseText;
        }
        function removeTable(id)

 {
            var tbl = document.getElementById(id);
            if(tbl) tbl.parentNode.removeChild(tbl);
        }
        function tableCreate(count,Items) {
            var body = document.getElementsByTagName('body')[0];
            var tbl = document.createElement('table');
            tbl.setAttribute("id", "finding");
            tbl.style.width = '100%';
            tbl.setAttribute('border', '3');
            var tbdy = document.createElement('tbody');
            var tr = document.createElement('tr');
            var th = document.createElement('th');
            th.appendChild(document.createTextNode('customerid'));
            tr.appendChild(th);
            var th = document.createElement('th');
            th.appendChild(document.createTextNode('username'));
            tr.appendChild(th);
            var th = document.createElement('th');
            th.appendChild(document.createTextNode('password'));
            tr.appendChild(th);
            var th = document.createElement('th');
            th.appendChild(document.createTextNode('channelLink'));
            tr.appendChild(th);
            var th = document.createElement('th');
            th.appendChild(document.createTextNode('notes'));
            tr.appendChild(th);
            tbdy.appendChild(tr);
            for (var i = 0; i < count; i++) {
                var tr = document.createElement('tr');
                var item = Items[i];
                       var td = document.createElement('td');
                       td.appendChild(document.createTextNode(item["accountid"]["S"]))
                       tr.appendChild(td)
                        var td = document.createElement('td');
                        td.appendChild(document.createTextNode(item["instanceID"]["S"]))
                        tr.appendChild(td)
                       var td = document.createElement('td');
                       td.appendChild(document.createTextNode(item["id"]["S"]))
                       tr.appendChild(td)
                       var td = document.createElement('td');
                       td.appendChild(document.createTextNode(item["title"]["S"]))
                       tr.appendChild(td)
                       var td = document.createElement('td');
                       td.appendChild(document.createTextNode(item["severity"]["S"]))
                       tr.appendChild(td)
                       var td = document.createElement('td');
                       td.appendChild(document.createTextNode(item["description"]["S"]))
                      var td = document.createElement('td');
                      td.appendChild(document.createTextNode(item["recommendation"]["S"]))
                        tr.appendChild(td)
                        tbdy.appendChild(tr);
            }
            tbl.appendChild(tbdy);
            body.appendChild(tbl)
        }
    </script>

</head>

<body>
<table class="uppertable">
<br>
<br>
<br>

    <tr>

        <td><marquee>welcome with you in our registeration department you can register your new customer her</marquee></td>

    </tr>
<br>
<br>
<br>

    <tr>
        <td colspan="2" width="50"></td>
        <td>
            <h2>customer managment</h2>
        </td>

    </tr>
</table>

<tr></tr>
<tr></tr>
<tr></tr>


<center>
    <form name="customerForm" id="customer" action="test.php" method='get'>
        <table class="formtable">


            <tr>
                <td>
                    username:&nbsp;
                </td>
                <td>
                    <input name="username"  id="username" type="text" value="" style="width: 150px;" />
                </td>
         </tr>
            <tr>
                <td>
                    password:&nbsp;
                </td>
                <td>
                    <input name="password"  id="password"  type="password"  value=""  style="width: 150px;" />
                </td>
            </tr>



            <tr>
                <td>
                    channename:&nbsp;
                </td>
                <td>

                  <input type="checkbox" name="sporthigh" value="sporthigh"> FullHD<br>
                  <input type="checkbox" name="sportmedium" value="sportmedium"> HD<br>
                  <input type="checkbox" name="sportlow" value="sportlow" checked>low<br>
                </td>
            </tr>

            <tr>
                <td>
                    startdate:&nbsp;
                </td>
                <td>
                    <input name="start"  id="start" type="date" value="" style="width: 250px;" />
                </td>
            </tr>
            <tr>
                <td>
                    enddate:&nbsp;
                </td>
                <td>
                    <input name="end"  id="end" type="date" value="" style="width: 250px;" />
                </td>
            </tr>
        <tr>
        <td>
        notes&nbsp;
        </td>
        <td>
        <textarea name="notes" rows="3" cols="35" form="customer"></textarea>

        </td>
        </tr>

           <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <input name="Submit"  type="submit" value="add customer" style="width: 95px;" />
                    <input type="reset" value="Clear form " style="width: 75px;" />
                </td>
                <td>


                </td>
            </tr>

        </table>
    </form>
</center>
<div id="result"></div>

<?php
//open connection with database 

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
</body>
</html>
