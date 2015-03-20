<?php

class NI_CookieBanner_CSSModel extends NI_CookieBanner_BaseModel {
    
    
    /**
     * Function to create the file to hold the CSS file
     *
     * @param string $css
     * @return file
     * @added 1.0
     */
    
    static function createCSSFile( $css ) {
        
        
        $file = fopen( NI_CookieBanner_Registry::get( 'config', 'plugin_data_dir' ) . '/css/ni-cookie-banner-' . get_current_blog_id() . '.css', 'w' );
        
        $cssFile = fwrite( $file, $css );
        
        fclose( $file );
        
        if( !$file ) 
            NI_CookieBanner_Status::set( 'error', __( 'Unable to create CSS file', 'ni-cookie-banner' ) );
                
        return $cssFile;
        
        
    }
    
    /**
     * Function to format, create and get the CSS itself
     *
     * @param string $args
     * @return string
     * @added 1.0
     */
    
    static function getCSS( $options ) {
        
        /*
       |--------------------------------------------------------------------------
       | Format Initial Options
       |--------------------------------------------------------------------------
       |
       | Initialise the CSS options ready for use
       |
       */     
        
        $isExternal = $options['NI_CB_External'];
        
        $BanHei = $options['NI_CB_BanHei'];
        $BtnHei = $options['NI_CB_BtnHei'];
        
        $position = $options['NI_CB_Pos'];        
        $marginTop = intval( ( $BanHei - $BtnHei ) / 2 );
        
        $BanCol = $options['NI_CB_BanCol'];
        $BanTxtCol = $options['NI_CB_BanTxtCol'];
        
        $BtnCol = $options['NI_CB_BtnCol'];
        $BtnTxtCol = $options['NI_CB_BtnTxtCol'];
        $BtnColHov = $options['NI_CB_BtnColHov'];
        $BtnTxtColHov = $options['NI_CB_BtnTxtColHov'];
        
        /*
       |--------------------------------------------------------------------------
       | Initialise Output
       |--------------------------------------------------------------------------
       |
       | Initialise the CSS output variable ready for appending
       |
       */   

       $css = null;

       /*
       |--------------------------------------------------------------------------
       | Strip Tags If Needed
       |--------------------------------------------------------------------------
       |
       | Determine whether to use the <style> tags
       |
       */       

       $css .= $isExternal ? '' : '<style>';       

       $css .=  "
           
            .cookieBannerContainer
            {
                padding: 0px 5%;
                position: fixed;
                {$position}: 0px;
                height: {$BanHei}px;
                line-height: {$BanHei}px;
                background: {$BanCol};
                color: {$BanTxtCol};
                z-index: 9999;
                font-size: 11px;
                opacity: 0.8;
                text-align: right;
                left: 0px;
                right: 0px;
            }

            .cookieBannerText
            {
                text-align: left;
                display: inline-block;
                float: left;
            }

            .cookieBannerText a,
            .cookieBannerText a:link,
            .cookieBannerText a:visited,
            .cookieBannerText a:hover,
            .cookieBannerText a:active,
            .cookieBannerText a:focus
            {
                color: {$BanTxtCol};
            }  

            .cookieBannerRemove
            {
                display: inline-block;
                float: right;
                height: {$BtnHei}px;
                line-height: {$BtnHei}px;
                background: {$BtnCol};
                padding: 0 5px;
                cursor: pointer;
                color: {$BtnTxtCol};
                margin-top: {$marginTop}px;
            }

            .cookieBannerRemove:hover
            {
                background: {$BtnColHov};
                color: {$BtnTxtColHov};
            }

            .cookieBannerRemoveContainer
            {
                line-height: {$BanHei}px;
                height: {$BanHei}px;
            }

        }";

       /*
       |--------------------------------------------------------------------------
       | Strip Tags If Needed
       |--------------------------------------------------------------------------
       |
       | Determine whether to use the <style> tags
       |
       */       

       $css .= $isExternal ? '' : '</style>';

       /*
       |--------------------------------------------------------------------------
       | Return Finished Styles
       |--------------------------------------------------------------------------
       |
       | Finally we return the final script back
       |
       */   

       return $css;
        
        
    }

    
}