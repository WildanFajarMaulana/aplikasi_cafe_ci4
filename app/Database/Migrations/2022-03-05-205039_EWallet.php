<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EWallet extends Migration
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
            'nama_wallet'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'saldo'       => [
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
            $this->forge->createTable('e_wallet', TRUE);
        }


    

    public function down()
    {
         // menghapus tabel news
        $this->forge->dropTable('e_wallet');
    }
}
