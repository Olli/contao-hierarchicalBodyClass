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
 * Add the additional field to the tl_page
 */

$GLOBALS['TL_DCA']['tl_page']['fields']['headerImage'] = array(
    'label' =>      &$GLOBALS['TL_LANG']['tl_page']['headerImage'],
    'exclude' =>    true,
    'inputType' =>  'fileTree',
    'eval' =>       array(
        'filesOnly' => true,
        'path' => $GLOBALS['GHI']['path'],
        'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes'],
        'fieldType' => 'radio',
        'mandatory' => false
    ),
);


/*
 * Add the new field to the palette
 */

$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = str_replace(
        '{meta_legend}',
        '{global_header:hide},headerImage;{meta_legend}',
        $GLOBALS['TL_DCA']['tl_page']['palettes']['regular']
);

$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace(
        '{meta_legend}',
        '{global_header:hide},headerImage;{meta_legend}',
        $GLOBALS['TL_DCA']['tl_page']['palettes']['root']
);