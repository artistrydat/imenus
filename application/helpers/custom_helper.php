<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	


	if(!function_exists('is_test')){
		function is_test(){  
			$ci =& get_instance();
			$settings = settings();
			if(isset($settings['environment']) && $settings['environment'] =='demo'):
				$ci->session->set_flashdata('error', 'Sorry Not available in demo');
				redirect($_SERVER['HTTP_REFERER']);
				exit();
			else:

			endif;  		
		}
	}

	if(!function_exists('is_demo')){
		function is_demo(){  
			$ci =& get_instance();
			$settings = settings();
			if(isset($settings['environment']) && $settings['environment'] =='demo'):
				return 1;
			else:
				return 0;
			endif;  		
		}
	}


	if (!function_exists('is_login')) {

	    function is_login() {
	        $ci = get_instance();
	        if ($ci->session->userdata('is_login') != TRUE) {
	            $ci->session->sess_destroy();
	            redirect(base_url('login'));
	        }else if(empty(get_user_info())){
	        	$ci->session->sess_destroy();
	            redirect(base_url('login'));
	        }
	        
	    }

	}

	if(!function_exists('count_days')){
	    function count_days($start,$end){ 
	        $datetime1 = date_create($start);
	        $datetime2 = date_create($end);
	        $interval = date_diff($datetime1, $datetime2);
	        $date_differ =  $interval->format('%a');

			
			return $date_differ;
	    }
	}


	if (!function_exists('get_info')) {
		function get_info($type)
		{

			$ci =& get_instance();
			if($type=='6fa1b959a5580d843a4ea03422873009'):
				return 'Regular License';
			elseif($type==MY_LICENSE):
				return 'Extendend License';
			else:
				return 'Custom License';
			endif;
		}
	}

	if (!function_exists('check_info')) {
		function check_info()
		{

			$ci =& get_instance();
			$settings = settings();
			if(LICENSE != MY_LICENSE){
				redirect(base_url());
			}
			
		}
	}
	

	if (!function_exists('check')) {
		function check()
		{

			$ci =& get_instance();
			$settings = settings();
			if(LICENSE == MY_LICENSE){
				return 1;
			}else{
				return 0;
			}
			
		}
	}

	

	if (!function_exists('str_slug')) {

	    function str_slug($string, $separator = '-') {
	        $ci = get_instance();
	        $re = "/(\\s|\\".$separator.")+/mu";
	        $str = @trim($string);
	        $subst = $separator;
	        $result = preg_replace($re, $subst, $str);
	        return mb_strtolower($result, mb_detect_encoding($result));
	    }

	}

	

	
	if(!function_exists('c_date')){
	    function c_time(){        

	        $dt = new DateTime('now',new DateTimezone(time_zone()));
	        $date_time = $dt->format('d-m-Y');      
	        
	        return $date_time;
	    }
	}
	if(!function_exists('today')){
	    function today(){        

	        $dt = new DateTime('now',new DateTimezone(time_zone()));
	        $date_time = $dt->format('Y-m-d');      
	        
	        return $date_time;
	    }
	}



	if(!function_exists('d_time')){
	    function d_time(){    
	        $dt = new DateTime('now',new DateTimezone(time_zone()));
	        if($dt){
	        	$date_time = $dt->format('Y-m-d H:i:s'); 
	        }else{
	            $dt = new DateTime('now',new DateTimezone('Asia/Dhaka'));
	       		$date_time = $dt->format('Y-m-d H:i:s'); 
	        }
	         return $date_time;
	    }
	}


	
	

	if(!function_exists('add_year')){
	    function add_year($type){        
	    	$current_date = strtotime(d_time());
	    	if($type=='yearly' || $type=='year'){
				$date = strtotime("+ 1 year", $current_date);
				$date = date('Y-m-d', $date);	  
				$end_date = $date." 23:59:59";
			}else if($type=='monthly' || $type=='month'){
				$date = strtotime("+ 1 month", $current_date);
				$date = date('Y-m-d', $date);	  
				$end_date = $date." 23:59:59";
			}else if($type=='trial'){
				$date = strtotime("+ 1 month", $current_date);
				$date = date('Y-m-d', $date);	  
				$end_date = $date." 23:59:59";
			}else if($type=='weekly' || $type=='week'){
				$date = strtotime("+ 7 days", $current_date);
				$date = date('Y-m-d', $date);	  
				$end_date = $date." 23:59:59";
			}else if($type=='fifteen'){
				$date = strtotime("+ 15 days", $current_date);
				$date = date('Y-m-d', $date);	  
				$end_date = $date." 23:59:59";
			}else if($type=='half_yearly' || $type=='half_year'){
				$date = strtotime("+ 6 month", $current_date);
				$date = date('Y-m-d', $date);	  
				$end_date = $date." 23:59:59";
			}else{
				$end_date = '0000-00-00 00:00:00';
			}
	        return $end_date;
	    }
	}



	if(!function_exists('add_time')){
	    function add_time($time,$slot){        
	    	$current_date = strtotime(d_time());
	    	$date = strtotime('+'.' '.$time.' '.$slot, $current_date);
			$date = date('Y-m-d H:i:s', $date);	  
	        return $date;
	    }
	}

	if(!function_exists('add_date')){
		//duration = 1,2 and type= days,month,year
	    function add_date($duration,$type){        
	    	$current_date = strtotime(d_time());
			$date = strtotime("+ ".$duration.' '.$type, $current_date);
			$date = date('Y-m-d', $date);	  
			$end_date = $date." 23:59:59";
	        return $end_date;
	    }
	}


	if(!function_exists('make_date')){
		//duration = 1,2 and type= days,month,year
		function make_date($duration,$type){        
			$current_date = strtotime(d_time());
			$date = strtotime("- ".$duration.' '.$type, $current_date);
			$date = date('Y-m-d', $date);	  
			$end_date = $date." 23:59:59";
			return $end_date;
		}
	}

				

	if(!function_exists('day_left')){
	    function day_left($start,$end){ 
	        $datetime1 = date_create($start);
	        $datetime2 = date_create($end);
	        $interval = date_diff($datetime1, $datetime2);
	        $date_differ =  $interval->format('%a');
	        if($end=='' || $end=='0000-00-00 00:00:00' || empty($end)):
	        	$date = 0;
		        $left = 'Lifetime';
	        else:
		        if($datetime1 <= $datetime2):
		        	if($date_differ == "0"){
						$date =  "Tonight";
						$left =  0;
					}else{
						$left =  $date_differ." Days left";
						$date =  $date_differ;
					}
		    	else:
		        	$date = '-'.$date_differ;
		        	$left =  '-'.$date_differ." Days ago";
		        endif;
		    endif;
			
			return ['day_left'=>$left,'date'=>$date];
	    }
	}



	

	
	

	



