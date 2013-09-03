<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package GlobalHeaderImage
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'GlobalHeaderImage' => 'system/modules/globalHeaderImage/classes/GlobalHeaderImage.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ghi_image' => 'system/modules/globalHeaderImage/templates',
));
