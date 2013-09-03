<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package HierarchicalBodyClass
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'MrTool',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'MrTool\HierarchicalBodyClass' => 'system/modules/hierarchicalBodyClass/classes/HierarchicalBodyClass.php',
));
