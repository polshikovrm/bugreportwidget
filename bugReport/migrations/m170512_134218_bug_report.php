<?php
namespace common\modules\bugReport\migrations;

use yii\db\Migration;

class m170512_134218_bug_report extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%bug_report}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'description' => $this->string(2000)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%bug_report}}');
    }

}
