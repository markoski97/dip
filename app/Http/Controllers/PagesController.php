<?php

namespace App\Http\Controllers;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use App\Akcija;

use Session;

class PagesController extends Controller
{
    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(ContactRequest $request){

        $data=array(
          'email'=> $request->email,
            'subject'=> $request->subject,
            'bodymessage'=> $request->message
        );

        Mail::to('petargigant@live.com')->send(new NewContact($request));

        Session::flash('success','Your mail was Sent!');
        return redirect('/contact');
    }

    public function getMain(){

        return view('main');
    }

    public function getHome(){ //semisli na pocetna

        $akcii=Akcija::paginate(4);

        return view('pages.home',compact('akcii'));//ova go zema za akcii panelo so e
    }

    public function getInformacii(){

        return view('pages.informacii');
    }
}
