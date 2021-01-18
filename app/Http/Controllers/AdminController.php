<?php

namespace App\Http\Controllers;

use App\Account;
use App\News;
use App\Pet;
use App\Report;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data["pets"]           = Pet::all();
        $data["active_pets"]    = Pet::where("Status", "=", 1)->get();
        $data["deactive_pets"]  = Pet::where("Status", "=", 0)->get();
        $data["adopted_pets"]   = Pet::where("Status", "=", 2)->get();
        $data["active_news"]    = News::where("Status", "=", 1)->get();
        $data["deactive_news"]  = News::where("Status", "=", 0)->get();
        $data["account_number"] = Account::all();
        $data["report"]         = Report::all();
//        dd(count($data["active_pets"]));
        return view('admin.index', compact('data'));
    }
}
