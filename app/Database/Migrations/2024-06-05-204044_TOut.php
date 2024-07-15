<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TOut extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_out' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_sisa' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'id_item' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'no_rfq_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_wo_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_cust_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_sdf_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'lot_del_out' => [
                'type' => 'INT',
                'null' => true,
            ],
            'qty_out' => [
                'type' => 'INT',
                'null' => true,
            ],
            'code_qr_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'locations_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'sub_locations_out' => [
                'type' => 'INT',
                'null' => true,
            ],
            'rack_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'warehouse_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_tag_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_item_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'desc_pn_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'bpid_out' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_out', true);

        // Membuat tabel TOut
        $this->forge->createTable('TOut', true);
    }

    public function down()
    {
        $this->forge->dropTable('TOut', true);
    }
}
