<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertyImport implements ToModel, WithHeadingRow
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
                'name' => utf8_encode ( $row['name'] ),
                'country' => utf8_encode ( $row['country'] ),
                'address' => utf8_encode($row['address']),
                'description' => utf8_encode($row['description']),
            ]);
        } else {
            $property = new Property([
                'name' => utf8_encode($row['name']),
                'country' => utf8_encode($row['country']),
                'address' => utf8_encode($row['address']),
                'description' => utf8_encode($row['description']),
            ]);
        }
        return $property;
    }
}
