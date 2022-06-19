<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Priority;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\MailController;

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
        // dd($row);
        Validator::make($row, [
            'priority' => 'integer',
            'name' => 'required',
            'email' => 'required|email',
            'available_weeks' => 'required|integer',
        ])->validate();

        $stockholder = User::where('email', $row['email'])->first();
        if (!$stockholder) {
            $password = Str::random(8);
            $stockholder = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($password),
                'status' => 1,
                'is_admin' => 0
            ]);

            $mail = new MailController();
            $stockholder->password = $password;
            $mail->newUser($stockholder);
        } else {
            $stockholder->update([
                'name' => $row['name'],
            ]);
        }

        $priority = Priority::query()
            ->where('user_id', $stockholder->id)
            ->where('round_id', $this->roundId)
            ->first();

        if ($priority) {
            $priority->update([
                'user_id' => $stockholder->id,
                'round_id' => $this->roundId,
                'priority' => $row['priority'],
                'available_weeks' => $row['available_weeks'],
            ]);
        } else {
            $priority = new Priority([
                'user_id' => $stockholder->id,
                'round_id' => $this->roundId,
                'priority' => $row['priority'],
                'available_weeks' => $row['available_weeks'],
            ]);
        }

        return $priority;
    }
}
