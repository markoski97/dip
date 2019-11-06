<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePdfRequest;
use App\Http\Requests\UpdatePdfRequest;
use App\Pdf;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;
use Session;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('kategorijapdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePdfRequest $request)
    {
        $pdf=new Pdf();
        $pdf->title=$request->title;

        $PdfPath=request('pdf')->store('PDF.uploads','public');

        $pdf->pdf=$PdfPath;

        $pdf->save();

        Session::flash('success','Uspesno vnesuvajne na pdf');
        return redirect()->route('pdf.show',$pdf->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $pdf=Pdf::find($id);
        $link = asset('storage/'.$pdf->pdf);
       return view('kategorijapdf.show',compact('link', 'pdf'));//->with(4'pdf',$pdf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdf=Pdf::find($id);

        return view('kategorijapdf.edit',compact('pdf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePdfRequest $request, $id)
    {
        $pdf = Pdf::find($id);

        $pdf->title = $request->input('title');

        if ($request->hasFile('pdf')) {
            //todo:: update image
            $PdfPath = request('pdf')->store('PDF.uploads', 'public');

            $pdf->pdf = $PdfPath;
        }

        $pdf->save();
        Session::flash('success','Uspesno editirajne');

        return redirect()->route('pdf.show',$pdf->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pdf=Pdf::find($id);

        $pdfroute=( public_path("\storage/{$pdf->pdf}"));
        unlink($pdfroute);

        $pdf->delete();

        Session::flash('success','Uspesno brisejne');

        return redirect()->route('pdf.create');
    }
}
