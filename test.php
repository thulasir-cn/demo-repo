<!DOCTYPE html>
<html>
<head>
	<title>window</title>
</head>
<body > <!-- onbeforeunload="return popup()" -->
<form action="#" id="demo_form" method="post" autocomplete="off">
	<table>
		<tr>
			<td>S_No:</td>
			<td><input type="number" name="S_NO" value="" required /></td>
		</tr>
		<tr>
			<td>name:</td>
			<td><input type="text" name="fname" value="" required /></td>
		</tr>
		<tr>
			<td>address:</td>
			<td><input type="text" name="address" value="" required /></td>
		</tr>
		<tr>
			<td>mob:</td>
			<td>
				<input type="hidden" name="hidfield" value="" />
				<input type="number" name="mob" value="" min="0" required />
			</td>
		</tr>
		<tr>
			<td>email:</td>
			<td><input type="email" name="eamil" value="" required /></td>

		</tr>		
		<tr>
			<td></td>
			<td><input type="submit"  name="submit" value="Submit">
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	//  function popup(){
	// 	return "its working fine";
	// }
</script>
</body>
</html>
<?php 
$conn=mysql_connect('localhost','root');
if ($conn) {
 	// echo "data base connected";
     mysql_select_db('demo');
 }
else{
 	echo "data base not connected";
 }

/* insert section */
if(isset($_POST['submit']))
{
	// echo "mail is -".$_POST['eamil'];
	extract($_POST);
	$sql = "INSERT INTO `demo_first`(`id`,`name`, `e-mail`, `city`, `ph_no`) VALUES(".$S_NO.",'".$fname."', '".$eamil."', '".$address."', ".$mob.")";
	 mysql_query($sql);
}

/* end of insert section */
// joining
$joining =  "SELECT * FROM demo_first AS df inner join demo_second AS ds on df.e_mail = ds.email" ;
$res = mysql_query($joining);

while($row1 = mysql_fetch_assoc($res)) { echo "<tr><td> " . $row["name"]. "</td><td>" . $row["e_mail"]. "</td><td> " . $row["city"]. "</td><br>";}


 $sql1 = "SELECT * FROM demo_first";
 $result1 = mysql_query($sql1);

 echo "<table><tr><th>Name</th><th>E-Mail</th><th>City</th></tr>";
 if (mysql_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result1)) {
    	// echo "<br>...  result .....<br/>";
    	// print_r($row);
        echo "<tr><td> " . $row["name"]. "</td><td>" . $row["e_mail"]. "</td><td> " . $row["city"]. "</td><br>";
    }
} else {
    echo "0 results";
}

?>