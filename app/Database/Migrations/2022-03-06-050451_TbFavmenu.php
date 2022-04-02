<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbFavmenu extends Migration
{
    public function up()
    {
            $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_menu'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'id_pembeli'      => [
                'type'           => 'INT',
                'constraint'     => 11 
            ],
            'rate'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'created_at' => [
                'type'           => 'datetime'
                
            ],
            'updated_at' => [
                'type'           => 'datetime'
            ]
        ]);

            // Membuat primary key
            $this->forge->addKey('id', TRUE);
            // $this->forge->addForeignKey('id_pembeli', 'tb_profile', 'id');
            //  $this->forge->addForeignKey('id_petugas', 'tb_login', 'id');
            $this->forge->addKey('id_pembeli');
            $this->forge->addKey('id_menu');
            // Membuat tabel news
            $this->forge->createTable('tb_favmenu', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_favMenu');
    }
}
