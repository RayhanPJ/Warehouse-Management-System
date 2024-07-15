<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_item' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'no_rfq' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_wo' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_cust' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_sdf' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'lot_del' => [
                'type' => 'INT',
                'null' => true,
            ],
            'qty' => [
                'type' => 'INT',
                'null' => true,
            ],
            'code_qr' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'locations' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'sub_locations' => [
                'type' => 'INT',
                'null' => true,
            ],
            'rack' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'warehouse' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_tag' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_item' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'desc_pn' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'bpid' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'name_item_sisa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
            ]);

        // Membuat primary key
        $this->forge->addKey('id_item', true);

        // Membuat tabel users
        $this->forge->createTable('TItems', true);
    }

    public function down()
    {
        $this->forge->dropTable('TItems', true);
    }
}
