<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace tool;

class Uploader {
	/**
	 * Method to upload an image to the server
	 * @param  String $path      The path where to save the uploaded image
	 * @param  String $fieldname The name of the file upload field, defaults to: image
	 */
	public static function uploadImage($path, $fieldname = 'image') {
		// Check if there was a SINGLE file uploaded
		if (!isset($_FILES[$fieldname]['error']) 
		|| is_array($_FILES[$fieldname]['error'])) {
		    throw new \Exception('Invalid parameters.');
		}

		// Controleren of er niet iets is misgegaan
		switch ($_FILES[$fieldname]['error']) {
		    case UPLOAD_ERR_OK:
		        break;
		    case UPLOAD_ERR_NO_FILE:
		        return;
		    case UPLOAD_ERR_INI_SIZE:
		    case UPLOAD_ERR_FORM_SIZE:
		        throw new \Exception('Het bestand is groter dan de toegestane groote.');
		    default:
		        throw new \Exception('Er heeft zich een onbekende error voorgedaan.');
		}

		// Check if the file is not bigger than the allowed file size of 2 mb
		if ($_FILES[$fieldname]['size'] > (1024 * 1024 * 2))
		    throw new \Exception('Het bestand is groter dan de toegestane groote.');

		$img = $_FILES[$fieldname]['tmp_name'];

		var_dump($img);

		if (($img_info = getimagesize($img)) === FALSE)
		  throw new \Exception('De afbeelding kon niet worden geupload.');

		$width = $img_info[0];
		$height = $img_info[1];

		switch ($img_info[2]) {
			case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
			case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
			case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
			default:
				throw new \Exception("Het bestand geupload wordt niet geaccepteerd! Upload een GIF, JPEG of PNG");
		}

		$tmp = 	imagecreatetruecolor($width, $height);
				imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
				imagejpeg($tmp, $path);
	}
}