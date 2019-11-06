<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateProizvodiRequest;
use App\Http\Requests\UpdateProizvodiRequest;
use App\Proizvodi;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
Use Session;
class ProizvodiController extends Controller
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
        $proizvodi=Proizvodi::all();

        return view('proizvodi.index', compact('proizvodi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('proizvodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProizvodiRequest $request)
    {
        $proizvodi=new Proizvodi;

        $proizvodi->title=$request->title;
        $proizvodi->body=$request->body;


        $ImagePath=request('image')->store('Proizvodi.uploads','public');

        $image=Image::make(public_path("storage/{$ImagePath}"))->fit(376,376)->save();

        $proizvodi->image=$image->basename;
        $proizvodi->save();

        Session::flash('success','Uspesno vnesuvajne');
        return redirect()->route('proizvodi.show',$proizvodi->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proizvodi=Proizvodi::find($id);


        return view('proizvodi.show')->with('proizvodi',$proizvodi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proizvodi=Proizvodi::find($id);

        return view('proizvodi.edit',compact('proizvodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProizvodiRequest $request, $id)
    {
        $proizvodi=Proizvodi::find($id);

        $proizvodi->title=$request->input('title');
//        $akcii->image=$request->image;
        $proizvodi->body=$request->input('body');

        if($request->hasFile('image')){
            //todo:: update image

            $ImagePath = request('image')->store('proizvodi.uploads', 'public');

            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(300, 300)->save();

            $proizvodi->image = $image->basename;

        }

        $proizvodi->save();

        Session::flash('success','Uspesno editirajne');

        return redirect()->route('proizvodi.show',$proizvodi->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proizvodi=Proizvodi::find($id);
        $proizvodiroute=( public_path("\storage/proizvodi.uploads/{$proizvodi->image}"));
        unlink($proizvodiroute);

        $proizvodi->delete();

        Session::flash('success','Uspesno brisejne');

        return redirect()->route('proizvodi.index');
    }
}
