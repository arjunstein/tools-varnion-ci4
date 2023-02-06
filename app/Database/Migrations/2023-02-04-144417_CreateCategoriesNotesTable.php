<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesNotesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categories_notes' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_categories_notes' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_categories_notes', true);
        $this->forge->createTable('categories_notes');
    }

    public function down()
    {
        $this->forge->dropTable('categories_notes');
    }
}
