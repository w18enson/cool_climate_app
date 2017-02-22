<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class climate extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model("climate_model");
	}

	public function index()
	{	

		// Prepare data
		$data['city_list'] = array('Jakarta','London','Tokyo');
		$cnt = '5';
		$default_city = 'Jakarta';

		// Ambil data dari uri ketiga setelah base url
		$this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$data['city'] = $this->uri->segment(3);	
		if ($data['city'] == NULL) $data['city'] = $default_city;
		
		
		// Generate data dari api dan simpan ke variabel
		$get_url = file_get_contents('http://api.openweathermap.org/data/2.5/forecast/daily?q=' . strtolower($data['city']) . '&mode=json&units=metric&cnt=' . $cnt . '&APPID=481e3bc28e5264e5607c2b65b449bfc1');

		if($get_url) {
			// Link give result
			$data['climate_data'] = $this->climate_model->convert_array($get_url);
		} else {
			// Link give no result
			$data['climate_data'] = null;
		}

		// Load the scenery !
		$this->load->view('climate_view',$data);
	}
}
