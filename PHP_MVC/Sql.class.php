<?php

class Sql {

    protected $_dbHandle;
    protected $_table;

    public function connect($host, $user, $pass, $dbname){

        try {

            $dsn = sprintf( "mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname );

            $option = array( PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC );

            $this->_dbHandle = new PDO($dsn, $user, $pass, $option);

        }catch ( PDOException $e){

            exit( "<br> Connect Error: $e->getMessage() <br>" );
        }
    }


    /*
     *  query函数负责执行一个SQL语句, 并返回受影响的行数
     *  子类中也要重写类似的代码
     */

    public function query( $sql ){

        $sth = $this->_dbHandle->prepare($sql);

        $sth->execute();

        return $sth->rowCount();
    }


    /*
     *  将一个键值对数组转换成插入语句合法内容 
     */
    
    public function formatInsert($data) {

        $fields = array();
        $values = array();

        foreach ( $data as $key => $value ){
            $fields[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", $value);
        }

        $field = implode(',' , $fields);
        $value = implode(',' , $values);

        return sprintf("(%s) values (%s) ", $field, $value);
    }

    
    /*
     *  将一个键值对数组转化为update合法的字符串
     */
    
    public function formatUpdate($data){

        $fields = array();

        foreach ( $data as $key => $value ){

            $fields[] = sprintf(" `%s`='%s' ", $key, $value);
        }

        return implode(',', $fields);
    }

/*
 * 
 *   以下代码为default配置，Model类重写这些代码
 */

    public function selectAll(){
        
        $sql = sprintf("select * from `%s` ", $this->_table);

        $sth = $this->_dbHandle->prepare($sql);

        if ( $sth->execute() )
            
            return $sth->fetchAll();

        return 0;
    }

    public function select( $id ){

        $sql = sprintf("select * from `%s` where `id`= '%s' ", $this->_table, $id);

        $sth = $this->_dbHandle->prepare($sql);

        if( $sth->execute() )

            return $sth->fetch();

        return 0;
    }


    public function insert( $data ){

        $sql = sprintf( "insert into `%s` %s", $this->_table, $this->formatInsert($data) );

        return $this->query($sql);
    }

    public function update ($id, $data){

        $sql = sprintf( "update `%s` set %s where `id` = '%s' ", $this->_table, $this->formatUpdate($data), $id );

        return $this->query($sql);
    }

}
