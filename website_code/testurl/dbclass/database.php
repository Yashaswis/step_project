<?php
class database {

	private $host;			
	private $user;		
	private $password;	
	private $database;	
	private $conn;
	private $mysqlconn;
	
   function __construct($hostName = "localhost", $userName = "inverset_Ayash", $passwordName = "Ayash@1234", $databaseName = "inverset_ayash_db_vehicle") {
		$this->host = $hostName;
		$this->user = $userName;
		$this->password = $passwordName;
		
		$this->conn = mysql_connect($this->host, $this->user, $this->password)
			or die(mysql_error());
		
		$this->changeDatabase($databaseName);
	   }
	
	function changeDatabase($databaseName) {
		mysql_select_db ($databaseName);
		$this->database = $databaseName;
	}
	
	function query($sql) {
	//echo $sql."<br/>";
		return mysql_query($sql,$this->conn);
	}
	
	function num_rows($result) {
		return mysql_num_rows($result);
	}

	function getTotalRecord($table,$condition) {
		$sql="Select * from ".$table." ".$condition;		
		return mysql_num_rows(mysql_query($sql,$this->conn));
	}
	
	
	function fetch_array($result) {
		return mysql_fetch_array($result);
	}
	
	function nonquery($sql) {
		$rs = mysql_query($sql,$this->conn);
		$newID = mysql_insert_id();
		settype($rs, "null");
		return $newID;
	}
  function select($table,$cond) {
		$sql="select * from ".$table." ".$cond;
		return $sql;
		//return $this->query($sql);
	}
	
function selectwithCondition($tableName,$condition) {		
			$sql="Select * from ".$tableName." ".$condition;
			//echo $sql."<br/>";
			return mysql_query($sql,$this->conn);
		}
function echo_br($msg = null)
   {
      echo  $msg . '</br>';
   }	
function getTableFields($table = null)
   {

      $result = mysql_query("SELECT * FROM $table");

      $errors = mysql_error();

      // If table does not exist, return null
      if (!empty($errors))
          return null;

      // Get field names for the table
      $fields = mysql_num_fields($result);

      // Setup an array to store return info
      $hash = array();

      // For each field, find out what type, length, requirements,
      // PK, unqiue, enum, attributes etc.
      for ($i=0; $i < $fields; $i++)
      {
         $type     = mysql_field_type($result, $i);
         $name     = mysql_field_name($result, $i);
         $len      = mysql_field_len($result, $i);
         $flags    = mysql_field_flags($result, $i);
         $required = (preg_match("/not_null/i", $flags)) ? 1 : 0;
         $autoinc  = (preg_match("/auto_increment/i", $flags)) ? 1 : 0;
         $pk       = (preg_match("/primary/i", $flags)) ? 1 : 0;
         $unique   = (preg_match("/unique/i", $flags)) ? 1 : 0;
         $enum     = (preg_match("/enum/i", $flags)) ? 1 : 0;

         $hash[$name] = "$type:$len:$required:$autoinc:$pk:$unique:$enum";
      }

      // Free the result set
      mysql_free_result($result);

      // Return
      return $hash;
}

function q($str = null)
   {
      return "'" . mysql_escape_string($str) . "'";
   }
	
function insert_new($data = null)
   {
     $ret = array();
	 
     $fieldMap = $this->getTableFields($data['table']);
     $valueList = array();
     $fieldList = array();
     $userData = $data['data'];

     foreach ($fieldMap as $field => $settings)
     {
        list($type,
             $len,
             $required,
             $autoinc,
             $pk,
             $uniq,
             $enum) = explode(':', $settings);

     $userField = ($field);
//		  $userField = strtolower($field);
  
        if (isset($userData[$userField]))
            $value = trim($userData[$userField]);
        else
            continue;

        $fieldList[] = $field;

        // Quote if the field type requires it
        $valueList[] = (preg_match("/string/i", $type) ||
                        preg_match("/blob/i", $type) ||
                        preg_match("/date/i", $type) ||
                        preg_match("/time/i", $type)
                        ) ? $this->q($value) : $value;
     }

     $fieldStr = implode(',', $fieldList);
     $valueStr = implode(',', $valueList);

     $stmt     = 'INSERT INTO ' . $data['table'] . " ($fieldStr) VALUES($valueStr)";
//echo $stmt;
     $result   = mysql_query($stmt);

     $err      = mysql_error();

     if (isset($data['debug']) && $data['debug'])
     {
          $this->echo_br($stmt);
		  $this->echo_br("Error: " . $err);
     }
	  
     if (! empty($err))
     {
        if (preg_match("/Duplicate/i", $err))
        {
           $errors[] = $data['dup_error'];
           $ret['newid'] = null;
           $ret['error'] = $errors;
           $ret['affected_rows'] = 0;
        }
     }
     else
     {
        $ret['newid'] = mysql_insert_id();
        $ret['affected_rows'] = mysql_affected_rows();
     }
	 
	 $no= mysql_errno();
		  if($no==1062)
		  {
		  $ActionMsg="Record Already exists.";	
		  }
		  else{
		  $ActionMsg="Record added successfully.";		
		  }


     return $ret;
}
   	
function update_new($info)
   {
      $table = (isset($info['table'])) ? $info['table'] : null;
      $where = (isset($info['where'])) ? $info['where'] : 1;
      $data  = (isset($info['data']))  ? $info['data']  : null;

      // If table name or data not provided return false
      if (! $table || ! $data)
         return false;

      $updateStr = array();

      // Get the table field meta data
      $fieldMap = $this->getTableFields($info['table']);

       // Quote fields as needed
       foreach ($fieldMap as $field => $settings)
       {
          // Break down each field's meta info into attributes
          list($type,
               $len,
               $required,
               $autoinc,
               $pk,
               $uniq,
               $enum) = explode(':', $settings);

       //   $userField = strtolower($field);
			$userField = ($field);

          if (isset($data[$userField]))
              $value = trim($data[$userField]);
          else
              continue;

          // Special case: value = NULL is changed to value = ''
          if (preg_match("/^NULL$/i", $value))
             $value = '';

          // Quote strings/date/blob type data
          $value= (preg_match("/string/i", $type) ||
                   preg_match("/date/i", $type) ||
                   preg_match("/time/i", $type) ||
                   preg_match("/blob/i", $type)) ? $this->q($value) : $value;
          $updateStr[] = "$field = $value";
       }

      $keyVal = implode(', ', $updateStr);
      $update = "UPDATE $table  SET $keyVal WHERE $where";
      $result = mysql_query($update);
      $err    = mysql_error();
      $affectedRows = mysql_affected_rows();

      // If debugging is turned on show helpful info
      if (isset($info['debug']) && $info['debug'])
      {
         $this->echo_br($update);
         $this->echo_br($err);
         $this->echo_br("Affected rows $affectedRows" );

      }
      return (empty($err) && $affectedRows > 0 ) ? true : false;
   }
   
		
	
