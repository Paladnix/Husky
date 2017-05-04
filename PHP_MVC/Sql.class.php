<?php

class Sql {

    protected $_dbHandle;
    protected $_table;
    protected $_columnType = array();

    public function connect($host, $user, $pass, $dbname){

        try {

            $dsn = sprintf( "mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname );

            $option = array( PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

            $this->_dbHandle = new PDO($dsn, $user, $pass, $option);

            if( APP_DEBUG ) $this->_dbHandle->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);

        }catch ( PDOException $e){

            exit( "<br><br><br><br><br> Connect Error: $e->getMessage() <br>" );
        }
    }


    /*
     *  query函数负责执行一个SQL语句, 并返回受影响的行数
     *  子类中也要重写类似的代码
     */

    public function columnType(){

        $sql = sprintf("show columns from `%s`;", $this->_table);

        $sth = $this->_dbHandle->prepare($sql);

        $sth->execute();

        return $sth->fetchAll();
    }

    public function querySQL( $sql ){

        if(APP_DEBUG_FRA) print_r( $sql);

        try{

            $sth = $this->_dbHandle->prepare($sql);

            $sth->execute();

        }catch(PDOException $e){

            exit("<br><br><br><br> $sql has throw an error: $e->getMessage()  <br>");
        }

        return $sth->rowCount();
    }

    public function selectSQL( $sql ){

        try{

            if( APP_DEBUG_FRA ) echo "<br><br>$sql<br><br>";

            $sth = $this->_dbHandle->prepare($sql);

            $sth->execute();

        }catch(PDOException $e){

            exit("<br><br><br><br>$sql has throw an error: $e->getMessage() <br><br>");
        }

        return $sth->fetchAll();
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

            foreach( $this->_columnType as $row ){

                if( $row['Field'] == $key) {

                    if(strstr($row['Type'], "int") || strstr($row['Type'], "float") || strstr($row['Type'], "double"))
                        $fields[] = sprintf(" `%s`= %s ", $key, $value);
                    else
                        $fields[] = sprintf(" `%s`='%s' ", $key, $value);
                }

            }
        }

        return implode(',', $fields);
    }


    public function formatWhere($data){

        $fields = array();

        foreach( $data as $key => $value ){

            $fields[] = sprintf(" `%s`='%s' ", $key, $value);
        }

        return implode(" and ", $fields);
    }



    /*
     * 
     *   以下代码为default配置，Model类重写这些代码
     */


}
