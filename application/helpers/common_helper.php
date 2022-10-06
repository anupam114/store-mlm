<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// -----------------------------------------------------------------------------
// Get Language by ID
function get_lang_name_by_id($id)
{
    $ci = & get_instance();
    $ci->db->where('id',$id);
    return $ci->db->get('ci_language')->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get Language Short Code
function get_lang_short_code($id)
{
    $ci = & get_instance();
    $ci->db->where('id',$id);
    return $ci->db->get('ci_language')->row_array()['short_name'];
}

// -----------------------------------------------------------------------------
// Get Language List
function get_language_list()
{
    $ci = & get_instance();
    $ci->db->where('status',1);
    return $ci->db->get('ci_language')->result_array();
}

// -----------------------------------------------------------------------------
// Get Admin name by ID
function get_admin_name($id)
{
    $ci = & get_instance();
    $ci->db->where('user_id',$id);
    return $ci->db->get('ci_users')->row_array()['username'];
}


/**
 * Generic function which returns the translation of input label in currently loaded language of user
 * @param $string
 * @return mixed
 */
function trans($string)
{
    $ci =& get_instance();
    return $ci->lang->line($string);
}

/**
  * Function to dump the passed data
  * Die & Dumps the whole data passed
  *
  * uses - var_dump & die together
  *
  * @param all $key - All Accepted - string,int,boolean,etc
  *
  * @return boolean
  * 
  */
// if (!function_exists('dd')) {

// 	function dd($key)
// 	{
// 		die(var_dump($key));
// 		return true;
// 	}


// }

if (!function_exists('dd')) {
    function dd($data)
    {
        highlight_string("<?php\n " . var_export($data, true) . "?>");
        echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
        die();
    }
}

    // --------------------------------------------------------------------------------
    if (!function_exists('date_time')) {
        function date_time($datetime) 
        {
           return date('F j, Y',strtotime($datetime));
        }
    }


/**
  * Function to Output Json
  * Fson as a Response
  *
  * uses - var_dump & die together
  *
  * @param statusHeader -> numeric, response -> string, array
  *
  * @return string
  * 
  */

  if (!function_exists('json_output')) {
    function json_output($statusHeader, $response)
    {
        $ci = &get_instance();
        $ci->output->set_content_type('application/json');
        $ci->output->set_status_header($statusHeader);
        $ci->output->set_output(json_encode($response));
    }

	    // -----------------------------------------------------------------------------
    //check auth
    if (!function_exists('auth_check')) {
        function auth_check()
        {
            // Get a reference to the controller object
            $ci =& get_instance();
            if(!$ci->session->has_userdata('is_admin_login'))
            {
                redirect('admin/auth/login', 'refresh');
            }
        }
    }

    if (!function_exists('img_to_binary')) {
        function img_to_binary($image = '', $directory = './uploads/' )
        {
            $filename = 'temp'.rand(100000, 999999).'.png';
            $result = file_put_contents($directory.$filename, base64_decode($image));
            return $filename;

        }
    }

    if (!function_exists('get_navigation')) {
        function get_navigation()
        {
            $ci =& get_instance();
            $navigation = $ci->db->where('is_active', 1)->get('ci_category')->result_array();
            return $navigation;
        }
    }

    if (!function_exists('get_settings')) {
        function get_settings()
        {
            $ci =& get_instance();
            $settings = $ci->db->where('id', 1)->get('ci_general_settings')->row_array();
            return $settings;
        }
    }

    if (!function_exists('slug')) {
        function slug($keyword)
        {
            //$slug = preg_replace(pattern, replacement, subject)
            $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($keyword)));
            return $slug;
        }
    }


}
