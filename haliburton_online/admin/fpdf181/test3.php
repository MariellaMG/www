<?php

$file_name = 'eltest.pdf'; // using just for this example, I pull $file_name from another function

function _create_preview_images($file_name) {

    // Strip document extension
    $file_name = basename($file_name, '.pdf');

    // Convert this document
    // Each page to single image
    $img = new imagick(''.$file_name.'.pdf');

    // Set background color and flatten
    // Prevents black background on objects with transparency
    $img->setImageBackgroundColor('white');
    $img = $img->flattenImages();

    // Set image resolution
    // Determine num of pages
    $img->setResolution(400,400);
    $num_pages = $img->getNumberImages();
	
	echo $num_pages;
	
	//$num_pages=3;

    // Compress Image Quality
    $img->setImageCompressionQuality(100);

    // Convert PDF pages to images
    for($i = 0;$i < $num_pages; $i++) {         

        // Set iterator postion
        $img->setIteratorIndex($i);

        // Set image format
        $img->setImageFormat('jpeg');

        // Write Images to temp 'upload' folder     
        $img->writeImage('uploads/'.$file_name.'-'.$i.'.jpg');
    }

    $img->destroy();
}


_create_preview_images("eltest.pdf");

?>
