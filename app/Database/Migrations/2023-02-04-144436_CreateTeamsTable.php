<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_teams' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_teams' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_teams', true);
        $this->forge->createTable('teams');
    }

    public function down()
    {
        $this->forge->dropTable('teams');
    }
}
