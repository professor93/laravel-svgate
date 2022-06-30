<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class ClientFullNameDto extends BaseResponse
{
    private string $firstName;
    private string $lastName;
    private ?string $middleName;
}
