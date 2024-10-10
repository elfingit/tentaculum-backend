<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 19:23
 */
declare(strict_types=1);

namespace App\MobileApplication\Domain\Repository;

use App\Common\Domain\Repository\Repository;
use App\MobileApplication\Domain\Entity\Application as ApplicationDomainEntity;

interface ApplicationRepository extends Repository
{
    public function create(ApplicationDomainEntity $applicationDomainEntity): void;
}
