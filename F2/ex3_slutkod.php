<?php
	//Har skriver ni koden!		

	//defaultvärde för CSS-elementet
	$css = "body { color: rgb(0,0,0); background-color: rgb(255,255,255); }";

	//Flagga för om knappen skall vara användbar eller inte
	$disabled = true;

	//setcookie() & $_COOKIE[]

	//Har användaren tryckt på submit-knappen som har namnet btnSend?
	if( isset($_POST["btnSend"]) ) {

		//Hämta data från $_POST
		$fgColor = $_POST["foregroundcolor"];
		$bgColor = $_POST["backgroundcolor"];

		//Skapa kakor
		setcookie("fgColor", $fgColor, time() + 3600);
		setcookie("bgColor", $bgColor, time() + 3600);

		//Sätt om variabler
		$css = "body { color: $fgColor; background-color: $bgColor; }";
		$disabled = false;

	}

	if( isset( $_POST["btnReset"] ) ) {

		//ta bort kakor
		setcookie("fgColor", "", time() - 3600);
		setcookie("bgColor", "", time() - 3600);

	}

	if( !isset($_POST["btnSend"]) && !isset($_POST["btnReset"]) &&
		isset($_COOKIE["fgColor"]) && isset($_COOKIE["bgColor"])) {

		//Hämta data från $_POST
		$fgColor = $_COOKIE["fgColor"];
		$bgColor = $_COOKIE["bgColor"];

		$css = "body { color: $fgColor; background-color: $bgColor; }";
		$disabled = false;

	}

	
?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med kakor</title>
		<style>
			<?php
				//Skriv ut CSS-instruktionerna...
				if( isset( $css ) ) {
					echo($css);
				}
			?>
		</style>
	</head>
	<body>
		<div>
			
			<form action="<?php echo( $_SERVER["PHP_SELF"] ); ?>" method="post">
		
				<input type="color" name="backgroundcolor" 
					value="<?php if( isset( $bgColor )) { echo( $bgColor ); } ?>" />
				<input type="color" name="foregroundcolor" 
					value="<?php if( isset( $fgColor )) { echo( $fgColor ); } ?>"/>

				<input type="submit" name="btnSend" value="Send" />
				<input type="submit" name="btnReset" value="Reset" 
					<?php if($disabled) { echo("disabled"); } ?>/>
			
			</form>
		
			<?php
			
				echo("<p>\$_POST</p>") . PHP_EOL;
				echo( "<pre>" );
				print_r( $_POST );
				echo( "</pre>" );

				echo("<p> \$_COOKIE</p>") . PHP_EOL;
				echo( "<pre>" );
				print_r( $_COOKIE );
				echo( "</pre>" );
				
				
			?>
			
		</div>
	</body>
</html>