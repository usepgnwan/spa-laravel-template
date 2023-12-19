<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Packet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PacketController extends Controller
{
    protected $packet;
    public function __construct(Packet $packet){
        $this->packet= $packet;
    }
    public function index(Request $request, $opt=''){
        if(!$request->ajax()){
            $url = route('paket');
            return redirect()->route('account',['url' => $url]);
        }

        if ($request->ajax() && $opt == 'data') {
            $data = $this->packet->get();
            
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn =  ''; 
                        $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm edit-data" title="edit"  data-id="' . $row->id . '"><span class="ri-edit-box-fill"></span></a> ';
                        $btn .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm delete-data" title="delete"  data-id="' . $row->id . '"><span class="ri-delete-bin-5-line"></span></a>'; 
                        return $btn;
                    })
                    ->addColumn('detail', function ($row) {
                        $text ='';
                        if(count($row->category)>0){
                            foreach($row->category as $v){
                                $text .= '<span class="badge bg-success"> ' . $v['description'] .' ( ' . ($v['asset']->description ?? '') . ' Jumlah '. $v['jumlah']  .' )</span> &nbsp;';
                            }
                        } 

                        return $text;
                    })
                    ->addColumn('harga', function ($row) {
                        return "Rp. " . number_format($row->harga, '2',',','.');
                    })
                    ->addColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('d M y H:i:s');
                    })
                    ->rawColumns(['created_at', 'detail', 'harga', 'action' ])
                    ->make(true);
        }
        $title = 'Paket';
        return view('admin.paket.index', compact('title'))->render();
    }

    public function show(Request $request, $id=""){
        $data = [];
        $categories = Category::with(['asset' => function ($query) {
            $query->select('id', 'description','jumlah');
        }])->get(); 
        if($id != "add"){
            $data = $this->packet->find($id); 

        }
        return view('admin.paket.form', compact('data','categories'))->render();
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'description' => 'required|max:225',
            'harga' => 'required|integer',
            'kategori' => 'required',
        ]); 
        if ($valid->fails()) {
            return response()->json(['status' => false, 'errors' => $valid->errors()]);
        }
        $res = ['status' => false,'msg'=>'errors', 'errors' => []];
        if($request->id =='add'){
            $categories  = $request->kategori;
            $stores = new Packet();
            $stores->description = $request->description;
            $stores->harga = $request->harga;
            $stores->save();
            $stores->category()->attach($categories);
            
            $res = ['status' => true,'msg'=>'Success add data', 'errors' => []];
        }else{ 
            
            $categories  = $request->kategori;
            $check = $this->packet->find($request->id);
            $data = ['description' => $request->description, 'harga' => $request->harga ]; 
            $check->fill($data)->save(); 
            $check->category()->sync($categories);
            $res = ['status' => true,'msg'=>'Success edit data', 'errors' => []];
        }
        
        return response()->json($res);
    }
    
    public function destroy($id)
    {
        $destroy = $this->packet->find($id);
        $destroy->category()->detach(); 
        $destroy->delete();
        $res = ['status' => true,'msg'=>'Success delete data', 'errors' => []];
        return response()->json($res);
    }
}
