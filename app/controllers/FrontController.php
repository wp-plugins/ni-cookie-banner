<?php


class NI_CookieBanner_FrontController extends NI_CookieBanner_BaseController {
    
        
    /**
     * Prepare our Global Options
     *
     * @return null
     * @added 1.0
     */
    
    static function prepare() {
        
        
         add_action( 'wp_enqueue_scripts', array( 'NI_CookieBanner_FrontController', 'jQueryCookie' ) );

         
    }
    

    /**
     * Makes sure jQuery Cookie is added to all pages as it is needed for the
     * banner to work
     *
     * @return null
     * @added 1.0
     */
    
    static function jQueryCookie() {
        
        
        wp_register_script( 'jquery-cookie', NI_CookieBanner_Registry::get( 'config', 'plugin_base_uri' ) . 'public/js/jquery.cookie.js', 'jquery', '', false );
        wp_enqueue_script( 'jquery-cookie' ); 
        
        
    }
    
    
}