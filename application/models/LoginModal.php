<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModal extends CI_Model {

	public function checkLogin($data=array())
	{
		$resultArr = array();
		$sql = $this->db->get_where('userdetails',array('email'=>$data['email']));
		$res = $sql->result_array();
		if(!empty($res)) {
			if($res[0]['password'] == $data['password']){
				$data = array('success'=>'true', 'data'=>$res[0]);
				array_push($resultArr,$data);
			}else{
				$fail = array('data'=>'Password mismatch','success'=>'false');
				array_push($resultArr,$fail);
			}
		} else {
				$fail = array('data'=>'Account not found','success'=>'false');
				array_push($resultArr,$fail);
		}

		if(!empty($resultArr)){
			return $resultArr[0];
		}else {
			$fail = array('data'=>'Something went wrong','success'=>'false');
			array_push($resultArr,$fail);
			return $resultArr;
		}

	}

}

/* End of file LoginModal.php */
/* Location: ./application/models/LoginModal.php */

?>