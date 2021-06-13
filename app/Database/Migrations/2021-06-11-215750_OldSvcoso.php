<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OldSvcoso extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'id_old_sv'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_coso'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('old_svcoso');
	}

	public function down()
	{
		$this->forge->dropTable('old_svcoso');
	}
}
