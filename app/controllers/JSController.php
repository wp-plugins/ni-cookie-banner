<?php


class NI_CookieBanner_JSController extends NI_CookieBanner_BaseController {
    
        
    /**
     * Prepare our JavaScript for inclusion throughout the site
     *
     * @return null
     * @added 1.0
     */
    
    static function prepare() {

        
        if( NI_CookieBanner::getOption( 'NI_CB_External' ) ) :

            
            add_action( 'wp_enqueue_scripts', array( 'NI_CookieBanner_JSController', 'addExternal' ) );
        
        
        else :

        
            add_action( self::inFooter() ? 'wp_footer' : 'wp_head', array( 'NI_CookieBanner_JSController', 'addInline' ) ); 
               
            
        endif;
                
        
    }
    
        
    /**
     * Creates and echos the inline styles if used
     *
     * @return string
     * @added 1.0
     */
    
    static function addInline() {
        
        $opt = NI_CookieBanner::getOptions();
        
        echo NI_CookieBanner::getOption( 'NI_CB_Minify' ) == 'minify' ? NI_CookieBanner_JSModel::Minify( NI_CookieBanner_JSModel::getJs( $opt ) ) : NI_CookieBanner_JSModel::getJs( $opt );
            
        
    }
    
        
    /**
     * Adds the external scripts to the site if required
     *
     * @return null
     * @added 1.4
     */
    
    static function addExternal() {
        
        
        wp_enqueue_script( 

            'ni-cookie-banner', 
            NI_CookieBanner_Registry::get( 'config', 'plugin_data_uri' ) . 'js/ni-cookie-banner-' . get_current_blog_id() . '.js', 
            'jquery', 
            '1.0', 
            self::inFooter() 

        );
             
        
    }
    
    
}