<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>F1 Exempel 6</title>
		<style>
			img { width: 10%; height: 10%; }
		</style>
	</head>
	<body>
		<div>
		
			<?php
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );
			?>

			<?php echo( $_SERVER["PHP_SELF"] ); ?>
			
			<form action="ex6_slutkod.php" method="post"> 
				<input type="submit" name="btnRollOneDice" value="One Dice" />
				<input type="submit" name="btnRollSixDices" value="Six Dices" />
				<input type="hidden" name="hiddenValue" value="hiddenValue hittar du oavsett submitknapp!" />
			</form>

			<?php
				include( "include/OneDice.php" );
				include( "include/SixDices.php" );

				//Här kommer koden!
				if( isset($_POST["btnRollOneDice"]) ) {
					
					$oOneDice = new OneDice( 1 );
					echo( "<p>" . $oOneDice->getNbr() . "</p>" );
					
					$oOneDice->setNbr( 6 );
					echo( "<p>" . $oOneDice->getNbr() . "</p>" );
					
					$oOneDice->setNbr( 1000 );
					echo( "<p>" . $oOneDice->getNbr() . "</p>" );
					}

				if( isset($_POST["btnRollSixDices"]) ) {
				
					$oSixDices = new SixDices();
					//$oSixDices->dumpDices();
					
					$oSixDices->rollDices();
					//$oSixDices->dumpDices();
					
					echo( "<p>Summan är " . $oSixDices->sumDices() . "!</p>" );
					
					echo( $oSixDices->svgDices() );
						
				}
			?>
			
		</div>
	</body>
</html>