<?php

use xandrkat\radmin\components\Configs;
use yii\db\Migration;

/**
 * Migration table of table_menu
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  1.0
 */
class m140602_111327_create_menu_table extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $menuTable    = Configs::instance()->menuTable;
        $tableOptions = NULL;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($menuTable, [
            'id'     => $this->primaryKey(),
            'name'   => $this->string(128)->notNull(),
            'parent' => $this->integer(),
            'route'  => $this->string(),
            'order'  => $this->integer(),
            'data'   => $this->binary(),
            "FOREIGN KEY ([[parent]]) REFERENCES {$menuTable}([[id]]) ON DELETE SET NULL ON UPDATE CASCADE",
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(Configs::instance()->menuTable);
    }
}
