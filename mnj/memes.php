<?php
$dirname = "media/images/iconized/";
$images = glob($upload."*.png");

foreach($images as $image) {
    echo '<img src="'.$image.'" /><br />';
}
       ?>