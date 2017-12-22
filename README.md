# CaptchaPHP
A class which helps to generate captchas

## Usage
### Importing the class and declaring a generator
``` php
require_once('captcha/captcha.php');
$captcha = new CaptchaPHP;
```

### Generate a simple captcha and save the result in the session
``` php
$_SESSION['answer'] = $captcha->setWord();
```
You can validate the input of the user with the session variable.<br>
A basic captcha validation is in the file "enterCaptcha.php" in the example folder.

### Print the captcha as an image
``` html
<img src="captcha/image.php" border="0"/>
```

### Make a calculation captcha
There are three types of calculation methods which can be changed by the first param of the function "setMath(..)".<br>
The type can be set to +, - or *.

``` php
$_SESSION['answer'] = $captcha->setMath('*');
```

## API
* **__construct()**, the constructur will initialize the settings to their default values
* **setWord($length = 5)**, creates a random word with a given length and returns it
* **setMath($type = '+', $min = 0, $max = 10)**, generates a calculation with numbers ranging from $min to $max and returns the solution. The type can be set to +,- or *.
* **setHeight($height)**, sets the height of the image
* **setWidth($width)**, sets the width of the image
* **setFontSize($fontSize)**, sets the font size of the text
* **setFontColor($fontColor)**, sets the font color. The color has to be given as an array with the rgb values e.g array(255,255,0)
* **setBackgroundColor($backgroundColor)**, sets the background color. Also the color has to be given as an array with the rgb values.
* **setMarginTop($margin)**, changes the top margin of the captcha text
* **setMarginChar($margin)**, changes the margin between the characters of the text
* **setMarginLeft($margin)**, changes the left margin of the text.
* **setAngle($angle)**, changes the angle of the text characters. The text characters will have a random angle ranging from -$angle to +$angle
* **setFont($name)**, changes the font used. Place the new font in the font folder and access this function with the fullname of the font file with its extension(!).

