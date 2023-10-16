<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberPostRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Create new member in the system
     *
     * @return View
     */
    public function create() : View
    {
        $schools = School::all();

        return view('site.members.create', ['schools' => $schools]);
    }

    /**
     * Store new members details in the database
     *
     * @param MemberPostRequest $request
     * @return RedirectResponse
     */
    public function store(MemberPostRequest $request) : RedirectResponse
    {
        //
    }
}
