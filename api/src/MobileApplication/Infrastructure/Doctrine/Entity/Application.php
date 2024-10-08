<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 11:12
 */

declare(strict_types=1);

namespace App\MobileApplication\Infrastructure\Doctrine\Entity;

use App\MobileApplication\Infrastructure\Doctrine\Repository\ApplicationRepository;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
#[ORM\Table(name: 'applications')]
class Application
{
    #[ORM\Id]
    #[ORM\Column(type: 'application_id')]
    private string $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'datetime')]
    private Carbon $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?Carbon $updatedAt = null;

    public function __construct(string $id, string $name)
    {
        $this->name = $name;
        $this->id = $id;
        $this->createdAt = Carbon::now();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

}
