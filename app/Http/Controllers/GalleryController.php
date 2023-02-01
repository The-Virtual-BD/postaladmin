<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:gallery', ['only' => ['index','create','store','edit','update','destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Gallery::query())->addIndexColumn()->make(true);
        }
        return view('galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        // return $request;
        $media = new Gallery;

        $media->type = $request->type;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'), $image_name);

            $image_path = "/images/" . $image_name;
            $media->photo = $image_path;
        }
        if ($request->vlink) {
            $media->vlink = $request->vlink;
        }
        $media->short_description = $request->description;
        $media->save();


        return view('galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $galary
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $galary = Gallery::find($request->id);
        return view('galleries.show', compact('galary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $galary
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $galary = Gallery::find($request->id);
        return view('galleries.edit', compact('galary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery  $galary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, $id)
    {

        $galary = Gallery::find($id);
        $galary->type = $request->type;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'), $image_name);

            $image_path = "/images/" . $image_name;
            $galary->photo = $image_path;
        }
        if ($request->vlink) {
            $galary->vlink = $request->vlink;
        }
        $galary->short_description = $request->description;
        $galary->save();


        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $galary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $galary = Gallery::find($request->id);

        $delete = $galary->delete();
        if ($delete) {
            return response()->json(['status' => 'success', 'message' => 'Media deleted successfully']);
            # code...
        }
        return response()->json(['status' => 'error', 'message' => 'Media Could not delete']);
    }
}
