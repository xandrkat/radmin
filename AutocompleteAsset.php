<?php

namespace xandrkat\radmin;

use yii\web\AssetBundle;

/**
 * AutocompleteAsset
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  1.0
 */
class AutocompleteAsset extends AssetBundle
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
            'jquery-ui.css',
        ];
    /**
     * @inheritdoc
     */
    public $js
        = [
            'jquery-ui.js',
        ];
    /**
     * @inheritdoc
     */
    public $depends
        = [
            'yii\web\JqueryAsset',
        ];

}
