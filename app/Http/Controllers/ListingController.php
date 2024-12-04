<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Get and show all listing sorted by latest.
    public function index(){
        // returns the index.blade.php file and the liting.php modle file.
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Get and show single listing.
    public function show(Listing $listing){
        return view('Listings.show', [
            'listing' => $listing
        ]);
    }

    // Get and show create form.
    public function create(){
        return view('listings.create');
    }

    // Post and store listing data.
    public function store(Request $request){
        
        // Rules for every fields.
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        // Pass it to the Listing Model.
        Listing::create($formFields);
        // Return to the home page with a successful message.
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form.
    public function edit(Listing $listing){
        return  view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data.
    public function update(Request $request, Listing $listing){
        //Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        // Rules for every fields.
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        // Return to the home page with a successful message.
        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing.
    public function destroy(Listing $listing){
        //Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings.
    public function manage(Listing $listing){
        
        return view('listings.manage', ['listings' => auth()->user()->listings]);
    }

    // Like / Unlike
    public function toggleLike(Listing $listing){
        
        // Redirects to login page with a message if the user is not authenticated.
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Please log in to like listings.');
        }
        // Gets the currently authenticated user.
        $user = auth()->user();
        
        // Checks if the user has already liked the listing.
        if ($user->likes()->where('listing_id', $listing->id)->exists()) {
            // Removes the like (unlike).
            $user->likes()->where('listing_id', $listing->id)->delete(); 
        } 
        else {
            // Adds a like to the listing.
            $user->likes()->create(['listing_id' => $listing->id]); // Like
        }
        
        return back();
    }

}
