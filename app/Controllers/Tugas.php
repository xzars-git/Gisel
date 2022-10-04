<?php namespace App\Controllers;

use App\Models\TugasModel;
use App\Models\JawabanModel;
use Config\Services;
use Exception;

class Tugas extends BaseController {
    
    public function index() {
        $session = Services::session();
        $request = Services::request();
        
        if (!$session->has('loggedIn')) {
            return redirect()->to(base_url('account/login'));
        }
        
        $model = new TugasModel();
        
        $data['message'] = "";
        $data['error'] = "";
        $data['success'] = "";
        $data['tugas'] = array();
        
        if ($request->getMethod()=="post"){
            $sql = $this->request->getPost('sql');
            if (stristr($sql, 'drop') !== false || stristr($sql, 'delete') !== false || stristr($sql, 'insert') !== false || stristr($sql, 'update') !== false) {
                $data['message'] = "Jangan iseng!!";
            } else if (stristr($sql, 'sektor') !== false) {
                $data['message'] = "Pastikan anda melakukan query pada menu yang tepat!!";
            } else if(stristr($sql, 'select') !== false) {
                try {
                    $data['success'] = "Berhasil melakukan query.";
                    foreach($model->getResult($sql) as $key => $value) {
                        $data['tugas'][$key][0] = $key+1;
                        $data['tugas'][$key][1] = $value['nama_tugas'];
                        $data['tugas'][$key][2] = $value['ketentuan'];
                    }
                    
                    $session->setFlashdata('msg', '<div class="alert alert-success">
                        <div class="container">
                        <div class="alert-icon">
                            <i class="material-icons">check</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Sukses:</b> Yuhuuu! Berhasil melakukan query.
                        </div>
                    </div>');
                } catch (Exception $e) {
                    $data['tugas'] = array();
                    $data['error'] = $e->getMessage();
                    $session->setFlashdata('msg', '<div class="alert alert-danger">
                        <div class="container">
                        <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Error:</b> Aaawwww! '.$e->getMessage().'
                        </div>
                    </div>');
                }
            } else {
                $data['message'] = "Tidak terdapat script query!!";
            }
            
            $hasil = "";
            $status = "";
            if ($data['message']!="") {
                $hasil = $data['message'];
                $status = "salah";
                
                $session->setFlashdata('msg', '<div class="alert alert-warning">
                    <div class="container">
                    <div class="alert-icon">
                        <i class="material-icons">warning</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    <b>Warning:</b> Upsss! '.$data['message'].'
                    </div>
                </div>');
                
            } else if ($data['error']!="") {
                $hasil = $data['error'];
                $status = "error";
            } else if ($data['tugas']!=""){
                foreach ($data['tugas'] as $value) {
                    $hasil = $hasil . implode(",", $value) ." 
";
                }
                $status = "sukses";
            }
            $this->createJawaban($sql, $hasil, $status);
        }
        
        $model = new JawabanModel();
        $data['progress'] = $model->getProgress($_SESSION['idMhs'], 'tugas2');
        $mData['menu'] = "Tugas";
        echo view('templates/header', $mData);
		echo view('tugas', $data);
		echo view('templates/footer');
        echo view('templates/close');
	}
	
	function createJawaban($sql, $hasil, $status){
        $id = $_SESSION['idMhs'];
        $hasil = str_replace ("'","''", $hasil);
        $sql = str_replace ("'","\"", $sql);
        
        $data = [
            'id_user' => $id,
            'jawaban' => $sql,
            'hasil' => $hasil,
            'status' => $status,
            'kategori' => 'tugas2',
        ];
        
        $model = new JawabanModel();
        try {
            $model->insert($data);
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
}