<?php

/**
 * This class will handle all database queries and other related things
 *
 * For Audio portal
 * @author : Awais Tariq <awais.tune@gmail.com>
 * @since : v1 (2015)
 */

/**
* 
*/
class beatsaudio_db 
{
	var $write_obj;
	var $read_obj;
	var $display_errors;
	var $end_query;
	var $show_all_queries;
	var $all_reads;
	var $all_writes;
	var $all_queries;
	var $all_queries_sql;
	var $loging_in_detail;
	var $row_count;
	var $changed_rows;
	var $insert_id;
	
	/**
	 * @author Awais Tariq
	 * @descroption : This function will connect to the required database
	 * @param Array $array 
	 * @return Nothing/void
	 */

	function beatsaudio_db()
	{
		$this->display_errors = true;
	}

	function connection($array)
	{

		$write_connect = array();
		$read_connect = array();
		if(isset($array["write"]))
		{
			$write_connect = $array['write'];
		}
		else
		{
			$this->display_error('No Write connection info provided!');
		}
		if(isset($array["read"]))
		{
			$read_connect = $array['read'];
		}
		else
		{
			$this->display_error('No read connection info provided!');
		}
		if(!isset($write_connect["db"])&&!empty($write_connect["db"])||
			!isset($read_connect["db"])&&!empty($read_connect["db"]))
		{
			$this->display_error('Database is not selected please check!');
		}

		$this->write_obj = new mysqli($write_connect['host'], $write_connect['user'], $write_connect['pass'], $write_connect['db']);
		$this->write_obj->options(MYSQLI_OPT_CONNECT_TIMEOUT,50);
		if($this->write_obj->connect_error)
		{
			$this->display_error("Unable to connect to the write server please check server connection!");
		}
		
		$this->read_obj = new mysqli($read_connect['host'], $read_connect['user'], $read_connect['pass'], $read_connect['db']);
		$this->read_obj->options(MYSQLI_OPT_CONNECT_TIMEOUT,50);
		if($this->read_obj->connect_error)
		{
			$this->display_error("Unable to connect to the read server please check server connection!");
		}
		$this->read_obj->set_charset("utf8");
		$this->write_obj->set_charset("utf8");
		
	}

	/**
	 * SELECT data from database according to query
	 * @author Awais Tariq
	 * @param STRING $query;
	 * @return ARRAY $results
	 */
	function select($query)
	{
		if(!$query)
		{
			$this->display_error("Query is empty please check!");
			return false;	
		} 
		$this->all_queries++;
		$this->all_queries_sql[] = $query;
		$this->all_reads++;
		$this->end_query = $query;
		$result = $this->read_obj->query($query);
		$this->row_count = $result->num_rows;
		if ($this->show_all_queries) 
		{
			$bcktrace = debug_backtrace();
		}
		if($this->read_obj->error)
		{
			$this->display_error($this->read_obj->error,$query);
			return false;
		}
		$current_row = 0;
		while ($current_row <= $result->num_rows) 
		{
			$result->data_seek($current_row);
			$data[] = $result->fetch_assoc();
			$current_row++;
		}
	    $result->close(); 
	    $key = array_search('', $data);
	   	unset($data[$key]);
	    $this->read_obj->results = $data;
	    return $data;
	}

	/**
	 * Write or update data in database according to query
	 * This function can perform update/insert/delete operation 
	 * @author Awais Tariq
	 * @param STRING $query
	 * @return insertid this will only happen when insertion query executed
	 */
	function upsert($query)
	{
		if(!$query)
		{
			$this->display_error("Query is empty please check!");
			return false;	
		} 
		$this->all_queries++;
		$this->all_writes++;
		$this->all_queries_sql[] = $query;
		$this->all_query = $query;
		$this->write_obj->query($query);
		if($this->write_obj->error)
		{
			$this->display_error($this->write_obj->error,$query);
		}
		if($this->write_obj->affected_rows)
		{
			$this->changed_rows = $this->write_obj->affected_rows;
		}
		if($this->write_obj->insert_id)
		{
			$this->insert_id = $this->write_obj->insert_id;
			return $this->insert_id;
		} 
			
	}
	/**
 	 * Function to avoid sql injection
 	 *@author Awais Tariq
 	 * @param STRING/int $data
 	 *@return STRING/int $data return cleaned data
 	 */
 	function clean_query($data)
 	{
	    $id = rtrim($data,"\\");
	    $id = rtrim($data,"/");
	    $id = ltrim($data,"\\");
	    $id = ltrim($data,"/");
	    $id = htmlspecialchars($this->read_obj->real_escape_string($data));
	    return $data;
 	}

	/**
	 * Show All quries on the page
	 * @author Awais Tariq
	 */
	function show_all_queries()
	{
		$array = array();
		if($this->show_all_queries)
		{
			$array['total_reads'] = $this->all_reads;
			$array['total_writes'] = $this->all_writes;
			$array['total_queries'] = $this->all_queries;
			$array['query_list'] = $this->all_queries_sql;
			$array['detailed'] = $this->detailed_logs;
			pr($array,true);
		}
	}
	/**
	 * Show db errors
	 * @author Awais Tariq
	 * @param STRING $err
	 *@return void
	 */
	function display_error($err,$query=false)
	{
		$bcktrace = debug_backtrace();
		$needed = array();
		$nice = array();
		$bcktraceinfo = "";
		foreach($bcktrace as $value)
		{
			if(!isset($value['file']))
				$value['file'] = '';
			if(!isset($value['line']))
				$value['line'] = '';
			if(!isset($value['function']))
				$value['function'] = '';
			if(!isset($value['class']))
				$value['class'] = '';
			if(!isset($value['type']))
				$value['type'] = '';
			if(!isset($value['args']))
				$value['args'] = '';

			$nice['file'] = $value['file'];
			$nice['line'] = $value['line'];
			$nice['function'] = $value['function'];
			$nice['class'] = $value['class'];
			$nice['type'] = $value['type'];
			$nice['args'] = $value['args'];
			$needed[] = $nice;
		}
		if(is_array($needed))
		{
			foreach($needed as  $message)
			{
				$bcktraceinfo .= "\r\n\r\n=======\r\n";
				foreach($message as $key => $value)
				{
					$bcktraceinfo .= "\r\n".$key." : ".(is_array($value) ?  json_encode($value) : $value);
				}
			}
		}
		if($this->display_errors)
		{
			echo "<html><body><pre>";
			echo $err;
			echo '<br>';
			echo 'Query : ';
			if($query)
			{
				echo $query;
			}
			else
			{
				echo $this->end_query;	
			}
			echo '<br>';
			// if($email)
				echo $bcktraceinfo;
			echo "</pre></body></html>";
			exit();
		}
		
	}
	/**
     * Some crapy old functions to make this work from previuos
     *
     * @param STRING $query
     */
    function execute($query)
    {
        
        $query = ltrim($query); //Removing spaces if any from the left side
        if(strtolower(substr($query,0,6)) == "select")
        {
            $this->select($query);
        }
        else
        {
            $this->upsert($query);
        }
    }
}


?>