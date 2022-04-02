<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProfile extends Migration
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
            'id_login'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'nama'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
               
            ],
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
               
            ],
            'nomor'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
               
            ],
            'foto' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'alamat' => [
                'type'           => 'VARCHAR',
                'constraint'     => '30'
            ],
            'saldo' => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'pin' => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'cekPin' => [
                'type'           => 'boolean',
                'constraint'     => 2
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
            // $this->forge->addForeignKey('id_login', 'tb_login', 'id');
            $this->forge->addKey('id_login');

            // Membuat tabel news
            $this->forge->createTable('tb_profile', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_profile');
    }
}
