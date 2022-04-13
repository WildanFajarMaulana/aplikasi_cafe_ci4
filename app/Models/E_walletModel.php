<?php

namespace App\Models;

use CodeIgniter\Model;

class E_walletModel extends Model
{
    protected $table      = 'e_wallet';
    protected $primaryKey = 'id';

    protected $allowedFields = ['saldo','nama_wallet'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getWalletByNamaWallet($nama_wallet){
        return $this->where(['nama_wallet'=>$nama_wallet])->first();
    }
    public function updateSaldoWallet($data,$nama_wallet){
       
        return $this->update($nama_wallet,$data);
    }
    public function deleteWallet($nama_wallet){
        $sql="DELETE FROM e_wallet WHERE nama_wallet='$nama_wallet'";
         return $this->query($sql);
    }

 }