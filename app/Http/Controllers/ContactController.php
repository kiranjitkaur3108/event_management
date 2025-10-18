<?php
namespace App\Http\Controllers;
use App\Models\Contact; // <-- THIS LINE IS ESSENTIAL: Import the Contact Model
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 

class ContactController extends Controller
{
    // Show contact form
    /**
     * @return Factory|View
     */
    public function show()
    {
        return view('contact');
    }

    // Handle form submission
    public function submit(Request $request): RedirectResponse
    {
        // 1. Validate input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        // 2. Save to database using the Contact model
        Contact::create($data);

        // 3. Redirect with success message
        return redirect()->route('contact.show')->with('success', 'Thanks — your message has been sent!');
    }
}
