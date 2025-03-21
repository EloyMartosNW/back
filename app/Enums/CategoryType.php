<?php

namespace App\Enums;


enum CategoryType: string
{
    case OFFER = 'offer';
    case RECOMMENDATION = 'recommendation';
    case INFORMATIVE = 'informative';
}