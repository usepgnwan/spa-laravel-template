<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected $account;
    public function __construct(Account $account){
        $this->account= $account;
    }

    public function index(Request $request){
        if(!$request->ajax()){
            $url = route('profile');
            return redirect()->route('account',['url' => $url]);
        }
        $title = 'Profile';
        $data = $this->account->first();
        return view('admin.account.index', compact('title','data'))->render();
    }
    public function show(){
        $data = $this->account->first();
        return response()->json(['status' => true, 'data' => $data]);
    }
    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required|max:225',
            'description' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        if ($valid->fails()) {
            // return response()->json(['status' => false, 'msg' => $valid->getMessageBag()->toArray()]);
            return response()->json(['status' => false, 'errors' => $valid->errors()]);
        }
        $imgName = null;

        $check = $this->account->find(1);
        $imgName = $check->image;
        if ($check) {
            if ($request->hasFile('image') && $request->image != '') {
                $image = $request->file('image');
                $allowedfileExtension = ['jpg', 'png', 'jpeg'];
                $extension = $image->getClientOriginalExtension();
                $checkEx = in_array($extension, $allowedfileExtension);
                if ($checkEx) {


                    $path_old = public_path('uploads/image/') . collect(explode('/',$check->image))->last();
                    if (file_exists($path_old) && $check->image != null) {
                        unlink($path_old);
                    }
                    $imgName = $image->hashName();
                    $image->move('uploads/image/', $imgName); 
                    $imgName =asset('uploads/image/'.$imgName); 
                }else{
                    return response()->json(['status' => false, 'errors' => ["image" => ["file not allowed."]]]);
                }
            }
            
            $data = [
                'name' => $request->name,
                'description' => $request->description, 
                'alamat' => $request->alamat,
                'wa' => $request->wa,
                'email' => $request->email,
                'fb' => $request->fb,
                'youtube' => $request->youtube,
                'tiktok' => $request->tiktok,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'image' => $imgName, 
            ];
            $check->fill($data)->save(); 
            return response()->json(['status' => true, 'msg' => 'Update sukses ', 'data' =>  $check,'errors'=>[]], Response::HTTP_OK); 
        }  
    }
} 