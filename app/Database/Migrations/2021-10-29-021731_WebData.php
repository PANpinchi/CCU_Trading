<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'account' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => TRUE
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => TRUE
            ],
        ]);
        $this->forge->addKey('id', True);
        $this->forge->createTable('login_account');
    }

    public function down()
    {
        $this->forge->dropTable('login_account');
    }
}
