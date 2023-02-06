<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInternalToolsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_internal_tools' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_internal_tools' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'url_internal_tools' => [
                'type'       => 'TEXT',
            ],
            'description_internal_tools' => [
                'type'       => 'TEXT',
            ],
            'category_internal_tools' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
        ]);
        $this->forge->addKey('id_internal_tools', true);
        $this->forge->createTable('internal_tools');
    }

    public function down()
    {
        $this->forge->dropTable('internal_tools');
    }
}
