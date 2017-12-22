<?php
if(session_id() == '') session_start();

/**
 *  CaptchaPHP is a class which will help you to customize your captcha
 *  The settings of the captcha are saved in a session variable
 *  The file "image.php" uses the settings and generates the captcha image
 */
class CaptchaPHP {
	
	/**
	 *  @brief Constructor of the class
	 */
	function __construct() {
		$_SESSION['_captcha']['height'] = 45;
		$_SESSION['_captcha']['width'] = 175;
		$_SESSION['_captcha']['fontsize'] = 18;
		$_SESSION['_captcha']['fontcolor'] = array(mt_rand(0, 255), mt_rand(0,255), mt_rand(0,255));
		do {
			$_SESSION['_captcha']['backgroundcolor'] = array(mt_rand(0, 255), mt_rand(0,255), mt_rand(0,255));
		} while($_SESSION['_captcha']['backgroundcolor'] == $_SESSION['_captcha']['fontcolor']);
		$_SESSION['_captcha']['margintop'] = 30;
		$_SESSION['_captcha']['marginchar'] = 25;
		$_SESSION['_captcha']['marginleft'] = 25;
		$_SESSION['_captcha']['angle'] = 20;
		$_SESSION['_captcha']['font'] = 'font1.ttf';
	}
	
	/**
	 *  @brief Generates a random captcha word and returns it
	 *  
	 *  @param [in] $length The length of the word
	 *  @return Returns the word, which can be used for validation
	 *  
	 *  @details The characters used for the word are in the variable $pattern
	 */
	public function setWord($length = 5) {
		$word = '';
		$pattern = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789";
		for($i = 0; $i < $length; $i++)
			$word .= $pattern[mt_rand(0, strlen($pattern)-1)];
		$_SESSION['_captcha']['type'] = 'word';
		return $_SESSION['_captcha']['answer'] = $word;
	}
	
	/**
	 *  @brief Makes a calculation and returns the result
	 *  
	 *  @param [in] $type The type of calculation (+,- or *)
	 *  @param [in] $min The smallest number the calculation can contain
	 *  @param [in] $max The biggest number the calculation can contain
	 *  @return Returns the result of the calculation
	 *  
	 *  @details By accessing this method, the captcha image will contain a calculation
	 *           The result of the calculation is returned, which can be used for validation
	 */
	public function setMath($type = '+', $min = 0, $max = 10) {
		$_SESSION['_captcha']['type'] = $type;
		if($type == '+') {
			$plus1 = mt_rand($min, $max);
			$plus2 = mt_rand($min, $max);
			$_SESSION['_captcha']['mathText'] = "$plus1 + $plus2";
			return $_SESSION['_captcha']['answer'] = $plus1 + $plus2;
		} else if($type == '-') {
			do {
				$sub1 = mt_rand($min, $max);
				$sub2 = mt_rand($min, $max);
			} while($sub1 < $sub2);
			$_SESSION['_captcha']['mathText'] = "$sub1 - $sub2";
			return $_SESSION['_captcha']['answer'] = $sub1 - $sub2;	
		}
		else if($type == '*') {
			$mult1 = mt_rand($min, $max);
			$mult2 = mt_rand($min, $max);
			$_SESSION['_captcha']['mathText'] = "$mult1 * $mult2";
			return $_SESSION['_captcha']['answer'] = $mult1 * $mult2;
		} else {
			exit("[CaptchaPHP]: Invalid type of calculation. (+,-,*) are only allowed!");
			return;
		}
	}
	
	/**
	 *  @brief Changes the height of the image
	 *  
	 *  @param [in] $height Height in pixels
	 */
	public function setHeight($height) {
		$_SESSION['_captcha']['height'] = $height;
	}
	
	/**
	 *  @brief Changes the width of the image
	 *  
	 *  @param [in] $width Width in pixels
	 */
	public function setWidth($width) {
		$_SESSION['_captcha']['width'] = $width;
	}
	
	/**
	 *  @brief Changes the font size of the text
	 *  
	 *  @param [in] $fontSize Font size in Points (Pt)
	 */
	public function setFontSize($fontSize) {
		$_SESSION['_captcha']['fontsize'] = $fontSize;
	}
	
	/**
	 *  @brief Changes the font color of the text
	 *  
	 *  @param [in] $fontColor Color as an array, containing the RGB values
	 */
	public function setFontColor($fontColor) {
		$_SESSION['_captcha']['fontcolor'] = $fontColor;
	}
	
	/**
	 *  @brief Changes the background color of the image
	 *  
	 *  @param [in] $backgroundColor Color as an array, containing the RGB values
	 */
	public function setBackgroundColor($backgroundColor) {
		$_SESSION['_captcha']['backgroundcolor'] = $backgroundColor;
	}
	
	/**
	 *  @brief Changes the top margin of the text
	 *  
	 *  @param [in] $margin Margin in pixels
	 */
	public function setMarginTop($margin) {
		$_SESSION['_captcha']['margintop'] = $margin;
	}
	
	/**
	 *  @brief Changes the margin between the characters
	 *  
	 *  @param [in] $margin Margin in pixels
	 */
	public function setMarginChar($margin) {
		$_SESSION['_captcha']['marginchar'] = $margin;
	}
	
	/**
	 *  @brief Changes the left margin of the text
	 *  
	 *  @param [in] $margin Margin in pixels
	 */
	public function setMarginLeft($margin) {
		$_SESSION['_captcha']['marginleft'] = $margin;
	}
	 
	/**
	 *  @brief Changes the angle of the characters
	 *  
	 *  @param [in] $angle Angle in degree
	 */
	public function setAngle($angle) {
		$_SESSION['_captcha']['angle'] = $angle;
	}
	
	/**
	 *  @brief Change the font of the text
	 *  
	 *  @param [in] $name Name of the font with the extension
	 *  
	 *  @details Place the font in the folder "font"
	 */
	public function setFont($name) {
		$_SESSION['_captcha']['font'] = $name;
	}
}
?>