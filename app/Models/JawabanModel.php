<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class JawabanModel extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    protected $allowedFields = ['id_user','jawaban','hasil', 'status', 'kategori'];
    protected $createdField   = 'created_at';
    
    public function getProgress($in, $type) {
        $query = "select count(*) total,
            sum(case when status = 'error' then 1 else 0 end) ErrorCount,
            sum(case when status = 'sukses' then 1 else 0 end) SuccessCount,
            sum(case when status = 'salah' then 1 else 0 end) WrongCount
        from jawaban where id_user = '$in' and kategori = '$type';";
        return $this->db->query($query)->getRowArray();
    }
}