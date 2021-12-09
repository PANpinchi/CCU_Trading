<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'account' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ]
        ]);
        $this->forge->addKey('id', True);
        $this->forge->createTable('admin_account');
    }

    public function down()
    {
        $this->forge->dropTable('admin_account');
    }
}
