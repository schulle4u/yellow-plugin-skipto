Skipto plugin 0.6.4
===================
Pplugin for Datenstrom Yellow that adds keyboard navigation.

How do I install this?
----------------------
1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/)
2. [Download plugin](https://github.com/schulle4u/yellow-plugin-skipto/archive/master.zip). If you are using Safari, right click and select 'Download file as'
3. Copy `master.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

How to use the keyboard navigation?
-----------------------------------
This plugin uses [SkipTo.js v2.0.0](https://paypal.github.io/skipto/) by PayPal Accessibility Team and University of Illinois. It's licensed under BSD.

After loading a page, press the tab key and you will see a `Skip to...` button at the top of the page. Press enter or space to activate a menu containing all headings and sections on the current page. Press the up or down-arrow key to Select one of the items, press enter to directly jump to it. Pressing the accesskey 0 will focus the SkipTo button at any time. 

Please note that this plugin primarily is not designed to enhance accessibility for screen reader users. Modern screen readers provide their own methods to directly skip to headings and other elements. It is made to generally enhance keyboard navigation on large sites, but of course may be useful for screen reader users as well. 

How to configure the keyboard navigation?
-----------------------------------------
The following options are available: 

* `skiptoHeadings`: which heading elements to show in the menu (h1, h2, h3, h4...)
* `skiptoLandmarks`: ARIA landmarks (e.g. banner, navigation, main and search)
* `skiptoSections`: HTML5 Section Elements (e.g. main, section[aria-label], section[aria-labelledby]
* `skiptoIds`: Any element with the id specified
* `skiptoCustomClass`: Any element with the custom class specified
* `skiptoAccesskey`: access key to focus the menu, default is 0
* `skiptoWrap`: set the menu to wrap (true/false)
* `skiptoVisibility`: set this to "onload" if you want the menu to be always visible (onfocus/onload)
* `skiptoAttachElement`: SkipTo can be attached to any element on the page. If no `attachElement` is found, the script will be attached as the first element after body
