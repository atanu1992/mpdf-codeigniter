<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function getPostData($data=array()) {
	$ci =& get_instance();
	$ci->load->helper('security');
	// echo "<pre>"; print_r($ci);die;
	// echo "<pre>"; print_r($ci->security);die;
	if(!empty($data)) { 
		$dataArr = array();
		foreach ($data as $key => $value) {
				$raw_value = htmlspecialchars($value);
				$dataArr['non_xss'][$key]=$raw_value;
		}
		$finalArr['xss_clean'] = $ci->security->xss_clean($dataArr['non_xss']);
		return $finalArr['xss_clean'];
	}
}

?>