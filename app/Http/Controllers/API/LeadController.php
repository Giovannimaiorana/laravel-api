<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{
   public function store(Request $request){

    $data = $request->all();
       $new_lead = new Lead();
       $new_lead->fill($data);
       $new_lead->save();

      Mail::to('giovanni.maiorana.14@gmail.com')->send(new NewContact($new_lead));
   }
}
