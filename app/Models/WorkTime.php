<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'status', 'value'];

    public const STATUS = [
        'start' => 0,
        'stop' => 1,
    ];

    public function employee()
    {
        $this->belongsTo(Employee::class);
    }
}
