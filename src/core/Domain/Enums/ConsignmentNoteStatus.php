<?php

namespace Core\Domain\Enums;

enum ConsignmentNoteStatus: int
{
    case Draft = 0;
    case Completed = 1;
}
