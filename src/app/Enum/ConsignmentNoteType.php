<?php

namespace App\Enum;

enum ConsignmentNoteType: int
{
    case In = 1;
    case Out = 2;
    case Transfer = 3;
}
