<?php
/**
 * @link https://github.com/zhuravljov/yii2-queue
 * @copyright Copyright (c) 2017 Roman Zhuravlev
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests\drivers\gearman;

use tests\drivers\CliTestCase;
use Yii;
use zhuravljov\yii\queue\gearman\Queue;

/**
 * Gearman Queue Test
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class QueueTest extends CliTestCase
{
    /**
     * @return Queue
     */
    protected function getQueue()
    {
        return Yii::$app->gearmanQueue;
    }

    public function testLater()
    {
        // Not supported
    }

    public function setUp()
    {
        if (!defined('GEARMAN_SUCCESS')) {
            $this->markTestSkipped();
        } else {
            parent::setUp();
        }
    }
}