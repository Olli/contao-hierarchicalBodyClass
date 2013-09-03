<?php

/**
 * Global Header Image
 *
 * Copyright (c) 2013 Martin Treml
 *
 * @package   globalHeaderImage
 * @author    Martin Treml
 * @license   LGPL
 * @copyright Martin Treml
 */



/*
 * Add the parseTags function to the Inserttags hook
 */

$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('GlobalHeaderImage', 'insertTags');

$GLOBALS['GHI']['path'] = 'files/industrie_informatik/userdata/header_images';