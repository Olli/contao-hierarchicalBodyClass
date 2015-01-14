
<?php
/**
 * Hierarchical Body Class
 * An contao extension which provides an inserttag to add an css-class based on the sites parent sites
 *
 * PHP version 5
 * @package    contao-hierarchical-body-class
 * @author     Martin Treml <mrtool@r2pi.net>
 * @copyright  Martin Treml <mrtool@r2pi.net>
 * @license    LGPL.
 */

namespace MrTool\HierarchicalBodyClass\Helper;

use MrTool\HierarchicalBodyClass\Provider\HierarchicalBodyClass;

class insertTags extends \Controller {


    /**
     * Parse the inserttags and call necessary methods
     *
     * @param string $strTag
     * @return mixed
     */
    public function parseInserttags($strTag){

        $arrParts = explode('::', $strTag);

        // check if it is an global header image
        if ($arrParts[0] != 'hbc') {
            return false;
        }

        switch($arrParts[1]){

            case 'default':

                global $objPage;
                return HierarchicalBodyClass::getAll($objPage->id);

                break;

            case 'first':

                global $objPage;
                return HierarchicalBodyClass::getFirst($objPage->id);

                break;

            default:

                if(intval($arrParts[1]) != 0){
                    return HierarchicalBodyClass::getFrom(intval($arrParts[1]));
                }

                break;

        }

    }


} 