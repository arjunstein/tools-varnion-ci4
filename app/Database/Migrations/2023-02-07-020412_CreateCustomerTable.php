<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_customer' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_customer_api' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'service_code_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'billcode_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'company_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'property_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'site_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'tech_name_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true,
            ],
            'tech_email_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true,
            ],
            'tech_phone_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true,
            ],
            'mark_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true, 
            ],
            'notes_customer' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'datetime_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true, 
            ],
        ]);
        $this->forge->addKey('id_customer', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
