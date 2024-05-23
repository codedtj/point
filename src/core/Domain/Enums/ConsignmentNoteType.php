<?php

namespace Core\Domain\Enums;

enum ConsignmentNoteType: int
{
    case In = 0;
    case Out = 1;
    case Transfer = 2;
}
