<?php


class NI_CookieBanner_HTMLController extends NI_CookieBanner_BaseController {
    
    
    /**
     * Prepare the HTML for display on the front end
     *
     * @return null
     * @added 1.0
     */
    
    static function prepare() {
   
        
        add_action( 'wp_footer', array( 'NI_CookieBanner_HTMLController', 'display' ) );
        
        
    }
    
    
    /**
     * Creates the view for the menu and echos it out
     *
     * @return string
     * @added 1.0
     */
    
    static function display( $args = null ) {
        
        
        NI_CookieBanner_View::make( 'banner', $args ? array_merge( NI_CookieBanner::getOptions(), $args ) : NI_CookieBanner::getOptions() );
     
        
    }
    
    
}