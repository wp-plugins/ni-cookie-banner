<?php

class NI_CookieBanner_BaseController {
    
    
    /**
     * Determines wether to display scripts in footer
     *
     * @return boolean
     * @added 1.0
     */
    
    static function inFooter() {
           
        
        return NI_CookieBanner::getOption( 'NI_CB_Footer' ) && NI_CookieBanner::getOption( 'NI_CB_Footer' ) == 'footer' ?  true : false;
        
        
    }
    
    
}