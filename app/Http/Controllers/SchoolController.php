<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * Show details for a specific school including all members
     *
     * @param School $school
     * @return View
     */
    public function show(School $school) : View
    {
        return view('site.schools.show', [
            'school' => $school,
            'members' => $school->members,
        ]);
    }
}
