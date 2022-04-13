<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'tb_login';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'email','password','role','is_active'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    public function tambahDataToken($data){
        $this->table('tb_login_token')->insert($data);
    }
    public function getUser($email){
      $where = "username='$email' or email='$email'";
      return $this->where($where)->first();
    }
    public function getDataLogin($id){
       return $this->where(['id'=>$id])->first();
    }
    public function getDataNoAdmin(){
      $where = "role!='admin'";
      return $this->where($where)->paginate(5,'userlogin');
    }
    
}