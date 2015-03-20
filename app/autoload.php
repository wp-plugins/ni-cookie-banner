<?php

/*
|--------------------------------------------------------------------------
| Autoload our application
|--------------------------------------------------------------------------
|
| Here we include all our required files for the application to run correctly.
| At the moment this is a big mess of require_once calls and needs to be 
| tidied up with an autoloader function
|
*/

define( 'NI_COOKIEBANNER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/Registry.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'config.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/NI_CookieBanner.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/View.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/Status.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/Input.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/Import.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'library/ni-cookie-banner/Export.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/BaseController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/AdminController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/GlobalController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/FrontController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/InstallController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/HTMLController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/JSController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/CSSController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'controllers/UpgradeController.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'models/BaseModel.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'models/AdminModel.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'models/FolderModel.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'models/CSSModel.php';

require_once NI_COOKIEBANNER_PLUGIN_DIR . 'models/JSModel.php';