/*----------------------------------------------
  		Custom date time		
----------------------------------------------*/

if (!function_exists('time_zone')) {

	    function time_zone() {
	        $ci =& get_instance();
	        $set_time_zone = settings()['time_zone']; //Asia/Dhaka
	        $date = new DateTime();
      		$timeZone = $date->getTimezone();
      		!empty($set_time_zone)?$get_zone = $set_time_zone:$get_zone = $timeZone->getName();
	        return $get_zone;
	        
	    }

	}
	if(!function_exists('full_date')){
	    function full_date($date,$id=0){       
	        
	        if($date != ''){
	            $date_new = get_date_format($date,$id);
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}


	if(!function_exists('get_date_format')){
	    function get_date_format($date,$id=0){ 
	        $type= $id !=0?shop($id)->date_format:8;
	        if($date != ''){
	            $dates = [
		            1 => date("d-m-Y",strtotime($date)),
		            2 => date("Y-m-d",strtotime($date)),
		            3 => date("d/m/Y",strtotime($date)),
		            4 => date("Y/m/d",strtotime($date)),
		            5 => date("d.m.Y",strtotime($date)),
		            6 => date("Y.m.d",strtotime($date)),
		            7 => date("d M, Y",strtotime($date)),
		            8 => date("d M Y",strtotime($date)),
	            ];
	            return $dates[$type];
	        }else{
	            return '';
	        }
	    }
	}

	if(!function_exists('time_format')){
	    function time_format($date,$id=0){   
	        $type= $id!=0 ? shop($id)->time_format: 1;
	        if($date != ''){ 
	            $dates = [
		            1 => date('h:i a', strtotime($date)),
		            2 => date("H:i",strtotime($date)),
	            ];
	            return $dates[$type];
	        }else{
	            return '';
	        }
	    }
	}

	if(!function_exists('full_time')){
	    function full_time($date,$id=0){     
	        if($date != '' && $date !='0000-00-00 00:00:00'){
	            $date2 = date_create($date);
	            $fdate = get_date_format($date,$id);
	            $ftime = time_format($date,$id);
	            $date_new = $fdate.'  '.$ftime;
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	if (!function_exists('cl_format')) {

	    function cl_format($date,$id=0) {
	        $ci = get_instance();
	        if($id==0){
				$date = date_create($date);
				return date_format($date,"d F, Y");
	        }else{
	        	$date = get_date_format($date,$id);
	        	return $date;
	        }
	        
		    
	        
	    }
	}


	if(!function_exists('time_format_12')){
	    function time_format_12($time){       
	        
	        if($time != ''){
	            $time2 = date_create($time);
	            $ne_time = date_format($time2,"h:i a");
	            return $ne_time;
	        }else{
	            return '';
	        }
	    }
	}
/*----------------------------------------------
  		End Custom date time		
----------------------------------------------*/
	
	
	
//session  data
    if (!function_exists('auth')) 
    {
        function auth($string)
        {
            $ci =& get_instance();
            return $ci->session->userdata($string);
        }
    }



if(!function_exists('get_layout_img')){
    function get_layout_img($img){   
       if(!empty($img)){
       	$image = $img;
       }else{
       	$image = 'assets/images/home_banner.jpg';
       }
        return base_url($image);
    }
}



if(!function_exists('lang')){
    function lang($data){  
    $ci = get_instance(); 
      return $ci->lang->line($data);
    }
}

if (!function_exists('get_lang')) 
{
    function get_lang()
    {
        $ci =& get_instance();
        if ($ci->session->userdata('site_lang') == '') {
        	$settings = $ci->admin_m->get_settings();
        	return $settings['language'];
        } else {
        	$name = $ci->session->userdata('site_lang');
        	return $name;
        }
        
    }
}

if (!function_exists('direction')) 
{
    function direction()
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->get_languages_by_slug(get_lang());
       	return isset($data['direction'])?$data['direction']:"" ;
        
    }
}

if (!function_exists('get_auth_info')) {
	function get_auth_info(){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_auth_info();        
		return $data;
	}	
}

if (!function_exists('user')) {
	function user(){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_users_info();        
		return isset($data) && !empty($data)?$data:0;
	}	
}


if (!function_exists('staff_info')) {
	function staff_info(){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_staff_info();        
		return isset($data) && !empty($data)?$data:0;
	}	
}

if (!function_exists('user_info_by_id')) {
	function user_info_by_id($id){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->user_info_by_id($id);        
		return $data;
	}	
}

if (!function_exists('get_user_info')) {
	function get_user_info(){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_user_info();        
		return $data;
	}	
}

if (!function_exists('get_user_info_by_id')) {
	function get_user_info_by_id($id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_user_info_by_id($id);        
		return $data;
	}	
}



if (!function_exists('valid_user')) {
    function valid_user($id) {
        $ci = get_instance();
        if(auth('id')!=$id){
	       redirect(base_url('dashboard'));
	       $ci->session->set_flashdata('warning', 'Sorry User not Match');
	     } 
    }
}

if (!function_exists('staff')) {
	function staff($id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->customer_info($id);      
		return $data;
	}	
}

if (!function_exists('get_id_by_package_slug')) {
	function get_info_by_package_slug($slug){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_info_by_package_slug($slug);        
		return $data;
	}	
}


if (!function_exists('settings')) 
{
    function settings()
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->get_settings();
       	return $data ;
        
    }
}

if (!function_exists('single_select_by_id')) 
{
    function single_select_by_id($id,$table)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->single_select_by_id($id,$table);
       	return $data ;
        
    }
}

if (!function_exists('single')) 
{
    function single($id,$table)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->single_id($id,$table);
       	return $data ;
        
    }
}

// check valid auth/admin
if (!function_exists('check_valid_auth')) {

    function check_valid_auth() {
        $ci = get_instance();
        if(auth('is_auth')==TRUE){
	        if (auth('user_role') != 1) {
	            redirect(base_url('dashboard'));
	        }  
	    }else{
	    	$ci->session->sess_destroy();
            redirect(base_url('login'));
	    }
    }

}

// check valid user
if (!function_exists('check_valid_user')) {

    function check_valid_user() {
        $ci = get_instance();
        if(auth('is_user')==TRUE){
	        if (auth('user_role') == 1) {
	            redirect(base_url('dashboard'));
	        }  
	    }else{
	    	$ci->session->sess_destroy();
            redirect(base_url('login'));
	    }
    }

}

// check valid user
if (!function_exists('is_login')) {

    function is_login() {
        $ci = get_instance();
        if(auth('is_login')==TRUE){
	            redirect(base_url('dashboard')); 
	    }else{
	    	$ci->session->sess_destroy();
            redirect(base_url('login'));
	    }
    }

}



if (!function_exists('d_auth')) 
{
	function d_auth($string)
	{
		$ci =& get_instance();
		if(!empty($ci->session->userdata('discount_ss'))){
			return $ci->session->userdata('discount_ss')[$string];
		}else{
			return '';
		}
		
	}
}


if (!function_exists('check_valid_user')) {

    function check_valid_user() {
        $ci = get_instance();
        if(auth('is_user')==TRUE){
	        if (auth('user_role') == 1) {
	            redirect(base_url('dashboard'));
	        }  
	    }else{
	    	$ci->session->sess_destroy();
            redirect(base_url('login'));
	    }
    }

}

if (!function_exists('check_setting_value')) {
	function check_setting_value($type){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->check_setting_value($type);        
		return $data;
	}	
}

if (!function_exists('get_country')) {
	function get_country($id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->single_select_by_id($id,'country');        
		return $data;
	}	
}

if (!function_exists('csrf')) {
	function csrf(){        
		$ci = get_instance();
		$data = include APPPATH.'views/csrf.php';
	}	
}

if (!function_exists('users')) {

	function users(){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_user_info();        
		return $data;
	}	
}


if (!function_exists('admin')) {

    function admin(){        
    $ci = get_instance();
    $ci->load->model('admin_m');
    $data = $ci->admin_m->get_admin_info();        
    return $data;
		}	
}

if (!function_exists('restaurant')) {

    function restaurant($id=''){        
	    $ci = get_instance();
	    $ci->load->model('admin_m');
	    $data = $ci->admin_m->my_restaurant_info($id);        
	    return isset($data)?$data:[];
	}	
}


if (!function_exists('shop')) {

    function shop($id=''){        
	    $ci = get_instance();
	    $ci->load->model('admin_m');
	    $data = $ci->admin_m->get_shop_info($id);        
	    return isset($data)?$data:[];
	}	
}


if (!function_exists('shop_info')) {

    function shop_info($id=''){        
	    $ci = get_instance();
	    $ci->load->model('admin_m');
	    $data = $ci->admin_m->get_restaurant_info_shop_id($id);        
	    return isset($data)?$data:[];
	}	
}

//session  data
if (!function_exists('shop_id')) 
{
    function shop_id($id='')
    {
        $ci =& get_instance();
        return $ci->admin_m->get_shop_id($id);
    }
}




if(!function_exists('get_days')){
    function get_days(){   
        $days = array(
            '0' => lang('sunday'),
            '1' => lang('monday'),
            '2' => lang('tuesday'),
            '3' => lang('wednesday'),
            '4' => lang('thursday'),
            '5' => lang('friday'),
            '6' => lang('saturday'),
        );
        return $days;
    }
}

if(!function_exists('get_off_days')){
    function get_off_days($type='days'){   
        $days = array(
            '0' => lang('Sunday'),
            '1' => lang('monday'),
            '2' => lang('tuesday'),
            '3' => lang('wednesday'),
            '4' => lang('thursday'),
            '5' => lang('friday'),
            '6' => lang('saturday'),
        );
        if($type=='days'):
	        return $days;
	    else:
	    	return $days[$type];
	    endif;
    }
}

if(!function_exists('get_month')){
    function get_month(){   
        $days = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'July',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec',
        );
        return $days;
    }
}

