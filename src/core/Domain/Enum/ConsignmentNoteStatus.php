<?php

namespace Core\Domain\Enum;

enum ConsignmentNoteStatus: int
{
    case Draft = 0;
    case Completed = 1;
}
