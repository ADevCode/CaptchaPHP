<?php
/**
 * Change the font size and font color of the captcha text
 */
session_start();
require_once('../captcha/captcha.php');

$captcha = new CaptchaPHP;
$captcha->setFontColor(array(255, 0, 127)); // font color is always pink
$captcha->setFontSize(16); // font size is 16pt
$_SESSION['answer'] = $captcha->setWord();
?>

<html>
	<img src="../captcha/image.php" border="0"/>
</html>