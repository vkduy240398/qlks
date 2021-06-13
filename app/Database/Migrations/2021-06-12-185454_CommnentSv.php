<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommnentSv extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'id_sv'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_content'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'status'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
		
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('sv_comment');
	}

	public function down()
	{
		$this->forge->dropTable('sv_comment');
	}
}
