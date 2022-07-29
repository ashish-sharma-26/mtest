<?php

namespace App\Exports;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;

class DatatblExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */


    // protected $id;

    // function __construct($id) {
    //        $this->id = $id;
    // }
   
   /**
   * @return \Illuminate\Support\Collection
   */
   public function collection()
   {
       return User::whereIn('id',array(1,2))->get();
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
