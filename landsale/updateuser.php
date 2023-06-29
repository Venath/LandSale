<?php
include("config.php");
$query="update register set First_Name='venath' where id=2";
$result_set=mysqli_query($conn,$query);
if($result_set)
{
	echo"Query successful<br>";
	
	if($result_set){
		echo mysqli_affected_rows($conn)."Records updated";
	}
}
?>
