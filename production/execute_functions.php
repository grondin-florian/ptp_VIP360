<?php

require_once 'import/functions.php';
require_once 'import/config.php';
session_start();

//-- Allow to display all string info with xdebug
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);




function deleteLookAt($idElement, $qty, $project_name) {
	$nbrHotspot = substr($idElement, -1);
	$panoID = array();

	for ( $q = 0 ; $q < $qty ;  $q++ )
	{
		$q = ( $q === 0 ? '' : $q );
		for( $i = 1 ; $i <= $nbrHotspot ; $i++ )
		{
			//-- Correct _skin file
			$stringOrigin_skin = XMLTools::getStringPartUnchanged($_SESSION['xmls'][$project_name.'_skin'], '<action name="onclickbouton'.$i.$idElement.$q.'">', '</action>');
			if($stringOrigin_skin === false)
				continue;
			array_push($panoID, ( preg_match('/mainloadscene\((.*?)\)\;lookat/', $stringOrigin_skin, $panoIDtmp) ? $panoIDtmp[1] : null ));
			$newString_skin = XMLTools::getReplacedStringPart($stringOrigin_skin, 'lookat(', '.fov));', '');
			$_SESSION['xmls'][$project_name.'_skin'] = str_replace($stringOrigin_skin, $newString_skin, $_SESSION['xmls'][$project_name.'_skin']);
		}
	}


	//-- Correct base file if not already corrected
	$panoID = array_unique($panoID);
	$xml = $_SESSION['xmls'][$project_name];
	foreach ($panoID as $id)
	{
		$stringOrigin = XMLTools::getStringPartUnchanged($xml, '<scene name="'.$id.'"', '</scene>');
		$newString = XMLTools::getReplacedStringPart($stringOrigin, '<panoview', '" />', '');
		$newString2 = XMLTools::getReplacedStringPart($newString, 'hlookat="', '/>', '/>');
		$xml = str_replace($stringOrigin, $newString2, $xml);
	}
	$_SESSION['xmls'][$project_name] = $xml;
}




/*
 * Request Handler
 */

if(array_key_exists('functions_selected', $_POST))
{
	$functions_selected = $_POST['functions_selected'];
	$xmls = $_SESSION['xmls'];
	$project_name = $_SESSION['projectName'];
	$fileAffected = $xmlAffected = $functionsToDo = $functionParameters = array();
	foreach ($functions_selected as $key => $function)
	{
		switch ($function)
		{
			case 'multipleButtonsThree_noViewChange':
				deleteLookAt('multipleSpot3', $_POST['multipleButtonsThree_noViewChange_qty'], $project_name);
				break;
			case 'multipleButtonsFour_noViewChange':
				deleteLookAt('multipleSpot4', $_POST['multipleButtonsFour_noViewChange_qty'], $project_name);
				break;
			case 'multipleButtonsFive_noViewChange':
				deleteLookAt('multipleSpot5', $_POST['multipleButtonsFive_noViewChange_qty'], $project_name);
				break;
			default:
				# code...
				break;
		}
	}

	XMLTools::updateXMLFiles($_SESSION['xmls']);
	XMLTools::downloadXMLFiles($_SESSION['xmls'], $project_name);
}
else
	header('Location: '.__PROD__);
