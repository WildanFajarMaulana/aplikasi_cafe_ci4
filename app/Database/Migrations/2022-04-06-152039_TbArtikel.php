<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbArtikel extends Migration
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
            'lokasi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
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
         
            // Membuat tabel news
            $this->forge->createTable('tb_artikel', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_artikel');
    }
}