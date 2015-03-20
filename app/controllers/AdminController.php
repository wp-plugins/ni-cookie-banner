<?php


class NI_CookieBanner_AdminController extends NI_CookieBanner_BaseController {
    
        
    /**
     * Prepare our Admin Options
     *
     * @return null
     * @added 1.0
     */
    
    static function prepare() {
        
        // Check that we are in the admin area
        if( is_admin() ) : 
            
        
            add_filter( 'plugin_action_links', array( 'NI_CookieBanner_AdminController', 'addSettingsLink' ), 10, 2 );
            add_action( 'admin_menu', array( 'NI_CookieBanner_AdminController', 'addMenus' ) );
        
        
            // Specifically for Responsive Menu Page
            if( isset( $_GET['page'] ) && $_GET['page'] == 'ni-cookie-banner' ) :

                add_action( 'admin_enqueue_scripts', array( 'NI_CookieBanner_AdminController', 'colorpicker' ) );

            endif;
        
            
        endif;
        

    }
    
    
    /**
     * Create our admin menus.
     *
     * @return null
     * @added 1.0
     */
    
    static function addMenus() {

        
        add_menu_page( 

            __( 'Cookie Banner', 'ni-cookie-banner' ), 
            __( 'Cookie Banner', 'ni-cookie-banner' ), 
            'manage_options', 
            'ni-cookie-banner', 
            array( 'NI_CookieBanner_AdminController', 'adminPage' ), 
            NI_CookieBanner_Registry::get( 'config', 'plugins_base_uri' ) . 'public/imgs/icon.png' 

        );

        
    }
    
    /**
     * Creates the main admin page and saves the data if submitted
     *
     * @return null
     * @added 1.0
     */
    
    static function adminPage() {
        
        if( NI_CookieBanner_Input::post( 'NI_CB_Export' ) ) :
            
            NI_CookieBanner_Export::export();

        endif;

        if( NI_CookieBanner_Input::post( 'NI_CB_Submit' ) || NI_CookieBanner_Input::post( 'NI_CB_Import' ) ) :
                    
            $data = NI_CookieBanner_Input::post( 'NI_CB_Import' ) ? NI_CookieBanner_Import::getData( NI_CookieBanner_Input::file( 'NI_CB_ImportFile' ) ) : NI_CookieBanner_Input::post();

            NI_CookieBanner_AdminModel::save( $data );
        
            if( NI_CookieBanner::getOption( 'NI_CB_External' ) ) :
                
                NI_CookieBanner_FolderModel::create();
            
                $js = NI_CookieBanner_JSModel::getJs( NI_CookieBanner::getOptions() );        
                $js = NI_CookieBanner::getOption( 'NI_CB_Minify' ) == 'minify' ? NI_CookieBanner_JSModel::Minify( $js ) : $js = $js;        
                NI_CookieBanner_JSModel::createJSFile( $js );
            
                
                $css = NI_CookieBanner_CSSModel::getCSS( NI_CookieBanner::getOptions() );
                $css = NI_CookieBanner::getOption( 'NI_CB_Minify' ) == 'minify' ? NI_CookieBanner_JSModel::Minify( $css ) : $css = $css; 
                NI_CookieBanner_CSSModel::createCSSFile( $css );

                
            endif;
                
        
        endif;    

        NI_CookieBanner_View::make( 'admin.page', NI_CookieBanner::getOptions() );
        
        
    }
    
    /**
     * Adds the WordPress Colour Picker to the admin options page
     *
     * @return null
     * @added 1.0
     */
    
    static function colorpicker(){ 
    
        
        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );

        
    }
    
        
    /**
     * Adds the settings link on the WordPress Plugins Page
     *
     * @param array $links
     * @param string $file
     * @return array
     * @added 2.0
     */
    
    static function addSettingsLink( $links, $file ) {
        
        
        if ( $file == 'ni-cookie-banner/ni-cookie-banner.php' ) :

            $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=ni-cookie-banner">';
            $settings_link .= __( 'Settings', 'ni-cookie-banner' );
            $settings_link .= '</a>';
            
            array_unshift( $links, $settings_link );

        endif;

        return $links;

    
    }

    
}