<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 19:13
 */
declare(strict_types=1);

namespace App\MobileApplication\Application\UseCase\CreateApplication;

use App\Common\Application\Command\Command;

final class CreateApplicationCommand implements Command
{
    public function __construct(public readonly string $name)
    {
    }

}
