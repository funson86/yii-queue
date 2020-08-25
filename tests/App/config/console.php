<?php

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Yiisoft\Arrays\Modifier\ReplaceValue;
use Yiisoft\Composer\Config\Builder;
use Yiisoft\Yii\Event\EventDispatcherProvider;
use Yiisoft\Yii\Queue\Driver\DriverInterface;
use Yiisoft\Yii\Queue\Driver\SynchronousDriver;
use Yiisoft\Yii\Queue\Tests\App\QueueHandler;
use Yiisoft\Yii\Queue\Worker\Worker;

return [
    LoggerInterface::class => NullLogger::class,
    DriverInterface::class => SynchronousDriver::class,
    Worker::class => new ReplaceValue(
        [
            '__class' => Worker::class,
            '__construct()' => [
                [
                    'simple' => [QueueHandler::class, 'simple'],
                    'exceptional' => [QueueHandler::class, 'exceptional'],
                    'retryable' => [QueueHandler::class, 'retryable'],
                    'not-supported' => [QueueHandler::class, 'notSupported']
                ],
            ],
        ]
    ),
    EventDispatcherProvider::class => [
        '__class' => EventDispatcherProvider::class,
        '__construct()' => [Builder::require('events-console')],
    ],
];
