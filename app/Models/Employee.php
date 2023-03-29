<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }

    public function workTimesByWeekly()
    {
        $sumWorkTimeValue = function ($items) {
            $sum = 0;

            foreach($items as $item) {
                if (isset($item->value)) {
                    $sum += $item->value;
                }
            }

            $str = ($sum % 60) . ' ч. ' . round($sum * 60) % 60 . ' мин.';

            return "{$str} ($sum)";
        };

        return $this->workTimes()->where('employee_id', $this->id)
            ->where('status', WorkTime::STATUS['stop'])
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($item) {
                return Carbon::parse($item->created_at)
                        ->startOfWeek()
                        ->toImmutable()
                        ->format('d.m') . ' - ' .
                    Carbon::parse($item->created_at)
                        ->endOfWeek()
                        ->toImmutable()
                        ->format('d.m.Y');
            })
            ->map(function($items) use ($sumWorkTimeValue) {
                return collect([
                    'sum' => $sumWorkTimeValue($items),
                    'days' => $items->groupBy(function($item) {
                        return $item->created_at->format('d.m');
                    })->map(function($items) use ($sumWorkTimeValue) {
                        return $sumWorkTimeValue($items);
                    })
                ]);
            });
    }
}
