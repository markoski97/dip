<?php

namespace App\Http\Controllers;

use App\Galerija;
use App\Http\Requests\CreateGalerijaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;
use Illuminate\Support\Facades\File;
class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerija = Galerija::all();
        return view('galerija.index', compact('galerija'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galerija.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalerijaRequest $request)
    {
        $galerija = new Galerija;
        $galerija->title = $request->title;

        $ImagePathtumb = request('image')->store('GaleryuploadTumb', 'public');


        $imagetumb = Image::make(public_path("storage/{$ImagePathtumb}"))->save();




        $ImagePath = request('image')->store('Galeryuploads', 'public');

        $image = Image::make(public_path("storage/{$ImagePath}"))->fit(500, 300)->save();

        $galerija->image = $image->basename;
        $galerija->tumbimage = $image->basename;
        $galerija->save();

        Session::flash('success', 'Uspesno vnesuvajne');
        return redirect()->route('galerija.index');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galerija = Galerija::find($id);

        return view("galerija.show")->with('galerija', $galerija);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galerija = Galerija::find($id);
        $imageroute=( public_path("\storage/Galeryuploads/{$galerija->image}"));
        $imageroutetumb=( public_path("\storage/GaleryuploadTumb/{$galerija->image}"));
        unlink($imageroute);
        unlink($imageroutetumb);

        $galerija->delete();
        Session::flash('success', 'Uspesno brisejne');

        return redirect()->route('galerija.index');
    }

}