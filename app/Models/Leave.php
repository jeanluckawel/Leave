<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //

    public $timestamps = false;

    protected $fillable = [
        'EmployeeID', 'TypeCongeID', 'DateDebut', 'DateFin',
        'TotalNumberDay', 'DateRetourSite', 'LineManager', 'Manager',
        'DateDemande', 'DemandePar', 'Statut', 'SystPointage', 'DatePointage',
        'AgentPointage', 'PayRollSysteme', 'DatePayrollSystem', 'AgentPayRoll'
    ];
}
