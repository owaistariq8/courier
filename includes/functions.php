<?php

/**
* @author Awais Tariq
* @descroption : This function show pretty output
* @param string/int/array text
* @param bool wrap_pre
* @return Nothing/void
*/
function pre($text, $wrap_pre = false)
{
    if (!$wrap_pre)
    {
        print_r($text);
    }
    else
    {
        echo "<pre>";
        print_r($text);
        echo "</pre>";
    }
}
/**
* @author Imran Hassan
* @descroption : This function draw a line 
* @param string/int/array text
* @return Nothing/void
*/
function br($text = false,$wrap_pre = false)
{
    if(!$text)
    {
        echo '<br/>';
    }
    else if($text && is_array($text))
    {
        pre($text, $wrap_pre);
            echo '<br/>';
    }
    else
    {
        echo "$text<br/>";
    }
}
/**
* @author Awais Tariq
* @descroption : This function deliver us the template class deliver function
* @param string file_name
* @param bool/string folder
* @return string/text file
*/
function deliver($file_name, $folder = FALSE)
{
	global $audio_smarty;
    if($folder)
    {
        $file = $audio_smarty->deliver($folder . $file_name);
    }
    else
    {
        $file = $audio_smarty->deliver(SKIN_LAYOUT . '/' . $file_name);
    }
    return $file;
}

/**
* @author Awais Tariq
* @descroption : This function show template file 
* @param string template
* @param bool layout
* @return nothing
*/
function show_template($templates, $layout = true)
{
    global $template;
    if($layout)
    {
        $template->show_file(SKIN_LAYOUT . '/' . $templates);
    }
    else
    {
        $template->show_file($templates);
    }
   
}
/**
* @author Awais Tariq
* @descroption : This function assign the var to the smarty 
* @param string name
* @param string/int value
* @return nothing
*/
function refer($name, $value)
{
	global $template;
    $template->refer($name, $value);
}

/**
* @author Awais Tariq
* @descroption : This function store template files to show when display function called 
* @param string file
* @param string/bool folder
* @return nothing
*/
function template_files($file, $folder = false)
{
    global $template;
    if (!$folder)
    {
        $template->template_files[] = array('file' => $file);
    }
    else
    {
        $template->template_files[] = array('file' => $file, 'folder' => $folder);
    }
}

/**
* @author Awais Tariq
* @descroption : This function show/render all included files of template_files function 
* @param nothing
* @return nothing
*/
function show_all_included()
{
    $check = false;
    global $template;
	$dir = SKIN_LAYOUT;
    $template_files = $template->template_files;
	$folder = '';
    foreach($template_files as $file)
	{

        if(isset($file['folder'])&&!empty($file['folder']))
        {
            $folder = $file['folder'];
        }
		if(file_exists(SKIN_LAYOUT.'/'.$folder) || !empty($file))
		{
			if(!is_array($file))
			{
				$new_list[] = $file;
			}
			else
			{
				if(isset($file['folder']) && !empty($file['folder'])&& file_exists($file['folder'].'/'.$file['file']))
				{
					$new_list[] = $file['folder'].'/'.$file['file'];
                    $check = true;
                    $folder_admin = $file['folder'];
                    refer("template_folder",$folder_admin);
				}
				else
				{
					$new_list[] = $file['file'];
				}
			}
		}
	}
	$template->refer('template_files',$new_list);
	if($check)
        show_template($folder_admin."/body.html",false);
    else
        show_template("body.html");
}
/**
* @author Awais Tariq
* @descroption : This function get all configs for the audio site from db and return 
* @param nothing
* @return array new_arr Config array
*/
function allconfigs()
{
    global $db;
    $select_query = "SELECT name,value FROM configs";
    $results = $db->select($select_query);
    $new_arr = array();
    foreach ($results as $key => $value) 
    {
        $new_arr[$value['name']] = $value['value'];
    }
    return $new_arr;
}
/**
* @author Awais Tariq
* @descroption : This function will return page name of the current page opened 
* @param nothing
* @return nothing
*/
function page_name()
{
    return PAGE_NAME;
}

