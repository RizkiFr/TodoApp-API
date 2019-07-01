<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodoController extends Controller
{
    
    public function getTodo(){
        $data = Todo::all();
        if(count($data) > 0){ 
        $res['status'] = true;
        $res['data'] = $data;
        return response($res);
        }else{
            $res['status'] = false;
            $res['data'] = $data;
            return response($res);
        }    
    }
    public function addTodo(Request $request){
    	$data = new Todo();
    	$data->nama = $request->nama;
        $data->kegiatan = $request->kegiatan;
        $data->waktu_mulai = $request->waktu_mulai;
        $data->waktu_selesai = $request->waktu_selesai;
        $data->save();
    	$this->response['message'] = "berhasil menambah data";
        return response()->json($this->response);
    }

    public function getDetailTodo(Request $request){
        $kegiatan = $request->get('kegiatan');
        $data = Todo::where('kegiatan','=',$kegiatan)
                       ->get();
        if(count($data) > 0){ 
        $res['status'] = true;
        $res['data'] = $data;
        return response($res);
        }else{
            $res['status'] = false;
            $res['data'] = $data;
            return response($res);
        }
    }
}
