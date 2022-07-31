<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AccountModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $allowedFields = ['nim','nama_lengkap','password', 'id_sektor', 'role'];
    protected $createdField   = 'created_at';
}