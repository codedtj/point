<?php

namespace Core\Infrastructure\Persistence\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Model extends EloquentModel
{
    use UsesUUID;
    use Userstamps;
    use SoftDeletes;
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $keyType = 'uuid';

    protected $guarded = [];
}
