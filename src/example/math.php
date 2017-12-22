<?php
/**
 * Set a random calculation as a captcha
 */
session_start();
require_once('../captcha/captcha.php');

$_SESSION['answer'] = (new CaptchaPHP)->setMath(); // the result of the calculation
?>

<html>
	<img src="../captcha/image.php" border="0"/>
</html>