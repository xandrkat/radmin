<?php

namespace xandrkat\radmin\components;

use yii\rbac\Rule;

/**
 * Description of GuestRule
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  2.5
 */
class GuestRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'guest_rule';

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        return $user->getIsGuest();
    }
}
