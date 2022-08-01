<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;

class DatatblExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */


    protected $id;

    function __construct($id) {
           $this->id = $id;
    }
   
   /**
   * @return \Illuminate\Support\Collection
   */
   public function collection()
   {
       return User::whereIn('id',$this->id)->get();
   }






    // protected $id;

    // function __construct($id) {
    //         $this->id = $id;
    // }

    // public function collection()
    // {
    //     //
    //     // print_r($this->id);
    //     // die;
    //    // $usersinfo = User::whereIn('id', $this->id)->get();
    //     return User::whereIn('id', $this->id)->get();
    // }
}
