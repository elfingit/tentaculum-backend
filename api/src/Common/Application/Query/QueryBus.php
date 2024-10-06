<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 6.10.24
 * Time: 13:09
 */

declare(strict_types=1);

namespace App\Common\Application\Query;

interface QueryBus
{
    public function ask(Query $query): mixed;
}
