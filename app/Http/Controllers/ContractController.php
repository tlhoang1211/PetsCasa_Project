<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function list(Request $request)
    {
//        dd($request);
        $orderBy   = "DESC";
        $contracts      = Contract::query();
        $condition = [];
        if ($request->has('start') && $request->has('end')) {
            array_push($condition, ['created_at', '>=', $request->start]);
            array_push($condition, ['created_at', '<=', $request->end]);
        }
        if ($request->has('Status')) {
            if($request->Status != "All"){
                array_push($condition, ['Status', '=', $request->Status]);
            }
        }
        if ($request->has('keyword')) {
            array_push($condition, ['Name', 'Like', '%' . $request->keyword . '%']);
        }
        if ($request->has('orderBy')) {
            $contracts->orderBy('created_at', $request->orderBy);
        } else {
            $contracts->orderBy('created_at', $orderBy);
        }
        $contracts = $contracts->where($condition)->paginate(5)->appends(request()->query());
        return view('admin.contracts.list', compact('contracts'));
    }

    public function start($id){
        $contract = Contract::find($id);
        if (isset($contract) && $contract != null){
        Contract::where('id','=',$id)->update(['status' => 1]);
        return redirect(route('admin_contract_list'));
         };
        return redirect(route('admin_404'));
    }

    public function end($id){
        $contract = Contract::find($id);
        if (isset($contract) && $contract != null){
            Contract::where('id', '=', $id)->update(['status' => 2]);
            return redirect(route('admin_contract_list'));
         };
        return redirect(route('admin_404'));
    }

    public function detail($id){
        $contract = Contract::find($id);
        if (isset($contract) && $contract != null){
            return view('admin.contracts.detail',compact('contract'));
        };
        return view('admin.404-admin');
    }
}
