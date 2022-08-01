<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\DatatblExport;
use App\Exports\Datatbl2Export;
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
        $term = $input['stxt'];
     
        $usersinfo = User::where('name','LIKE','%'.$term.'%')->get();

        return view("subusers",compact('usersinfo'));
    }

    public function ExportajaxData(Request $request)
    {
        
        $input = $request->all();
        if(!empty($input['seldata']))
        {            
           // $usersinfo = User::whereIn('id', $input['seldata'])->get();
            return Excel::download(new DatatblExport($input['seldata']), 'datatbl.xlsx');
        }
        else{
            return Excel::download(new Datatbl2Export, 'datatbl.xlsx');
        }
       
        //print_r($input['seldata']);die;
        

    }


    public function ExportData() 
    {
        
        return Excel::download(new Datatbl2Export, 'datatbl.xlsx');


    }





}
