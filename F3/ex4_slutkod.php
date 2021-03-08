<?php

	function deleteSession() {

		session_unset();

		if( ini_get("session.use_cookies") ) {

			$sessionCookieData = session_get_cookie_params();

			$path = $sessionCookieData["path"];
			$domain = $sessionCookieData["domain"];
			$secure = $sessionCookieData["secure"];
			$httponly = $sessionCookieData["httponly"];

			$name = session_name();

			setcookie($name, "", time() - 3600, $path, $domain, $secure, $httponly);

		}

		session_destroy();

	}

	session_start();

	//defaultvärde för CSS-elementet
	$css = "body { color: rgb(0,0,0); background-color: rgb(255,255,255); }";

	//Flagga för om knappen skall vara användbar eller inte
	$disabled = true;

	//Här kommer koden...
	if( isset($_POST["btnSend"]) ) {

		//Hämta data från $_POST
		$fgColor = $_POST["foregroundcolor"];
		$bgColor = $_POST["backgroundcolor"];

		//Skapa kakor
		//setcookie("fgColor", $fgColor, time() + 3600);
		//setcookie("bgColor", $bgColor, time() + 3600);

		//Skapa sessionvariabler
		$_SESSION["fgColor"] = $fgColor;
		$_SESSION["bgColor"] = $bgColor;

		//Sätt om variabler
		$css = "body { color: $fgColor; background-color: $bgColor; }";
		$disabled = false;

	}

	if( isset( $_POST["btnReset"] ) ) {

		//ta bort kakor
		//setcookie("fgColor", "", time() - 3600);
		//setcookie("bgColor", "", time() - 3600);

		//Töm sessioner och ta bort den sedan.
		//session_unset();
		//session_destroy();
		deleteSession();

	}

	if( !isset($_POST["btnSend"]) && !isset($_POST["btnReset"]) &&
		//isset($_COOKIE["fgColor"]) && isset($_COOKIE["bgColor"])) {
			isset($_SESSION["fgColor"]) && isset($_SESSION["bgColor"])) {

		//Hämta data från $_COOKIE
		//$fgColor = $_COOKIE["fgColor"];
		//$bgColor = $_COOKIE["bgColor"];

		//Hämta data från $_SESSION
		$fgColor = $_SESSION["fgColor"];
		$bgColor = $_SESSION["bgColor"];

		$css = "body { color: $fgColor; background-color: $bgColor; }";
		$disabled = false;

	}

	//if( !isset($_POST["btnSend"]) && !isset($_POST["btnReset"]) &&
	//	!isset($_SESSION["fgColor"]) && !isset($_SESSION["bgColor"])) {}

?>
<!doctype html>
<html lang="en" >
	<head>
		<meta charset="utf-8" />
		<title>Ett exempel med sessioner</title>
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

				<input type="color" name="backgroundcolor" value="<?php if( isset( $bgColor )) { echo( $bgColor ); } ?>" />
				<input type="color" name="foregroundcolor" value="<?php if( isset( $fgColor )) { echo( $fgColor ); } ?>"/>

				<input type="submit" name="btnSend" value="Send" />
				<input type="submit" name="btnReset" value="Reset" <?php if( $disabled ) { echo("disabled"); } ?> />
			
			</form>
		
			<?php
			
				echo( "<pre>" );
				print_r( $_POST );
				print_r( $_SESSION );
				echo( "</pre>" );
				
			?>
			
		</div>
	</body>
</html>