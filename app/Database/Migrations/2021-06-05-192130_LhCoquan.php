<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LhCoquan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('lh_coquan');
	}

	public function down()
	{
		$this->forge->dropTable('lh_coquan');
	}
}
