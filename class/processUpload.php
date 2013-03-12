<?php
    include '../library/constant.php';
    echo UPLOAD_PATH."<br/> <pre>";
    
    print_r($_FILES);
    die;
    $allowedExts = array("doc", "docx", "rtf", "txt","pdf","tif");
    $extension = end(explode(".", $_FILES["resume"]["name"]));
    if ((($_FILES["resume"]["type"] == "application/msword")
    || ($_FILES["resume"]["type"] == "application/rtf")
    || ($_FILES["resume"]["type"] == "application/pdf")
    || ($_FILES["resume"]["type"] == "text/plain"))
    && ($_FILES["resume"]["size"] < 5242880)
    && in_array($extension, $allowedExts)) {
        if ($_FILES["resume"]["error"] > 0) {
            echo "Return Code: " . $_FILES["resume"]["error"] . "<br>";
        } else {
            if (file_exists(UPLOAD_PATH . $_FILES["resume"]["name"])) {
                echo $_FILES["resume"]["name"] . " already exists. ";
            } else {
                $ok = move_uploaded_file($_FILES["resume"]["tmp_name"],UPLOAD_PATH.$_FILES["resume"]["name"]);
                if($ok) { 
                    echo "Stored in: " . UPLOAD_PATH . $_FILES["resume"]["name"];
                    echo "File Uploaded Successfully";
                }
		else {
			echo "File Upload Failed.";
		}
            }
        }
    }
    else {
      echo "Invalid file";
    }
?> 
