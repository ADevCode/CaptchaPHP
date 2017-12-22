<?php
/**
 * Change the background color of the captcha
 */
session_start();
require_once('../captcha/captcha.php');

$captcha = new CaptchaPHP;
$captcha->setBackgroundColor(array(102, 178, 255)); // background color is always light blue
$_SESSION['answer'] = $captcha->setWord();
?>

<html>
	<img src="../captcha/image.php" border="0"/>
</html>