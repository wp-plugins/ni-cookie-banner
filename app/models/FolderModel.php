<?php

class NI_CookieBanner_FolderModel extends NI_CookieBanner_BaseModel {
    
    /**
     * Function to create the data folders
     *
     * @return null
     * @added 1.6
     */
    
    static function create() {

        
        $mainFolder = NI_CookieBanner_Registry::get( 'config', 'plugin_data_dir' );
        $cssFolder  = NI_CookieBanner_Registry::get( 'config', 'plugin_data_dir' ) . '/css';
        $jsFolder   = NI_CookieBanner_Registry::get( 'config', 'plugin_data_dir' ) . '/js';
        
        if( !file_exists( $mainFolder ) ) mkdir( $mainFolder, 0777 );
        if( !file_exists( $cssFolder ) ) mkdir( $cssFolder, 0777 );
        if( !file_exists( $jsFolder ) ) mkdir( $jsFolder, 0777 ); 

        
        if( !file_exists( $mainFolder ) )
            NI_CookieBanner_Status::set( 'error', __( 'Unable to create data folders', 'ni-cookie-banner' ) );
        
        if( !file_exists( $cssFolder ) )
            NI_CookieBanner_Status::set( 'error', __( 'Unable to create CSS folders', 'ni-cookie-banner' ) );
        
        if( !file_exists( $cssFolder ) )
            NI_CookieBanner_Status::set( 'error', __( 'Unable to create JS folders', 'ni-cookie-banner' ) );
        
        
    }
    

}