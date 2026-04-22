<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()

{

$photos = Photo::all();

return view('upload', compact('photos'));

}

public function storeSingle(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $file = $request->file('image');
    
    $exists = Photo::where('image', 'LIKE', '%' . $file->getClientOriginalName())->first();

    if ($exists) {
        return back()->with('error', 'This beautiful memory is already in your gallery! 🎀');
    }

    $name = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('images'), $name);

    Photo::create(['image' => $name]);

    return back()->with('success', 'Single image uploaded successfully! ✨');
}

public function storeMultiple(Request $request)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $files = $request->file('images');
    $skippedCount = 0;
    $addedCount = 0;

    foreach ($files as $file) {
        $originalName = $file->getClientOriginalName();
        
       
        $exists = Photo::where('image', 'LIKE', '%' . $originalName)->first();

        if ($exists) {
            $skippedCount++;
            continue; 
        }

        $name = time().'_'.$originalName;
        $file->move(public_path('images'), $name);
        Photo::create(['image' => $name]);
        $addedCount++;
    }

    if ($addedCount == 0) {
        return back()->with('error', 'All selected photos were already in the gallery! 🌸');
    }

    return back()->with('success', "Added $addedCount new memories! (Skipped $skippedCount duplicates)");
}




    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        // Delete the image file from storage
        if (file_exists(public_path('images/' . $photo->image))) {
            unlink(public_path('images/' . $photo->image));
        }
        
        // Delete the record from database
        $photo->delete();
        
        return back()->with('success', 'Image deleted successfully!');
    }
}
