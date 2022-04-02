<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'tb_profile';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_login','nama','email','nomor','foto','alamat','saldo','pin','cekPin','pinTranksaksi','cekMail','pinKirimSaldo'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  
  public function getProfileByIdLogin($id_login){
     return $this->where(['id_login'=>$id_login])->first();
  } 
  public function getProfileByEmailLogin($email){
     return $this->where(['email'=>$email])->first();
  } 
  public function getProfileByEmail($email){
    return $this->where(['email'=>$email])->first(); 
  }
  public function getProfileByIdPembeli($id_pembeli){
    return $this->where(['id'=>$id_pembeli])->first(); 
  }
   public function updatePinProfile($id,$pin){
    return $this->set(['pin'=>$pin])->where(['id'=>$id])->update();
  }
  public function getUserByNomor($nomor){
     return $this->where(['nomor'=>$nomor])->first();
  } 
  
 }