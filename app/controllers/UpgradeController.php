<?php

class NI_CookieBanner_UpgradeController extends NI_CookieBanner_BaseController {
    
      
    /**
     * Script that runs if the menu has been upgraded
     *
     * @return mixed
     * @added 1.0
     */
    
    static function upgrade() {
        
        
        if( self::needsUpgrade() ) :
            

            if( NI_CookieBanner::getOption( 'NI_CB_External' ) ) : 
                
                
                NI_CookieBanner_FolderModel::create();
            
                $js = NI_CookieBanner_JSModel::getJs( NI_CookieBanner::getOptions() );        
                $js = NI_CookieBanner::getOption( 'NI_CB_Minify' ) == 'minify' ? NI_CookieBanner_JSModel::Minify( $js ) : $js = $js; 
                
                NI_CookieBanner_JSModel::createJSFile( $js );
                
                $css = NI_CookieBanner_CSSModel::getCSS( NI_CookieBanner::getOptions() );
                $css = NI_CookieBanner::getOption( 'NI_CB_Minify' ) == 'minify' ? NI_CookieBanner_CSSModel::Minify( $css ) : $css = $css; 
                
                NI_CookieBanner_CSSModel::createCSSFile( $css );

                
            endif;
            
            /* Update Version */
            update_option( 'NI_Cookie_Banner_Ver', NI_CookieBanner_Registry::get( 'config', 'current_version' ) );
            
            /* Merge Changes */
            update_option( 'NI_Cookie_Banner_Ver_Options', array_merge( NI_CookieBanner_Registry::get( 'defaults' ), NI_CookieBanner::getOptions() ) );
            
            
        endif;

            
    }
    
        
    /**
     * Determines whether or not the site needs upgrading
     *
     * @return boolean
     * @added 1.0
     */
    
    static function needsUpgrade() {
        
        
        return get_option( 'NI_Cookie_Banner_Ver' ) != NI_CookieBanner_Registry::get( 'config', 'current_version' ) ? true : false;

        
    }
    
    
}