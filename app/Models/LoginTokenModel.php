<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginTokenModel extends Model
{
    protected $table      = 'tb_loginToken';
    protected $primaryKey = 'id';

    protected $allowedFields = ['email', 'token','time','type'];
 
  
   
  
     public function getUserByEmailAndTypeAndToken($email,$token,$type){
      return $this->where(['email'=>$email,'token'=>$token,'type'=>$type])->first();
    }
    public function deleteByEmailAndTypeAndToken($email,$token,$type){
     return $this->where(['email'=>$email,'token'=>$token,'type'=>$type])->delete();
    }
    public function getUserByEmailAndType($email,$type){
        return $this->where(['email'=>$email,'type'=>$type])->first();
    }
    public function deleteByEmail($email){
     return $this->where(['email'=>$email])->delete();
    }
    
}