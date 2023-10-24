<?php

namespace xandrkat\radmin\models;

use xandrkat\radmin\components\Configs;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id         Menu id(autoincrement)
 * @property string  $name       Menu name
 * @property integer $parent     Menu parent
 * @property string  $route      Route for this menu
 * @property integer $order      Menu order
 * @property string  $data       Extra information for this menu
 *
 * @property Menu    $menuParent Menu parent
 * @property Menu[]  $menus      Menu children
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  1.0
 */
class Menu extends ActiveRecord
{
    private static $_routes;
    public $parent_name;

    public static function getMenuSource()
    {
        $tableName = static::tableName();
        return (new Query())
            ->select(['m.id', 'm.name', 'm.route', 'parent_name' => 'p.name'])
            ->from(['m' => $tableName])
            ->leftJoin(['p' => $tableName], '[[m.parent]]=[[p.id]]')
            ->all(static::getDb());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_name'], 'in',
             'range'   => static::find()->select(['name'])->column(),
             'message' => 'Menu "{value}" not found.'],
            [['parent', 'route', 'data', 'order'], 'default'],
            [['parent'], 'filterParent', 'when' => function () {
                return !$this->isNewRecord;
            }],
            [['order'], 'integer'],
            [['route'], 'in',
             'range'   => static::getSavedRoutes(),
             'message' => 'Route "{value}" not found.']
        ];
    }

    /**
     * Get saved routes.
     *
     * @return array
     */
    public static function getSavedRoutes()
    {
        if (self::$_routes === NULL) {
            self::$_routes = [];
            foreach (Configs::authManager()->getPermissions() as $name => $value) {
                if ($name[0] === '/' && substr($name, -1) != '*') {
                    self::$_routes[] = $name;
                }
            }
        }
        return self::$_routes;
    }

    /**
     * Use to loop detected.
     */
    public function filterParent()
    {
        $parent = $this->parent;
        $db     = static::getDb();
        $query  = (new Query)->select(['parent'])
                             ->from(static::tableName())
                             ->where('[[id]]=:id');
        while ($parent) {
            if ($this->id == $parent) {
                $this->addError('parent_name', 'Loop detected.');
                return;
            }
            $parent = $query->params([':id' => $parent])->scalar($db);
        }
    }

    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        if (Configs::instance()->db !== NULL) {
            return Configs::instance()->db;
        } else {
            return parent::getDb();
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->menuTable;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('radmin', 'ID'),
            'name'        => Yii::t('radmin', 'Name'),
            'parent'      => Yii::t('radmin', 'Parent'),
            'parent_name' => Yii::t('radmin', 'Parent Name'),
            'route'       => Yii::t('radmin', 'Route'),
            'order'       => Yii::t('radmin', 'Order'),
            'data'        => Yii::t('radmin', 'Data'),
        ];
    }

    /**
     * Get menu parent
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
    }

    /**
     * Get menu children
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent' => 'id']);
    }
}
