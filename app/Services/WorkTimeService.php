<?php

namespace App\Services;

use App\Exceptions\EmployeeNotFoundException;
use App\Exceptions\WorkTimeNotFoundException;
use App\Models\Employee;
use App\Models\WorkTime;
use Carbon\Carbon;

class WorkTimeService
{

    public function start(int $employee_id): WorkTime
    {
        $employee = Employee::find($employee_id);
        if (!$employee) {
            throw new EmployeeNotFoundException();
        }

        $workTime = WorkTime::firstOrCreate([
            'employee_id' => $employee_id,
            'status' => WorkTime::STATUS_STARTED,
        ]);

        if (!$workTime) {
            throw new WorkTimeNotFoundException();
        }

        return $workTime;
    }

    /**
     * @param int $employee_id
     * @return WorkTime
     * @throws \Exception
     */
    public function stop(int $employee_id): WorkTime
    {
        $employee = Employee::find($employee_id);
        if (!$employee) {
            throw new EmployeeNotFoundException();
        }

        $workTime = WorkTime::firstWhere([
            'employee_id' => $employee_id,
            'status' => WorkTime::STATUS_STARTED
        ]);

        if (!$workTime) {
            throw new WorkTimeNotFoundException();
        }

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