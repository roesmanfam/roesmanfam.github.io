<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function view_user_onadmin(Request $request){
        $users = User::where('role', 'guest')->get();

        return view('admin.home', compact('users'));
    }

    public function add_user(Request $request){
        $rules = [
            'nama' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $user = new User();
        $user->nama = $request->nama;
        $user->save();

        return back()->with('message', 'User has been added!');
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();

        return back()->with('message', 'User has been deleted!');
    }

    public function view_user_detail_onadmin(Request $request){
        $data_transfer = Transfer::where('user_id', $request->id)->orderBy('created_at', 'asc')->get();
        $user = User::find($request->id);

        return view('admin.user_detail', compact('data_transfer', 'user'));
    }

    public function add_transfer(Request $request){
        $rules = [
            'jumlah_transfer' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $transfer = new Transfer();
        $transfer->user_id = $request->user_id;
        $transfer->jumlah_transfer = $request->jumlah_transfer;

        $fix_jumlah_transfer = (int)str_replace('.', '', $request->jumlah_transfer);
        $transfer->jumlah_transfer = $fix_jumlah_transfer;

        // dd($request->jumlah_transfer);

        $user = User::where('id', $request->user_id)->first();

        // dd($user);

        $total_tabungan = $user->total_tabungan;
        $uang_transfer = $request->jumlah_transfer;

        $user->total_tabungan = $user->total_tabungan += $uang_transfer;
        $user->update();

        $transfer->save();

        return back()->with('message', 'Data transfer updated!');
    }

    public function delete_data_transfer($id){
        $transfer = Transfer::find($id);
        $transfer->delete();

        return back()->with('message', 'Data transfer has been deleted');
    }

}
