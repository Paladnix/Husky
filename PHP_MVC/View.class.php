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

        $this->defaultHeader = APP_PATH.'application/views/default/header.php';
        $this->defaultFooter = APP_PATH.'application/views/default/footer.php';
        $this->defaultLayout = APP_PATH.'application/views/default/layout.php';
        $this->defaultError  = APP_PATH.'application/views/default/error.php';

    }


    public function assign($name, $value){

        $this->variables[$name] = $value;
    }


    public function includePage( $page ){

        if(file_exists($page)){

            include($page);

        }
        else{

            if( APP_DEBUG_FRA ) echo "<br>$page has not been found.<br>";

            include($this->defaultError);
        
        } 

    }


    public function render(){


        // 将数组中的键值对的键转换成同名的变量
        //extract($this->variables);

        $vars = $this->variables;

        $controllerHeader = APP_PATH.'application/views/'.$this->_controller.'/header.php';
        $controllerFooter = APP_PATH.'application/views/'.$this->_controller.'/footer.php';
        $controllerLayout = APP_PATH.'application/views/'.$this->_controller.'/'.$this->_action.'.php';
        
        // Header
        if(file_exists ($controllerHeader)){

            include($controllerHeader);

            if( APP_DEBUG_FRA ) echo "<br>include $controllerHeader<br>";
        }
        else{

            include($this->defaultHeader);

            if( APP_DEBUG_FRA ) echo "<br>include $this->defaultHeader<br>";
        }

        // Body
        $this->includePage($controllerLayout);
        
        
        // Footer       
        if(file_exists($controllerFooter)){

            include($controllerFooter);

            if( APP_DEBUG_FRA ) echo "<br>include $controllerFooter<br>";
        }
        else {

            include($this->defaultFooter);

            if( APP_DEBUG_FRA ) echo "<br>include $this->defaultFooter<br>";
        }

    }
}
