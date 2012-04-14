<?php

	// These will be included in parent files.
	//include "../config.php";
	//include "../util.php";
	
	
	class Uploader{
		
		var $name;
		var $absoluteUploadPath;
		var $userFileName;
		var $tmpFile;
		var $uploadDirectory; 	// We need this variable so we will always upload to the correct path 
								// regardless of which directory the script is executing in.
		
		
		function Uploader($name){
			global $ep_commerce;	
			$this->userFileName = $name;
			$this->name = $_FILES[$this->userFileName]["name"];
			$this->tmpFile = $_FILES[$this->userFileName]["tmp_name"];
			$this->uploadDirectory = "uploads";   		// We assume that the script is executing in epc/index.php (root dir)
			
			
			connect();
			
		}
		
		function upload(){
		
			global $ep_commerce;
		
			// We will find the unique numerical identifier of this particular file upload. 
			$maxResult = mysql_query("SELECT MAX(`u_id`) FROM `epc_uploads`;") or die(mysql_error());
			/* return a table such as: 
				+-------------+
				| MAX(`u_id`) |
				+-------------+
				|           N |
				+-------------+ 
			* Where `N` is the numberof the highest numbered upload. */
			$uploadNumber = mysql_fetch_array($maxResult);
			$uploadNumber = $uploadNumber[0] + 1;


			// Now we will create an two upload paths with the number we just determined
			$uploadPath = $this->uploadDirectory .  "/epc_upload_" . $uploadNumber . "." . $this->getFileExtension();  
			$this->absoluteUploadPath = $ep_commerce["root"] . "/uploads/epc_upload_" . $uploadNumber . "." . $this->getFileExtension(); 
			
			// Then we move the file from it's temporary location to the new permamenant one we determined with $uploadPath
			move_uploaded_file($_FILES[$this->userFileName]["tmp_name"], $uploadPath);
			
			// Finally we will insert the new location into the MySQL database so it can be easily accessed.
			$query = "INSERT INTO `epc_uploads`(`u_path`, `u_file_mask_name`) VALUES(\"{$this->absoluteUploadPath}\", \"{$this->name}\");";
			mysql_query($query) or die();	
			
		}
		
		function getFileExtension(){
			
			$type = $_FILES[$this->userFileName]["type"];
			$arr = explode("/", $type);
			return $arr[1];
			
		}
		
		function setUploadDirectory($dir){
			$this->uploadDirectory = $dir;
		}
	
	}
	
	
	
	
	
	
		
	
?>
