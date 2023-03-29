<?php

namespace App\Services;

use App\Models\WorkTime;
use Carbon\Carbon;

class WorkTimeService
{

    static public function stop(WorkTime $workTime): object
    {
        $now = Carbon::now();
        $workedInMinnutes = $now->diffInMinutes($workTime->created_at);

        $workTime->status = WorkTime::STATUS['stop'];
        $workTime->value = round($workedInMinnutes / 60, 2);
        $workTime->save();

        return $workTime;
    }

}