<?php

namespace xandrkat\radmin\models\searchs;

use xandrkat\radmin\components\Configs;
use xandrkat\radmin\components\RouteRule;
use xandrkat\radmin\models\BizRule as MBizRule;
use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;

/**
 * Description of BizRule
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

    public function rules()
    {
        return [
            [['name'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('radmin', 'Name'),
        ];
    }

    /**
     * Search BizRule
     *
     * @param array $params
     *
     * @return \yii\data\ActiveDataProvider|\yii\data\ArrayDataProvider
     */
    public function search($params)
    {
        /* @var \yii\rbac\Manager $authManager */
        $authManager = Configs::authManager();
        $models      = [];
        $included    = !($this->load($params) && $this->validate() && trim((string)$this->name) !== '');
        foreach ($authManager->getRules() as $name => $item) {
            if ($name != RouteRule::RULE_NAME && ($included || stripos($item->name, $this->name) !== false)) {
                $models[$name] = new MBizRule($item);
            }
        }

        return new ArrayDataProvider([
            'allModels' => $models,
        ]);
    }
}
