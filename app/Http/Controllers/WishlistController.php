<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        // validate incoming data: only service_id is required
        $data = $request->validate([
            'service_id' => ['required', 'integer', Rule::exists('services', 'id')],
        ]);

        $userId = Auth::id();
        $serviceId = (int) $data['service_id'];

        // avoid duplicates (unique constraint in DB also protects)
        $exists = Wishlist::where('user_id', $userId)
                          ->where('service_id', $serviceId)
                          ->exists();

        if ($exists) {
            // If AJAX expects JSON:
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['message' => 'Already in wishlist'], 200);
            }
            return back()->with('message', 'Already in wishlist');
        }

        // optional: fetch service to ensure it exists and to use name later
        $service = Service::find($serviceId);

        // create
        Wishlist::create([
            'user_id' => $userId,
            'service_id' => $serviceId,
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['message' => 'Added to wishlist'], 201);
        }

        return back()->with('success', 'Added to wishlist');
    }

    public function index()
{
    $wishlist = \DB::table('wishlists')
        ->join('services', 'wishlists.service_id', '=', 'services.id')
        ->where('wishlists.user_id', auth()->id())
        ->select('services.*', 'wishlists.id as wishlist_id')
        ->get();

    return view('wishlist.index', compact('wishlist'));
}
  

public function remove($id)
{
    \DB::table('wishlists')
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->delete();

    return redirect()->route('wishlist.index')->with('success', 'Removed from wishlist');
}

}
