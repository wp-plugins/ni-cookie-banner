<?php

class NI_CookieBanner_View {
    
        
    /**
     * Create a new view for display throughout the application
     * Users .phtml files found in the app/views folder
     *
     * @param  string  $page
     * @param mixed $data
     * @return null
     * @added 2.0
     */
    
    static function make( $page, $data ) {  
        
        
        require NI_CookieBanner_Registry::get( 'config', 'plugin_base_dir' ) . '/app/views/' . str_replace( '.', '/', $page ) . '.phtml';
        
        
    }    
    
    /**
     * Function to format and display the status bar in the admin pages
     *
     * @param  array  $status
     * @return string
     * @added 2.0
     */
    
    static function statusBar( $status ) {

        
        $message = null;        
        
        foreach( $status as $stati ) :
            
            $message .= '<div id="message" class="' . $stati[0] . ' below-h2">';
            $message .= '<p>' . $stati[1] . '</p>';
            $message .= '</div>';

        endforeach;

        return $message;
                
        
    }
    
}