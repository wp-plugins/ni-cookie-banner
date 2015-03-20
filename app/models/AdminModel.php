<?php

class NI_CookieBanner_AdminModel extends NI_CookieBanner_BaseModel {
    
        
    /**
     * Saves all the data from the admin page to the database
     *
     * @param  array  $data
     * @return null
     * @added 1.0
     */
    
    static public function save( $data ) {
        
        // Initialise Variables Correctly
        
        $NI_CB_External = self::getOptionValue( $data['NI_CB_External'] );
        $NI_CB_Minify = self::getOptionValue( $data['NI_CB_Minify'] );
        $NI_CB_Footer = self::getOptionValue( $data['NI_CB_Footer'] );
        
        $NI_CB_BanTxt = self::getOptionValue( $data['NI_CB_BanTxt'] );
        $NI_CB_BtnTxt = self::getOptionValue( $data['NI_CB_BtnTxt'] );
        
        $NI_CB_BanCol = self::getOptionValue( $data['NI_CB_BanCol'] );
        $NI_CB_BanTxtCol = self::getOptionValue( $data['NI_CB_BanTxtCol'] );
        
        $NI_CB_BtnCol = self::getOptionValue( $data['NI_CB_BtnCol'] );
        $NI_CB_BtnTxtCol = self::getOptionValue( $data['NI_CB_BtnTxtCol'] );
        
        $NI_CB_BtnColHov = self::getOptionValue( $data['NI_CB_BtnColHov'] );        
        $NI_CB_BtnTxtColHov = self::getOptionValue( $data['NI_CB_BtnTxtColHov'] );        
    
        $NI_CB_BanHei = self::getOptionValue( $data['NI_CB_BanHei'] );
        $NI_CB_BtnHei = self::getOptionValue( $data['NI_CB_BtnHei'] );
        
        $NI_CB_Pos = self::getOptionValue( $data['NI_CB_Pos'] );
        $NI_CB_Fade = self::getOptionValue( $data['NI_CB_Fade'] );
        $NI_CB_Delay = self::getOptionValue( $data['NI_CB_Delay'] );

                                    
        $optionsArray = array(
            
            // Filter Input Correctly
            
            'NI_CB_External' => self::Filter( $NI_CB_External ),
            'NI_CB_Minify' => self::Filter( $NI_CB_Minify ),
            'NI_CB_Footer' => self::Filter( $NI_CB_Footer ),
            
            'NI_CB_BanTxt' => self::Filter( $NI_CB_BanTxt ),
            'NI_CB_BtnTxt' => self::Filter( $NI_CB_BtnTxt ),
            
            'NI_CB_BanCol' => self::Filter( $NI_CB_BanCol ),
            'NI_CB_BanTxtCol' => self::Filter( $NI_CB_BanTxtCol ),
            
            'NI_CB_BtnCol' => self::Filter( $NI_CB_BtnCol ),
            'NI_CB_BtnTxtCol' => self::Filter( $NI_CB_BtnTxtCol ),
            
            'NI_CB_BtnColHov' => self::Filter( $NI_CB_BtnColHov ),                  
            'NI_CB_BtnTxtColHov' => self::Filter( $NI_CB_BtnTxtColHov ),  
            
            'NI_CB_BanHei' => self::Filter( $NI_CB_BanHei ),
            'NI_CB_BtnHei' => self::Filter( $NI_CB_BtnHei ),

            'NI_CB_Pos' => self::Filter( $NI_CB_Pos ),
            'NI_CB_Fade' => self::Filter( $NI_CB_Fade ),
            'NI_CB_Delay' => self::Filter( $NI_CB_Delay )

        );

        // Update Submitted Options 
        
        update_option( 'NI_CookieBanner_Options', $optionsArray );
            
        // And save the status

        NI_CookieBanner_Status::set( 'updated', __( 'You have successfully updated the Cookie Banner options', 'ni-cookie-banner' ) );
        
        
    }
    
    /**
     * Returns empty/default option values
     *
     * @param  string  $opt
     * @return string $val
     * @added 1.0
     */
       
    static public function getOptionValue( $opt ) {
        
        $val = isset( $opt ) ? $opt : RM_Registry::get( 'defaults', $opt );
        
        return stripslashes( strip_tags( $val ) );
      
    }
    
    
}