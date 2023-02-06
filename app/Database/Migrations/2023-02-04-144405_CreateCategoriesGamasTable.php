<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesGamasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categories_gamas' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_categories_gamas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_categories_gamas', true);
        $this->forge->createTable('categories_gamas');
    }

    public function down()
    {
        $this->forge->dropTable('categories_gamas');
    }
}
