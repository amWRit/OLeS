<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class employeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
           'f_name' => str_random(10),
            'l_name' => str_random(10),
            'dob' => "1990-02-02",
            'join_date' => "2017-02-02",
            'dept' => 'designer',
            'emp_type' => 'employee'
        ]);
    }
}