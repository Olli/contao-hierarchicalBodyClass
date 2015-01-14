<?php

/**
 * Hierarchical Body Class
 *
 * Copyright (c) 2013 Martin Treml
 *
 * @package   hierarchicalBodyClass
 * @author    Martin Treml
 * @license   LGPL
 * @copyright Martin Treml
 */



/*
 * Add the parseTags function to the Inserttags hook
 */

$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('MrTool\HierarchicalBodyClass\Helper', 'insertTags');