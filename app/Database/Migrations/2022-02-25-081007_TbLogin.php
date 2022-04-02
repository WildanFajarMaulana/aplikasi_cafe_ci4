<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLogin extends Migration
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
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
               
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'role' => [
                'type'           => 'VARCHAR',
                'constraint'     => '30'
            ],
            'is_active' => [
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
            $this->forge->createTable('tb_login', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_login');
    }
}
