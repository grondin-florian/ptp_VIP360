<?php

require_once 'config.php';

class XMLTools {
	public static function getStringPart($xml_string, $start, $end) {
		$firstIndexOfCode = strpos($xml_string, $start);
		$str_tmp = substr($xml_string, $firstIndexOfCode);
		$lastIndexOfCode = strpos($str_tmp, $end) + strlen($end);

		return substr($str_tmp, 0, $lastIndexOfCode);
	}

	public static function getStringPartUnchanged($xml_string, $project_name, $start, $end) {
		//-- Check before if part asked as not been already modified. If so, return the string part from the saved modified version of it
		foreach ($_SESSION[$project_name] as $origin => $modified)
		{
			if(XMLTools::getStringPart($origin, $start, $end) != '')
				return $modified;
		}

		return XMLTools::getStringPart($xml_string, $start, $end);
	}

	public static function getReplacedStringPart($xml_string, $start, $end, $replacedBy) {
		$stringToReplace = XMLTools::getStringPart($xml_string, $start, $end);

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
	public static function clearXMLFilesAndSession() {
		foreach ($_SESSION['xmls'] as $name => $string)
		{
			unlink(__UPLOADURL__.$name.'.xml');
		}
		unset($_SESSION['xmls']);
	}
	public static function deleteOldXMLFiles() {
		if ($handle = opendir(__UPLOADURL__))
		{
		    while (false != ($file = readdir($handle))) 
		    {
		        if ((time() - filectime(__UPLOADURL__.$file)) >= __TIMEBEFOREDELETE__) // 8H
		        {
		           if (preg_match('/\.xml$/i', $file))
		              unlink(__UPLOADURL__.$file);
		        }
		    }
		}
	}
}

