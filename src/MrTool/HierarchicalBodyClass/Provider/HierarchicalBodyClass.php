<?php
/**
 * Hierarchical Body Class
 * An contao extension which provides an inserttag to add an css-class based on the sites parent sites
 *
 * PHP version 5
 *
 * @package    contao-hierarchical-body-class
 * @author     Martin Treml <mrtool@r2pi.net>
 * @copyright  Martin Treml <mrtool@r2pi.net>
 * @license    LGPL.
 */


namespace MrTool\HierarchicalBodyClass\Provider;


class HierarchicalBodyClass extends \Controller
{

    /**
     * Holder var for the found classes
     *
     * @var array
     */
    private static $arrClasses = array();


    /**
     * Iterate to the root element and return a string
     * with all found css classes
     *
     * @param int $pageId
     *
     * @return string css classes
     */
    public static function getAll($pageId)
    {

        $objPages = \PageModel::findParentsById($pageId);

        while ($objPages->next()) {
            self::checkClass($objPages->cssClass);
        }

        return self::buildClassString();
    }


    /**
     * Iterate to the root element and return the first
     * occurrence of a valid css class
     *
     * @param int $pageId
     *
     * @return string css classes
     */
    public static function getFirst($pageId)
    {

        $objPages = \PageModel::findParentsById($pageId);

        while ($objPages->next()) {
            self::checkClass($objPages->cssClass);

            if (count(self::$arrClasses) > 0) {
                return self::buildClassString();
            }
        }

    }


    /**
     * Get the css class of the searched page
     *
     * @param int $pageId
     *
     * @return string css classes
     */
    public static function getFrom($pageId)
    {
        $objPage = \PageModel::findWithDetails($pageId);

        return $objPage->cssClass;
    }


    /**
     * Perform some checks on the class
     *
     * @param string $strClass
     * @return mixed (bool false|string cssClass)
     */
    private static function checkClass($strClass)
    {

        /**
         * Check if there are more than one class
         */
        $parts = explode(' ', $strClass);
        if (count($parts) > 1) {
            foreach ($parts AS $class) {
                self::checkClass($strClass);
            }

            return;
        }

        // check if class is hbc inserttag
        if (strpos($strClass, '{hbc::')) {
            return;
        }

        // check if string is empty
        if (empty($strClass)) {
            return;
        }

        // check if string is already in class array
        if (in_array($strClass, self::$arrClasses)) {
            return;
        }

        /**
         * All checks are done save class into classes array
         */
        self::$arrClasses[] = $strClass;

    }


    /**
     * Builds the class string from the classes array
     * or returns empty string if non class found
     *
     * @return string
     */
    private static function buildClassString()
    {

        if (count(self::$arrClasses) == 0) {
            return '';
        } else {
            return implode(' ', self::$arrClasses);
        }

    }

} 