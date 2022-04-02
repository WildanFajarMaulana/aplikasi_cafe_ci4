<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbRiwayatsaldo extends Migration
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
            'id_pembeli'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'id_petugas'      => [
                'type'           => 'INT',
                'constraint'     => 11,  
            ],
            'deskripsi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'saldo'      => [
                'type'           => 'INT',
                'constraint'     => 11,
               
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
            // $this->forge->addForeignKey('id_pembeli', 'tb_profile', 'id');
            //  $this->forge->addForeignKey('id_petugas', 'tb_login', 'id');
            $this->forge->addKey('id_pembeli');
            $this->forge->addKey('id_petugas');
            // Membuat tabel news
            $this->forge->createTable('tb_riwayatsaldo', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_riwayatsaldo');
    }
}
