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

	$_SESSION[$project_name.'_skin'] = array();
	for ( $q = 0 ; $q < $qty ;  $q++ )
	{
		$q = ( $q === 0 ? '' : $q );
		for( $i = 1 ; $i <= $nbrHotspot ; $i++ )
		{
			//-- Correct _skin file
			$stringOrigin_skin = XMLTools::getStringPartUnchanged($_SESSION['xmls'][$project_name.'_skin'], $project_name.'_skin', '<action name="onclickbouton'.$i.$idElement.$q, '</action>');
			//-- Save affected panoID
			array_push($panoID, ( preg_match('/mainloadscene\((.*?)\)\;lookat/', $stringOrigin_skin, $panoIDtmp) ? $panoIDtmp[1] : null ));
			$newString_skin = XMLTools::getReplacedStringPart($stringOrigin_skin, 'lookat(', '.fov));', '');
			//-- Apply modifications and save the string modified in new array to compare with for further modifications
			//$_SESSION['xmls'][$project_name.'_skin'] = str_replace($stringOrigin_skin, $newString_skin, $_SESSION['xmls'][$project_name.'_skin']);
			$_SESSION[$project_name.'_skin'] = array_merge($_SESSION[$project_name.'_skin'], array($stringOrigin_skin => $newString_skin));
		}
	}
	var_dump($project_name.'_skin');
	$_SESSION[$project_name.'_skin'] = array_unique($_SESSION[$project_name.'_skin']);
	var_dump($_SESSION[$project_name.'_skin']);


	//-- Correct "base" file
	$panoID = array_unique($panoID);
	$_SESSION[$project_name] = array();
	foreach ($panoID as $id)
	{
		$stringOrigin = XMLTools::getStringPartUnchanged($_SESSION['xmls'][$project_name], $project_name, '<scene name="'.$id.'"', '</scene>');
		$newString = XMLTools::getReplacedStringPart($stringOrigin, '<panoview', '" />', '');
		$newString2 = XMLTools::getReplacedStringPart($newString, 'hlookat="', '/>', '/>');
		//$_SESSION['xmls'][$project_name] = str_replace($stringOrigin, $newString2, $_SESSION['xmls'][$project_name]);
		$_SESSION[$project_name] = array_merge($_SESSION[$project_name], array($stringOrigin => $newString2));
	}
	var_dump($project_name);
	$_SESSION[$project_name] = array_unique($_SESSION[$project_name]);
	var_dump($_SESSION[$project_name]);
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

	die();
	XMLTools::updateXMLFiles($_SESSION['xmls']);
	XMLTools::downloadXMLFiles($_SESSION['xmls'], $project_name);
}
else
	header('Location: '.__PROD__);
