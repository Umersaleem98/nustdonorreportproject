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
        return new Student([
            'qalam_id'  => $row[0],
            'name_of_student'  => $row[1],
            'father_profession'  => $row[2],
            'institutions'  => $row[3],
            'city'  => $row[4],
            'semester_1'  => $this->castToFloat($row[5]),
            'semester_2'  => $this->castToFloat($row[6]),
            'semester_3'  => $this->castToFloat($row[7]),
            'semester_4'  => $this->castToFloat($row[8]),
            'semester_5'  => $this->castToFloat($row[9]),
            'semester_6'  => $this->castToFloat($row[10]),
            'semester_7'  => $this->castToFloat($row[11]),
            'semester_8'  => $this->castToFloat($row[12]),
            'program'  => $row[13],
            'nust_trust_fund_donor_name'  => $row[14],
            'degree'  => $row[15],
            'year_of_admission'  => $this->castToInt($row[16]),
            'remarks_status'  => $row[17],
            'donor_id'  => $this->castToInt($row[18]),  // Ensure this is the correct index for donor_id
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
