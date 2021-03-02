<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>F1 Exempel 7</title>
		<style>
			img { width: 10%; height: 10%; }
		</style>
		
	</head>
	<body>
		<div>

			<?php
				echo ("<pre>" );
				print_r( $_GET );
				echo( "</pre>" );
			?>
			
			<?php echo( $_SERVER["PHP_SELF"] ); ?>
			
			<a href="ex7.php?linkRollOneDice=true&linkTest=linkTest hittar du oavsett länk!">One Dice</a>
			<a href="ex7.php?linkRollSixDices=true&linkTest=linkTest hittar du oavsett länk!">Six Dices</a>
		
			<?php
				//Här kommer koden...
			?>
			
		</div>
	</body>
</html>