<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;

class PropertyImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $property = Property::where('id', $row[0])->first();
        if ($property) {
            $property->update([
                'name' => $row[1],
                'country' => $row[2],
                'address' => $row[3],
                'description' => $row[4],
            ]);
        } else {
            $property = new Property([
                'name' => $row[1],
                'country' => $row[2],
                'address' => $row[3],
                'description' => $row[4],
            ]);
        }
        return $property;
    }
}
