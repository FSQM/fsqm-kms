<?php


$servername="localhost";
$username="root";
$password="";
$dbname="fsqm-kms";

$connection = new mysqli($servername,$username,$password,$dbname);

$username=stripcslashes($_POST['username']);
$password=stripcslashes($_POST['password']);



$query="select * from tbl_login where username = '$username' and password='$password' ";
$result=$connection->query($query);
$row=$result->fetch_assoc();
if($result->num_rows > 0)
{
	echo "<script language='javascript'>

window.location='fsqm.php';
</script>

	";



}

else{
echo "Invalid Username and Password!";

}


?>
