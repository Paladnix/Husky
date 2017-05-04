<?php


class View{

    protected $variables = array();
    protected $_controller;
    protected $_action;

    protected $defaultHeader = '';
    protected $defaultFooter = '';
    protected $defaultLayout = '';
    protected $defaultError  = '';


    function __construct( $controller, $action ){

        $this->_controller = $controller;

        $this->_action = $action;
    
        $this->defaultHeader = APP_PATH.'application/views/Index/header.php';
        $this->defaultFooter = APP_PATH.'application/views/Index/footer.php';
        $this->defaultLayout = APP_PATH.'application/views/Index/index.php';
        $this->defaultError  = APP_PATH.'application/views/Index/error.php';
    }


    public function assign($name, $value){

        $this->variables[$name] = $value;

        if( APP_DEBUG_FRA ) echo "<br>设置变量 $name = $value 成功。<br>";
    }


    public function render( $action ){

        // 将数组中的键值对的键转换成同名的变量
        extract($this->variables);

        $vars = $this->variables;

        $controllerHeader = APP_PATH.'application/views/'.$this->_controller.'/header.php';
        $controllerFooter = APP_PATH.'application/views/'.$this->_controller.'/footer.php';
        $controllerLayout = APP_PATH.'application/views/'.$this->_controller.'/'.$action.'.php';
        $controller = $this->_controller;

        // Header
        if(file_exists ($controllerHeader)){

            if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader<br>";

            include($controllerHeader);

        }
        else{

            include($this->defaultHeader);

            if( APP_DEBUG_FRA ) echo "<br><br><br>include $controllerHeader failed.<br>";
        }

        // Body
        if( file_exists($controllerLayout) )

            include($controllerLayout);

        else{

            if( APP_DEBUG_FRA ) echo "<br> $controllerLayout has not been find.<br>";

            include($this->defaultError);
        } 
        

        // Footer       
        if(file_exists($controllerFooter)){
            
            if( APP_DEBUG_FRA ) echo "<br>include $controllerFooter<br>";

            include($controllerFooter);

        }
        else {

            include($this->defaultFooter);

            if( APP_DEBUG_FRA ) echo "<br>include $controllerFooter failed.<br>";
        }

    }
}
