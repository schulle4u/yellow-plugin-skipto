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
		$this->yellow->config->setDefault("skiptoHeadings", "h1, h2, h3, h4");
		$this->yellow->config->setDefault("skiptoMain", "main, [role=main]");
		$this->yellow->config->setDefault("skiptoLandmarks", "[role=navigation], [role=search]");
		$this->yellow->config->setDefault("skiptoSections", "nav");
		$this->yellow->config->setDefault("skiptoIds", "#SkipToA1, #SkipToA2");
		$this->yellow->config->setDefault("skiptoCustomClass", "");
		$this->yellow->config->setDefault("skiptoAccesskey", "0");
		$this->yellow->config->setDefault("skiptoWrap", "false");
		$this->yellow->config->setDefault("skiptoVisibility", "onfocus");
		//$this->yellow->config->setDefault("skiptoAttachElement", "");
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "footer")
		{
			$locationJavascript = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation")."SkipTo.min.js";
			$fileNameJavascript = $this->yellow->config->get("pluginDir")."SkipTo.min.js";
			if(is_file($fileNameJavascript)) 
			{
				$output = "<script>
			var SkipToConfig =
			{
				\"settings\": {
					\"skipTo\": {
						\"headings\"     : \"".$this->yellow->config->get("skiptoHeadings")."\",
						\"main\"         : \"".$this->yellow->config->get("skiptoMain")."\",
						\"landmarks\"    : \"".$this->yellow->config->get("skiptoLandmarks")."\",
						\"sections\"     : \"".$this->yellow->config->get("skiptoSections")."\",
						\"ids\"          : \"".$this->yellow->config->get("skiptoIds")."\",
						\"customClass\"  : \"".$this->yellow->config->get("skiptoCustomClass")."\",
						\"accesskey\"    : \"".$this->yellow->config->get("skiptoAccesskey")."\",
						\"wrap\"         : \"".$this->yellow->config->get("skiptoWrap")."\",
						\"visibility\"   : \"".$this->yellow->config->get("skiptoVisibility")."\",
					}
				}
			};
			</script>\n
			<script type=\"text/javascript\" src=\"$locationJavascript\"></script>\n";
			}
		}
		return $output;
	}
}

$yellow->plugins->register("skipto", "YellowSkipto", YellowSkipto::Version);
?>