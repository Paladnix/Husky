<?php

class Controller{

    protected $_controller;
    protected $_action;
    protected $_view;
    

    // View 和 Controller拥有同样的名称。
    public function __construct( $controller, $action){

        $this->_controller = $controller;
        $this->_action = $action;
        $View = $controller."View";
        $this->_view = new $View( $controller, $action );
    }

    public function assign($name, $value){

        $this->_view->assign($name, $value);
    }

    public function render(){

        $this->_view->render();
    }

    public function index(){

        $this->_render();
    }
}
