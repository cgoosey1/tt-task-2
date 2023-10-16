<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolSearchByCountryRequest;
use App\Models\School;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SchoolController extends Controller
{

    /**
     * Main page for schools where they can be searched by country
     *
     * @return View
     */
    public function index() : View
    {
        return view('site.schools.index');
    }

    /**
     * Search for schools based on countries
     *
     * @param string $term
     * @return JsonResponse
     */
    public function searchByCountry($term) : JsonResponse
    {
        $schools = School::where('country', 'LIKE', '%' . $term . '%')
            ->withCount('members')
            ->get();

        return response()->json($schools);
    }

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

    /**
     * Show report on all schools and their members
     *
     * @return View
     */
    public function report() : View
    {
        $schools = School::withCount('members')->get();
        $countries = $schools->pluck('country')
            ->unique();

        return view('site.schools.report', [
            'schools' => $schools,
            'countries' => $countries,
        ]);
    }
}
