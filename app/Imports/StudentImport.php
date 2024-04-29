<?php

namespace App\Imports;

use App\Models\Student;
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
        return new Student([
            'nisn' => $row[1],
            'name' => $row[2],
            'class' => $row[3],
            'status' => $row[4],
            'path' => $row[5],
        ]);
    }
}