if (!function_exists('get_currency')) 
{
    function get_currency($type)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
        $setting = $ci->admin_m->get_settings();
        if(isset($setting['currency']) && ($setting['currency'] != 0 || $setting['currency'] != '')):
       		$data = $ci->admin_m->get_currency($setting['currency']);
       	else:
       		$data = array(
       			'currency_code'=>'USD',
       			'icon'=>'&#36;',
       		);
       endif;
       	return $data[$type] ;
        
    }
}

/**===== get_price_feature_id ====**/

if (!function_exists('get_price_feature_id')) {
	function get_price_feature_id($id,$type_id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_price_feature_id($id,$type_id);        
		return $data;
	}	
}

if (!function_exists('get_active_package_features')) {
	function get_active_package_features($id,$type_id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_active_package_features($id,$type_id);        
		return $data;
	}	
}

	

/**
   ***  single_select_by_section_name
**/ 

if (!function_exists('get_by_section_name')) {
	function get_by_section_name($section_name){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->single_select_by_section_name($section_name);        
		return $data;
	}	
}

if (!function_exists('section_name')) {
	function section_name($section_name){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->single_select_by_section_name($section_name);        
		return isset($data) && !empty($data)?$data:[];
	}	
}

/**
   *** Get user info by slug
**/ 

