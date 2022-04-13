<?php

namespace App\Models;

use CodeIgniter\Model;

class FavMenuModel extends Model
{
    protected $table      = 'tb_favmenu';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_menu', 'id_pembeli','rate'];
 
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   
    // public function tambahDataToken($data){
    //     $this->table('tb_login_token')->insert($data);
    // }
    public function getFavMenu($id_pembeli,$id_menu){
      return $this->where(['id_pembeli'=>$id_pembeli,'id_menu'=>$id_menu])->find();
    }
    public function deleteFavMenu($id_pembeli,$id_menu){
        return $this->where(['id_pembeli'=>$id_pembeli,'id_menu'=>$id_menu])->delete();
    }
    public function deleteByIdmenu($id_menu){
      $sql="DELETE FROM tb_favmenu WHERE id_menu='$id_menu' ";
        
      return $this->query($sql);
  }
    
    public function getMenu(){
        $db = \Config\Database::connect();
        $query = "SELECT tb_favmenu.id_menu,tb_menu.id,tb_menu.nama,tb_menu.gambar,tb_menu.harga, SUM(tb_favmenu.rate) AS rate
                    FROM tb_favmenu LEFT JOIN tb_menu
                    ON tb_favmenu.id_menu=tb_menu.id
                    GROUP BY tb_favmenu.id_menu ORDER BY rate DESC LIMIT 6";
        $query = $db->query($query);

        if($query){
          $data = $query->getResultArray();
        }
        else $data = 0;

        return $data;
        // return $this->select('tb_favmenu.id_menu','tb_menu.nama','tb_menu.gambar','tb_menu.harga')->selectSum('rate')->join('tb_favmenu','tb_favmenu.id_menu=tb_menu.id')->groupBy('tb_favmenu.id_menu')->paginate(5);
     // return $this->join('tb_menu','tb_menu.id=tb_favmenu.id_menu')->select('id_menu','nama','gambar','harga')->selectSum('rate')->groupBy('id_menu')->paginate(5);
    }
    
}