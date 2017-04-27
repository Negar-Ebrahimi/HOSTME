<?php

if(isset($_POST["submit"])) {

$servername = 'localhost';
$username = 'xxxxxx';
$password = 'yyyyyy';
$dbname = 'zzzzzz';

try{
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //set the PDO error mode to exception
    $stmt = $conn->prepare("INSERT INTO comments (username, email, website, message)
    VALUES (:name, :email, :website,:message)");
    $stmt->bindparam(":name", $_POST["name"]);
    $stmt->bindparam(":email", $_POST["email"]);
    $stmt->bindparam(":website", $_POST["website"]);
    $stmt->bindparam(":message", $_POST["comment"]);
    $stmt->execute();
    // use exec() because no results are returned
    echo "Your comment submitted successfully.";
}
catch(PDOException $ex){
 echo 'no'.$ex;
}
    $conn = null;

}
?>



<html>
<br>
<br>
<br>
<form method="post">
    <div id="comment_form">
	
	<div>
		<input type="text" name="name" id="name" value="" placeholder="Name">
	</div>
	<div>
		<input type="email" name="email" id="email" value="" placeholder="Email">
	</div>
	<div>
		<input type="url" name="website" id="website" value="" placeholder="Website URL">
	</div>
	<div>
		<textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>
	</div>
	<div>
		<input type="submit" name="submit" value="Send">
	</div>
	
</div>

</form>


  
<style type="text/css">  
  body {
	font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;
	font-size: 13px;
}

#comment_form input, #comment_form textarea {
	border: 4px solid rgba(0,0,0,0.1);
	padding: 8px 10px;
	
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	
	outline: 0;
}

#comment_form textarea {
	width: 350px;
}

#comment_form input[type="submit"] {
	cursor: pointer;
	background: -webkit-linear-gradient(top, #bfbfbf, #808080);
	background: -moz-linear-gradient(top, #bfbfbf, #808080);
	background: -ms-linear-gradient(top, #bfbfbf, #808080);
	background: -o-linear-gradient(top, #bfbfbf, #808080);
	background: linear-gradient(top, #bfbfbf, #808080);
	color: #f2f2f2;

	border: 1px solid #ccc;
}

#comment_form input[type="submit"]:hover {
	background: -webkit-linear-gradient(top, #eee, #ccc);
	background: -moz-linear-gradient(top, #eee, #ccc);
	background: -ms-linear-gradient(top, #eee, #ccc);
	background: -o-linear-gradient(top, #eee, #ccc);
	background: linear-gradient(top, #eee, #ccc);
	border: 1px solid #bbb;
}

#comment_form input[type="submit"]:active {
	background: -webkit-linear-gradient(top, #ddd, #aaa);
	background: -moz-linear-gradient(top, #ddd, #aaa);
	background: -ms-linear-gradient(top, #ddd, #aaa);
	background: -o-linear-gradient(top, #ddd, #aaa);
	background: linear-gradient(top, #ddd, #aaa);	
	border: 1px solid #999;
}

#comment_form div {
	margin-bottom: 8px;
}

</style>
  
    
</html>