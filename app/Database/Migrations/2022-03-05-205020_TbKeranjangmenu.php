<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbKeranjangmenu extends Migration
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
            'id_pembeli'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'nama_menu'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '40',  
            ],
            'gambar_menu'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '200',  
            ],
            'jumlah'      => [
                'type'           => 'INT',
                'constraint'     => 11,
               
            ],
            'harga'      => [
                'type'           => 'INT',
                'constraint'     => 11,
               
            ],
            'total_harga'      => [
                'type'           => 'INT',
                'constraint'     => 11,  
            ],
            'status'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',  
            ],
            'created_at' => [
                'type'           => 'datetime',
                
            ],
            'updated_at' => [
                'type'           => 'datetime'
            ]
        ]);

            // Membuat primary key
            $this->forge->addKey('id', TRUE);
            // $this->forge->addForeignKey('id_menu', 'tb_menu', 'id');
            // $this->forge->addForeignKey('id_pembeli', 'tb_profile', 'id');
            $this->forge->addKey('id_menu');
            $this->forge->addKey('id_pembeli');
            // Membuat tabel news
            $this->forge->createTable('tb_keranjangmenu', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_keranjangmenu');
    }
}
