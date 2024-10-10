<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 10.10.24
 * Time: 04:44
 */
declare(strict_types=1);

namespace App\User\Infrastructure\Doctrine\Entity;

use App\User\Infrastructure\Doctrine\Repository\UserRepository;
use Carbon\Carbon;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    private int $id;

    #[ORM\Column(type: Types::STRING, length: 255, unique: true)]
    private string $email;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private Carbon $createdAt;

    public function __construct(string $email)
    {
        $this->email = $email;
        $this->createdAt = Carbon::now();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }
}
