<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberPostRequest;
use App\Models\Member;
use App\Models\MemberSchool;
use App\Models\School;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $member = Member::create($request->safe()->only(['name', 'email']));

        foreach ($request->schools as $school) {
            MemberSchool::create([
                'member_id' => $member->id,
                'school_id' => $school,
            ]);
        }

        return redirect()->route('members.create')
            ->with('success', 'Successfully created new member.');
    }

    /**
     * Generate a CSV with all members data including what schools they are associated with
     *
     * @return StreamedResponse
     */
    public function exportCSV() : StreamedResponse
    {

        $members = Member::with('schools')->get();

        $csvFileName = 'members.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $csvFileName,
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];
        $columns = ['Name', 'Emails', 'Schools'];

        // Callback to create the csv
        $callback = function() use ($members, $columns) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $columns); // Add more headers as needed

            foreach ($members as $member) {
                $schools = $member->schools
                    ->pluck('name')
                    ->toArray();

                fputcsv($handle, [
                    $member->name,
                    $member->email,
                    implode(', ', $schools)
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
