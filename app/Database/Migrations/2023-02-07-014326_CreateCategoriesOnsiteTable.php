<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesOnsiteTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categories_onsite' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_categories_onsite' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_categories_onsite', true);
        $this->forge->createTable('categories_onsite');
    }

    public function down()
    {
        $this->forge->dropTable('categories_onsite');
    }
}
