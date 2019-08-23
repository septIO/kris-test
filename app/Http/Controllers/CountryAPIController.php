<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
 
class CountryAPIController extends Controller
{
    public function index()
    {
        return new CountryCollection(Country::paginate());
    }
 
    public function show(Country $country)
    {
        return new CountryResource($country->load(['users']));
    }

    public function store(Request $request)
    {
        return new CountryResource(Country::create($request->all()));
    }

    public function update(Request $request, Country $country)
    {
        $country->update($request->all());

        return new CountryResource($country);
    }

    public function destroy(Request $request, Country $country)
    {
        $country->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}