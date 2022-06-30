<?php

namespace Uzbek\Svgate\Dtos;

use Uzbek\Svgate\Response\BaseResponse;

class SenderDto extends BaseResponse
{
    private string $system;
    private string $legalName;
    private ClientFullNameDto $fullNameDto;
    private string $id;
    private string $ref_num;
    private ?PassportInfoDto $doc;
}
