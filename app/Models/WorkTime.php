<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'status', 'value'];

    public const STATUS_STARTED = 0;
    public const STATUS_STOPPED = 1;


    public function employee()
    {
        $this->belongsTo(Employee::class);
    }

    public function isStarted(): bool
    {
        return $this->status === self::STATUS_STARTED;
    }
}
