<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chatdata extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 64,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name_from' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'name_to' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'content' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'time' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => TRUE
            ],
        ]);
        $this->forge->addKey('id', True);
        $this->forge->createTable('message');
    }

    public function down()
    {
        $this->forge->dropTable('message');
    }
}
