<?php
// Copyright (c) 2013-2016 Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.

// SkipTo.js Plugin
class YellowSkipto
{
	const Version = "0.6.4";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "footer")
		{
			$locationJavascript = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation")."SkipTo.min.js";
			$fileNameJavascript = $this->yellow->config->get("pluginDir")."SkipTo.min.js";
			if(is_file($fileNameJavascript)) $output = "<script type=\"text/javascript\" src=\"$locationJavascript\"></script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("skipto", "YellowSkipto", YellowSkipto::Version);
?>