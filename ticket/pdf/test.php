<?php
// Create a blank image with a white background
// Create a blank image with a white background
$image = imagecreatetruecolor(400, 200);
$bgColor = imagecolorallocate($image, 255, 255, 255);

// Define a red text color
$textColor = imagecolorallocate($image, 255, 0, 0);

// Add text to the image using a built-in font (e.g., 5 for gd)
$text = 'Hello, World!';
imagettftext($image, 20, 0, 50, 100, $textColor, 5, $text);

// Save the image to a file (in this example, it's saved as "output.png")
imagepng($image, 'output.png');

// Free up memory by destroying the image resource
imagedestroy($image);

echo 'Image saved as "output.png"';





?>
