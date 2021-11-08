<?php


namespace App\Services\Service;

use App\Traits\AdditionalPhoto;
use App\Traits\MainPhoto;
use App\Traits\SavePhones;

class ServiceManager
{
    use MainPhoto, AdditionalPhoto, SavePhones;
}
