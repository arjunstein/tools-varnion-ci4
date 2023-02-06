<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIncomingCaseTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_incoming_case' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_incoming_case' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_incoming_case', true);
        $this->forge->createTable('incoming_case');
    }

    public function down()
    {
        $this->forge->dropTable('incoming_case');
    }
}
