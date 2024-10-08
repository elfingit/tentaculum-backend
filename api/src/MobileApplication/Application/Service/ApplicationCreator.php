<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 19:35
 */
declare(strict_types=1);

namespace App\MobileApplication\Application\Service;

use App\MobileApplication\Domain\Entity\Application;
use App\MobileApplication\Domain\Repository\ApplicationRepository;
use App\MobileApplication\Domain\ValueObject\ApplicationName;

final class ApplicationCreator
{
    public function __construct(private readonly ApplicationRepository $repository)
    {
    }

    public function create(string $name): void
    {
        $app = Application::create(ApplicationName::fromString($name));
        $this->repository->create($app);
    }
}
