<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesPrivilegeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categories_privilege' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_categories_privilege' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_categories_privilege', true);
        $this->forge->createTable('categories_privilege');
    }

    public function down()
    {
        $this->forge->dropTable('categories_privilege');
    }
}
