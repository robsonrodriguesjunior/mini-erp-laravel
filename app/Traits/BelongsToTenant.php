<?php
namespace App\Traits;

use App\Models\Tenancy;

trait BelongsToTenant
{
    public function tenancy()
    {
        return $this->belongsTo(Tenancy::class);
    }
}
