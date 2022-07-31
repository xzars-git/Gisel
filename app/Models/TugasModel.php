<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class TugasModel extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';
    protected $allowedFields = ['nama_tugas','hari_ke','kategori', 'jenis_tugas'];
    
    public function getResult($in)
    {
        return $this->db->query($in)->getResultArray();
    }
}