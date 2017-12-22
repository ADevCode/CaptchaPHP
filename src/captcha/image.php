<?php
if(session_id() == '') session_start();
if(!isset($_SESSION["_captcha"])) exit("[CaptchaPHP]: No captcha!");

/**
 *  Accessing the settings from the session
 */
$captcha = $_SESSION['_captcha']; // array that has the settings of the captcha
$height = $captcha['height'];
$width = $captcha['width'];
$type = $captcha['type'];
$fontSize = $captcha['fontsize'];
$fontColor = $captcha['fontcolor'];
$bgColor = $captcha['backgroundcolor'];
$marginTop = $captcha['margintop'];
$marginChar = $captcha['marginchar'];
$marginLeft = $captcha['marginleft'];
$angle = $captcha['angle'];
$font = $captcha['font'];

$captchaText = '';
if($type == 'word') {
	$captchaText = $captcha['answer'];
} else if($type == '+' || $type == '-' || $type == '*') {
	$captchaText = $captcha['mathText'];
} else exit("[CaptchaPHP]: Invalid type of captcha. (+,-,*,word) are valid!");

$image = imagecreate($width, $height);
$backgroundColor = imagecolorallocate($image, $bgColor[0], $bgColor[1], $bgColor[2]);
$textColor = imagecolorallocate($image, $fontColor[0], $fontColor[1], $fontColor[2]);
$lineColor = imagecolorallocate($image, mt_rand(100,255), mt_rand(100,255), mt_rand(100,255));

// draw some lines
for($i = 0; $i < mt_rand(1, 6); $i++) {
	$x1 = mt_rand(0, $width);
	$y1 = mt_rand(0, $height);
	$x2 = mt_rand(0, $width);
	$y2 = mt_rand(0, $height);
	imageline($image, $x1, $y1, $x2, $y2, $lineColor);
}

// write the characters of the text
for($i = 0; $i < strlen($captchaText); $i++)
	imagettftext($image, $fontSize, ($type == 'word') ? rand(-$angle,$angle) : 0, $marginLeft + $marginChar*$i, $marginTop, $textColor, 'font/'.$font, $captchaText[$i]);

header("Content-type: image/png");
imagepng($image);
imagecolordeallocate($textColor);
imagecolordeallocate($backgroundColor);
imagecolordeallocate($lineColor);
imagedestroy($image);
unset($_SESSION['_captcha']);
?>