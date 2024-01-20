<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = false;

    protected $with = [
        'manager',
    ];

    /**
     * Get the user's first name.
     */
    protected function fullName(): Attribute
    {
        return Attribute::get(
            fn () => $this->manager->lastName . ' ' . $this->manager->firstName,
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class, 'id', 'manager_id');
    }
}
