<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 11:12
 */

namespace App\MobileAppliaction\Infrastructure\Doctrine\Entity;

use App\MobileAppliaction\Infrastructure\Doctrine\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{

}
