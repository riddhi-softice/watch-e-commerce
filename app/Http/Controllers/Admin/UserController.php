<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Orders;
use DataTables;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('name', function($row){
                    $name = $row->name ?? '';
                    $lastName = $row->last_name ?? '';
                    return trim($name . ' ' . $lastName);
                })
                ->addColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function($row){
                    // $btn = '<a href="'.route('users.edit', $row->id).'" class="btn btn-sm btn-warning">Edit</a> &nbsp;';
                    $btn = '<button data-id="'.$row->id.'" data-toggle="modal" data-target="#confirmDeleteModal" class="btn btn-danger btn-sm deleteData">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action','name'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    public function destroy(User $user)
    {
        $uid = $user->id;
        $user->delete();

        Address::where('user_id',$uid)->delete();
        Orders::where('user_id',$uid)->delete();

        return response()->json(['message' => 'Item deleted successfully'], 200);
    }

    public function get_order_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Orders::with(['product','user'])->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('product_name', function($row){
                    $name = $row->product->name ?? '';
                    return trim($name);
                })

                ->addColumn('user_name', function($row){
                    $name = $row->user->name ?? '';
                    return trim($name);
                })

                ->addColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
                })              

                ->rawColumns(['product_name','user_name'])
                ->make(true);
        }
        return view('admin.users.order_index');
    }

}