if (!function_exists('get_all_user_info_slug')) {
	function get_all_user_info_slug($slug){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_all_user_info_slug($slug);        
		return $data;
	}	
}

/**
   *** Get user info by slug
**/ 

if (!function_exists('get_all_user_info_id')) {
	function get_all_user_info_id($id){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_all_user_info_id($id);        
		return $data;
	}	
}

/**
   ***  redirect url via social media
**/ 

if (!function_exists('redirect_url')) 
{
    function redirect_url($value,$slug,$dial_code='')
    {

        $ci =& get_instance();
        if($slug=="whatsapp"):
        	$url = 'https://api.whatsapp.com/send?phone='.$dial_code.$value;
        elseif($slug=="phone"):
        	$url ='tel:'.$dial_code.$value;
        elseif($slug=="email"):
        	$url ='mailto:'.$value;
        else:
        	$url= prep_url($value);
        endif;
       	return $url ;
        
    }
}
	
/**
   ***  redirect url via social media
**/ 

if (!function_exists('get_package_type')) 
{
    function get_package_type($value)
    {

        $ci =& get_instance();
        if(strtolower($value)=="yearly"):
        	$url = 'Year';
        elseif(strtolower($value)=="monthly"):
        	$url ='Month';
        else:
        	$url= '';
        endif;
       	return $url ;
        
    }
}


if (!function_exists('get_total_income')) {
	function get_total_income(){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_total_income();        
		return $data;
	}	
}


if (!function_exists('income')) {
	function income($month,$type){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_total_income_by_month($month,$type);        
		return $data;
	}	
}
if (!function_exists('user_income')) {
	function user_income($month,$type){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_user_total_income_by_month($month,$type);        
		return $data;
	}	
}

if (!function_exists('get_package_info_by_slug')) {
	function get_package_info_by_slug($slug){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_package_info_by_slug($slug);        
		return $data;
	}	
}
if (!function_exists('get_package_info_by_id')) {
	function get_package_info_by_id($id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_package_info_by_id($id);        
		return isset($data) && !empty($data)?$data:0;
	}	
}


/*  profile
================================================== */

// get user layout by slug
if (!function_exists('get_view_layouts_by_slug')) {

    function get_view_layouts_by_slug($slug){        
        $ci = get_instance();
        $ci->load->model('common_m');
        $data = $ci->common_m->get_layouts_by_slug($slug);        
        return 'theme'.$data;
	}	
}

// get user layout by slug
if (!function_exists('get_id_by_slug')) {

    function get_id_by_slug($slug){        
        $ci = get_instance();
        $ci->load->model('common_m');
        $data = $ci->common_m->get_id_by_slug($slug);        
        return $data;
	}	
}


/**
  ** get freatures for user package
**/
if (!function_exists('get_user_features_by_id')) {
	function get_user_features_by_id($id,$type_slug){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_user_features_by_id($id,$type_slug);        
		return $data['check'];
	}	
}



// get user info by slug
if (!function_exists('get_user_info_by_slug')) {

	    function get_user_info_by_slug($slug){        
	        $ci = get_instance();
	        $ci->load->model('common_m');
	        $data = $ci->common_m->get_user_info_by_slug($slug);        
	        return $data;
  		}	
	}

if (!function_exists('is_active')) 
{
    function is_active($id,$slug)
    {
        $ci =& get_instance();
        $ci->load->model('common_m');
       	$data = $ci->common_m->check_active_features($id,$slug);
       	return $data['check'] ;
        
    }
}

