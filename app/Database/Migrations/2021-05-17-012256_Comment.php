<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
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
			'id_gv'=>[
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
		$this->forge->createTable('comment');
	}

	public function down()
	{
		$this->forge->dropTable('comment');
	}
}
