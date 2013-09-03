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


namespace MrTool;

class HierarchicalBodyClass extends \Controller
{
    
    public function insertTags($strTag){
        
        $arrParts = explode('::', $strTag);
        
        // check if it is an global header image
        if ($arrParts[0] != 'hbc') {
            return false;
        }
        
        // check if user wants default way
        if($arrParts[1] == 'default'){
            
            global $objPage;
            return $this->getBodyClass($objPage->id);
            
        }
        
        // check if user wants explicit image
        if(intval($arrParts[1]) != 0){
            return $this->getBodyClass(intval($arrParts[1]), false);
        }
         
        return false;
        
    }
    
    
    private function crawlPages($pageId){
        
        // get all entries from tl_page and check in while to prevent DeadLock - thanks to lindesbs
        $database = \Database::getInstance();
        $pageCount = $database->prepare("SELECT count(id) as count FROM tl_page")->execute()->fetchAssoc();
        $i = 0;
        
        while($pageId > 0 AND $i <= $pageCount['count']){
            
            $objPage = $this->getPageDetails($pageId);
            
            $cssClass = $this->getFromPage($pageId, $objPage);
            
            if($cssClass){
                return $cssClass;
            }
            
            // set the id to the next level to get the data from the parrent entry
			$pageId = $objPage->pid;
            $i++;
        }
        
        return false;
    }
    
    private function getFromPage($pageId, $objPage = false){
        
        if($objPage === false){
            $objPage = $this->getPageDetails($pageId);
        }
        
        // check if current page has an css class
        if($objPage->cssClass){
            return $objPage->cssClass;
        }else{
            return false;
        }
        
    }
    
    private function getBodyClass($pageId, $recursive=true){
        
        if($recursive){
            $cssClass = $this->crawlPages($pageId);
        }else{
            $cssClass = $this->getFromPage($pageId);
        }
        
        return $cssClass;
        
    }
    
}