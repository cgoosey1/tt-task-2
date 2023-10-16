<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member;
use App\Models\MemberSchool;
use App\Models\School;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\School::factory(10)->create();
         \App\Models\Member::factory(100)->create();

         // Create member school associations randomly
         $schoolsAttendedArray = $this->getSchoolsAttendedArray();
         $members = Member::all();
         foreach ($members as $member) {
             $schoolsAttended = $schoolsAttendedArray[rand(0, count($schoolsAttendedArray) - 1)];
             for ($i = 0; $i < $schoolsAttended; $i++) {
                 $school = School::inRandomOrder()->first();
                 MemberSchool::create([
                     'member_id' => $member->id,
                     'school_id' => $school->id,
                 ]);
             }
         }
    }

    /**
     * Create a weighted array to decide how many school each member attends
     *
     * @return array
     */
    public function getSchoolsAttendedArray() : array
    {
        $oneSchool = array_fill(0, 7, 1); // 70% chance member attends one school
        $twoSchool = array_fill(0, 2, 2); // 20% chance member attends two school
        $threeSchool = array_fill(0, 1, 3); // 10% chance member attends three school

        return array_merge($oneSchool, $twoSchool, $threeSchool);
    }
}
