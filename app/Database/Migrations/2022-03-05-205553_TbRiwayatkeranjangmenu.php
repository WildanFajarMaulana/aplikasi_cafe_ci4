<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbRiwayatkeranjangmenu extends Migration
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
            'id_tranksaksi'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'nama_menu'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
               
            ],
            'jumlah_menu'      => [
                'type'           => 'INT',
                'constraint'     => 11,
               
            ],
            'total_harga'      => [
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
            // $this->forge->addForeignKey('id_tranksaksi', 'tb_tranksaksi', 'id');
            $this->forge->addKey('id_pembeli');
            $this->forge->addKey('id_tranksaksi');
            // Membuat tabel news
            $this->forge->createTable('tb_riwayatkeranjangmenu', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('tb_riwayatkeranjangmenu');
    }
}
