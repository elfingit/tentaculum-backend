<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 10.10.24
 * Time: 04:40
 */
declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Common\Domain\ValueObject\EmailValue;
use App\User\Domain\ValueObject\UserId;
use Carbon\Carbon;

class User
{
    private UserId $id;
    private EmailValue $email;

    private Carbon $createdAt;

    public function __construct(EmailValue $email)
    {
        $this->email = $email;
        $this->createdAt = Carbon::now();
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getEmail(): EmailValue
    {
        return $this->email;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }
}
