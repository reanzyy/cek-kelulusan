<?php

namespace App\Imports;

use App\Models\Student;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $existingStudent = Student::where('nis', $row[1])->first();

        if ($existingStudent) {
            throw new Exception(' NIS ' . $row['1'] . ' telah digunakan');
        }

        return new Student([
            'nis' => $row[1],
            'name' => $row[2],
            'class' => $row[3],
            'status' => strtoupper($row[4]),
            'path' => $row[5],
        ]);
    }
}
