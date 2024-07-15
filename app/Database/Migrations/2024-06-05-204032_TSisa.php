<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TSisa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sisa' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_item' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'no_rfq_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_wo_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_cust_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_sdf_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'lot_del_sisa' => [
                'type' => 'INT',
                'null' => true,
            ],
            'qty_sisa' => [
                'type' => 'INT',
                'null' => true,
            ],
            'code_qr_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'locations_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'sub_locations_sisa' => [
                'type' => 'INT',
                'null' => true,
            ],
            'rack_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'warehouse_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_tag_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_item_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'desc_pn_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'bpid_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
            ]);

        // Membuat primary key
        $this->forge->addKey('id_sisa', true);

        // Tambahkan foreign key pada id_item
        $this->forge->addForeignKey('id_item', 'TItems', 'id_item', 'FK_id_item_TSisa_TItems');

        // Membuat tabel users
        $this->forge->createTable('TSisa', true);
    }

    public function down()
    {
        $this->forge->dropTable('TSisa', true);
    }
}
