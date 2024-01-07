<?php
function getExtension($str) {
  $i = strrpos($str,".");
  if (!$i) { return ""; }
  $l = strlen($str) - $i;
  $ext = substr($str,$i+1,$l);
  return $ext;
}

function gd_image_resize($actual_image_name,$uploaded_path,$resized_path,$resize_height){
  $name = $_FILES['image']['name'];
  $size = $_FILES['image']['size'];
  $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");

  if(strlen($name)){
    $ext = getExtension($name);

    if(in_array($ext,$valid_formats)){

      if($size<(2048*2048)){
        $tmp = $_FILES['image']['tmp_name'];

        if(move_uploaded_file($tmp, $uploaded_path.$actual_image_name)){
          $image=$actual_image_name;
          /*--------resize image-----------*/
          //$resize_height = 100; // the imageheight
          $filedir = $uploaded_path; // the directory for the original image
          $thumbdir = $resized_path; // the directory for the resized image
          $prefix = $time1.'_'; // the prefix to be added to the original name
          $maxfile = '20000000';
          $mode = '0666';
          $userfile_name =str_replace(" ", "", $_FILES['image']['name']);
          $userfile_tmp = str_replace(" ", "", $_FILES['image']['tmp_name']);
          $userfile_size =$_FILES['image']['size'];
          $userfile_type = $_FILES['image']['type'];

          if (isset($_FILES['image']['name'])){
            $prod_img = $filedir.$actual_image_name;
            $prod_img_thumb = $thumbdir.$actual_image_name;
            move_uploaded_file($userfile_tmp, $prod_img);
            chmod ($prod_img, octdec($mode));
            $sizes = getimagesize($prod_img);
            $aspect_ratio = $sizes[1]/$sizes[0];

            if ($sizes[1] <= $resize_height){
              $new_width = $sizes[0];
              $new_height = $sizes[1];
            }else{
              $new_height = $resize_height;
              $new_width = abs($new_height/$aspect_ratio);
            }
            $destimg=ImageCreateTrueColor($new_width,$new_height)
            or die('Problem In Creating image');

            switch($ext){
              case "jpg":
              case "jpeg":
              case "JPG":
              case "JPEG":
                $srcimg=ImageCreateFromJPEG($prod_img)or die('Problem In opening Source Image');
                break;
              case "PNG":
              case "png":
                $srcimg = imageCreateFromPng($prod_img)or die('Problem In opening Source Image');
                imagealphablending($destimg, false);
                $colorTransparent = imagecolorallocatealpha($destimg, 0, 0, 0, 0x7fff0000);
                imagefill($destimg, 0, 0, $colorTransparent);
                imagesavealpha($destimg, true);

                break;
              case "BMP":
              case "bmp":
                $srcimg = imageCreateFromBmp($prod_img)or die('Problem In opening Source Image');
                break;
              case "GIF":
              case "gif":
                $srcimg = imageCreateFromGif($prod_img)or die('Problem In opening Source Image');
                break;
              default:
                $srcimg=ImageCreateFromJPEG($prod_img)or die('Problem In opening Source Image');
            }

            if(function_exists('imagecopyresampled')){
              imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))
              or die('Problem In resizing');
            }else{
              Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))
              or die('Problem In resizing');
            }



            // Saving an image
            switch(strtolower($ext)){
              case "jpg":
              case "jpeg":
                ImageJPEG($destimg,$prod_img_thumb,90) or die('Problem In saving');
                break;

              case "png":
                imagepng($destimg,$prod_img_thumb) or die('Problem In saving');
                break;

              case "bmp":
                imagewbmp($destimg, $prod_img_thumb)or die('Problem In saving');
                break;

              case "gif":
                imagegif($destimg,$prod_img_thumb) or die('Problem In saving');
                break;

              default:
                // if image format is unknown, and you whant save it as jpeg, maybe you should change file extension
                imagejpeg($destimg,$prod_img_thumb,90) or die('Problem In saving');
            }



          }
          //unlink($prod_img);
          //echo "<img src='".$prod_img_thumb."'>";
        }else{
          echo "Fail upload folder with read access.";
        }
      }else{
        echo "Image file size max 3 MB";
      }

    }else{
      echo "Invalid file format..";
    }
  }else{
    echo "Please select image..!";
  }

  //exit;
}
?>