if (!function_exists('get_features_name')) 
{
    function get_features_name($slug)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->get_features_name($slug);
       	return $data ;
        
    }
}


if (!function_exists('check_layouts')) 
{
    function check_layouts($type,$value)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->check_layouts($type,$value);
       	return $data ;
        
    }
}

if (!function_exists('check_offline_payment')) 
{
    function check_offline_payment($id)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->get_payment_type_by_id($id);
       	return $data ;
        
    }
}

if (!function_exists('total_type')) 
{
    function total_type($type)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$data = $ci->admin_m->get_total_user_by_type($type);
       	return $data ;
        
    }
}


if (!function_exists('get_heading')) 
{
    function get_heading($id,$user_id,$type)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$feature = $ci->admin_m->get_features_name_id($id);
       	$data = $ci->admin_m->get_features_heading($id,$user_id);
       	if($type==1){
       		return isset($data) && !empty($data['heading'])?$data['heading']:$feature ;
       	}else{
       		return isset($data) && !empty($data['sub_heading'])?$data['sub_heading']:'' ;
       	}
       
        
    }
}

if (!function_exists('get_title')) 
{
    function get_title($user_id,$slug,$type)
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
       	$feature = $ci->admin_m->get_features_name($slug);
       	$data = $ci->admin_m->get_features_title($slug,$user_id);
       	if($type==1){
       		return isset($data) && !empty($data['heading'])?$data['heading']:$feature ;
       	}else{
       		return isset($data) && !empty($data['sub_heading'])?$data['sub_heading']:'' ;
       	}
       
        
    }
}

if (!function_exists('get_time')) 
{
    function get_time()
    {
        $ci = get_instance();
        $dt = new DateTime('now', new DateTimezone(time_zone()));
        return $date_time = $dt->format('G:i'); 
    }
}

if(!function_exists('get_time_ago')){
	    function get_time_ago($time_ago){        
	        $ci = get_instance();
	        
	        $dt = new DateTime('now', new DateTimezone(time_zone()));
	        $date_time = strtotime($dt->format('Y-m-d H:i:s')); 

	        $time_ago = strtotime($time_ago);
	        $cur_time   = $date_time;
	        $time_elapsed   = $cur_time - $time_ago;
	        $seconds    = $time_elapsed ;
	        $minutes    = round($time_elapsed / 60 );
	        $hours      = round($time_elapsed / 3600);
	        $days       = round($time_elapsed / 86400 );
	        $weeks      = round($time_elapsed / 604800);
	        $months     = round($time_elapsed / 2600640 );
	        $years      = round($time_elapsed / 31207680 );
	        // Seconds

	        //return $seconds;

	        if($seconds <= 60){
	            return "just now";
	        }
	        //Minutes
	        else if($minutes <=60){
	            if($minutes==1){
	                return lang('one_min_ago');
	            }
	            else{
	                return "$minutes ".lang('minutes_ago');
	            }
	        }
	        //Hours
	        else if($hours <=24){
	            if($hours==1){
	                return lang('an_hour_ago');
	            }else{
	                return "$hours ".lang('hrs_ago');
	            }
	        }
	        //Days
	        else if($days <= 7){
	            if($days==1){
	                return lang('yesterday');
	            }else{
	                return "$days ".lang('days_ago');
	            }
	        }
	        //Weeks
	        else if($weeks <= 4.3){
	            if($weeks==1){
	                return lang('a_week_ago');
	            }else{
	                return "$weeks ".lang('weeks_ago');
	            }
	        }
	        //Months
	        else if($months <=12){
	            if($months==1){
	                return lang('a_month_ago');
	            }else{
	                return "$months ".lang('months_ago');
	            }
	        }
	        //Years
	        else{
	            if($years==1){
	                return lang('one_year_ago');
	            }else{
	                return "$years ".lang('years_ago');
	            }
	        }


	        
	    }
	}



	if(!function_exists('time_ago')){
	    function time_ago($date_2,$date_1){        
	        $ci = get_instance();
	        
	        $date_time = strtotime($date_1); 

	        $time_ago = strtotime($date_2);
	        $cur_time   = $date_time;
	        $time_elapsed   = $cur_time - $time_ago;
	        $seconds    = $time_elapsed ;
	        $minutes    = round($time_elapsed / 60 );
	        $hours      = round($time_elapsed / 3600);
	        $days       = round($time_elapsed / 86400 );
	        $weeks      = round($time_elapsed / 604800);
	        $months     = round($time_elapsed / 2600640 );
	        $years      = round($time_elapsed / 31207680 );
	        // Seconds

	        //return $seconds;

	        if($seconds <= 60){
	            return "just now";
	        }
	        //Minutes
	        else if($minutes <=60){
	            if($minutes==1){
	                return lang('one_min_ago');
	            }
	            else{
	                return "$minutes ".lang('minutes_ago');
	            }
	        }
	        //Hours
	        else if($hours <=24){
	            if($hours==1){
	                return lang('	an_hour_ago');
	            }else{
	                return "$hours ".lang('hrs_ago');
	            }
	        }
	        //Days
	        else if($days <= 7){
	            if($days==1){
	                return lang('yesterday');
	            }else{
	                return "$days ".lang('days_ago');
	            }
	        }
	     
	        //Years
	        else{
	            return full_time($date_2);
	        }


	        
	    }
	}



