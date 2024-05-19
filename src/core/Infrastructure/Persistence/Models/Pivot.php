<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Core\Infrastructure\Persistence\Models;


use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Relations\Pivot as BasePivot;

class Pivot extends BasePivot
{
    use UsesUUID;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
}
