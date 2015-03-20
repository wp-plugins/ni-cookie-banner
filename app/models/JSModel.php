<?php

class NI_CookieBanner_JSModel extends NI_CookieBanner_BaseModel {
    
    
    /**
     * Function to create the file to hold the JS file
     *
     * @param string $js
     * @return file
     * @added 1.6
     */
    
    static function createJSFile( $js ) {

        
        $file = fopen( NI_CookieBanner_Registry::get( 'config', 'plugin_data_dir' ) . '/js/ni-cookie-banner-' . get_current_blog_id() . '.js', 'w' );
        
        $jsFile = fwrite( $file, $js );
        
        fclose( $file );
        
        if( !$file ) 
            NI_CookieBanner_Status::set( 'error', __( 'Unable to create JS file', 'ni-cookie-banner' ) );
                
        return $jsFile;
        
        
    }  
    
    
    /**
     * Function to format, create and get the JS itself
     *
     * @param array $options
     * @return string
     * @added 1.0
     */
    
    static function getJS( $options ) {
      
        /*
       |--------------------------------------------------------------------------
       | Format Initial Options
       |--------------------------------------------------------------------------
       |
       | Initialise the CSS options ready for use
       |
       */     
        
        $isExternal = $options['NI_CB_External'];
        $delayTime = $options['NI_CB_Delay'] * 1000;
        $fadeTime = $options['NI_CB_Fade'] * 1000;
        
        /*
       |--------------------------------------------------------------------------
       | Initialise Output
       |--------------------------------------------------------------------------
       |
       | Initialise the JavaScript output variable ready for appending
       |
       */  
        
        $js = null;

        /*
        |--------------------------------------------------------------------------
        | Strip Tags If Needed
        |--------------------------------------------------------------------------
        |
        | Determine whether to use the <script> tags (when using internal scripts)
        |
        */       

        $js .= $isExternal ? '' : '<script>';

        /*
        |--------------------------------------------------------------------------
        | Initial Setup
        |--------------------------------------------------------------------------
        |
        | Setup the initial noConflict and document ready checks
        |
        */   

        $js .= "

            var \$NI_CookieBanner_jQuery = jQuery.noConflict();

            \$NI_CookieBanner_jQuery( document ).ready( function( $ ) {

        ";

        /*
        |--------------------------------------------------------------------------
        | Fade Out Banner Automatically
        |--------------------------------------------------------------------------
        |
        | This fades out the banner automatically if set
        |
        */ 
        
        if( $delayTime ) :
        
            $js .= "setTimeout( function() { fadeOutCookieBanner( setCookieBannerCookie() ); }, $delayTime );";

        endif;
        
        /*
        |--------------------------------------------------------------------------
        | Main JavaScript Code
        |--------------------------------------------------------------------------
        |
        | This is the main JavaScript code for the Cookie Banner
        |
        */         
        
        $js .= "
 
            function fadeOutCookieBanner( callback ) {

                $( '.cookieBannerContainer' ).fadeOut( {$fadeTime}, function() { callback } );

            }

            function setCookieBannerCookie() {

                $.cookie( 'cookie_banner', false, { expires: 31, path: '/' } ); 

            }

            $( '.cookieBannerRemove, .cookieBannerRemoveResponsive' ).on( 'click', function() {

                fadeOutCookieBanner( setCookieBannerCookie() );

            });
            
        ";
                
        /*
        |--------------------------------------------------------------------------
        | Close Tags
        |--------------------------------------------------------------------------
        |
        | This closes the initial document ready call
        |
        */ 

        $js .= '}); ';

        /*
        |--------------------------------------------------------------------------
        | Strip Tags If Needed
        |--------------------------------------------------------------------------
        |
        | Determine whether to use the <script> tags (when using internal scripts)
        |
        */       

        $js .= $isExternal ? '' : '</script>';


        /*
        |--------------------------------------------------------------------------
        | Return Finished Script
        |--------------------------------------------------------------------------
        |
        | Finally we return the final script back
        |
        */   

        return $js;
            
        
    }
    

}