if (!function_exists('delete_image_from_server')) {
    function delete_image_from_server($path)
    {
        $full_path = FCPATH . $path;
        if (strlen($path) > 15 && file_exists($full_path)) {
            unlink($full_path);
        }
    }
}


if (!function_exists('is_xs')) {
    function is_xs($id)
    {
    	$ci =& get_instance();
        $ci->load->model('admin_m');
       	$info = $ci->admin_m->get_user_info_by_id($id);
       	if($info['theme']==1 || $info['theme']==3){
       		return '1';
       	}else{
       		return 'xs-container';
       	}
     	
    }
}

if (!function_exists('veg_type')) {
    function veg_type($type)
    {
    	$ci =& get_instance();
       
       	if($type==1){
       		return !empty(lang('veg'))?lang('veg'):'Veg';
       	}elseif($type==2){
       		return !empty(lang('non_veg'))?lang('non_veg'):'Non veg';
       	}
     	
    }
}

if (!function_exists('get_payment_type')) {
    function get_payment_type($type)
    {
    	$ci =& get_instance();
       	if($type=='0'){
       		$payment = 'offline';
       	}elseif($type=='1'){
       		$payment = 'paypal';
       	}elseif($type=='2'){
       		$payment = 'stripe';
       	}elseif($type=='3'){
       		$payment = 'razorpay';
       	}else{
       		$payment = $type;
       	}
     	return $payment;
    }
}


if (!function_exists('order_type')) {
    function order_type($type)
    {
    	$ci =& get_instance();
    	$type_name = $ci->common_m->single_select_by_id($type,'order_types');
    	if($type==7):
    		return !empty(lang('restaurant_dine_in'))?lang('restaurant_dine_in'):"Restaurant Dine-in";
    	else:
	     	return !empty($type_name['name'])?$type_name['name']:'';
	     endif;
    }
}


if (!function_exists('get_indexing')) {
    function get_indexing($limit)
    {
    	$ci =& get_instance();
       	$item_array = [];
        for($i=0; $i<= $limit;$i++){
          $n = 2*$i;
          $j = 2*$n+3;
          $k = $j +1;
          array_push($item_array,$j,$k);
        }
     	return $item_array;
    }
}

