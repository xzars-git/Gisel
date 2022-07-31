<?php namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use Config\Services;
use App\Models\AccountModel;

class Account extends BaseController {
    
    public function login() {
        $this->session = Services::session();
        if ($this->session->has('loggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }
        
        return view('login');
	}
	
	// login
    public function check(): RedirectResponse
    {
        $check = [
            'nim' => $this->request->getPost('nim'),
            'password' => $this->request->getPost('password')
        ];

        $validation =  Services::validation();
        $session = Services::session();
		if(!$validation->run($check, 'login')){
            $session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('account/login'));
		} else {
            $model = new AccountModel();
            $data = $model->getWhere(['nim' => $check['nim']])->getRow();

            if($data){
                if ($check['password'] == $data->password) {
                    $sesi = array(
                        'username' => $data->nama_lengkap,
                        'idMhs' => $data->id_mhs,
                        'role' => $data->role,
                        'idSektor' => $data->id_sektor,
                        'loggedIn' => true
                    );
                    $session->set($sesi);
                    return redirect()->to(base_url('dashboard'));
                } else {
                    $session->setFlashdata('errors', array('msg' => 'Wrong password!'));
                    return redirect()->to(base_url('account/login'));
                }
            } else {
                $session->setFlashdata('errors', array('msg' => 'No Data Found with NIM: '.$check['nim']));
                return redirect()->to(base_url('account/login'));
            }
        }
    }

    public function logout(): RedirectResponse
    {
        $session = Services::session();
        if ($session->has('loggedIn')) {
            $data = ['username', 'loggedIn'];
            $session->remove($data);
        }
        return redirect()->to(base_url('account/login'));
	}
    
}