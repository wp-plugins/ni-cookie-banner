<?php

class NI_CookieBanner_Import {
   
     /**
     * Function to get data from imported XML file
     *
     * @return file xml
     * @added 1.0
     */
    
    static function getData( $file ) {
    
        if( !is_admin() ) exit();
        
        if( !$file['tmp_name'] )
            return NI_CookieBanner_Status::set( 'error', __( 'No Import File Attached', 'ni-cookie-banner' ) );
        
        if( $file['type'] != 'text/xml' )
            return NI_CookieBanner_Status::set( 'error', __( 'Incorrect Import File Format', 'ni-cookie-banner' ) );
        
        if( $file['size'] > 2000 )
            return NI_CookieBanner_Status::set( 'error', __( 'Import File Too Large', 'ni-cookie-banner' ) );
        
        if( !is_uploaded_file( $file['tmp_name'] ) )
            return NI_CookieBanner_Status::set( 'error', __( 'Import File Not Valid', 'ni-cookie-banner' ) );
    
        $data = file_get_contents( $file['tmp_name'] );
        
        $xml = simplexml_load_string( $data );
        $json = json_encode( $xml );
        $array = json_decode( $json, TRUE );
        
        return $array;
        
        
    }

    
}