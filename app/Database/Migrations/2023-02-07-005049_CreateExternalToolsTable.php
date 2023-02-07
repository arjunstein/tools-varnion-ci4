<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExternalToolsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_external_tools' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_external_tools' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'url_external_tools' => [
                'type'       => 'TEXT',
            ],
            'description_external_tools' => [
                'type'       => 'TEXT',
            ],
            'category_external_tools' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
        ]);
        $this->forge->addKey('id_external_tools', true);
        $this->forge->createTable('external_tools');
    }

    public function down()
    {
        $this->forge->dropTable('external_tools');
    }
}