if (!function_exists('get_embeded')) {
    function get_embeded($url)
    {
    	$ci =& get_instance();
	     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

	    if (preg_match($longUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }

	    if (preg_match($shortUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }
	    return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
}

if (!function_exists('get_youtube_id')) {
    function get_youtube_id($url)
    {
    	$ci =& get_instance();
	     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

	    if (preg_match($longUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }

	    if (preg_match($shortUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }
	    return  $youtube_id ;
    }
}

 //youtube thumbnail
    if (!function_exists('get_youtube_thumb')) 
    {
        function get_youtube_thumb($link)
        {
            $video_id = explode("?v=", $link);
            if (!isset($video_id[1])) {
                $video_id = explode("youtu.be/", $link);
            }
            $youtubeID = $video_id[1];
            if (empty($video_id[1])) $video_id = explode("/v/", $link);
            $video_id = explode("&", $video_id[1]);
            $youtubeVideoID = $video_id[0];

            $img_name= md5('youtube'.time());
            if ($youtubeVideoID) {
                return $thumbURL = 'https://img.youtube.com/vi/'.$youtubeVideoID.'/mqdefault.jpg';
            } else {
                return false;
            }
        }
    }


if (!function_exists('submit_btn')) {
    function submit_btn()
    {
    	$ci =& get_instance();
     	return '<button type="submit" class="btn btn-primary primary-light c_btn"> '.(!empty(lang('submit'))?lang('submit'):" ").' <i class="icofont-rounded-double-right"></i> </button>';
    }
}


if (!function_exists('order_limit')) {
    function order_limit($type='')
    {

    	$ci =& get_instance();
    	$array = array(
    		'0' =>lang('unlimited'),
    		'10' => 10,
    		'15' => 15,
    		'20' => 20,
    		'30' => 30,
    		'50' => 50,
    	);
       	if(is_numeric($type)):
       		return $array[$type];
 		else:
 			return $array;
 		endif;
    }
}


if (!function_exists('item_limit')) {
    function item_limit($type='all')
    {

    	$ci =& get_instance();
    	$array = array(
    		'0' =>lang('unlimited'),
    		'10' => 10,
    		'15' => 15,
    		'20' => 20,
    		'30' => 30,
    		'40' => 40,
    		'50' => 50,
    	);
       	if(is_numeric($type)):
       		return $array[$type];
 		else:
 			return $array;
 		endif;
    }
}


if (!function_exists('limit_text')) {
    function limit_text($type)
    {

    	$ci =& get_instance();
    	if($type==0){
    		return lang('unlimited');
    	}else{
    		return $type;
    	}
    	
    }
}






if (!function_exists('delivery_area')) {
	function delivery_area($id=0){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_delivery_area($id);        
		return $data;
	}	
}


if (!function_exists('shipping')) {
	function shipping($id,$shop_id){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->delivery_area_by_shop_id($id,$shop_id);        
		return $data;
	}	
}



if (!function_exists('limit')) {
	function limit($id,$type){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_user_limit($id,$type);        
		return $data;
	}	
}
if (!function_exists('is_access')) {
	function is_access($type){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->check_permission($type);        
		return $data;
	}	
}





if (!function_exists('is_feature')) {
	function is_feature($id,$type_slug){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_user_pricing_by_id($id,$type_slug);        
		return $data['check'];
	}	
}

if (!function_exists('trial_type')) {
	function trial_type(){        
		$ci = get_instance();
		return ['trial','weekly','fifteen'];
	}	
}

if (!function_exists('sms_settings')) {
	function sms_settings($id){        
		$ci = get_instance();
		$settings = u_settings($id);
		$info = json_decode($settings['twillo_sms_settings']);
		if(isset($info) && !empty($info)){
			return $info;
		}else{
			return [];
		}
	}	
}


if (!function_exists('create_msg')) {
	function create_msg($data,$msg){        
		$ci = get_instance();
		$find       = array_keys($data);
		$replace    = array_values($data);
		$new_msg = str_ireplace($find, $replace, $msg);
		if(!empty($new_msg)){
			return $new_msg;
		}else{
			return '';
		}
	}	
}


if (!function_exists('u_settings')) {
	function u_settings($id){        
		$ci = get_instance();
		$ci->load->model('common_m');
		$data = $ci->common_m->get_user_settings($id);        
		return !empty($data)?$data:[];
	}	
}


if (!function_exists('get_size')) {
	function get_size($slug,$id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_single_size_by_slug($slug,$id);        
		return $data;
	}	
}
if (!function_exists('extras')) {
	function extras($id,$item_id){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_extras_by_id($id,$item_id);      
		return !empty($data)?$data:'';
	}	
}



if (!function_exists('number')) {
	function number($num){        
		$ci = get_instance();
		return str_replace( ',', '', $num);     
	}	
}




if (!function_exists('size')) {
	function size($type,$user_id,$index){        
		$ci = get_instance();
		$ci->load->model('admin_m');
		$data = $ci->admin_m->get_size_by_type($type,$user_id);        
		return isset($data[$index]) && !empty($data[$index]) ?$data[$index]:'';
	}	
}
if (!function_exists('get_size_type')) {
    function get_size_type($type='all')
    {
    	$ci =& get_instance();
    	$array = ['pizza' => 'p_size_','burger'=>'b_size_','weight'=>'w_size','calories' =>'c_size','sizes'=>'s_size'];
       	if(is_numeric($type)):
       		return $array[$type];
 		else:
 			return $array;
 		endif;
    }
}


if (!function_exists('getTimeSlot')) {
	function  getTimeSlot($interval, $start_time, $end_time)
	{
		$ci =& get_instance();
		
		$start = new DateTime($start_time);
		$end = new DateTime($end_time);
		$startTime = $start->format('H:i');
		$endTime = $end->format('H:i');
		$i=0;
		$time = [];
		while(strtotime($startTime) <= strtotime($endTime)){
			$start = $startTime;
			$end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
			$startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
			$i++;
			if(strtotime($startTime) <= strtotime($endTime)){
				$time[$i]['slot_start_time'] = $start;
				$time[$i]['slot_end_time'] = $end;
			}
		}
		return $time;
		
	}
}

if (!function_exists('my_currency')) 
{
    function my_currency($id,$type='')
    {
        $ci =& get_instance();
        $ci->load->model('admin_m');
        $info = $ci->admin_m->single_select_by_id($id,'country');
        if(isset($info) && !empty($info)):
       		$data = $info;
       	else:
       		$data = array(
       			'currency_code'=>'USD',
       			'currency_symbol'=>'&#36;',
       		);
       endif;
       	return isset($data[$type])?$data[$type]:0 ;
        
    }
}


if (!function_exists('isBetween')) 
{
    function isBetween($from, $till, $input) {
    	$ci =& get_instance();
    	$f = DateTime::createFromFormat('!H:i', $from);
    	$t = DateTime::createFromFormat('!H:i', $till);
    	$i = DateTime::createFromFormat('!H:i', $input);
    	if ($f > $t) $t->modify('+1 day');
    	return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
    }
}



if (!function_exists('get_img')) 
{
    function get_img($img='',$img_url='',$img_type='')
    {
        $ci =& get_instance();
       if($img_type==1): 
       	return base_url(!empty($img)?$img:EMPTY_IMG);
       elseif($img_type==2): 
       	return !empty($img_url)?$img_url:base_url(EMPTY_IMG);
       endif; 
        
    }
}


if (!function_exists('get_percent')) 
{
    function get_percent($amount,$percent)
    {
        $ci =& get_instance();
        if($amount==0 || $amount=="0"){
        	return 0;
        }else{
        	return ($amount*$percent)/100;
        }
       	
        
    }
}


if (!function_exists('grand_total')) 
{
    function grand_total($amount=0,$shipping=0,$discount=0,$tax=0,$coupon_percent=0,$tips=0,$order_type)
    {

        $ci =& get_instance();
        $tax = ($amount*$tax)/100;
        $discount = ($amount*$discount)/100;
        $coupon_percent = ($amount*$coupon_percent)/100;
        $tips = $tips;
        if($order_type==1 || $order_type==5){
        	return ($amount+$shipping+$tax+$tips)-($discount+$coupon_percent);
        }else{
        	return ($amount+$tax+$tips)-($discount+$coupon_percent);
        }  
    }
}



if (!function_exists('getCoordinatesAttribute')) {
	function getCoordinatesAttribute($url){        
		$ci = get_instance();
		$search = 'maps.google.com';
		if(preg_match("/{$search}/i", $url)):
			$url_coordinates_position = strpos($url, '@')+1;
	        $coordinates = [];

	        if ($url_coordinates_position != false) {
	            $coordinates_string = substr($url, $url_coordinates_position);
	            $coordinates_array = explode(',', $coordinates_string);

	            if (count($coordinates_array) >= 2) {
	                $longitude = $coordinates_array[0];
	                $latitude = $coordinates_array[1];

	                $coordinates = [
	                    "longitude" => $longitude,
	                    "latitude" => $latitude
	                ];
	            }

	            return $coordinates;
	        };
		else:
			$address = str_replace(" ", "+", $url);
			$json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyBclgZa-KOntWPEehsBJfkhKrUQpQZxkbU");
			$json = json_decode($json);
			$coordinates = [
				"longitude" => $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'},
				"latitude" => $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}
			];
			
		endif;

        return $coordinates;
	}	
}

	if (!function_exists('bg_loader')) {

		function bg_loader(){        
			$ci = get_instance();
			 return 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		}	
	}

	if (!function_exists('img_loader')) {

		function img_loader(){        
			$ci = get_instance();
			return base_url('assets/frontend/images/background.gif');
			// return 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		}	
	}


	if (!function_exists('get_words')) {

		function get_words($sentence, $count = 5) {
			$ci = get_instance();
			preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
			return $matches[0];
		}
	}

	if (!function_exists('currency_position')) {

		function currency_position($amount, $id) {
			$ci = get_instance();
			$shop = shop($id);
			$dir = $shop->currency_position;
			if($dir==1){
				return number_formats($amount,$shop->number_formats).'&nbsp;'.$shop->icon;
			}else{
				return $shop->icon.'&nbsp;'.number_formats($amount,$shop->number_formats);
			}
		}
	}





	if (!function_exists('wh_currency_position')) {

		function wh_currency_position($amount, $id) {
			$ci = get_instance();
			$shop = shop($id);
			$dir = $shop->currency_position;
			if($dir==1){
				return number_formats($amount,$shop->number_formats).' '.$shop->icon;
			}else{
				return $shop->icon.' '.number_formats($amount,$shop->number_formats);
			}
		}
	}

	if (!function_exists('number_formats')) {
		function number_formats($amount,$number_formats) {
			$ci = get_instance();
			$type =$number_formats;
			if($type==0){
				return round($amount);
			}elseif($type==1){
				return number_format((float)$amount, 2, '.', '');
			}else{
				$num = number_format((float)number($amount), 0, '.', '');
				$num = number_format((float)number($amount), 2);
				return $num;
			}
		}
	}

	if(!function_exists('get_icon')){
		function get_icon($icon){  
			if(!empty($icon)):
				$icon = explode('"', $icon);
				return $icon = $icon[1];
			else:
				return $icon = '';
			endif;
		}
	}

	if (!function_exists('active')) {

		function active($type) {
			$ci = get_instance();
			$data = [];
			$settings = settings();
			if(isset($settings[$type]) && $settings[$type]==1){
				return 1;
			}else{
				return 0;
			}
		}
	}


	if (!function_exists('shop_active')) {

		function shop_active($type) {
			$ci = get_instance();
			$data = [];
			$settings = $ci->admin_m->my_vendor_info();
			if(isset($settings[$type]) && $settings[$type]==1){
				return 1;
			}else{
				return 0;
			}
		}
	}


	if (!function_exists('payment_methods')) {

		function payment_methods() {
			$ci = get_instance();
			$data = $ci->common_m->select_with_status('payment_method_list');
			if(overlay==1):
				return $data;
			else:
				return [];
			endif;
			
		}
	}

	if (!function_exists('payment_method_list')) {

		function payment_method_list() {
			$ci = get_instance();
			$data = $ci->common_m->select_with_status('payment_method_list');
			return $data;
			
		}
	}

	if (!function_exists('get_domain')) {

		function get_domain($siteUrl) {
			$ci = get_instance();
			$siteUrl = preg_replace('#(^https?:\/\/(w{3}\.)?)|(\/$)#', '', $siteUrl);
			$siteUrl = str_replace('www.','',$siteUrl);
			$siteUrl = str_replace('/.','',$siteUrl);
			return $siteUrl.'/';
		}
	}


	if(!function_exists('resize_img')){
		function resize_img($fullname, $width, $height){         
			
			$dir = 'uploads/pwa/';
			$url = base_url() . 'uploads/pwa/';
        // Get the CodeIgniter super object
			$CI = &get_instance();
        // get src file's extension and file name
			$extension = pathinfo($fullname, PATHINFO_EXTENSION);
			$filename = pathinfo($fullname, PATHINFO_FILENAME);
			$image_org = $dir . $filename . "." . $extension;
			$image_thumb = $dir . $filename . "-" . $height . '_' . $width . "." . $extension;
			$image_returned = $url . $filename . "-" . $height . '_' . $width . "." . $extension;

			if (!file_exists($image_thumb)) {
            // LOAD LIBRARY
				$CI->load->library('image_lib');
            // CONFIGURE IMAGE LIBRARY
				$config['source_image'] = $image_org;
				$config['new_image'] = $image_thumb;
				$config['width'] = $width;
				$config['height'] = $height;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$CI->image_lib->initialize($config);
				$CI->image_lib->resize();
				$CI->image_lib->clear();
			}
			return $image_returned;
		}
	}
	