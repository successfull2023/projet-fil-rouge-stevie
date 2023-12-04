<?php

 namespace Database\Seeders;

 use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'KPANDJOM SARA HELENA',
            'username' => 'Sarahelena',
            'email' =>'kpandjomsarahelena01@gmail.com',
            'username' => '=sarahelena',

            'roles_id' => 1,
            'password' => Hash::make('sara01'),
            ]);


            DB::table('users')->insert([
                'name' => 'MABOUNDOU STEVE FAVOR',
                'username' => 'Stevefavor',
                'email' =>'Mabstevefavor03@gmail.com',
                'username' => 'Stevefavor',

                'roles_id' => 2,
                'password' => Hash::make('favor03'),
                ]);

                DB::table('users')->insert([
                    'name' => 'NGUILA STEVIE ROSE',
                    'username' => 'stevierose',
                    'email' =>'stevierosenguila2023@gmail.com',
                    'username' => 'stevierose',

                    'roles_id' => 3,
                    'password' => Hash::make('stevie2023@'),
                    ]);
    }
}
