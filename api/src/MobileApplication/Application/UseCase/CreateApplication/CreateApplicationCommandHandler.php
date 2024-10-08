<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 19:15
 */
declare(strict_types=1);

namespace App\MobileApplication\Application\UseCase\CreateApplication;

use App\Common\Application\Command\CommandHandler;
use App\MobileApplication\Application\Service\ApplicationCreator;

final class CreateApplicationCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly ApplicationCreator $applicationCreator
    )
    {
    }

    public function __invoke(CreateApplicationCommand $command): void
    {
        $this->applicationCreator->create($command->name);
    }
}
