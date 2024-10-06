<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 6.10.24
 * Time: 12:59
 */

declare(strict_types=1);

namespace App\Common\Application\Command;

interface CommandBus
{
    public function dispatch(Command $command): mixed;
}
