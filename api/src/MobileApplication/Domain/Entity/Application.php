<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 10:42
 */

declare(strict_types=1);

namespace App\MobileApplication\Domain\Entity;

use App\MobileApplication\Domain\ValueObject\ApplicationId;
use App\MobileApplication\Domain\ValueObject\ApplicationName;

class Application
{
    private ApplicationId $id;
    private ApplicationName $name;

    public function __construct(ApplicationName $name)
    {
        $this->id = ApplicationId::generate();
        $this->name = $name;
    }

    public static function create(ApplicationName $name): self
    {
        return new self($name);
    }

    public function getId(): ApplicationId
    {
        return $this->id;
    }

    public function getName(): ApplicationName
    {
        return $this->name;
    }
}
