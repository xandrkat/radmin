<?php

namespace xandrkat\radmin\models;

use xandrkat\radmin\components\Configs;
use Yii;
use yii\base\Model;
use yii\rbac\Rule;

/**
 * BizRule
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  1.0
 */
class BizRule extends Model
{
    /**
     * @var string name of the rule
     */
    public $name;

    /**
     * @var integer UNIX timestamp representing the rule creation time
     */
    public $createdAt;

    /**
     * @var integer UNIX timestamp representing the rule updating time
     */
    public $updatedAt;

    /**
     * @var string Rule classname.
     */
    public $className;

    /**
     * @var Rule
     */
    private $_item;

    /**
     * Initialize object
     *
     * @param \yii\rbac\Rule $item
     * @param array          $config
     */
    public function __construct($item, $config = [])
    {
        $this->_item = $item;
        if ($item !== NULL) {
            $this->name      = $item->name;
            $this->className = get_class($item);
        }
        parent::__construct($config);
    }

    /**
     * Find model by id
     *
     * @param type $id
     *
     * @return null|static
     */
    public static function find($id)
    {
        $item = Configs::authManager()->getRule($id);
        if ($item !== NULL) {
            return new static($item);
        }

        return NULL;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'className'], 'required'],
            [['className'], 'string'],
            [['className'], 'classExists']
        ];
    }

    /**
     * Validate class exists
     */
    public function classExists()
    {
        if (!class_exists($this->className)) {
            $message = Yii::t('radmin', "Unknown class '{class}'", ['class' => $this->className]);
            $this->addError('className', $message);
            return;
        }
        if (!is_subclass_of($this->className, Rule::className())) {
            $message = Yii::t('radmin', "'{class}' must extend from 'yii\rbac\Rule' or its child class", [
                'class' => $this->className]);
            $this->addError('className', $message);
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'      => Yii::t('radmin', 'Name'),
            'className' => Yii::t('radmin', 'Class Name'),
        ];
    }

    /**
     * Check if new record.
     *
     * @return boolean
     */
    public function getIsNewRecord()
    {
        return $this->_item === NULL;
    }

    /**
     * Save model to authManager
     *
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {
            $manager = Configs::authManager();
            $class   = $this->className;
            if ($this->_item === NULL) {
                $this->_item = new $class();
                $isNew       = true;
            } else {
                $isNew   = false;
                $oldName = $this->_item->name;
            }
            $this->_item->name = $this->name;

            if ($isNew) {
                $manager->add($this->_item);
            } else {
                $manager->update($oldName, $this->_item);
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * Get item
     *
     * @return Item
     */
    public function getItem()
    {
        return $this->_item;
    }
}
