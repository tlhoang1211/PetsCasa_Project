<?php

namespace App\Http\Controllers;

use App\Account;
use App\Pet;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class PostController extends Controller
{
    public function list(Request $request)
    {

        $current_role = session()->get('current_account')->Role_id;
        $posts        = Post::query();
        $condition    = [];
        if ($request->has('start') && $request->has('end')) {
            array_push($condition, ['created_at', '>', $request->start]);
            array_push($condition, ['created_at', '<=', $request->end]);
        }
        if ($request->has('Status')) {
            if($request->Status != "All"){
                array_push($condition, ['Status', '=', $request->Status]);
            }
        }
        if ($request->has('keyword')) {
            array_push($condition, ['Email', 'Like', '%' . $request->keyword . '%']);
        }
        if ($request->has('orderBy')) {
            $posts->orderBy('created_at', $request->orderBy);
        }
        $posts = $posts->where($condition)->paginate(5)->appends($request->query());
        return view('admin.posts.list', compact('posts'));
    }

    public function create()
    {
        $accounts = Account::where('Status', '=', '1')->get();
        $pets     = Pet::where('Status', '=', '1')->get();
        return view('admin.posts.create', compact('accounts', 'pets'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'Title'      => 'required',
                'Content'    => 'required',
                'Account_id' => 'required',
                'Pet_id'     => 'required',
            ]
        );

        $post = DB::transaction(function () use ($request) {
            $post           = new Post($request->all());
            $post['Status'] = 1;
            $post['Slug']   = to_slug($request->input('Title'));
            $post->save();
            $post['Slug'] = to_slug($post['id'] . ' ' . $request->input('Title'));
            $post->save();
            return $post;
        });

        $post = $post->toArray();
//        dd($post);
        Post::create($post);
        return redirect(route('admin_post_list'));
    }

    public function edit($id)
    {
        $post    = Post::find($id);
        $account = Account::find($post->Account_id);
        $pet     = Pet::find($post->Pet_id);

        $account_list = Account::all();
        $pet_list     = Pet::all();
//        dd($pet);
        if (isset($account) && isset($post) && isset($pet)) {
            return view('admin.posts.edit', compact('account', 'post', 'pet', 'account_list', 'pet_list'));
        }
        return redirect(route('admin_404'));
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        if (isset($post)) {
            $post->Title      = $request->Title;
            $post->Content    = $request->Content;
            $post->Account_id = $request->Account_id;
            $post->Pet_id     = $request->Pet_id;
            $post->Status     = $request->Status;
            $post->update();
//            dd("updateSuccess");
            return redirect(route('admin_post_list'));
        }
        return redirect(route('admin_404'));
    }

    public function detail($id)
    {
        $post    = Post::where('id', '=', $id)->first();
        $account = Account::find($post->Account_id);
        $pet     = Pet::find($post->Pet_id);
        if (isset($post) && $post != null) {
            return view('admin.posts.detail', compact('post', 'account', 'pet'));
        }
        return view('admin.404-admin');
    }

    public function deactive($id, Request $request)
    {
        $post = Post::find($id);
        if (isset($post) && $post != null) {
            Post::where('id', '=', $id)->update(['status' => 0]);
            return redirect(route('admin_post_list'));
        }
        return redirect(route('admin_404'));
    }

    public function deactive_multi(Request $request)
    {
        $ids_array = new Array_();
        $ids       = $request->ids;
        $ids_array = explode(',', $ids);
        if (isset($ids_array) && $ids_array != null) {
            Post::whereIn('id', $ids_array)->update(['status' => 0]);
            return response()->json(['success' => "Post Deactive successfully."]);
        }
        return response()->json(['error' => "Post Deactive unsuccessfully."]);
    }

    public function active(Request $request)
    {
        $id   = $request->id;
        $post = Post::find($id);
        if (isset($post) && $post != null) {
            Post::where('id', '=', $id)->update(['status' => 1]);
            return redirect(route('admin_post_list'));
        }
        return redirect(route('admin_404'));
    }

    public function active_multi(Request $request)
    {
        $ids_array = new Array_();
        $ids       = $request->ids;
        $ids_array = explode(',', $ids);
//        return response()->json(['success'=>$ids_array]);
        if (isset($ids_array) && $ids_array != null) {
            Post::whereIn('id', $ids_array)->update(['status' => 1]);
            return response()->json(['success' => "Post Active successfully."]);
        }
        return response()->json(['error' => "Account Active unsuccessfully."]);
    }
}
