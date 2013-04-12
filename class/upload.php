<?php
   session_start();
   $file = $_SESSION['filename']; // of course find the exact filename....
   $type=end(explode(".",$_SESSION['filename']));
   if($type=="doc") {
      $ctype="application/msword";
   } else if($stype=="docx"){
      $ctype="application/vnd.openxmlformats-officedocument.wordprocessingml.document";
   } else if($type=="pdf") {
      $ctype="application/pdf";
   } else if($type=="rtf") {
      $ctype="application/rtf";
   } else if($type=="txt") {
      $ctype="text/plain";
   }
   
   
   header('Pragma: public');
   header('Expires: 0');
   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
   header('Cache-Control: private', false); // required for certain browsers 
   header("Content-Type: ".$ctype);
   
   header('Content-Disposition: attachment; filename="resume.'. $type . '";');
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: ' . filesize($file));
   
   readfile($file);
   
   exit;
?>