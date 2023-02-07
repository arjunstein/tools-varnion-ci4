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
                'constraint' => 255,
            ],
            'service_code_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'billcode_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'company_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'property_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'site_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'status_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'tech_name_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'tech_email_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'tech_phone_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'mark_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
            ],
            'notes_customer' => [
                'type' => 'TEXT',
            ],
            'datetime_customer' => [
                'type' => 'DATETIME',
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
