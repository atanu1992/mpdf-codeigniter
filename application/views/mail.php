<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body>
	<center><h2>PHP Mailer</h2></center> <hr>
	<div class="container">
		<p>welcome to home controller. for more session details <a href='https://www.codeigniter.com/user_guide/libraries/sessions.html'>click here</a></p>
		<br><br><br>


	<?php echo form_open('HomeController/mail'); ?>
	<label>To. </label><input type="text" name="mailto"><br>
	<label>From. </label><input type="text" name="mailfrom"><br>
	<label>Subject. </label><input type="text" name="subject"><br>
	<label>Message. </label><textarea name="msgtext"></textarea><br>
	<input type="submit" name="submit" value="Send">
	<?php echo form_close(); ?>


	</div>
</body>
</html>

<!-- extra work -->
<?php 

// first check $_POST is empty or not then 

$str = "hello,world"; // eikhne $str = $_POST['category']; ok
$res = explode(",",$str);
// print_r($res);  --- Array ( [0] => hello [1] => world )
$resultArr = array();
for($i=0; $i<count($res); $i++) {
  // echo $res[$i]."<br>"; 
	$sql = "SELECT * FROM `tablename` WHERE `id`".$res[$i];
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)) {
		array_push($resultArr,$row);
	}
}

echo "<pre>"; print_r($resultArr);
?>