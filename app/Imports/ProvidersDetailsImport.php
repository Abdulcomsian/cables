<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
//use Maatwebsite\Excel\Concerns\ToArray;

class ProvidersDetailsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return $array;
    }
}

// class ProvidersDetailsImport implements ToArray
// {
//     public function array(array $array)
//     {
//         return $array;
//     }
// }