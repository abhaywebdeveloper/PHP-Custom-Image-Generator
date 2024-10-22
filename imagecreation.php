<?php
// Image URL
$image_name = 'https://scontent.fdel1-5.fna.fbcdn.net/v/t39.30808-6/330980843_855369455525307_7862295947048624627_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=a5f93a&_nc_ohc=UGum1T8EmEAQ7kNvgFOoUfE&_nc_zt=23&_nc_ht=scontent.fdel1-5.fna&_nc_gid=A4lkBnsrH5VD5aIjCgQrXyT&oh=00_AYAD0OnTwQZrWvxTsqY_iEz8wYTC-ZZZgc7Pe8LeKb_1Bw&oe=671D4F11';

$image = @imagecreatefromjpeg($image_name); // Use '@' to suppress warnings if the image fails to load

if ($image) {
    // Get original dimensions
    list($width, $height) = getimagesize($image_name);

    // Create a new true color image with the desired dimensions
    $resized_image = imagecreatetruecolor(400, 300);

    // Resize the original image into the new image
    imagecopyresampled($resized_image, $image, 0, 0, 0, 0, 400, 300, $width, $height);

    // Allocate text color (black)
    $text_color = imagecolorallocate($resized_image, 0, 0, 0); // RGB for black

    // Manually set text for each line
    imagestring($resized_image, 5, 10, 260, "NAME: Abhay Kumar Singh", $text_color); // Line 1
    imagestring($resized_image, 5, 10, 280, "DOB: 20-12-1996", $text_color); // Line 2

    // Set the content type header for JPEG output
    header("Content-type: image/jpeg");

    // Output the modified image with the text
    imagejpeg($resized_image);

    // Free up memory
    imagedestroy($image);
    imagedestroy($resized_image);
} else {
    echo "Failed to create image from the URL.";
}
?>
