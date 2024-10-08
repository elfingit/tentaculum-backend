<?php

/**
 * Created by PhpStorm.
 * User: Andrei Siarheyeu <andreylong@gmail.com>
 * Date: 7.10.24
 * Time: 14:53
 */
declare(strict_types=1);

namespace App\MobileApplication\UserInterface\ApiPlatform\Resource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\MobileApplication\UserInterface\ApiPlatform\Processor\CreateMobileApplicationProcessor;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    shortName: 'MobileApplication',
    operations: [
        new Post(
            openapiContext: ['summary' => 'Create new application.'],
            denormalizationContext: ['groups' => 'create'],
            validationContext: ['groups' => ['create']],
            processor: CreateMobileApplicationProcessor::class
        )
    ]
)]
final class MobileApplicationResource
{
    public function __construct(
        #[ApiProperty(readable: true, writable: false, identifier: true)]
        #[Groups('read')]
        public ?string $id = null,

        #[Assert\NotNull(groups: ['create'])]
        #[Groups(['create', 'read'])]
        public ?string $name = null,
    ) {
    }
}
