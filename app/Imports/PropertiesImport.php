<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertiesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $property = Property::where('id', $row['id'])->first();
        if ($property) {
            $property->update([
                'name' =>  $row['name'],
                'country' =>  $row['country'],
                'address' => $row['address'],
            ]);
        } else {
            $property = new Property([
                'name' => $row['name'],
                'country' => $row['country'],
                'address' => $row['address'],
            ]);
        }
        return $property;
    }
}
