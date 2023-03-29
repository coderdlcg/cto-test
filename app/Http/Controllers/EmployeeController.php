<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeesImport;
use App\Services\EmployeesReport;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.list', compact(['employees']));
    }

    public function reports(int $id)
    {
        $employee = Employee::findOrFail($id);

        if (!$employee) {
            return abort(404);
        }

        $workTimes = EmployeesReport::workTimesByWeekly($employee);

        return view('employees.report', compact(['employee', 'workTimes']));
    }

    public function import(EmployeeRequest $request)
    {
        $file = $request->validated('file_input');

        $isSuccess = EmployeesImport::processing($file);

        if ($isSuccess) {
            return redirect()->back()->with('success', 'Success import!');
        }

        return redirect()->back()->with('error', 'Fail import!');
    }
}
