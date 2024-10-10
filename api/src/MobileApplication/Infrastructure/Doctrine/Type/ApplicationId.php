<?php
/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 14:34
 */

declare(strict_types=1);

namespace App\MobileApplication\Infrastructure\Doctrine\Type;

use App\Common\Infrastructure\Symfony\Type\UuidType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use App\MobileApplication\Domain\ValueObject\ApplicationId as ApplicationIdValueObject;

class ApplicationId extends UuidType
{
    public const TYPE = 'application_id';

    public function convertToPHPValue($value, AbstractPlatform $platform): ApplicationIdValueObject
    {
        return ApplicationIdValueObject::fromString((string) $value);
    }
}
