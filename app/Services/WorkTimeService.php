<?php

namespace App\Services;

use App\Models\WorkTime;
use Carbon\Carbon;

class WorkTimeService
{
    public function stop(WorkTime $workTime): object
    {
        $workTime->status = WorkTime::STATUS_STOPPED;
        $workTime->value  = $this->calcWorkTimeValue($workTime->created_at);
        $workTime->save();

        return $workTime;
    }

    public function calcWorkTimeValue($workTimeStarted): float
    {
        $now = Carbon::now();
        $workedInMinutes = $now->diffInMinutes($workTimeStarted);

        return round($workedInMinutes / 60, 2);
    }
}