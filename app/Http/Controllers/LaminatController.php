<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaminatRequest;
use App\Http\Requests\UpdateLaminatRequest;
use App\Laminat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Filters\Laminat\LaminatFilters;
use Session;

class LaminatController extends Controller
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
    public function index(Request $request)
    {
        $laminat=Laminat::orderBy('id','desc')->filter($request)->paginate(3);

        return view('laminat.index',compact('laminat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laminat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLaminatRequest $request)
    {
        $laminat=new Laminat;

        $laminat->title=$request->title;
        $laminat->sistemnagreejne=$request->sistemnagreejne;
        $laminat->debelina=$request->debelina;
        $laminat->klasanaotpornost=$request->klasanaotpornost;
        $laminat->boja=$request->boja;

        $ImagePath=request('image')->store('laminat','public');

        $image=Image::make(public_path("storage/{$ImagePath}"))->fit(300,300)->save();

        $laminat->image=$image->basename;
        $laminat->save();

        Session::flash('success','Uspesno vnesuvajne');
        return redirect()->route('laminat.show',$laminat->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laminat=Laminat::find($id);

        return view('laminat.show',compact('laminat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laminat=Laminat::find($id);

        return view('laminat.edit',compact('laminat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaminatRequest $request, $id)
    {
        $laminat=Laminat::find($id);

        $laminat->title=$request->input('title');
        $laminat->sistemnagreejne=$request->input('sistemnagreejne');
        $laminat->debelina=$request->input('debelina');
        $laminat->klasanaotpornost=$request->input('klasanaotpornost');
        $laminat->boja=$request->input('boja');

        if($request->hasFile('image')){
            //todo:: update image

            $ImagePath = request('image')->store('laminat', 'public');

            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(300, 300)->save();

            $laminat->image = $image->basename;

        }

        $laminat->save();

        Session::flash('success','Uspesno editirajne');

        return redirect()->route('laminat.show',$laminat->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laminat=Laminat::find($id);
        $imageroute=( public_path("\storage/laminat/{$laminat->image}"));
        unlink($imageroute);

        $laminat->delete();



        Session::flash('success','Uspesno brisejne');

        return redirect()->route('laminat.index');
    }
}
