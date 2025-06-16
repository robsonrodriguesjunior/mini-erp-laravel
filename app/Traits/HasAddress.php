<?php
namespace App\Traits;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAddress
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function getFullAddressAttribute(): string
    {
        return trim(implode(', ', array_filter([
            $this->address,
            $this->city?->name,
            $this->state?->name,
            $this->postcode,
            $this->country?->name,
        ])));
    }

    public function getAddressArrayAttribute(): array
    {
        return [
            'address'  => $this->address,
            'city'     => $this->city?->name,
            'state'    => $this->state?->name,
            'postcode' => $this->postcode,
            'country'  => $this->country?->name,
        ];
    }
}