	function insert($data, $tableName) {
		$names = '';
		$values = '';
	
		foreach($data as $key => $value){
			$names .= $key.',';
			$values .="'".@mysql_real_escape_string($value)."',";			
		}
		
		$values = preg_replace("/,$/","",$values);
		$names = preg_replace("/,$/","",$names);
		
		$sql = 'INSERT INTO '.$tableName.' ('.$names.') VALUES ('.$values.')';
		//return $sql;
		echo $sql;
		return $this->nonquery($sql);
	}
	
	function update($data, $tableName, $condition) {
		$sql = "UPDATE " . $tableName . " SET ";
	
		foreach($data as $key => $value){
			$sql .= $key.' = ';
			$sql .="'".mysql_real_escape_string($value)."', ";
			}
		
		$sql = rtrim($sql, ", ").$condition;
		//echo $sql;
		return $this->nonquery($sql);
	}
	
	function clean($value) {
	   if (get_magic_quotes_gpc()) {
	       $value = stripslashes($value);
	   }
	
	   if (!is_numeric($value)) {
	       $value = mysql_real_escape_string($value);
	   }
	   return $value;
	}
	
	function createDatabase($databaseName) {
		$sql = 'CREATE DATABASE '.$databaseName;
		$this->nonquery($sql);
	}
	
	function dropDatabase($databaseName) {
		$sql = 'DROP DATABASE '.$databaseName;
		$this->nonquery($sql);
	}
	
	function dropTable($tableName) {
		$sql = 'DROP TABLE '.$tableName;
		$this->nonquery($sql);
	}
	
	function truncateTable($tableName) {
		$sql = 'TRUNCATE TABLE '.$tableName;
		$this->nonquery($sql);
	}
	
	function __destruct()  {
	mysql_close($this->conn);
	}
	
}

?>