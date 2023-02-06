<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSopTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sop' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title_sop' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'contents_sop' => [
                'type'       => 'LONGTEXT',
                'constraint' => '',
            ],
        ]);
        $this->forge->addKey('id_sop', true);
        $this->forge->createTable('sop');
    }

    public function down()
    {
        $this->forge->dropTable('sop');
    }
}
