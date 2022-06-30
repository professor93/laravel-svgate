<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class PassportInfoDto extends BaseResponse
{
    private string $nationality;
    private string $type;
    private string $seriesNumber;
    private string $birthDate;
    private string $validTo;
    private string $mrz;
}
