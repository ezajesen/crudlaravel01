<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function index(){
    $data = Employee::all();
    return view('datamahasiswa', compact('data') );
   }
   public function tambahmahasiswa(){
    return view('tambahdata');
   }
   public function insertdata(Request $request){

    Employee::create($request->all());
    return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
   }
   public function tampilkandata($id){
    $data = Employee::find($id);
    //dd($data);
    return view('tampildata', compact('data'));
   }
   public function updatedata(Request $request, $id){
    $data = Employee::find($id);
    $data->update($request->all());
    return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Update');
   }
   public function delete($id){
    $data = Employee::find($id);
    $data->delete();
    return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Hapus');
   }
}
