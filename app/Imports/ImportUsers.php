<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportUsers implements ToModel, WithStartRow
{
    private $department;
    private $faculty;
    private $programme;
    private $level;

    public function __construct($department,$faculty,$programme,$level)
    {
        $this->department = $department;
        $this->faculty = $faculty;
        $this->programme = $programme;
        $this->level = $level;
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0].' '.$row[1].' '.$row[2],
            'email'    => $row[3],
            'matric_no' => $row[4],
            'password' => Hash::make($row[2]),
            'user_password' => $row[2],
            'faculty_id' => $this->faculty,
            'department_id' => $this->department,
            'programme' => $this->programme,
            'level' => $this->level
        ]);
    }
}
