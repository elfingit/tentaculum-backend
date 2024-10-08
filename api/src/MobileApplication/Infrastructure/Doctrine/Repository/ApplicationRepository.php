<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 11:14
 */

declare(strict_types=1);

namespace App\MobileApplication\Infrastructure\Doctrine\Repository;

use App\MobileApplication\Domain\Entity\Application as ApplicationDomainEntity;
use App\MobileApplication\Domain\Repository\ApplicationRepository as ApplicationRepositoryInterface;
use App\MobileApplication\Infrastructure\Doctrine\Entity\Application;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ApplicationRepository extends ServiceEntityRepository implements ApplicationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Application::class);
    }

    public function create(ApplicationDomainEntity $applicationDomainEntity): void
    {
        $application = new Application(
            $applicationDomainEntity->getId()->value(),
            $applicationDomainEntity->getName()->value()
        );

        $this->getEntityManager()->persist($application);
    }
}
