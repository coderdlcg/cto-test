<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTimeRequest;
use App\Http\Resources\WorkTimeResource;
use App\Models\Employee;
use App\Models\WorkTime;
use Carbon\Carbon;
use Illuminate\Http\Response;

class WorkTimeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkTimeRequest $request)
    {
        $employee_id = $request->validated('employee_id');

        $employee = Employee::find($employee_id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], Response::HTTP_NOT_FOUND);
        }

        $workTime = WorkTime::firstOrCreate([
            'employee_id' => $employee_id,
            'status' => WorkTime::STATUS['start'],
        ]);

        return new WorkTimeResource($workTime);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkTimeRequest $request)
    {
        $employee_id = $request->validated('employee_id');

        $employee = Employee::find($employee_id);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], Response::HTTP_NOT_FOUND);
        }

        $workTime = WorkTime::firstWhere([
            'employee_id' => $employee_id,
            'status' => WorkTime::STATUS['start']
        ]);

        if (!$workTime) {
            return response()->json(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        $now = Carbon::now();
        $workedInMinnutes = $now->diffInMinutes($workTime->created_at);

        $workTime->status = WorkTime::STATUS['stop'];
        $workTime->value = round($workedInMinnutes / 60, 2);
        $workTime->save();

        return new WorkTimeResource($workTime);
    }
}
