<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TugasModel;
use Config\Services;

class Penugasan extends BaseController {
    
    public function index() {
        $this->session = Services::session();
        if (!$this->session->has('loggedIn')) {
            return redirect()->to(base_url('account/login'));
        }

        $mData['menu'] = "Penugasan";
        echo view('templates/header', $mData);
		
		$sql = "select * from tugas";
		    
		$model = new TugasModel();
		$data['tugas'] = $model->getResult($sql);
		    
		echo view('dashboard_acara', $data);
		echo view('templates/footer');
        echo view('templates/close');
	}
    
}