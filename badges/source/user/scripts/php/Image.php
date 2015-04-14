<?php
/* Custom file upload exception class.								*/
	class ImageUploadException extends Exception{
		public function __construct($errCode){
			switch($errCode){
				case -1:
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
/*$this class abstracts how php handles images.						*/
	class Image{
		private $data;
	/*reads an uploaded image file and stores its data				*/
		public function __construct($tmpName,$type,$size,$error){
			if($error!=UPLOAD_ERR_OK)
			throw new ImageUploadException($error);
			if(!in_array(
					$type,
					array(
					//file types that are allowed
						'image/gif',
						'image/jpeg',
						'image/jpg',
						'image/pjpeg',
						'image/png'
					)
			))
			throw new ImageUploadException(-1);
			$data=fread(fopen($tmpName,'r'),$size);
		}
	/*takes a data URI and decodes it into image data				*/
		public function __construct($dataURI){
			$data=$dataURI->decode();
		}
	/*return the image data											*/
		public getData(){return$data}
	}
/*$this class abstracts data URIs.									*/
	class DataURI{
		private $data;
	/*encapsulate $this data URI string in a class					*/
		public function __construct($dataURI){$data=$dataURI;}
	/*returns the encoded data URI									*/
		public function getData(){return $data;}
	/*returns a decoded version of the data							*/
		public function decode(){
			return base64_decode(substr($data,strpos($data,",")+1));
		}
	}
?>
