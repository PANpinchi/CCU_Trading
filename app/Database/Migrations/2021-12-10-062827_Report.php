<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Report extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => TRUE
            ],
            'seller' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'seller_account' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'way' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
                'null'       => TRUE
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'price' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'number' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'time' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'place' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'item_describe' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'       => TRUE
            ],
            'post_time' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'reason' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
        ]);
        $this->forge->createTable('report_items');
    }

    public function down()
    {
        $this->forge->dropTable('report_items');
    }
}