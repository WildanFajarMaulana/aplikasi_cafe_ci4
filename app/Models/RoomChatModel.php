<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomChatModel extends Model
{
    protected $table      = 'tb_roomchat';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_pembeli','id_tranksaksi'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRoomByIdPembeliIdTranksaksi($id_pembeli,$id_tranksaksi){
        return $this->where(['id_pembeli'=>$id_pembeli,'id_tranksaksi'=>$id_tranksaksi])->first();
    }
   

 }