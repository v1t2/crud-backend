<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function getbuku()
    {
        $dt_buku=buku::get();
        return response()->json($dt_buku);
    }
    public function getid($id)
    {
        $dt_buku=buku::where('id_buku','=',$id)->get();
        return response()->json($dt_mahasiswa);
    }
    public function createbuku(Request $req){
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = Buku::create([
            'judul_buku'=>$req->judul_buku,
            'jenis_buku'=>$req->jenis_buku,
            'pengarang'=>$req->pengarang,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah daftar buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah daftar buku.']);
        }

}
public function updatebuku(Request $req, $id){
    $validate = Validator::make($req->all(),[
        'judul_buku'=>'required',
        'jenis_buku'=>'required',
        'pengarang'=>'required'
    ]);
    if($validate->fails()){
        return response()->json($validate->errors()->toJson());
    }
    $update = buku::where('id_buku',$id)->update([
        'judul_buku'=>$req->get('judul_buku'),
        'jenis_buku'=>$req->get('jenis_buku'),
        'pengarang'=>$req->get('pengarang')
        
    ]);
    if($update){
        return response()->json(['status'=>true,  'message'=>'Berhasil mengubah daftar buku']);
    }else{
        return response()->json(['status'=>false, 'message'=>'Gagal mengubah daftar buku']);
    }
}
public function deletebuku($id){
    $delete = buku::where('id_buku',$id)->delete();
    if($delete){
        return response()->json(['status'=>true, 'message'=>'Sukses menghapus data buku.']);
    }else{
        return response()->json(['status'=>false, 'message'=>'Gagal menghapus data buku.']);
    }
}

}