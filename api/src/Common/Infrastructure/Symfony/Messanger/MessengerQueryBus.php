<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 6.10.24
 * Time: 13:11
 */

namespace App\Common\Infrastructure\Symfony\Messanger;

use App\Common\Application\Query\Query;
use App\Common\Application\Query\QueryBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerQueryBus implements QueryBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    public function ask(Query $query): mixed
    {
        try {
            return $this->messageBus->dispatch($query);
        } catch (HandlerFailedException $e) {
            $exceptions = $e->getWrappedExceptions();
            throw $exceptions[0];
        }
    }
}
