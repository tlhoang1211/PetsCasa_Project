<?php

namespace App\Http\Controllers;

use App\Account;
use App\Pet;
use App\Timeline;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function account_data()
    {
        $current_account_id = session('current_account')->id;
        $cr_account = Account::where('id', '=', $current_account_id)->where('Status', '=', '1')->first();
        return view('user.account.personal_info')->with('current_account', $cr_account);
    }

    public function account_update(Request $request)
    {
        $account = Account::where('Slug', '=', $request->Slug)->first();
        if (isset($account) && $account != null) {
            $account->FullName = $request->FullName;
            $account->Address = $request->Address;
            $account->Email = $request->Email;
            $account->Avatar = $request->avatar;
            $account->DateOfBirth = Carbon::createFromFormat('d/m/Y', $request->DateOfBirth)->format('Y-m-d');
            $account->PhoneNumber = $request->PhoneNumber;
            $account->IDNo = $request->IDNo;
            $account->update();
//            dd($account->Avatar);
            $current_account_id = session('current_account')->id;
            $current_account = Account::where('id', '=', $current_account_id)->where('Status', '=', '1')->first();
            return view('user.account.personal_info', compact('current_account'))->with('success', 'success');
        }
        $current_account_id = session('current_account')->id;
        $current_account = Account::where('id', '=', $current_account_id)->where('Status', '=', '1')->first();
        return view('user.account.personal_info', compact('current_account'))->with('error', 'error');
    }

    public function change_password($Slug)
    {
        $account = Account::where('Slug', '=', $Slug)->get()->first();
        if (isset($account) && $account != null) {
            return view('user.account.change_password', compact('account'));
        }
        return view('user.sub_pages.error');
    }

    public function change_passwordP(Request $request)
    {
        $account = Account::where('Slug', '=', $request->Slug)->first();
        $pass = md5($request->OldPass . $account->Salt);
        if ($pass == $account->PasswordHash) {
            if ($request->NewPass == $request->NewPassCheck) {
                $account->Salt = generateRandomString(5);
                $account->PasswordHash = md5($request->NewPass . $account->Salt);
                $account->update();
                $current_account_id = session('current_account')->id;
                $account = Account::where('id', '=', $current_account_id)->where('Status', '=', '1')->first();
                return view('user.account.change_password', compact('account'))->with('success', 'Thay đổi thành công');
            }
            return view('user.account.change_password')->with('toast_error2', 'Mật khẩu mới nhập lại không trùng!')->with('account', session()->get('current_account'));
        }
        $current_account_id = session('current_account')->id;
        $account = Account::where('id', '=', $current_account_id)->where('Status', '=', '1')->first();
        return view('user.account.change_password', compact('account'))->with('toast_error1', 'Mật khẩu cũ sai!');
    }

    public function update_timeline($Slug)
    {
        $account = Account::where('Slug', '=', $Slug)->get()->first();
        $cr_account_id = Account::where('id', '=', session('current_account')->id)->where('Status', '=', '1')->first()->id;
        $pets = Pet::where('AccountID', '=', $cr_account_id)->get();
        if (isset($account) && $account != null) {
            return view('user.account.timeline', compact('account', 'pets'));
        }
        return view('user.sub_pages.error');
    }

    public function update_timelineP($Slug, Request $request)
    {
        $request->validate([
            'PetID' => 'required',
            'Content' => 'required',
            'Date' => 'required',
            'thumbnails' => 'required',
        ]);
        $account = Account::where('Slug', '=', $Slug)->get()->first();
        if (isset($account) && $account != null) {
            $timeline_info = new Timeline();
            $timeline_info->PetID = $request->PetID;
            $timeline_info->Content = $request->Content;
            $timeline_info->Date = Carbon::createFromFormat('d/m/Y', $request->Date)->format('Y-m-d');
            $timeline_info->Image = $request->thumbnails;
            $timeline_info->save();
            $cr_account_id = Account::where('id', '=', session('current_account')->id)->where('Status', '=', '1')->first()->id;
            $pets = Pet::where('AccountID', '=', $cr_account_id)->get();
            return view('user.account.timeline', compact('account', 'pets'))->with('success', 'success');
        }
        return view('user.sub_pages.error');
    }
}
