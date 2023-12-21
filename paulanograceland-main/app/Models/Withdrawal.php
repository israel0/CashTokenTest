<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory, HasUuids;

    public static $WITHDRAW_AVAILABLE = 1;
    public static $WITHDRAW_TOTAL_PAID_OUT = 2;
}
