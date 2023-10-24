<?php

namespace tests\codeception\fixtures;

use yii\test\DbFixture;

/**
 * Description of AdminFixture
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  2.5
 */
class AdminFixture extends DbFixture
{

    public function load()
    {
        ob_start();
        ob_implicit_flush(false);
        include __DIR__ . '/data/admin.php';
        ob_get_clean();
    }
}
