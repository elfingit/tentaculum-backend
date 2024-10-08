<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 14:46
 */

declare(strict_types=1);

namespace App\MobileApplication\UserInterface\ApiPlatform\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Common\Application\Command\CommandBus;
use App\MobileApplication\Application\UseCase\CreateApplication\CreateApplicationCommand;
use App\MobileApplication\UserInterface\ApiPlatform\Resource\MobileApplicationResource;
use Webmozart\Assert\Assert;


final class CreateMobileApplicationProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly CommandBus $commandBus,
    ) {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        Assert::isInstanceOf($data, MobileApplicationResource::class);
        /** @var MobileApplicationResource $mobileApplicationResource */
        $mobileApplicationResource = $data;

        Assert::notNull($mobileApplicationResource->name);

        $this->commandBus->dispatch(
            new CreateApplicationCommand(
                name: $mobileApplicationResource->name,
            )
        );
    }
}
