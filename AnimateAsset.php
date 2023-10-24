<?php

namespace xandrkat\radmin;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  2.5
 */
class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@xandrkat/radmin/assets';
    /**
     * @inheritdoc
     */
    public $css
        = [
            'animate.css',
        ];

}
