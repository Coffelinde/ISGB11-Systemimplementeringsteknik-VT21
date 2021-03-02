<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>F1 Exempel 6</title>
	</head>
	<body>
		<div>
		
			
			<?php
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );
			?>

			<?php echo( $_SERVER["PHP_SELF"] ); ?>
			
			<form action="ex6.php" method="post"> 
				<input type="submit" name="btnRollOneDice" value="One Dice" />
				<input type="submit" name="btnRollSixDices" value="Six Dices" />
				<input type="hidden" name="hiddenValue" value="hiddenValue hittar du oavsett submitknapp!" />
			</form>

			<?php
				//Här kommer koden!
			?>
			
		</div>
	</body>
</html>