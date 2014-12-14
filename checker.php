<html>
<head>
	<title>Work checker</title>
	<meta charset="UTF-8">
	<title>Vertinimo sistema</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js" ></script>
</head>
<body>

	<div class="container">
		<center><div class="content-wrap">
			<center><H1>Studentu darbu tikrinimas</H1> </center>
			<div class="well">
				<form method="POST">
					<label>Studento Nr.: s</label><input type="text" class="well well-sm" id="stID" name="stID" placeholder="1122033"><br>
					<label>Admin password:</label><input type="password" class="well well-sm" id="stID" name="pass" placeholder="******"><br>
					<button class="btn">Tikrinti!</button>
				</form>
			</div>

		</div></center>
	</div>

	<?php 
try {
	$handler = new PDO('mysql:host=127.0.0.1;dbname=students','root','password');
	$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 	die("<center><h1>Problema su duomenų bazė, Bandykite vėliau.</center></h1>");
}
	if (isset($_POST['pass'])) {
		if ($_POST['pass'] == 123) {
			if(isset($_POST['stID']) ){
				$stID = $_POST['stID'];
				$query = $handler->query("SELECT * FROM submits where studentID = {$stID}");
				$result = $query->fetchAll(PDO::FETCH_ASSOC);

				if(sizeof($result) == 0){
					echo "<center><h1>Studentas ". $stID ." neturi submitų.</center></h1>";
				} else {
					echo "<div class='container'>";
					for ($i=0; $i < sizeof($result); $i++) { 

						echo "<h2>", $result[$i]["data"], "</h2>";
						echo "<pre><code>", $result[$i]["code"],"</pre></code>";
					}
					echo "</div>";
				}
			}
		}else{
			echo "<center><h1>Netinkamas slaptažodis</center></h1>";
		}
	} 
	
	
 ?>
</body>
</html>