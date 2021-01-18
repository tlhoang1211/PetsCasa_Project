<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Order;
use App\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function list(Request $request)
    {
//        dd($request);
        $current_role = session()->get('current_account')->Role_id;
        $orders       = Order::query();
        $condition    = [];
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
            $orders->orderBy('created_at', $request->orderBy);
        } else {
            $orders->orderBy('created_at', "DESC");
        }
        $orders = $orders->where($condition)->paginate(5)->appends($request->query());
//        dd($orders);
        return view('admin.orders.list', compact('orders'));
    }

    public function create()
    {
        $pets = Pet::where('Status', '=', '1')->paginate(5);
        return view('admin.orders.create', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'OrderType'   => 'required',
            'FullName'    => 'required',
            'PhoneNumber' => 'required',
            'Email'       => 'required',
            'PetId'       => 'required',
            'IDNo'        => 'required',
        ]);
        $order           = $request->all();
        $order['Status'] = 0;
        Order::create($order);
        return redirect(route('admin_order_list'));
    }

    public function edit($id, Request $request)
    {
        $order_cur = Order::find($id);
        if (isset($order_cur) && $order_cur != null) {
            $order = Order::where('id', '=', $id)->first();
            $pet   = Pet::find($order->PetId);
            return view('admin.orders.edit', compact('order', 'pet'));
        }
        return redirect(route('admin_404'));
    }

    public function acept($id)
    {
        $order_cur = Order::find($id);
        if (isset($order_cur) && $order_cur != null) {
            DB::transaction(function () use ($order_cur, $id) {
                $order_cur->Status = 2;
                $order_cur->update();
                $pet = Pet::find($order_cur->PetId);
                if ($order_cur->OrderType == "Gửi nuôi") {
                    $pet->Status = 0;
                } else {
                    $pet->Status = 2;
                    $pet->AccountID = session('current_account')->id;
                }
                $pet->update();
                $declineOrders = Order::where('id', '!=', $id)->where('PetId', $pet->id)->where('Status', '!=', 1)->get();
                foreach ($declineOrders as $order) {
                    $order->Status = 1;
                    $order->update();
                    $pet  = Pet::find($order->id);
                    $data = array('order' => $order, 'pet' => $pet);
                    Mail::send('user.contact.decline_mail', $data, function ($message) use ($order) {
                        $message->to("$order->Email", "$order->FullName")->subject("Thông báo về đơn xin nhận nuôi");
                        $message->from("petcasa@gmail.com", "Pet Casa");
                    });
                }
                $pet  = Pet::find($order_cur->PetId);
                $data = array('order' => $order_cur, 'pet' => $pet);
                Mail::send('user.contact.acept_mail', $data, function ($message) use ($order_cur) {
                    $message->to("$order_cur->Email", "$order_cur->FullName")->subject("Thông báo về đơn xin nhận nuôi");
                    $message->from("petcasa@gmail.com", "Pet Casa");
                });

                $contract                    = new Contract();
                $contract->Order_id          = $order_cur->id;
                $contract->Content           = "Xác nhận hợp đồng của : $order_cur->FullName nhận nuôi $pet->Name ! Yêu cầu $order_cur->FullName phải chụp ảnh đăng thông tin gửi lên page !";
                $contract->ContractDateStart = Carbon::now()->addDays(7)->toDateString();
                $contract->ContractDateEnd   = Carbon::now()->addDays(372)->toDateString();
                $contract->Status            = 0;
                $contract->save();
            });
            return redirect(route('admin_order_list'));
        }
        return redirect(route('admin_404'));
    }

    public function decline($id)
    {
        $order_cur = Order::find($id);
        if (isset($order_cur) && $order_cur != null) {
            Order::where('id', '=', $id)->update(['Status' => 1]);
            return redirect(route('admin_order_list'));
        }
        return redirect(route('admin_404'));
    }

    public function form_send(Request $request, $Slug)
    {
        $request->validate([
            'FullName'    => 'required',
            'PhoneNumber' => 'required',
            'Email'       => 'required',
            'IDNo'        => 'required',
        ]);

        $order                = $request->all();
        $order['OrderType']   = $request->OrderType;
        $order['FullName']    = $request->FullName;
        $order['PhoneNumber'] = $request->PhoneNumber;
        $order['Email']       = $request->Email;
        $order['IDNo']        = $request->IDNo;
        $order['Status']      = 0;
        $pet                  = Pet::where('Slug', '=', $Slug)->first();
        $order['PetId']       = $pet->id;

        $order_petid = Order::where('PetId', '=', $pet->id)->first();
        if ($order_petid == null) {
            Order::create($order);
        }
//        else //alert cho user pet da co nguoi nhan nuoi hoac gi do
        return redirect(route('success2'));
    }
}
