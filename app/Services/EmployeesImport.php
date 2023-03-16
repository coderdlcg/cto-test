<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class EmployeesImport
{

    static public function processing($file)
    {
        try {
            $reader = new Csv();

            $data = $reader->load($file->getRealPath());
            $data = $data->getActiveSheet()->toArray();

            $employees = [];
            $dateTime = Carbon::now();

            foreach ($data as $row) {
                if (isset($row[0])) {
                    array_push($employees, [
                        'full_name' => $row[0],
                        'created_at' => $dateTime,
                        'updated_at' => $dateTime,
                    ]);
                }
            }

            DB::table('employees')->insert($employees);

            return true;
        } catch (\Exception $exception) {
            $msg = $exception->getMessage();
            Log::channel('daily')->error($msg);

            return false;
        }
    }
}
