<?php

class NI_CookieBanner_Export {
    
  
    /**
     * Function to create export XML file
     *
     * @return file xml
     * @added 1.0
     */
    
    static function export() {
        
        if( !is_admin() ) exit();
        
        $fileName = NI_CookieBanner_Registry::get( 'config', 'plugin_base_dir' ) . '/public/export/export.xml';
        
        $file = fopen( $fileName, 'w+' );
        
        if( !$file ) :
            
            return NI_CookieBanner_Status::set( 'error', __( 'Could not create export file, please check plugin folder permissions', 'ni-cookie-banner' ) );
            
        endif;

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<NI_CookieBanner_Options>';
        
        foreach( NI_CookieBanner::getOptions() as $option_key => $option_val ) :
            
            $xml .= '<' . $option_key . '>' . $option_val . '</' . $option_key . '>';
                
        endforeach;
        
        $xml .= '</NI_CookieBanner_Options>';
        
        fwrite( $file, $xml );
        fclose( $file );
        
        $link = NI_CookieBanner_Registry::get( 'config', 'plugin_base_uri' ) . 'public/export/export.xml';
        
        NI_CookieBanner_Status::set( 'updated', '<a href="' . $link . '">' . __( 'You can download your exported file by clicking here', 'ni-cookie-banner' ) . '</a>' );
        
        
    }
    
    
}