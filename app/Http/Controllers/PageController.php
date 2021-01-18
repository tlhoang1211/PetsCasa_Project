<?php

namespace App\Http\Controllers;

use App\News;
use App\Order;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $pets = Pet::all()->take(10);
        $pet_4 = Pet::all()->take(4);
        $newest_report = News::where('Category_id', '=', 1)->latest('updated_at')->take(2)->get();
        return view('user.home', compact('pets', 'pet_4', 'newest_report'));
    }

    public function concessionP(Request $request)
    {
        $request->validate(
            [
                'OrderType' => 'required',
                'FullName' => 'required',
                'PhoneNumber' => 'required',
                'Email' => 'required',
                'IDNo' => 'required',
                'Name' => 'required',
                'Species' => 'required',
                'Age' => 'required',
                'Breed' => 'required',
                'Sex' => 'required',
                'CertifiedPedigree' => 'required',
                'thumbnails' => 'required',
                'Vaccinated' => 'required',
                'Neutered' => 'required',
                'Description' => 'required',
            ]
        );
        DB::transaction(function () use ($request) {
            $pet = new Pet($request->all());
            $slug_begin = generateRandomString(8);
            $Slug = to_slug($slug_begin . ' ' . $pet['Name']);
            $pet['Slug'] = $Slug;
            $pet['Status'] = 0;
            $pet['Thumbnails'] = null;
            foreach ($request->thumbnails as $thumb) {
                $pet['Thumbnails'] .= $thumb . ",";
            }
            $pet['Thumbnails'] = substr($pet['Thumbnails'], 0, -1);
            $pet->save();

            $order = new Order($request->all());
            $order['PetId'] = $pet->id;
            $order['Status'] = 0;
            $order->save();
        });
        return redirect(route('success2'));
    }
}
