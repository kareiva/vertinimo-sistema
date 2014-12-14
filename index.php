<html>
<head>
	<meta charset="UTF-8">
	<title>Vertinimo sistema</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js" ></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".btn").click(function(){
			if($("#StudNum").val() == ""){
				$(".error").css("display","block");
				$(".error").html("Turite įvesti savo studento Nr.");
				event.preventDefault();
			}else if($("#Code").val() == ""){
				$(".error").css("display","block");
				$(".error").html("Turite įrašyti programos kodą.");
				event.preventDefault();
			}else if($("#theFile").val() == ""){
				$(".error").css("display","block");
				$(".error").html("Turite pasirinkti programos failą.");
				event.preventDefault();
			}else if($('input[name="check"]:checked').length == 0){
				$(".error").css("display","block");
				$(".error").html("Patvirtinkite kad failas jūsų.");
				event.preventDefault();
			}else if($("#progNr").val() == 0){
				$(".error").css("display","block");
				$(".error").html("Pasirinkite programos nr.");
				event.preventDefault();
			}else{
				$("#submitForma").submit()
			}
		});
	})
	</script>

</head>
<body>
	<div class="container">
		<center><div class="content-wrap ">
			<center><H1>Unix Vertinimo sistema</H1> </center>
			<div class="well">
				<div class="well well-sm error" > 
					<!-- ERROR STREAM -->
				</div>
				<form id="submitForma" action="sender.php" method="post" enctype="multipart/form-data">
					<center><label>Studento nr. : s </label><input type="text" id="StudNum" name="StudNum"class="well well-sm" placeholder="1122033"><br></center>
					<center><label>Programos Kodas. : </label></center>
					<center><textarea class="well well-sm" id="Code" name="Code" cols="100" rows="10" wrap="soft" tabindex="4" placeholder="#!/bin/bash ...."></textarea></center>
					<center><label>Programos failas.: </label><input type="file" id="theFile" name="theFile" class="well well-sm"></center>
					<center><label>Programa nr: </label>

							<select name="progNr" id="progNr">
								<option value="0">----</option>
							  	<option value="1">1</option>
							 	<option value="2">2</option>
							 	<option value="3">3</option>
							</select>

					</center>
					<center><input type="checkbox" id="check" name="check"><label>  Sutinku, kad programa yra mano.</label></center>
					<center><button class="btn">Siųsti</button></center>
				</form>	
			</div>
		</div></center>
	</div>
</body>
</html>