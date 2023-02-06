<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesExternalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categories_external' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_categories_external' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_categories_external', true);
        $this->forge->createTable('categories_external');
    }

    public function down()
    {
        $this->forge->dropTable('categories_external');
    }
}
