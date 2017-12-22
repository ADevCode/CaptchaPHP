<?php
/**
 * Resize the captcha to 40x80
 */
session_start();
require_once('../captcha/captcha.php');

$captcha = new CaptchaPHP;
$captcha->setHeight(40); // new height
$captcha->setWidth(80); // new width
$captcha->setMarginLeft(10); // make the left margin smaller, because the text overflows
$_SESSION['answer'] = $captcha->setWord(3); // three words can be showed with this settings. a overflow occurs with more than three
?>

<html>
	<img src="../captcha/image.php" border="0"/>
</html>