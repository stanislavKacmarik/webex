<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::query()->where('saved', true)->orderBy('id', 'DESC')->get();
        return response()->json($images->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs('images', $request->file('image'), $name);
        $image = Image::query()->create([
            'name' => $name,
            'path' => $path,
        ]);
        return response()->json($image->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $image->saved = true;
        $image->description = $request->get('description', '');
        $image->update();
        return response()->json($image->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Storage::disk('public')->delete('images/' .$image->name);
        $image->delete();
        return response()->json(['message' => 'success']);
    }
}
