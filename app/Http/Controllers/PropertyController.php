<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('/dashboard', compact('properties'));
    }

    public function filter(Request $request)
    {
        $query = Property::query();

        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->filled('min_sq_ft') && $request->filled('max_sq_ft')) {
            $minSqFt = (int) $request->input('min_sq_ft');
            $maxSqFt = (int) $request->input('max_sq_ft');
            
            // Ensure maxSqFt is greater than minSqFt before applying the filter
            if ($maxSqFt >= $minSqFt) {
                $query->whereBetween('square_feet', [$minSqFt, $maxSqFt]);
            }
            
        }

        // if ($request->filled('area')) {
        //     $query->where('area', 'like', '%' . $request->area . '%');
        // }

        $properties = $query->get();

        return view('/dashboard', compact('properties'));
    }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'address' => 'required|string|max:255',
            'price' => 'required|numeric',
            'square_feet' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public');
        }

        // Create a new property
        $property = new Property();
        $property->address = $request->address;
        $property->price = $request->price;
        $property->square_feet = $request->square_feet;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->photo = $photoPath ?? null;
        $property->agent_id = Auth::id(); // Set the agent ID to the authenticated user's ID
        $property->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Property added successfully!')->with('alert-type', 'success');
    }

    public function __construct()
    {
        $this->middleware('auth'); // Ensure this is in the constructor
    }

    public function history()
    {
        // Fetch properties added by the authenticated agent
        $agentId = auth()->user()->id;
        $properties = Property::where('agent_id', $agentId)->orderBy('created_at', 'desc')->get();

        return view('agent.properties.history', compact('properties'));
    }


}
