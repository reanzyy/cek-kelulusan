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
        if (empty($row[1]) || empty($row[2]) || empty($row[3]) || empty($row[5])) {
            return null;
        }

        $existingStudent = Student::where('nis', $row[3])->exists();

        if ($existingStudent) {
            return null;
        }

        return new Student([
            'nis' => $row[3],
            'name' => $row[2],
            'class' => $row[1],
            'status' => strtoupper('LULUS'),
            'path' => $row[5],
        ]);
    }
}