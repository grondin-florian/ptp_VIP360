<?php

require_once 'config.php';

class XMLTools {

	public static function getStringPartUnchanged($xml_string, $start, $end) {
		$firstIndexOfCode = strpos($xml_string, $start);
		if($firstIndexOfCode === -1)
			return false;
		$str_tmp = substr($xml_string, $firstIndexOfCode);
		$lastIndexOfCode = strpos($str_tmp, $end) + strlen($end);

		return substr($str_tmp, 0, $lastIndexOfCode);
	}

	public static function getReplacedStringPart($xml_string, $start, $end, $replacedBy) {
		$startIndex = strpos($xml_string, $start);
		$str_tmp = substr($xml_string, $startIndex);
		$endIndex = strpos($str_tmp, $end) + strlen($end);
		$stringToReplace = substr($str_tmp, 0, $endIndex);

		return str_replace($stringToReplace, $replacedBy, $xml_string);
	}



	public static function updateXMLFiles($xml_array) {
		foreach ($xml_array as $name => $string)
		{
			file_put_contents(__UPLOADURL__.$name.'.xml', $string);
		}
	}
	public static function downloadXMLFiles($xml_array, $project_name) {
		$zip = new ZipArchive();
		$filename = 'archive_'.$project_name.'.zip';

		if ($zip->open(__UPLOADURL__.$filename, ZipArchive::CREATE) != TRUE)
		    die("Impossible d'ouvrir le fichier ".__UPLOADURL__.$filename);

		foreach ($xml_array as $name => $string)
		{
			$zip->addFile(__UPLOADURL__.$name.'.xml', $name.'.xml');
		}
		$zip->close();


		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"".$filename."\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize(__UPLOADURL__.$filename));
		ob_end_flush();
		@readfile(__UPLOADURL__.$filename);

		unlink(__UPLOADURL__.$filename);
	}
	public static function ClearXMLFilesAndSession() {
		foreach ($_SESSION['xmls'] as $name => $string)
		{
			unlink(__UPLOADURL__.$name.'.xml');
		}
		unset($_SESSION['xmls']);
	}
}

