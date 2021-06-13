<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NganhTuyenDung extends Migration
{
	protected $DBGroup = 'default';
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'id_ntd'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_branch'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
		
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('nganh_tuyen_dung');
	}

	public function down()
	{
		$this->forge->dropTable('nganh_tuyen_dung');
	}
}
