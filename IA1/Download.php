<?php

class Download{


	function downloadFile(string $filepath)
	{
		$filename = urldecode($filepath);
		if (file_exists($filename)) {
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($filename));
		    readfile($filename);
		    exit;
		}
	}

	function downloadAll($filesPath, $zipFileName)
	{
		if(!is_dir($filesPath) || $filesPath == "" || $zipFileName == ""){
			return;
		}
		 
		$zipFileName = "./$zipFileName";
		$this->createZipFile($filesPath, $zipFileName);
		$this->downLoadZipFile($zipFileName);
	}


	function createZipFile($filesPath, $filename)
	{
		$zip = new ZipArchive();

		  if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
		    exit("cannot open <$filename>\n");
		  }

		  $dir = "$filesPath/";

		  // Create zip
		  $this->createZip($zip,$dir);

		  $zip->close();

	}

	// Create zip
	function createZip($zip,$dir){
	  if (is_dir($dir)){

	    if ($dh = opendir($dir)){
	       while (($file = readdir($dh)) !== false){
	         // If file
	         if (is_file($dir.$file)) {
	            if($file != '' && $file != '.' && $file != '..'){
	 
	               $zip->addFile($dir.$file);
	            }
	         }else{
	            // If directory
	            if(is_dir($dir.$file) ){

	              if($file != '' && $file != '.' && $file != '..'){

	                // Add empty directory
	                $zip->addEmptyDir($dir.$file);

	                $folder = $dir.$file.'/';
	 
	                // Read data of the folder
	                $this->createZip($zip,$folder);
	              }
	            }
	 
	         }
	 
	       }
	       closedir($dh);
	     }
	  }
	}


	function downLoadZipFile($filename)
	{
		  if (file_exists($filename)) {

		     header('Content-Type: application/zip');
		     header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		     header('Content-Length: ' . filesize($filename));

		     flush();
		     readfile($filename);
		     // delete file
		     unlink($filename);
		 
		   }else{
		    exit("not exists <$filename>\n");

		   }

	}

}

?>