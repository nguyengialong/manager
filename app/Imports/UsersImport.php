<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([

            'name'     => $row['name'],
            'email'    => $row['email'],
            'email_verified_at' => $row['email_verified_at'],
            'password' => bcrypt('12345678'),
            'address'  => $row['address'],
            'phone'    => $row['phone'],
            'remember_token' => $row['remember_token']

        ]);
    }
}