/**
* @author Awais Tariq
* @descroption : This function will get all clients 
* @param nothing
* @return all clients
*/
function get_all_clients()
{
    global $db;
    $select_query = "SELECT id,cname,acno,lr,pr,sr,fac,gst FROM clients";
    $results = $db->select($select_query);
    return $results;
}

/**
* @author Awais Tariq
* @descroption : This function will return client 
* @param id 
* @return client info
*/
function get_clients($key,$value)
{
    global $db;
    $select_query = "SELECT id,cname,acno,lr,pr,sr,fac,gst FROM clients WHERE {$key}='{$value}' ";
    $results = $db->select($select_query);
    return $results[0];
}

/**
* @author Awais Tariq
* @descroption : This function return random name according to the provided length
* @param int len
* @return string rand_name
*/
function rand_name($len)
{
    $string = md5(microtime());
    $hp = 32 - $len;
    $rand_name = substr($string, rand(0, $hp), $len);
    return $rand_name.time();
}
/**
* @author Imran Hassan 
* @descroption : This function get random String 
* @param $length (int)
* @return string 
*/
function random_string($length)
{
    return rand_name($length);
}

/**
 * Function used to return mysql time
 * @author : imran hassan
 * @return time 
 */
function NOW()
{
    return date('Y-m-d H:i:s', time());
}


function insert_audio($array)
{
    global $db;
    if(is_array($array)&&!empty($array))
    {
        $qfields = array();
        $qvals = array();
        foreach ($array as $key => $value) 
        {
            $qfields[] = $key;
            if($key=="userid")
            {
                $qvals[] = $value;
            }   
            else
            {
                $qvals[] = "'".$value."'";
            }
        }

        $insert_query = "INSERT INTO `beats_audio`( ".implode(',', $qfields)." ) VALUES (".implode(',', $qvals).")";
        $audio_id = $db->upsert($insert_query);
        return $audio_id;
    }
}

/**
 * Audio Key Gen
 * * it is use to generate Audio key
 */
function keygen()
{
    global $db;
    
    $char_list = "ABDGHKMNORSUXWY";
    $char_list .= "123456789";
    while(1)
    {
        $key = '';
        //srand((double)microtime()*1000000);
        for($i = 0; $i < 12; $i++)
        {
        $key .= substr($char_list,(rand()%(strlen($char_list))), 1);
        }
        
        if(!audio_key_exists($key))
        {

        }
            break;
    }
    
    return $key;
}


function audio_key_exists($key)
{
    global $db;
    $select_query = "SELECT beats_id FROM beats_audio WHERE audio_key='{$key}'";
    $results = $db->select($select_query);
    if(empty($results[0]))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function success_message_json($extra_param=NULL,$message='')
{
    if($message=='')
        $message = "Succfully performed";

    if(is_array($extra_param))
        $results =$extra_param;
    
    $results['success'] = true;
    $results['message'] = $message;


    echo json_encode($results,true);

}

/**
* @author Awais Tariq
* @descroption : This function stop sql injection
* @param string/int $id
* @param bool replacer
* @return string/int id filtered
*/
function sql_injection_protector($id,$replacer=true)
{
    return $id = htmlspecialchars(strip_tags($id), ENT_COMPAT, 'UTF-8');
}

/**
* @author Awais Tariq
* @descroption : This function stop Notice of _request methods and remove sql injection
* @param string/int $id
* @param bool method
* @return string/int id filtered
*/
function isset_check($index_name,$method=false)
{
    if($method==false||$method=='post')
    {
        if(isset($_POST[$index_name]))
        {

            return sql_injection_protector($_POST[$index_name]);
        }
    }
    else
    {
        if(isset($_GET[$index_name]))
        {
            return sql_injection_protector($_GET[$index_name]);
        }
    }
}

function pagination($total_results,$per_page=10,$page=1,$url='?')
{   
    $total = $total_results;
    $adjacents = "2"; 
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
    $lastlabel = "Last &rsaquo;&rsaquo;";
      
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               
      
    $prev = $page - 1;                          
    $next = $page + 1;
      
    $lastpage = ceil($total/$per_page);
      
    $lpm1 = $lastpage - 1; // //last page minus 1
      
    $pagination = "";
    if($lastpage > 1){   
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}
?>