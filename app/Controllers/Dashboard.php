<?php namespace App\Controllers;

use App\Models\TugasModel;
use Config\Services;

class Dashboard extends BaseController {
    
    public function index() {
        $this->session = Services::session();
        if (!$this->session->has('loggedIn')) {
            return redirect()->to(base_url('account/login'));
        }

        $mData['menu'] = "Dashboard";
        echo view('templates/header', $mData);
		
		if($_SESSION['role']=="mentee") {
		    echo view('dashboard_mentee');
		} else if($_SESSION['role']=="mentor") {
		    $id_sektor = $_SESSION['idSektor'];
		    $sql = "SELECT mahasiswa.nim, mahasiswa.nama_lengkap, MAX(jawaban.created_at) as lastDate,
COUNT(jawaban.id_user) totalCoba,
SUM(CASE WHEN jawaban.kategori = 'sektor' THEN 1 ELSE 0 END) cekS,
SUM(CASE WHEN jawaban.kategori = 'tugas1' THEN 1 ELSE 0 END) cekT1,
SUM(CASE WHEN jawaban.kategori = 'tugas2' THEN 1 ELSE 0 END) cekT2,
SUM(CASE WHEN jawaban.kategori = 'sektor' AND jawaban.status = 'error' THEN 1 ELSE 0 END) sError,
SUM(CASE WHEN jawaban.kategori = 'sektor' AND jawaban.status = 'sukses' THEN 1 ELSE 0 END) sSuccess,
SUM(CASE WHEN jawaban.kategori = 'sektor' AND jawaban.status = 'salah' THEN 1 ELSE 0 END) sWrong,
SUM(CASE WHEN jawaban.kategori = 'tugas1' AND jawaban.status = 'error' THEN 1 ELSE 0 END) t1Error,
SUM(CASE WHEN jawaban.kategori = 'tugas1' AND jawaban.status = 'sukses' THEN 1 ELSE 0 END) t1Success,
SUM(CASE WHEN jawaban.kategori = 'tugas1' AND jawaban.status = 'salah' THEN 1 ELSE 0 END) t1Wrong,
SUM(CASE WHEN jawaban.kategori = 'tugas2' AND jawaban.status = 'error' THEN 1 ELSE 0 END) t2Error,
SUM(CASE WHEN jawaban.kategori = 'tugas2' AND jawaban.status = 'sukses' THEN 1 ELSE 0 END) t2Success,
SUM(CASE WHEN jawaban.kategori = 'tugas2' AND jawaban.status = 'salah' THEN 1 ELSE 0 END) t2Wrong
FROM jawaban
RIGHT JOIN mahasiswa on jawaban.id_user = mahasiswa.id_mhs
WHERE mahasiswa.id_sektor = $id_sektor AND mahasiswa.role = 'mentee' GROUP BY mahasiswa.nim ORDER BY MAX(jawaban.created_at)";
		    
		    $model = new TugasModel();
		    $data['result'] = $model->getResult($sql);
		    
		    echo view('dashboard_mentor', $data);
		} else if($_SESSION['role']=="acara") {
		    $sql = "select * from tugas where status = 'aktif'";
		    
		    $model = new TugasModel();
		    $data['tugas'] = $model->getResult($sql);
		    
		    echo view('dashboard_acara', $data);
		} else if($_SESSION['role']=="ketua") {
            $sql = "SELECT mahasiswa.nim, mahasiswa.nama_lengkap, MAX(jawaban.created_at) as lastDate,
COUNT(jawaban.id_user) totalCoba,
SUM(CASE WHEN jawaban.kategori = 'sektor' THEN 1 ELSE 0 END) cekS,
SUM(CASE WHEN jawaban.kategori = 'tugas1' THEN 1 ELSE 0 END) cekT1,
SUM(CASE WHEN jawaban.kategori = 'tugas2' THEN 1 ELSE 0 END) cekT2,
SUM(CASE WHEN jawaban.kategori = 'sektor' AND jawaban.status = 'error' THEN 1 ELSE 0 END) sError,
SUM(CASE WHEN jawaban.kategori = 'sektor' AND jawaban.status = 'sukses' THEN 1 ELSE 0 END) sSuccess,
SUM(CASE WHEN jawaban.kategori = 'sektor' AND jawaban.status = 'salah' THEN 1 ELSE 0 END) sWrong,
SUM(CASE WHEN jawaban.kategori = 'tugas1' AND jawaban.status = 'error' THEN 1 ELSE 0 END) t1Error,
SUM(CASE WHEN jawaban.kategori = 'tugas1' AND jawaban.status = 'sukses' THEN 1 ELSE 0 END) t1Success,
SUM(CASE WHEN jawaban.kategori = 'tugas1' AND jawaban.status = 'salah' THEN 1 ELSE 0 END) t1Wrong,
SUM(CASE WHEN jawaban.kategori = 'tugas2' AND jawaban.status = 'error' THEN 1 ELSE 0 END) t2Error,
SUM(CASE WHEN jawaban.kategori = 'tugas2' AND jawaban.status = 'sukses' THEN 1 ELSE 0 END) t2Success,
SUM(CASE WHEN jawaban.kategori = 'tugas2' AND jawaban.status = 'salah' THEN 1 ELSE 0 END) t2Wrong
FROM jawaban
RIGHT JOIN mahasiswa on jawaban.id_user = mahasiswa.id_mhs
WHERE mahasiswa.id_sektor != '1111' AND mahasiswa.role = 'mentee' GROUP BY mahasiswa.nim ORDER BY MAX(jawaban.created_at)";
		    
		    $model = new TugasModel();
		    $data['result'] = $model->getResult($sql);
		    
		    echo view('dashboard_mentor', $data);
		}
		echo view('templates/footer');
        echo view('templates/close');
	}
    
}