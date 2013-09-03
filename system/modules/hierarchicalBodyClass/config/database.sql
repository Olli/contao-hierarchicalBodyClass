
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
*   Add additional image field for different headers
*/

CREATE TABLE `tl_page` (
    `headerImage` varchar(255) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;