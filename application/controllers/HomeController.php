<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		include_once APPPATH.'third_party/mpdf/vendor/autoload.php';
	}

	public function index()
	{
		// first check application/third_party/mpdf
		// other plugins like pdf, excel, csv generator code will treated as third party so we keep it in third party
		// then in constructor we have include path of the third party i.e. mpdf
		// then in index method we have call another method dynamicHTML where we create 
		// dynamicHTML base on data.
		$data = array('name'=>'atanu');
		$this->dynamicHTML($data);
	}

	public function dynamicHTML($data) {
		$mpdf = new \Mpdf\Mpdf();
		$html = '';
		$html .= '<!DOCTYPE html>
				 <html>
				 <body>';
		foreach ($data as $key => $value) {
			$html .= '<p>'.$value.'</p>';
		}

		$html .= '</body>
		</html>';

		$mpdf->WriteHTML($html);
	    $mpdf->Output(); // to show pdf in screen
	    // $mpdf->Output('name_of_file.pdf','D'); // for automatically download pdf
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */

?>