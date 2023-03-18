<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\EmployeesImport;
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

        $workTimes = $employee->workTimesByWeekly();

        return view('employees.report', compact(['employee', 'workTimes']));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_input' => 'required|mimetypes:text/plain,text/csv',
        ]);

        $file = $request->file('file_input');

        $isSuccess = EmployeesImport::processing($file);

        if ($isSuccess) {
            return redirect()->back()->with('success', 'Success import!');
        }

        return redirect()->back()->with('error', 'Fail import!');
    }
}
