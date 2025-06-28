<?php

namespace App\Imports;

use App\Models\Leave;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeaveImport implements ToModel , withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Leave([
            //
            'EmployeeID' => $row['pers_n0'] ?? null,
            'TypeCongeID' => ($row['type_of_leave'] ?? null),
            'DateDebut' => ($row['first_date_on_leave'] ?? null),
            'DateFin' => ($row['last_date_on_leave'] ?? null),
            'TotalNumberDay' => $row['days'] ?? null,
            'DateRetourSite' => ($row['first_date_back_on_site'] ?? null),
            'LineManager' => null,
            'Manager' => null,
            'DateDemande' => now(),
            'DemandePar' => 'System Import',
            'Statut' => 1,
            'SystPointage' => false,
            'DatePointage' => null,
            'AgentPointage' => null,
            'PayRollSysteme' => false,
            'DatePayrollSystem' => null,
            'AgentPayRoll' => null,
        ]);
    }
}
