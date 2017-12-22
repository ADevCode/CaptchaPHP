<?php
session_start();
require_once('../captcha/captcha.php');
$msg = '';
if(isset($_POST['captcha'])) {
	$input = $_POST['captcha'];
	if($input == $_SESSION['answer']) {
		$msg = "Captcha RIGHT!";
	} else {
		$msg = "Captcha FALSE!";
	}
}

$captcha = new CaptchaPHP;
$_SESSION['answer'] = $captcha->setWord();
?>

<html>
<body>
	<!-- Load the image -->
	<img src='../captcha/image.php' border='0'/>
	<p><?=$msg?></p>
	<form method="post">
		<input type="text" name="captcha" placeholder="Enter the captcha above.."/>
	</form>
</body>
</html>