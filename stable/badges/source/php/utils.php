<?php
	require_once(__DIR__ . "/dbc.php");
/* Custom file upload exception class.								*/
	class ImageUploadException extends Exception
	{
		public function __construct($errCode)
		{
			switch($errCode)
			{
				case -1:
					$err="missing temp file";
					break;
				case -2:
					$err="invalid file type";
					break;
				case UPLOAD_ERR_INI_SIZE:
					$err="file size exceeds php limit";
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$err="file size exceeds form limit";
					break;
				case UPLOAD_ERR_PARTIAL:
					$err="incomplete upload";
					break;
				case UPLOAD_ERR_NO_FILE:
					$err="no file given";
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$err="missing temp folder";
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$err="write error";
					break;
				case UPLOAD_ERR_EXTENSION:
					$err="file upload stopped by extension";
					break;
				default:
					$err="unkown upload error";
					break; 
			}
			parent::__construct($err,$errCode);
		}
	}
/* Returns the contents of a file as a string.
 * Throws an ImageUploadException									*/
	function uploadImage($image)
	{
		global $dbc;
	//throw errors
		if(!isset($image['tmp_name']))
			throw new ImageUploadException(-1);
		if(!in_array($image['type'],array('image/gif','image/jpeg','image/jpg','image/pjpeg','image/png')))
			throw new ImageUploadException(-2);
		if($image['error']!=UPLOAD_ERR_OK)
			throw new ImageUploadException($image['error']);
	//or return the file contents as a string
		return mysqli_real_escape_string($dbc,fread(fopen($image['tmp_name'],'r'),$image['size']));
	}
?>
