<?php


class NI_CookieBanner_GlobalController extends NI_CookieBanner_BaseController {
    
        
    /**
     * Prepare our Global Options
     *
     * @return null
     * @added 1.0
     */
    
    static function prepare() {
        
        
        add_action( 'plugins_loaded', array( 'NI_CookieBanner_GlobalController', 'Internationalise' ) );
        add_action( 'wp_enqueue_scripts', array( 'NI_CookieBanner_GlobalController', 'jQuery' ) );

         
    }
    

    /**
     * Makes sure jQuery is added to all pages as it is needed for the
     * system to work
     *
     * @return null
     * @added 1.0
     */
    
    static function jQuery() {
        
        
        wp_enqueue_script( 'jquery' ); 
        
        
    }
    
    
    /**
     * Loads our Translations for use throughout the program
     * 
     * @return null 
     * @added 1.0
     */
    
    
    static function Internationalise() {

        
        __( 'Highly Customisable Cookie Banner Plugin Created By Peter Featherstone', 'ni-cookie-banner' );
        
        load_plugin_textdomain( 'ni-cookie-banner', false, 'ni-cookie-banner/translations/' );

        
    }
    
    
}