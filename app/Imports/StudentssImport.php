<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentssImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {



        if (empty($row[0])) {
            // Optionally, you can log or handle this case
            \Log::error('Qalam ID is null or empty', $row);
            return null; // Skip this row
        }


        return new Student([
            'qalam_id'                => $this->castToInt($row[0]),  // Qalam ID as integer
            'name_of_student'         => $row[1],                   // Name of Student as string
            'father_profession'       => $row[2],                   // Father's Profession as string
            'institutions'            => $row[3],                   // Institutions as string
            'city'                    => $row[4],                   // City as string
            'semester_1'              => $this->castToFloat($row[5]), // Semester 1 as float
            'semester_2'              => $this->castToFloat($row[6]), // Semester 2 as float
            'semester_3'              => $this->castToFloat($row[7]), // Semester 3 as float
            'semester_4'              => $this->castToFloat($row[8]), // Semester 4 as float
            'semester_5'              => $this->castToFloat($row[9]), // Semester 5 as float
            'semester_6'              => $this->castToFloat($row[10]), // Semester 6 as float
            'semester_7'              => $this->castToFloat($row[11]), // Semester 7 as float
            'semester_8'              => $this->castToFloat($row[12]), // Semester 8 as float
            'program'                 => $row[13],                  // Program as string
            'nust_trust_fund_donor_name' => $row[14],               // NUST Trust Fund Donor Name as string
            'degree'                  => $row[15],                  // Degree as string
            'year_of_admission'       => $this->castToInt($row[16]), // Year of Admission as integer
            'remarks_status'          => $row[17],                  // Remarks Status as string
            'donor_id'                => $this->castToInt($row[18]), // Donor ID as integer
            'student_status'          => $row[19],                  // Student Status as string
            'images'                  => $row[20],                  // Images as string
        ]);
    }

    /**
    * Casts a value to float. Returns null if the value is not a valid float.
    *
    * @param mixed $value
    * @return float|null
    */
    private function castToFloat($value)
    {
        return is_numeric($value) ? (float) $value : null;
    }

    /**
    * Casts a value to integer. Returns null if the value is not a valid integer.
    *
    * @param mixed $value
    * @return int|null
    */
    private function castToInt($value)
    {
        return is_numeric($value) ? (int) $value : null;
    }
}
