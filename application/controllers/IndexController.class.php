<?php 

class IndexController extends Controller{

    function index(){

        $this->assign('title', '首页');
        $this->assign('content', 'php MVC');
        $this->_view->render();
    }


    public function author()
    {
        $this->_view->render();
    }
}

