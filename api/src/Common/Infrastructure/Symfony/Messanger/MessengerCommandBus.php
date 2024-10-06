<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 6.10.24
 * Time: 12:59
 */

declare(strict_types=1);

namespace App\Common\Infrastructure\Symfony\Messanger;

use App\Common\Application\Command\Command;
use App\Common\Application\Command\CommandBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerCommandBus implements CommandBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->messageBus = $commandBus;
    }

    public function dispatch(Command $command): mixed
    {
        try {
            return $this->messageBus->dispatch($command);
        } catch (HandlerFailedException $e) {
            $exceptions = $e->getWrappedExceptions();
            throw $exceptions[0];
        }
    }
}
