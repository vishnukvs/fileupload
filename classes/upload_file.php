<?php 
//validation
if($_FILES['fileupload']['error']!=4)
 {
   $handle = new Upload($_FILES['fileupload']);
   if ($handle->uploaded)
   {
     $handle->Process('images/originalview/');
     // file uploaded do whatever you want to do now.
   }
   else
   {
       echo '  Error: ' . $handle->error;
   }
 }
 foreach ($files as $file)
 {
    // we instantiate the class for each element of $file 
     $handle = new Upload($file);
   // then we check if the file has been uploaded properly
   // in its *temporary* location in the server (often, it is /tmp)
   if ($handle->uploaded)
   {
      $handle->Process("./test/");
      if ($handle->processed)
      {
         // everything was fine !
      }
      else
      {
         echo '  file not uploaded to the wanted location';
         echo '  Error: ' . $handle->error . '';
      }
    }
    else
    {
        echo '  Error: ' . $handle->error . '';
    }
 }
/*
 * Function image_resize
 *handles the file and resized the images and displays in thumbnail
 * 
 * @param  String fileupload
 * @return image
 */

public function image_resize()
{
 if($_FILES['fileupload']['error']!=4)
 {
   $handle = new Upload($_FILES['fileupload']);
   if ($handle->uploaded)
   {
     $file_body =date('YmdHis');
     $handle->image_resize          = true;
     $handle->image_ratio        = true;
     $handle->image_x               = 100;
     $handle->image_y               = 100;
     $handle->file_new_name_body =$file_body;
     $handle->Process("images/thumbnail/");

     $handle->image_resize          = true;
     $handle->image_ratio           = true;
     $handle->image_x               = 150;
     $handle->image_y               = 150;
     $handle->file_new_name_body =$file_body;
     $handle->Process("images/imageview/");
    }
    else
    {
      echo '  Error: ' . $handle->error . '';
     }
}
}
 ?>