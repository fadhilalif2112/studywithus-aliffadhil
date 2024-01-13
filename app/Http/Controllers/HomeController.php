<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function dashboard(){
        return view('dashboard');
    }

    public function profile(Request $request){
        $data = User::get();

        return view('profile', compact('data'));
    }

    public function profile_update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'nullable'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $foto =$request->file('foto');
        $filename = date('y-m-d').$foto->getClientOriginalName();
        $path = 'foto-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($foto));
        
        $data[('email')] = $request->email;
        $data[('name')] = $request->name;
       
        if ($request->password) {
            $data[('password')] = Hash::make($request->password);
        }

        $data['image'] = $filename;

        User::whereId($id)->update($data);

        return redirect()->route('admin.profile');

    }

    public function pengguna(Request $request){
        
        $data = new User;

        if ($request->get('search')) {
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('pengguna',compact('data','request'));
    }

    public function create(){
        return view('create');
    }

    public function simpan(Request $request){
        $validator = Validator::make($request->all(),[
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $foto =$request->file('foto');
        $filename = date('y-m-d').$foto->getClientOriginalName();
        $path = 'foto-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($foto));

        
        $data[('email')] = $request->email;
        $data[('name')] = $request->name;
        $data[('password')] = Hash::make($request->password);
        $data['image'] = $filename;

        User::create($data);

        return redirect()->route('admin.pengguna');
    }

    public function edit(Request $request, $id){
        $data = User::find($id);

        return view('edit',compact('data'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'nullable'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $foto =$request->file('foto');
        $filename = date('y-m-d').$foto->getClientOriginalName();
        $path = 'foto-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($foto));
        
        $data[('email')] = $request->email;
        $data[('name')] = $request->name;
       
        if ($request->password) {
            $data[('password')] = Hash::make($request->password);
        }

        $data['image'] = $filename;

        User::whereId($id)->update($data);

        return redirect()->route('admin.pengguna');
    }

    public function hapus(Request $request,$id){
        $data = User::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.pengguna');
    }
}
