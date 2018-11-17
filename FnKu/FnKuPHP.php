<?php
final class FnKuPHP{
    public static function Go(){
        self::_set_const();
        self::_create_dir();
        self::_import_file();
        Application::Go();
    }
#定义常量
    private static function _set_const(){
        $Path = str_replace('\\','/',__FILE__); 
        define('FnKuPHP_PATH', dirname($Path));
        define('LIB_PATH', FnKuPHP_PATH . '/Lib');
        define('CORE_PATH', LIB_PATH . '/Core');
        define('Function_PATH', LIB_PATH . '/Function');
        define('CONFIG_PATH', FnKuPHP_PATH . '/Config');
        define('DATA_PATH', FnKuPHP_PATH . '/Data');
        
        define('ROOT_PATH', dirname(FnKuPHP_PATH));
        define('APP_PATH', ROOT_PATH . '/' . APP_NAME);
        
        define('APP_CONFIG_PATH', APP_PATH . '/Config');
        define('APP_CONTROLLER_PATH', APP_PATH . '/Controller');
        define('APP_TPL_PATH', APP_PATH . '/Tpl');
        define('APP_PUBLIC_PATH', APP_TPL_PATH . '/Public');
    }
#创建文件
    private static function _create_dir(){
        $arr = array(
            APP_PATH,
            APP_CONFIG_PATH,
            APP_CONTROLLER_PATH,
            APP_TPL_PATH,
            APP_PUBLIC_PATH
            );
        foreach ($arr as $v) {
            is_dir($v) || mkdir($v, 0777, true);
        }
    }
#载入文件
    private static function _import_file(){
        $fileArr = array(
            Function_PATH . '/function.php',
            CORE_PATH . '/Application.class.php',
            );
        foreach ($fileArr as $v) {
            require_once($v);
        }
    }
}

FnKuPHP::Go();
?>