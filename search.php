<html>
<body>
<center>
    <form name="customerForm" id="customer" action="search.php" method='get'>
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

                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <input name="Submit"  type="submit" value="search customer" style="width: 95px;" />
                    <input type="reset" value="Clear form " style="width: 75px;" />
                </td>
                <td>


                </td>
            </tr>

        </table>
    </form>
        </center>
<div id="result"></div>
<?php echo "sfdsa";
?>
</body>
</html>



<?php
//open connection with database 
include '../db_connection.php';
$username=$_GET['username'];
$password=$_GET['password'];

$sql="select channelLink from customer c where c.username='$username' and c.password='$password'";
$result=$con->query($sql);
$row = $result -> num_rows;
$data=$result -> fetch_assoc();
if ($row == 1)
echo $data["channelLink"];
else
echo "REFUSED";
?>
