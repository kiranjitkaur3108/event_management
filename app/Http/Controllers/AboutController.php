<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TeamMember; 

class AboutController extends Controller
{
    public function show()
    {
        // Fetch team members from the database
        $teamMembers = TeamMember::all();

        // Pass to Blade view
        return view('about', compact('teamMembers'));
    }
}
