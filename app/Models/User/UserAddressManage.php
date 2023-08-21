<?php

namespace App\Models\User;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

class UserAddressManage extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsToAlias
    {
        return $this->belongsTo(User::class);
    }
}