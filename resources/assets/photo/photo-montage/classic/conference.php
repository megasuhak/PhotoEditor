<?php 	$canvaswidth = 878;	$canvasheight = 586;	//desired max width and max height of the uploaded image	$dst = @imagecreatetruecolor(430, 300);	imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));	$src_width = $modwidth;	$src_height = $modheight; 	$dst_width = 430;	$dst_height = 300;	$new_width = $dst_width;	$new_height = round($new_width*($src_height/$src_width));	$new_x = 0;	$new_y = round(($dst_height-$new_height)/2);	$next = $new_height < $dst_height;	if ($next) {		$new_height = $dst_height;		$new_width = round($new_height*($src_width/$src_height));		$new_x = round(($dst_width - $new_width)/2);		$new_y = 0;	}	imagecopyresampled($dst, $finalimage , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);	$finalimage = @imagecreatetruecolor($canvaswidth, $canvasheight); 	//delete the following if you do not want a rotation	//position of the resized uploaded image, 0 is the left position and 200 the top position	imagecopy ($finalimage,$dst,218,110,0,0,$canvaswidth,$canvasheight); 	//url of the PNG layer	$png = "../props/9.png"; 	$effect = imagecreatefrompng($png); 	/*for debug	//uncomment the following and comment the next imagecopyresampled to see the transparency and edit the position easily	//imagecopymerge ($finalimage,$effect,0,0,0,0,$canvaswidth,$canvasheight,50); 	*/	imagecopyresampled ($finalimage,$effect,0,0,0,0,$canvaswidth,$canvasheight,$canvaswidth,$canvasheight); ?>