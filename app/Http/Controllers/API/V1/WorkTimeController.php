<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkTimeResource;
use App\Models\WorkTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class WorkTimeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'employee_id' => ['required', 'integer', 'max_digits:12']
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'bad request'], Response::HTTP_BAD_REQUEST);
        }

        $validated = $validator->safe()->only(['employee_id']);

        $workTime = WorkTime::firstOrCreate([
            'employee_id' => $validated['employee_id'],
            'status' => WorkTime::STATUS['start'],
        ]);

        return new WorkTimeResource($workTime);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => ['required', 'integer', 'max_digits:12']
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'bad request'], Response::HTTP_BAD_REQUEST);
        }

        $validated = $validator->safe()->only(['employee_id']);

        $workTime = WorkTime::firstWhere([
            'employee_id' => $validated['employee_id'],
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
