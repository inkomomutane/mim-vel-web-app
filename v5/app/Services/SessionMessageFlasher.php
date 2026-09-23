<?php

namespace App\Services;

use App\Data\AlertDto;
use App\Enum\AlertStatus;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SessionMessageFlasher
{

    private static SessionMessageFlasher $instance;

    private function __construct(){}

    public static function getInstance(): SessionMessageFlasher
    {
        $class = static::class;

        if (!isset(self::$instance)) {
            self::$instance = new $class();
        }

        return self::$instance;
    }


    public function addSuccess(string $message): void
    {
        session()?->flash('messages',AlertDto::success($message));
    }

    public function addError(string $message): void
    {
        session()?->flash('messages',AlertDto::error($message));
    }

    public function addInfo(string $message): void
    {
        session()?->flash('messages',AlertDto::info($message));
    }

    public function addWarning(string $message): void
    {
        session()?->flash('messages',AlertDto::warning($message));
    }

    public function add(string $message, AlertStatus $type): void
    {
        session()?->flash('messages', new AlertDto($type, $message));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getMessages(): ?AlertDto
    {
        $message = session()?->get('messages');

        if ($message){
            session()?->forget('messages');
        }
        return $message;
    }
}
