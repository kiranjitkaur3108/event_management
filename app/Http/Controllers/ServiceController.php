<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 

class ServiceController extends Controller
{
    public function index() {
        return view('services.services');
    }

    public function book($id)
    {
        $service = Service::findOrFail($id); // get service from DB
        return view('book-details', compact('service'));
    }

    // Weddings
    public function weddingCeremonies() { return view('services.wedding-ceremonies'); }
    public function weddingReceptions() { return view('services.wedding-receptions'); }
    public function destinationWeddings() { return view('services.destination-weddings'); }

    // Birthdays
    public function kidsParties() { return view('services.kids-parties'); }
    public function teenParties() { return view('services.teen-parties'); }
    public function adultParties() { return view('services.adult-parties'); }

    // Corporate
    public function teamBuilding() { return view('services.team-building'); }
    public function productLaunch() { return view('services.product-launch'); }
    public function conferences() { return view('services.conferences'); }

    // Anniversaries
    public function anniversaryParties() { return view('services.anniversary-parties'); }
    public function anniversaryDinners() { return view('services.anniversary-dinners'); }
    public function surpriseCelebrations() { return view('services.surprise-celebrations'); }

    // Baby Showers
    public function babyShowerParties() { return view('services.baby-shower-parties'); }
    public function giftingEvents() { return view('services.gifting-events'); }
    public function funActivities() { return view('services.fun-activities'); }

    // Festivals
    public function communityFestivals() { return view('services.community-festivals'); }
    public function foodFestivals() { return view('services.food-festivals'); }
    public function musicFestivals() { return view('services.music-festivals'); }
}
