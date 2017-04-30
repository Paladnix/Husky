<?php

/*
 * Core  
 */

class Core{

    public function run(){

        // 将自己注册在下来，如果有没有加载的类就执行$this->loadClass方法
        spl_autoload_register( array( $this, 'loadClass' ) );
    
        $this->setReporting();

        $this->removeMagicQuotes();

        $this->unregisterGlobals();

        $this->route();
    }

    public static function loadClass( $class ){

        if( APP_DEBUG_FRA )  echo "<br>loadClass: $class <br>";

        $frameworks = FRAME_PATH.$class.'.class.php';

        $controllers = APP_PATH.'application/controllers/'.$class.'.class.php';
        
        $models = APP_PATH.'application/models/'.$class.'.class.php';

        $views = APP_PATH.'application/views/'.$class.'.class.php';

        if( file_exists( $frameworks ) ){ 
            
            include $frameworks; 

            if( APP_DEBUG_FRA ) echo "include PHP_MVC frameworks: $frameworks <br>";

        }
        else if( file_exists( $controllers ) ){
            
            include $controllers;

            if( APP_DEBUG_FRA ) echo "include controller: $controllers <br>";

        }
        else if( file_exists( $models ) ){
            
            include $models;

            if( APP_DEBUG_FRA ) echo "include models: $models <br>";

        }
        else if( file_exists( $views ) ){
            
            include $views;

            if( APP_DEBUG_FRA ) echo "include views: $models <br>";

        }
        else{
            // deal with this error;
            // report this error;
            if( APP_DEBUG_FRA ) echo "Nothing patch";

        }
    }

    // 检测开发环境
    public function setReporting(){

        if( APP_DEBUG == true ){

            error_reporting( E_ALL );

            ini_set( 'display_errors', 'On' );
        }
        else {

            error_reporting( E_ALL );

            ini_set( 'display_errors', 'Off' );

            ini_set( 'log_errors', 'On' );

            ini_set( 'error_log', RUNTIME_PATH.'logs/error.log' );
        }
    }


    public function stripSlashesDeep(){

        $value = is_array( $value ) ? array_map( array( $this, 'stripSlashesDeep' ), $value ) : stripslashes( $value );
        return $value;

    }

    public function removeMagicQuotes(){

        if( get_magic_quotes_gpc() ){

            $_GET = isset( $_GET ) ? $this->stripSlashesDeep( $_GET ) : '';
            $_POST = isset( $_POST ) ? $this->stripSlashesDeep( $_POST ) : '';
            $_COOKIE = isset( $_COOKIE ) ? $this->stripSlashesDeep( $_COOKIE ) : '';
            $_SESSION = isset( $_SESSION ) ? $this->stripSlashesDeep( $_SESSION ) : '';
        }
    }

    public function unregisterGlobals(){

        if( ini_get('register_globals') ){

            $array = array( '_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES' );

            foreach ($array as $values){
                
                foreach ($GLOBALS[$value] as $key => $var){
                 
                    unset( $GLOBALS[$key] );
                }
            }
        }
    }

/*
 *  路由处理
 *  
 *  对于每次访问，都会走一个相同的过程。
 *  
 *  1. 如果是静态页面就直接访问到并返回。
 *  
 *  2. 如果不是静态页面就会被定向到 index.php?url=XXXX 这个路径上去。
 *  
 *  3. 来到index页面后就会进行这一系列的初始化，全局变量，然后加载这个核心代码。
 *     来到核心代码检测环境后最后做一个路由，导向正确的处理机中去。
 *  
 *  4. 路由会做的就是这样几件事：
 *      
 *      1). 分解url参数， 获得控制器名称(controller)和行为名称(action)和参数(param),
 *          这里的后缀都是不加的。
 *      
 *      2). 实例化这个控制器，在实例化控制器的时候走的是自动加载的方式。加载的顺序是:
 *              首先加载参数中的控制器，这个控制器继承于Controller基类，所以先去加载基类Controller。
 *              (需要说明的是，在include之前，就会检查继承的问题，
 *               所以在第一次include之前就会去再调用loadClass去加载基类，然后再回来加载直接控制器)
 *              
 *              然后在直接控制器中使用到构造函数，构造函数中实例化了View，所以又去加载了View。
 *              
 *              到此加载完毕。
 *
 *  5. 调用相关的函数，继续执行。 
 * 
 * 
 * 
 * */
    public function route(){

        $controllerName = 'Index';
        $action = 'index';
        $param = array();

        $url = isset($_GET['url']) ? $_GET['url'] : false;

        if($url){

            $urlArray = explode('/', $url);

            // delete empty enum;
            $urlArray = array_filter( $urlArray );

            //第一个字符大写
//            $controllerName = ucfirst( $urlArray[0] );

            $urlArray[0] = ucfirst($urlArray[0]);
            // 取出第一个元素并删除
            $controllerName = array_shift( $urlArray );
            $action = $urlArray ? array_shift($urlArray) : "index";

            //array_shift( $urlArray );
            $param = $urlArray ? $urlArray : array();

            $param = implode('/', $param);
        }

        // 实例化控制器
        $controller = $controllerName.'Controller';

        // dispatch 是实例化后的对应的Controller。
        $dispatch = new $controller( $controllerName, $action );

        
        if( method_exists($controller, $action) ){

            // 调用控制器的$action方法, 参数是$param
            call_user_func_array( array( $dispatch, $action ), array($param ));
        }
        else {

            exit( $controller. "控制器不存在" );
        }
    }

}
