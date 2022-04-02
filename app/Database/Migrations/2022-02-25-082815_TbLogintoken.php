<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLogintoken extends Migration
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
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
               
            ],
            'token' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'type' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'time' => [
                'type'           => 'INT',
                'constraint'     => 11
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
            $this->forge->createTable('tb_logintoken', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_logintoken');
    }
}
