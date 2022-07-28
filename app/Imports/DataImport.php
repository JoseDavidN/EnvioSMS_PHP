<?php

namespace App\Imports;

use App\Models\tbl_dato;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function model(array $row)
    {
        
        return new tbl_dato([
            'nombres' => $row['nombres'] ?? $row['nombre'] ?? $row['Nombres'] ?? $row['Nombre'] ?? null,
            'apellidos' => $row['apellido'] ?? $row['apellidos'] ?? $row['Apellido'] ?? $row['Apellidos'] ?? null,
            'telefono' => $row['celular'] ?? $row['telefono'] ?? $row['Celular'] ?? $row['Telefono'],
            'edad' => $row['edad'] ?? $row['Edad'] ?? null,
            'comuna' => $row['comuna'] ?? $row['Comuna'] ?? null,
            'cargo' => $row['cargo'] ?? $row['profesion'] ?? $row['Cargo'] ?? $row['Profesion'] ?? null,
        ]);
    }
}
