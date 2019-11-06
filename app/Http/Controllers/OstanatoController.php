<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOstanatoRequest;
use App\Http\Requests\UpadeteOstanatoRequest;
use App\Ostanato;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;

class OstanatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ostanato=Ostanato::orderBy('id','desc')->paginate(18);

        return view ('ostanato.index',compact('ostanato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ostanato.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOstanatoRequest $request)
    {
        $ostanato=new Ostanato;

        $ostanato->title=$request->title;
        $ostanato->body=$request->body;

        $ImagePath=request('image')->store('ostanato','public');

        $image=Image::make(public_path("storage/{$ImagePath}"))->fit(300,300)->save();

        $ostanato->image=$image->basename;
        $ostanato->save();

        Session::flash('success','Uspesno vnesuvajne');
        return redirect()->route('ostanato.show',$ostanato->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ostanato=Ostanato::find($id);

        return view('ostanato.show')->with('ostanato',$ostanato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ostanato=Ostanato::find($id);

      return view('ostanato.edit',compact('ostanato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpadeteOstanatoRequest $request, $id)
    {
      $ostanato=Ostanato::find($id);

      $ostanato->title=$request->input('title');

      $ostanato->body=$request->input('body');

        if($request->hasFile('image')){
            //todo:: update image

            $ImagePath = request('image')->store('ostanato', 'public');

            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(300, 300)->save();

            $ostanato->image = $image->basename;

        }

        $ostanato->save();


        Session::flash('success','Uspesno editirajne');

        return redirect()->route('ostanato.show',$ostanato->id);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ostanato=Ostanato::find($id);
        $imageroute=( public_path("\storage/ostanato/{$ostanato->image}"));
        unlink($imageroute);

        $ostanato->delete();

        Session::flash('success','Uspesno brisejne');

        return redirect()->route('ostanato.index');
        //
    }
}
