<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMenu extends Migration
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
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'gambar'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'harga'      => [
                'type'           => 'INT',
                'constraint'     => 11,
               
            ],
            'kategori' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
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
            

            // Membuat tabel news
            $this->forge->createTable('tb_menu', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_menu');
    }
}
