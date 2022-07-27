<?php

/**
* @author : Awais Tariq
* @description : This class will show the template and also contain template function
*/
class audio_template 
{
	
	var $template_files = array();
	/**
	 * @author Awais Tariq
	 * @descroption : This function/constructor will create smarty object and nessasary things
	 * @param nothing
	 * @return Nothing/void
	 */
	function audio_template()
	{
		global $audio_smarty;
        global $og_compression;
        if (!isset($audio_smarty)) 
        {
            $audio_smarty = new SmartyBC();
            $audio_smarty->compile_check = true;
            $audio_smarty->debugging = false;
            $audio_smarty->template_dir = BASEDIR."/styles/layout";
            $audio_smarty->compile_dir  = BASEDIR."/cache";
        	$audio_smarty->loadFilter("output", "trimwhitespace");	
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
	}
	/**
	 * @author Awais Tariq
	 * @descroption : This function will initiate smarty object and nessasary things
	 * @param nothing
	 * @return bool true
	 */
	function initiate() 
	{
        global $audio_smarty;
        global $og_compression;
        $audio_smarty = new Smarty();
        $audio_smarty->compile_check = true;
        $audio_smarty->debugging = false;
        $audio_smarty->template_dir = SKIN_DIR;
        $audio_smarty->compile_dir  = CACHE_DIR;
    	$audio_smarty->loadFilter("output", "trimwhitespace");	
        return true;
    }
    /**
	 * @author Awais Tariq
	 * @descroption : This function will set the folder for which smarty will compile
	 * @param  string folder_name 
	 * @return nothing
	 */
    function compile_folder($folder_name) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        $audio_smarty->compile_dir = $folder_name;
    }
     /**
	 * @author Awais Tariq
	 * @descroption : This function will set the kind for smarty
	 * @param string kind
	 * @return nothing
	 */
    function setkind($kind) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        $audio_smarty->type = $kind;
    }
 	/**
	 * @author Awais Tariq
	 * @descroption : This function will assign our required variables to smarty
	 * @param string variables
	 * @param string val
	 * @return nothing
	 */
    function refer($variables, $val) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        $audio_smarty->assign($variables, $val);
    }
    /**
	 * @author Awais Tariq
	 * @descroption : This function will set template folder name
	 * @param string folder_name
	 * @return nothing
	 */

    function assign_template_folder($folder_name = null) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        if (!$dir_name) 
        {
            $audio_smarty->template_dir = TEMPLATE_FOLDER;
        } 
        else 
        {
            $audio_smarty->template_dir = $folder_name;
        }
    }
    /**
	 * @author Awais Tariq
	 * @descroption : This function will assign skin folder
	 * @param string skin
	 * @return nothing
	 */
    function assign_skin($skin) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        $audio_smarty->template_dir = TEMPLATE_FOLDER_NAME."/" . $skin;
        $audio_smarty->compile_dir  = TEMPLATE_FOLDER_NAME."/" . $skin;
        $audio_smarty->theme        = $skin;
        $audio_smarty->type         = "theme";
    }
    /**
	 * @author Awais Tariq
	 * @descroption : This function will assign skin folder
	 * @param nothing
	 * @return string template directory
	 */
    function get_template_folder_name() 
    {
        global $audio_smarty;
        if(!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        return $audio_smarty->template_dir;
    }
    /**
	 * @author Awais Tariq
	 * @descroption : This function will show the content in the html file where smarty code 
	 *  is written
	 * @param string file_name name of file where smarty code is present and need to be show
	 * @return nothing
	 */
    function show_file($file_name) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        else
        {
        	// u can write else if u have some thing in mind.
        }
        $audio_smarty->display($file_name);
    }

    /**
	 * @author Awais Tariq
	 * @descroption : This function will show the content in the html file where smarty code 
	 *  is written.  Simply render smarty code on runtime mostly through ajax
	 * @param string file_name name of file where smarty code is present and need to be show
	 * @return text/string html page
	 */
    function deliver($file_name) 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
     	else
        {
        	// u can write else if u have some thing in mind.
        }

        return $audio_smarty->fetch($file_name);
    }

    /**
	 * @author Awais Tariq
	 * @descroption : This function will get all smarty variables assigned
	 * @param nothing
	 * @return text/string variables
	 */
    function get_smarty_variables() 
    {
        global $audio_smarty;
        if (!isset($audio_smarty)) 
        {
            $this->initiate();
        }
        return $audio_smarty->get_template_vars();
    }
}



?>