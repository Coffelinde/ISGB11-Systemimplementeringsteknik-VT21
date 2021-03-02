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
			
			<a href="ex7_slutkod.php?linkRollOneDice=true&linkTest=linkTest hittar du oavsett länk!">One Dice</a>
			<a href="ex7_slutkod.php?linkRollSixDices=true&linkTest=linkTest hittar du oavsett länk!">Six Dices</a>
		
			<?php
				include( "include/OneDice.php" );
				include( "include/SixDices.php" );

				//Här kommer koden!
				if( isset($_GET["linkRollOneDice"]) ) {
					
					$oOneDice = new OneDice( 1 );
					echo( "<p>" . $oOneDice->getNbr() . "</p>" );
					
					$oOneDice->setNbr( 6 );
					echo( "<p>" . $oOneDice->getNbr() . "</p>" );
					
					$oOneDice->setNbr( 1000 );
					echo( "<p>" . $oOneDice->getNbr() . "</p>" );
					}

				if( isset($_GET["linkRollSixDices"]) ) {
				
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