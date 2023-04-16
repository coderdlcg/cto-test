<?php

namespace App\Http\Controllers\API\V1;

use App\Exceptions\EmployeeNotFoundException;
use App\Exceptions\WorkTimeNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTimeRequest;
use App\Http\Resources\WorkTimeResource;
use App\Models\Employee;
use App\Models\WorkTime;
use App\Services\WorkTimeService;
use Illuminate\Http\Response;

class WorkTimeController extends Controller
{
    private WorkTimeService $service;

    public function __construct(WorkTimeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Post(
     *      path="/worktimes/start",
     *      tags={"Worktimes"},
     *      summary="Start worktime",
     *      description="Start worktime for employee_id",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="employee_id", type="integer", example="12345"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", example="12"),
     *              @OA\Property(property="employee_id", type="integer", example="12345"),
     *              @OA\Property(property="status", type="string", example="started"),
     *              @OA\Property(property="value", type="float", example="null"),
     *              @OA\Property(property="started_at", type="datetime", example="2023-01-01T00:00:01.000000Z"),
     *              @OA\Property(property="stopped_at", type="datetime", example="2023-01-01T00:00:01.000000Z"),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Bad Request"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthenticated"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Employee not found",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Employee not found"),
     *          )
     *      )
     * )
     */
    public function start(WorkTimeRequest $request)
    {
        $employee_id = $request->getEmployeeId();

        try {
            $workTime = $this->service->start($employee_id);
        } catch (EmployeeNotFoundException | WorkTimeNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        }

        return new WorkTimeResource($workTime);
    }

    /**
     * @OA\Post(
     *      path="/worktimes/stop",
     *      tags={"Worktimes"},
     *      summary="Stop worktime",
     *      description="Stop worktime for employee_id",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="employee_id", type="integer", example="12345"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", example="12"),
     *              @OA\Property(property="employee_id", type="integer", example="12345"),
     *              @OA\Property(property="status", type="string", example="stopped"),
     *              @OA\Property(property="value", type="float", example="1.5"),
     *              @OA\Property(property="started_at", type="datetime", example="2023-01-01T00:00:00.000000Z"),
     *              @OA\Property(property="stopped_at", type="datetime", example="2023-01-01T01:30:00.000000Z"),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Bad Request"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthenticated"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Employee not found",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Employee not found"),
     *          )
     *      )
     * )
     */
    public function stop(WorkTimeRequest $request)
    {
        $employee_id = $request->getEmployeeId();

        try {
            $workTime = $this->service->stop($employee_id);
        } catch (EmployeeNotFoundException | WorkTimeNotFoundException $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        }

        return new WorkTimeResource($workTime);
    }
}
