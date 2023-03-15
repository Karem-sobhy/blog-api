<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;

class offersController extends Controller
{
    function showOffers(){
        $offers = offer::get();
        return response()->json(["Special_offers"=>$offers]);
    }
    function createOffer(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'original_price' => 'numeric|required',
            'discount' => 'numeric|required',
            'Days' => 'numeric|required',
            'Persons' => 'numeric|required',
            'reviews' => 'numeric|required',
            'HotelStars' => 'numeric|required',
        ]);
        offer::create([
            'title' => $request->title,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'Days' => $request->Days,
            'Persons' => $request->Persons,
            'reviews' => $request->reviews,
            'HotelStars' => $request->HotelStars,
        ]);
        return response()->json(['message' => 'Offer is added']);
    }
    function updateOffer(Request $request , offer $offer){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'original_price' => 'numeric|required',
            'discount' => 'numeric|required',
            'Days' => 'numeric|required',
            'Persons' => 'numeric|required',
            'reviews' => 'numeric|required',
        ]);
        $offer->update([
            'title' => $request->title,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'Days' => $request->Days,
            'Persons' => $request->Persons,
            'reviews' => $request->reviews,
            'HotelStars' => $request->HotelStars,
        ]);
        return response()->json(['message' => 'Offer is updated'], 200);
    }
    function deleteOffer(offer $offer){
        if($offer){
            $offer->delete();
            return response()->json(['message' => 'Offer is Deleted'], 200);
        }else{
            return response()->json(['message' => 'Offer Not Found'], 404);
        }
    }
}
