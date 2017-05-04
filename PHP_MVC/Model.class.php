<?php


/*
 *  默认的构造函数已经完成了数据库的链接, 所链接的数据库配置在config/config.php 中
 *  
 *  该Model作为 this->_table 数据表的操作类，所有关于此的数据表的操作可以直接使用该变量 
 *  
 *  如果涉及到两个数据表的连接等，需要自己编写SQL 语句并执行。
 *  
 *  1. 每个select法返回一个二维的数组，作为结果。
 *  
 *  2. 其他语句返回影响的行数，如果需要返回当前插入记录的主键侧定义自己的返回方式。
 */


class Model extends Sql {

    protected $_model;

    function __construct(){

        $this->connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $this->_model = get_class($this);

        // delete suffix of Model 
        $this->_model = substr($this->_model, 0, -5);

        $this->_table = strtolower( $this->_model );

        $this->_columnType = $this->columnType();
    }

    function __destruct(){

    }
}
