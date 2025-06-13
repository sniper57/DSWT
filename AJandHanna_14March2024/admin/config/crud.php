<?php

class SaveQuery{
    public $columnName;
    public $columnVal;

    public function __construct($columnName,$columnVal)
    {
        $this->columnName = $columnName;
        $this->columnVal = $columnVal;
        
    }
}

class UpdateQuery{
    public $columnVal;
    public $param;

    public function __construct($columnVal,$param)
    {
        $this->columnVal = $columnVal;
        $this->param = $param;
        
    }
}


function _getAllData($tablename){
    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");
        $result = mysql_query("SELECT * FROM " . $tablename)  or die (mysql_error());
        
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
             }
            
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            //var_dump($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}

function _getAllDataSpecColumns($tablename, $tableColumns)
{
    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");
        $result = mysql_query("SELECT ".$tableColumns." FROM " . $tablename)  or die (mysql_error());
        
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
             }
            
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            //var_dump($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}


function _getAllDataByParam($tablename,$param){
    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");
        //echo "SELECT * FROM " . $tablename . " WHERE " . $param;

         $result = mysql_query("SELECT * FROM " . $tablename . " WHERE " . $param . " ORDER BY ID DESC")  or die (mysql_error());
      
        if($result){
            $result_list = array();
            while($row = mysql_fetch_array($result)) {
                $result_list[] = $row;
             }
            $data['data'] = $result_list;
            $data['count'] = count($result_list);
            return $data;
        }
        else{
            $data['data'] = NULL;
            $data['count'] = 0;
            return $data;
        }
    }
}



function _saveData($tablename,$tableColumns,$ColumnValues){

    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");

        $query = "INSERT INTO " . $tablename . 
        " ( " . $tableColumns . " ) 
        VALUES (" . $ColumnValues . " )";

        $result = mysql_query($query) or die (mysql_error());
        
        if($result){
            $data['data'] = $result;
            $data['count'] = mysql_affected_rows();

            _saveLogs($tablename,'SAVE', $query);

            return $data;
        }
        else{
            $data['data'] = $result;
            $data['count'] = 0;
            return $data;
        }
    }    
}

function _saveMultipleData($tablename,$saveQueryList)
{
    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");

        $affectedRows = 0;
        foreach($saveQueryList as $saveQuery)
        {
            $query = "INSERT INTO " . $tablename . 
            " ( " . $saveQuery->columnName . " ) 
            VALUES (" . $saveQuery->columnVal . " );";

            $result = mysql_query($query) or die (mysql_error());
            

            if($result){
                $data['data'] = $result;
                $affectedRows += mysql_affected_rows();
            }
            else{
                $data['data'] = $result;
                
            }

            _saveLogs($tablename,'SAVE', $query);
        }

        $data['count'] = $affectedRows;
        return $data;

       
    }
}

function _updateData($tablename,$ColumnValues,$param){

    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");

        $query = "UPDATE " . $tablename . " SET " . $ColumnValues . " WHERE " . $param;
        $result = mysql_query($query) or die (mysql_error());
        
        if($result){
            $data['data'] = $result;
            $data['count'] = mysql_affected_rows();

            _saveLogs($tablename,'UPDATE', $query);

            return $data;
        }
        else{
            $data['data'] = $result;
            $data['count'] = 0;
            return $data;
        }
    }
    
}


function _updateMultipleRowsWithDifVal($tablename,$updateQueryList)
{
    
    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");

        $affectedRows = 0;
        foreach($updateQueryList as $updateQuery)
        {
            $query = "UPDATE ".$tablename." SET ".$updateQuery->columnVal." WHERE ".$updateQuery->param.";";
            $result = mysql_query($query)  or die (mysql_error());
        
            if($result){
                $data['data'] = $result;
                $affectedRows += mysql_affected_rows();
            }
            else{
                $data['data'] = $result;                
            }

            _saveLogs($tablename,'UPDATE', $query);
        }

        $data['count'] = $affectedRows;
        return $data;
        

        
    }
   
}


function _removeData($tablename,$param){

    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");

        $query = "DELETE FROM " . $tablename . " WHERE " . $param;

        //echo ($query);
        $result = mysql_query($query) or die (mysql_error());
        
        if($result){
            $data['data'] = $result;
            $data['count'] = mysql_affected_rows();

            _saveLogs($tablename,'DELETE', $query);

            return $data;
        }
        else{
            $data['data'] = $result;
            $data['count'] = 0;
            return $data;
        }
    }
    
}


function _saveLogs($tablename,$Action,$Query){

    if ($tablename != NULL){
        require_once('../admin/config/fix_mysql.inc.php');
        require_once("../admin/config/config.php");
        

        $WebClient = $WebClientID;
        $ClientName = $_SESSION["isLogin"]['name'];
        $CreatedDate = date("Y-m-d H:i:s");
        $Logs = "[$Action]=> ". mysql_real_escape_string($Query);

        $query = "INSERT INTO twds_clientaccess_logs (TWDS_ID, ClientName, Logs, CreatedDate) 
                 VALUES ('$WebClient','$ClientName','$Logs','$CreatedDate')";

        $result = mysql_query($query) or die (mysql_error());        
    }    
}

?>