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


// Idea: use an inserttag flag to render the output as template or plain text

class GlobalHeaderImage extends Controller
{
    
    public function insertTags($strTag){
        
        $arrParts = explode('::', $strTag);
        
        // check if it is an global header image
        if ($arrParts[0] != 'ghi') {
            return false;
        }
        
        // check if user wants default way
        if($arrParts[1] == 'default'){
            
            global $objPage;
            return $this->getHeaderImage($objPage->id);
            
        }
        
        // check if user wants explicit image
        if(intval($arrParts[1]) != 0){
            return $this->getHeaderImage(intval($arrParts[1]), false);
        }
         
        return false;
        
    }
    
    
    private function crawlPages($pageId){
        
        // get all entries from tl_page and check in while to prevent DeadLock - thanks to lindesbs
        $database = Database::getInstance();
        $pageCount = $database->prepare("SELECT count(id) as count FROM tl_page")->execute()->fetchAssoc();
        $i = 0;
        
        while($pageId > 0 AND $i <= $pageCount['count']){
            
            $objPage = $this->getPageDetails($pageId);
            
            $objFile = $this->getFromPage($pageId, $objPage);
            
            if($objFile){
                return $objFile;
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
        
        // check if current page has an image set
        if($objPage->headerImage){
            return $objFile = \FilesModel::findByPk($objPage->headerImage);
        }else{
            return false;
        }
        
    }
    
    private function getHeaderImage($pageId, $recursive=true){
        
        if($recursive){
            $objFile = $this->crawlPages($pageId);
        }else{
            $objFile = $this->getFromPage($pageId);
        }
        
        // use frontend template for response instead of direct output - thanks to lindesbs        
        $objTemplate = new \FrontendTemplate('ghi_image');
		$objTemplate->objFile = $objFile;
        
        return $objTemplate->parse();
        
    }
    
}