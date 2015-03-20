<?php


class NI_CookieBanner_CSSController extends NI_CookieBanner_BaseController {
    
    
    /**
     * Prepare our CSS Outputs
     *
     * @return null
     * @added 2.0
     */
    
    static function prepare() {
        
        
        if( NI_CookieBanner::getOption( 'NI_CB_External' ) ) :

            
            add_action( 'wp_enqueue_scripts', array( 'NI_CookieBanner_CSSController', 'addExternal' ) );
            
            
        else :
                
            
            add_action( 'wp_head', array( 'NI_CookieBanner_CSSController', 'addInline' ) ); 

        
        endif;   


    }
    
    
    /**
     * Create and echos the Inline Styles
     *
     * @return string
     * @added 1.0
     */
    
    static function addInline() {
        
        $opt = NI_CookieBanner::getOptions();
        
        echo NI_CookieBanner::getOption( 'NI_CB_Minify' ) == 'minify' ? NI_CookieBanner_CSSModel::Minify( NI_CookieBanner_CSSModel::getCSS( $opt ) ) : NI_CookieBanner_CSSModel::getCSS( $opt ); 
        
        
    }
    
    
    /**
     * Adds External Styles to Header
     *
     * @return null
     * @added 1.0
     */
    
    static function addExternal() {
        
        
        wp_enqueue_style( 
            'ni-cookie-banner', 
            NI_CookieBanner_Registry::get( 'config', 'plugin_data_uri' ) . 'css/ni-cookie-banner-' . get_current_blog_id() . '.css', 
            array(), 
            '1.0', 
            'all' 
        ); 
               
        
    }
    

}