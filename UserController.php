<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\DatatblExport;
use Excel;


class UserController extends Controller
{
    //
    public function Showusers()
    {
        $users = User::orderBy("id",'DESC')->get();
        return view("users",compact('users'));

    }

    public function ShowajaxData(Request $request)
    {
        
        $input = $request->all();
       // echo $input['id'];
        $term = $input['stxt'];
       // ->where('name','LIKE','%'.$term.'%')

       // print_r($input);die;
        //$usersinfo = User::where("id",3)->get();
        //$usersinfo = User::where("id", "=", 104)->get();
        $usersinfo = User::where('name','LIKE','%'.$term.'%')->get();
// echo "Hello";
       //print_r($usersinfo);die;
        return view("subusers",compact('usersinfo'));
    }

    public function ExportajaxData(Request $request)
    {
        
        
       
            $items = User::all();
            Excel::create('items', function($excel) use($items) {
            $excel->sheet('ExportFile', function($sheet) use($items) {
            $sheet->fromArray($items);
            });
            })->export('xls');
        
        
        
    //     $input = $request->all();
    //     //print_r($input['seldata']);die;
    //     $usersinfo = User::whereIn('id', $input['seldata'])->get();

    //     // return Excel::download(new DatatblExport($input['seldata']), 'datatbl.xlsx');

    //     return Excel::download(new DatatblExport, 'datatbl.xlsx');
        



    //    $this->ExportData($input['seldata']);
        // echo "<pre>";
        // print_r($usersinfo);
        // die;
    }


    public function ExportData($arr) 
    {
        //return Excel::download(new DatatblExport('12'), 'datatbl.xlsx');
        // print_r($arr);die;
        // $arr = array(1,2,3);
        return Excel::download(new DatatblExport($arr), 'datatbl.xlsx');

       
        //return Excel::download((new PayrollHelper)->forMonth($month_start)->forDepartment($department), $file_name, null, [\Maatwebsite\Excel\Excel::XLSX]);

    }
}
