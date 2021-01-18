<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Array_;

class AccountController extends Controller
{
    public function registerP(RegisterRequest $request)
    {
        DB::transaction(function () use ($request) {
            $account = $request->all();
            $Salt = generateRandomString(5);
            $account['Salt'] = $Salt;
            $password = $account['Password'];
            $PasswordHash = md5($password . $Salt);
            $account['PasswordHash'] = $PasswordHash;
            $slug_begin = generateRandomString(8);
            $Slug = to_slug($slug_begin . ' ' . $account['FullName']);
            $account['Slug'] = $Slug;
            $account['Status'] = 1;
            if ($request->has('Avatar')) {
                $account['Avatar'] = $request->avatar;
            }
            if ($request->has('Role_id')) {
                $account['Role_id'] = $request->Role_id;
            } else {
                $account['Role_id'] = 3;
            }
            Account::create($account);
            $content = "Cảm ơn đã xử dụng dịch vụ của chúng tôi ! :3 Mãi yêu :3 !";
            $data = array('name' => "$request->FullName", 'contact_message' => "$content", 'transaction' => 'as');
            Mail::send('user.contact.email', $data, function ($message) use ($request) {
                $message->to("$request->Email", "$request->FullName")->subject('Tạo mới tài khoản thành công');
                $message->from("petscasavn@gmail.com", "PetsCasa");
            });
            $contentTele = "\n + Tài khoản mới được tạo : $request->Email " . "\n + Họ và tên : $request->FullName " . "\n + Số điện thoại : $request->PhoneNumber" . "\n + Số nhận diện : $request->IDNo";
            $contentTeleSend = urlencode("Yêu cầu mới \n- Từ: Petcasa \n- Tiêu đề: Tạo mới tài khoản \n- Nội dung: " . $contentTele);
//            dd($contentTeleSend);
            $roomId = -1001421358819;
            $bot_token = "bot1325493252:AAHl6t46WUA-xB2Q6VeqC8CPb-vRmqcy4DI";
//            $url = "https://api.telegram.org/bot1325493252:AAHl6t46WUA-xB2Q6VeqC8CPb-vRmqcy4DI/sendMessage?chat_id=-1001421358819&text='Xin Chào'";
            $url = "https://api.telegram.org/$bot_token/sendMessage?chat_id=$roomId&text=$contentTeleSend";
            $urldone = file_get_contents($url);
            return view('user.account.login_register');
        });
        return view('user.account.login_register')->with('success', 'success');
    }

    public function loginP(Request $request)
    {
        $condition = ['Email' => $request->EmailLogin, 'Status' => "1",];
        $account = Account::where($condition)->where('Role_id', '=', 1)->get()->first();
        if (isset($account)) {
            $PasswordHash = $account->PasswordHash;
            $Salt = $account->Salt;
            $passIn = md5($request->PasswordLogin . $Salt);
            if ($PasswordHash == $passIn) {
                session_start();
                $account_session = $request->session();
                $account['role'] = $account->role->name;
                $account_session->put('current_account', $account);
                return redirect('/admin');
            }
            return view('user.account.login_register')->with('toast_error2', 'Mật khẩu không đúng!');
        } else {
            return view('user.account.login_register')->with('toast_error1', 'Email không tồn tại!');
        }
    }

    public function admin_loginP(Request $request)
    {
        $condition = ['Email' => $request->EmailLogin, 'Status' => "1"];
        $account = Account::where($condition)->where('Role_id', '>', 1)->get()->first();
//        dd($request);
        if (isset($account)) {
            $PasswordHash = $account->PasswordHash;
            $Salt = $account->Salt;
            $passIn = md5($request->PasswordLogin . $Salt);
            if ($PasswordHash == $passIn) {
                session_start();
                $account_session = $request->session();
                $account['role'] = $account->role->name;
                $account_session->put('current_account', $account);
                return redirect('/admin');
            }
            return redirect(route('admin-login'))->withErrors(['password' => 'Mật khẩu không đúng!']);
        } else {
            return redirect(route('admin-login'))->withErrors(['password' => 'Mật khẩu không đúng!']);
        }
    }

