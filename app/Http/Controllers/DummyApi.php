<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyApi extends Controller
{
    //
    function getData()
    { 
        return[
            "name" => "Hanson", 
            "email" => "whanson@proseritykenya.net", 
            "profession" => "Business Person",
            "address" => "Nairobi"
        ];
    }
}
