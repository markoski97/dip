<?php

namespace App\Http\Controllers;

use App\Akcija;
use App\Http\Requests\CreateAkciiRequest;
use App\Http\Requests\UpdateAkciiRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;

class AkciiController extends Controller
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
        $akcii=Akcija::orderBy('id','desc')->paginate(18);

        return view('akcii.index', compact('akcii'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('akcii.create');
    }


    public function store(CreateAkciiRequest $request)
    {

        $akcii=new Akcija;
        $akcii->title=$request->title;
//        $akcii->image=$request->image;
        $akcii->body=$request->body;
        $akcii->slug=$request->slug;
        $akcii->price=$request->price;

        $ImagePath=request('image')->store('uploads','public');

        $image=Image::make(public_path("storage/{$ImagePath}"))->fit(300,300)->save();

        $akcii->image=$image->basename; 
        $akcii->save();

        Session::flash('success','Uspesno vnesuvajne');
        return redirect()->route('akcii.show',$akcii->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akcii=Akcija::find($id);


        return view('akcii.show')->with('akcii',$akcii);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akcii=Akcija::find($id);

        return view('akcii.edit',compact('akcii'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAkciiRequest $request, $id)
    {
        $akcii=Akcija::find($id);

        $akcii->title=$request->input('title');
//        $akcii->image=$request->image;
        $akcii->body=$request->input('body');
        $akcii->slug=$request->input('slug');
        $akcii->price=$request->input('price');

        if($request->hasFile('image')){
            //todo:: update image

            $ImagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(300, 300)->save();

            $akcii->image = $image->basename;

        }

        $akcii->save();
        /*
        if(request('image')) {

            $ImagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(300, 300)->save();

            $akcii->image = $image->basename;
        }
        $akcii->update(array_merge(
            $akcii,
                ['image'=> $ImagePath ]
            )
        );
        */

        Session::flash('success','Uspesno editirajne');

        return redirect()->route('akcii.show',$akcii->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $akcii=Akcija::find($id);
        $imageroute=( public_path("\storage/uploads/{$akcii->image}"));
        unlink($imageroute);

       $akcii->delete();



        Session::flash('success','Uspesno brisejne');

        return redirect()->route('proizvodi.index');
    }
}
