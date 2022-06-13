<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Priority;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class StockholdersImport implements ToModel, WithHeadingRow
{
    protected $roundId;

    public function __construct($roundId)
    {
        $this->roundId = $roundId;
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $stockholder = User::where('email', $row['email'])->first();
        if (!$stockholder) {
            $stockholder = User::create([
                'name' => $row['stockholder'],
                'email' => $row['email'],
                'password' => Hash::make($row['email']),
                'status' => 1,
                'is_admin' => 0
            ]);
        }

        return new Priority([
            'user_id' => $stockholder->id,
            'round_id' => $this->roundId,
            'priority' => $row['priority'],
            'available_weeks' => $row['weeks'],
        ]);
    }
}
