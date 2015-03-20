<?php

class NI_CookieBanner_InstallController extends NI_CookieBanner_BaseController {
    
    
    /**
     * Prepare our Installation Options
     *
     * @return null
     * @added 2.0
     */
    
    static function prepare() {
        
        
        register_activation_hook( __FILE__, array( 'NI_CookieBanner_InstallController', 'install' ) );
        
        
    }
    
        
    /**
     * Sets our initial default options when menu
     * is first installed
     *
     * @return null
     * @added 1.0
     */
    
    static function install() {

        
        add_option( 'NI_Cookie_Banner_Ver', NI_CookieBanner_Registry::get( 'config', 'current_version' ) );
        add_option( 'NI_Cookie_Banner_Options', NI_CookieBanner_Registry::get( 'defaults' ) );

        
    }
    
    
}