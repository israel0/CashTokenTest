<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory, HasUuids;

    public static $ACTIVATION_GENERATED = 1;
    public static $ACTIVATION_PURCHASED = 2;
    public static $ACTIVATION_USED = 3;
}
