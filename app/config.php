<?php


/*
|--------------------------------------------------------------------------
| Configuration Settings
|--------------------------------------------------------------------------
|
| Although some people aren't fans of array configurations, here we have one!
| This is where we set paths and our version number among other things.
|
*/

$config = array( 
    
    
    'current_version' => 1.0,
    
    
    'is_beta' => false,
    
    
    'plugins_dir' => plugin_dir_path( __FILE__ ),
        
    
    'plugins_base_uri' => plugin_dir_url( dirname( __FILE__ ) ),
    
    
    'plugin_base_dir' => dirname( plugin_dir_path( __FILE__ ) ),
    
    
    'plugin_base_uri' => plugin_dir_url( dirname( __FILE__ ) ),
    
    
    'plugin_data_uri' => plugin_dir_url( dirname( dirname( __FILE__ ) ) ) . 'ni-cookie-banner-data/',
    
    
    'plugin_data_dir' => dirname( dirname( plugin_dir_path( __FILE__ ) ) ) . '/ni-cookie-banner-data/',
    
    
);


/*
|--------------------------------------------------------------------------
| Save Config to the Registry
|--------------------------------------------------------------------------
|
| Again, some people don't like Registry's in PHP Applications, but here we
| have one and it is very useful for retrieving our settings throughout the app
|
*/

NI_CookieBanner_Registry::set( 'config', $config );


/*
|--------------------------------------------------------------------------
| Responsive Menu Defaults
|--------------------------------------------------------------------------
|
| Another configuration array of type, this time we hold all the application
| default options.
|
*/

$defaults = array( 
    
    
    'NI_CB_External' => false,

    'NI_CB_Minify' => true,

    'NI_CB_Footer' => true,
    
    'NI_CB_BanTxt' => 'We use Cookies - By using this site or closing this you agree to our Cookies policy',
    
    'NI_CB_BtnTxt' => 'Accept Cookies',
    
    'NI_CB_Fade' => 1,
    
    'NI_CB_Delay' => 8,
    
    'NI_CB_BanHei' => 30,
    
    'NI_CB_BtnHei' => 25,
    
    'NI_CB_Pos' => 'bottom',
        
    'NI_CB_BanCol' => '#636363',
    
    'NI_CB_BanTxtCol' => '#FFFFFF',
            
    'NI_CB_BtnCol' => '#727272',
    
    'NI_CB_BtnTxtCol' => '#FFFFFF',

    'NI_CB_BtnColHov' => '#939393',   
    
    'NI_CB_BtnTxtColHov' => '#FFFFFF',  
    
    
);


/*
|--------------------------------------------------------------------------
| Save Defaults to the Registry
|--------------------------------------------------------------------------
|
| Again, some people don't like Registry's in PHP Applications, but here we
| have it again and it is very useful for retrieving our default values
| throughout the app
|
*/

NI_CookieBanner_Registry::set( 'defaults', $defaults );