<?php
// Skipto plugin, https://github.com/schulle4u/yellow-plugin-skipto
// Copyright (c) 2013-2016 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSkipto {
    const VERSION = "0.6.5";
    public $yellow;            //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        // Button and menu labels, to be fixed
        //$this->yellow->config->setDefault("skiptoButtonLabel", "Skip to");
        //$this->yellow->config->setDefault("skiptoMenuLabel", "Skip To and Page Outline");
        //$this->yellow->config->setDefault("skiptoLandmarksLabel", "Skip To");
        //$this->yellow->config->setDefault("skiptoHeadingsLabel", "Page Outline");
        $this->yellow->config->setDefault("skiptoHeadings", "h1, h2, h3, h4");
        $this->yellow->config->setDefault("skiptoMain", "main, [role=main]");
        $this->yellow->config->setDefault("skiptoLandmarks", "[role=navigation], [role=search]");
        $this->yellow->config->setDefault("skiptoSections", "nav");
        $this->yellow->config->setDefault("skiptoIds", "#SkipToA1, #SkipToA2");
        $this->yellow->config->setDefault("skiptoCustomClass", "");
        $this->yellow->config->setDefault("skiptoAccesskey", "0");
        $this->yellow->config->setDefault("skiptoWrap", "false");
        $this->yellow->config->setDefault("skiptoVisibility", "onfocus");
        $this->yellow->config->setDefault("skiptoAttachElement", "document.body");
    }
    
    // Handle page extra HTML data
    public function onExtra($name) {
        $output = NULL;
        if ($name=="footer") {
            $data = array();
            foreach ($this->yellow->config->getData("skipto") as $key=>$value) $data[strtoloweru(substru($key, 6))] = $value;
            $pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
            $output .= "<script type=\"text/javascript\">\n";
            $output .= "var SkipToConfig = { \"settings\": { \"skipTo\": ".json_encode($data)." } };\n";
            $output .= "var s=document.getElementsByTagName('script')[0], e=document.createElement('script'); e.type='text/javascript'; e.async=true; e.src='{$pluginLocation}SkipTo.min.js';\n";
            $output .= "s.parentNode.insertBefore(e, s);\n";
            $output .= "</script>\n";
        }
        return $output;
    }
}

$yellow->plugins->register("skipto", "YellowSkipto", YellowSkipto::VERSION);
