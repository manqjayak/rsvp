<?php

namespace App\Imports;

use Throwable;
use App\Models\tamu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class TamuImport implements ToModel, WithValidation
{
    // ,WithStartRow, WithValidation,  SkipsOnError, SkipsOnFailure
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable,SkipsErrors, SkipsFailures;
    
    private $rows = 0;
    private $column = true;


    public function model (array $row)
    {
        ++$this->rows;
        if(isset($row[4])){
            $this->column = true;
            return new tamu([
                'nama' => $row[1],
                'id_list_tamu' =>$row[4],
                'noWA' => $row[2],
                'company'=> $row[3]
            ]);
        }else{
            $this->column = false;
        }
        

    }
    // public function print(){
    //     // $rows = $row->toArray();
    //     // return $row[1];
    //     return "asdsada";
    // }

    // public function collection(Collection $row){
    //     $rows = $row->toArray();
    //     foreach ($rows as $key=>$row) {
    //         $validator = Validator::make($row, $this->rules(), $this->validationMessages());
    //         if ($validator->fails()) {
    //             foreach ($validator->errors()->messages() as $messages) {
    //                 foreach ($messages as $error) {
    //                     // accumulating errors:
    //                     $this->errors[] = $error;
    //                 }
    //             }
    //         } else{
                
    //         }

    //         }
    //     }
    public function column(){
        // if(isset($row[4])){
        //     return "ada";
        // }else{
        //     return"tidak ada";
        // }
        return $this->column;
    }
    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function rules():array{
        return[
            '*.2' =>  ['required'],
        ];
    }
    
    public function onError(Throwable $error)
    {
       
    }


    // //  this function returns all validation errors after import:
    //  public function getErrors()
    //  {
    //      return $this->errors;
    //  }
     
    // public function validationMessages()
    // {
    //     return [
    //         '2.required' => trans('user.first_name_is_required'),
    //     ];
    // }
}
