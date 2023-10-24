<?php

namespace tests\codeception\unit;

use tests\codeception\fixtures\AdminFixture;

/**
 * Description of TestCase
 *
 * @author Alexandr Katrazhenko <katrazhenko@gmail.com>
 * @since  1.0
 */
class TestCase extends \yii\codeception\TestCase
{
    public $appConfig = '@tests/codeception/config/unit.php';

    public function fixtures()
    {
        return [
            AdminFixture::className(),
        ];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->loadFixtures();
    }
}