    public function list(Request $request)
    {
//        dd($request);
        $current_role = session()->get('current_account')->Role_id;
        $accounts = Account::query();
        $condition = [['id', '!=', session()->get('current_account')->id], ['Role_id', '<', $current_role]];
        if ($request->has('start') && $request->has('end')) {
            array_push($condition, ['created_at', '>', $request->start]);
            array_push($condition, ['created_at', '<=', $request->end]);
        }
        if ($request->has('Status')) {
            if ($request->Status != "All") {
                array_push($condition, ['Status', '=', $request->Status]);
            }
        }
        if ($request->has('keyword')) {
            array_push($condition, ['Email', 'Like', '%' . $request->keyword . '%']);
        }
        if ($request->has('orderBy')) {
            $accounts->orderBy('created_at', $request->orderBy);
        }
        $accounts = $accounts->where($condition)->paginate(5)->appends($request->query());
//        dd($accounts);
        return view('admin.accounts.account_list', compact('accounts'));
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

    public function store(RegisterRequest $request)
    {
//        dd($request);
        $account = $request->all();
        $Salt = generateRandomString(5);
        $account['Salt'] = $Salt;
        $password = $account['Password'];
        $PasswordHash = md5($password . $Salt);
        $account['PasswordHash'] = $PasswordHash;
        $slug_begin = generateRandomString(8);
        $Slug = to_slug($slug_begin . ' ' . $account['FullName']);
        $account['Slug'] = $Slug;
        $account['Status'] = 1;
        if ($request->has('Avatar')) {
            $account['Avatar'] = $request->avatar;
        }
        if ($request->has('Role_id')) {
            $account['Role_id'] = $request->Role_id;
        } else {
            $account['Role_id'] = 3;
        }
        Account::create($account);
        return redirect(route('admin_account_list'));
    }

    public function edit($slug)
    {
        $account_cur = session()->get('current_account');
        $account = Account::where('Slug', '=', $slug)->where('id', '!=', $account_cur->id)->first();
        if (isset($account) && $account != null) {
            return view('admin.accounts.edit', compact('account'));
        }
        return view('admin.404-admin');
    }

    public function detail($slug)
    {
        $account_cur = session()->get('current_account');
        $account = Account::where('Slug', '=', $slug)->where('id', '!=', $account_cur->id)->first();
        if (isset($account) && $account != null) {
            return view('admin.accounts.detail_account', compact('account'));
        }
        return view('admin.404-admin');
    }

    public function update(UpdateAccountRequest $request, $slug)
    {
        $account = Account::where('Slug', '=', $slug)->first();
        if (isset($account) && $account != null) {
            $account->FullName = $request->FullName;
            $account->Address = $request->Address;
            $account->Email = $request->Email;
            $account->Avatar = $request->avatar;
            $account->DateOfBirth = $request->DateOfBirth;
            $account->PhoneNumber = $request->PhoneNumber;
            $account->IDNo = $request->IDNo;
            $account->Role_id = $request->Role_id;
            $account->update();
            return redirect(route('admin_account_list'));
        }
        return redirect(route('admin_404'));
    }

    public function deactive($id)
    {
        $account = Account::find($id);
        if (isset($account) && $account != null) {
            Account::where('id', '=', $id)->update(['status' => 0]);
            return redirect(route('admin_account_list'));
        }
        return redirect(route('admin_404'));
    }


    public function deactive_multi(Request $request)
    {
        $ids_array = new Array_();
        $ids = $request->ids;
        $ids_array = explode(',', $ids);
        if (isset($ids_array) && $ids_array != null) {
            Account::whereIn('id', $ids_array)->update(['status' => 0]);
            return response()->json(['success' => "Account Deactive successfully."]);
        }
        return response()->json(['error' => "Account Deactive unsuccessfully."]);
    }

    public function active(Request $request)
    {
        $id = $request->id;
        $account = Account::find($id);
        if (isset($account) && $account != null) {
            Account::where('id', '=', $id)->update(['status' => 1]);
            return redirect(route('admin_account_list'));
        }
        return redirect(route('admin_404'));
    }

    public function active_multi(Request $request)
    {
        $ids_array = new Array_();
        $ids = $request->ids;
        $ids_array = explode(',', $ids);
//        return response()->json(['success'=>$ids_array]);
        if (isset($ids_array) && $ids_array != null) {
            Account::whereIn('id', $ids_array)->update(['status' => 1]);
            return response()->json(['success' => "Account Active successfully."]);
        }
        return response()->json(['error' => "Account Active unsuccessfully."]);
    }

    public function change_password($slug)
    {
        $account = Account::where('Slug', '=', $slug)->get()->first();
        if (isset($account) && $account != null) {
            return view('admin.accounts.change_pass', compact('account'));
        }
//        dd($account);
        return view('admin.404-admin');
    }

    public function change_passwordP(Request $request)
    {
        $request->validate(['newPassword' => 'required'], ['newPassword.required' => 'Vui lòng nhập mật khẩu mới']);
        $account = Account::where('Slug', '=', $request->Slug)->first();
//        dd($account);
        if (isset($account) && $account != null) {
            $account->Salt = generateRandomString(5);
            $account->PasswordHash = md5($request->newPassword . $account->Salt);
//        dd($account);
            $account->update();
            return redirect(route('admin_account_list'));
        }
//        dd($account);
        return view('admin.404-admin');
    }

    public function user_changPassword(Request $request)
    {
        $request->validate();
    }

    public function logOut()
    {
        Session::forget('current_account');
        return redirect('/');
    }
}
