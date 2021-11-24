<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('guests.home');
    }
    public function createContactForm(){
        return view('guests.contact');
    }

    public function contactFormHandler(Request $request){
        $data = $request->all();
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
   /*      $newSendMail = new SendNewMail($lead);
        $newSendMail->setLead($newLead); */

        Mail::to('nastroivan3@gmail.com')->send(new SendNewMail($newLead));

        return redirect()->route('guests.thanks')->with("lead", $newLead->name);
    }

    public function contanctFormThanker(){
        return view('guests.thx');
    }

}
