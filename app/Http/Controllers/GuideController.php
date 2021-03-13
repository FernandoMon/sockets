<?php

namespace App\Http\Controllers;

use App\Events\GuideCreated;
use App\Models\Guide;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Http;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $guides = Guide::all();
        return view('home', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $countries = Http::get('https://queries.envia.com/country');
        $states = Http::get('http://queries.envia.com/state?country_code=MX');
        $carriers = Http::get('http://queries.envia.com/carrier?country_code=MX');
        $printFormats = Http::get('https://queries.envia.com/carrier-print-option');
        return view('guideForm', compact('countries', 'states', 'carriers', 'printFormats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Http\Client\Response|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $print = explode(",", $request->print);
        $guide_request = [
            "origin" => [
                "name" => $request->originname,
                "company" => $request->origincompany,
                "email" => $request->originemail,
                "phone" => $request->originphone,
                "street" => $request->originstreet,
                "number" => $request->originpostalCode,
                "district" => $request->origindistrict,
                "city" => $request->origincity,
                "state" => $request->originstate,
                "country" => "MX",
                "postalCode" => $request->originpostalCode,
                "reference" => $request->originreference,
            ],
            "destination" => [
                "name" => $request->destinationname,
                "company" => $request->destinationcompany,
                "email" => $request->destinationemail,
                "phone" => $request->destinationphone,
                "street" => $request->destinationstreet,
                "number" => $request->destinationnumber,
                "district" => $request->destinationdistrict,
                "city" => $request->destinationcity,
                "state" => $request->destinationstate,
                "country" => "MX",
                "postalCode" => $request->destinationpostalCode,
                "reference" => $request->destinationreference
            ],
            "packages" => [
                [
                    "content"=> $request->content,
                    "amount"=> (int) $request->amount,
                    "type"=> $request->type,
                    "dimensions" => [
                        "length" =>  (int) $request->lenght,
                        "width" => (int) $request->width,
                        "height" => (int) $request->height
                    ],
                    "weight" => (int) $request->weight,
                    "insurance" => (int) $request->insurance,
                    "declaredValue" => (int) $request->declaredValue,
                    "weightUnit" => $request->weightUnit,
                    "lengthUnit" => $request->lengthUnit
                ]
            ],
            "shipment" => [
                "carrier" => $request->carrier,
                "service" => "express",
                "type" => 1
            ],
            "settings" => [
                "printFormat" => $print[0],
                "printSize" => $print[1],
                "comments" => $request->comments
            ]
        ];

        $response = Http::withToken(env("BARRIER_TOKEN"))
                        ->post('https://api-test.envia.com/ship/generate',$guide_request);
        if ($response->successful()){
            event(new GuideCreated());
        }
        return redirect(route('home'));
    }

}
