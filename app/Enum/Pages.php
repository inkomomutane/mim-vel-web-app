<?php

namespace App\Enum;

enum Pages : string
{

    use HasToObjectValues;
    use HasToArrayValues;


    case HOME = 'home';
    case IMOVELS = 'imovels';
    case ABOUT = 'about';
    case CONTACT = 'contact';
    case TERMS = 'terms';
    case POLICY = 'policy';
    case LOGO = 'logo';
}
