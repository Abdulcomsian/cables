<?php

namespace App\Http\Controllers;

use App\Imports\ProvidersDetailsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Modeles\ProviderDetail;

class ProviderDetailController extends Controller
{
    // public function importFile(){
     
    //     return view('import-file');

    // }

    // Displays the file upload form.
    public function showUploadForm()
    {
        return view('upload');
    }

    // Handles the file upload and Excel import.
    // public function import(Request $request)
    // {
    //     // Ensure that the 'file' field is present, is a file and is either in xlsx or xls format
    //     $request->validate([
    //         'file' => 'required|file|mimes:xlsx,xls,csv',
    //     ]);
        
    // try {   
    //         $file = $request->file('file');
    //         $array = Excel::toArray(new ProvidersDetailsImport, $file);
    //         dd($array);
    //         dd($array[0][0][1]);
    //         $providerdetails=new ProviderDetail;
    //         $providerdetails->name = $array->name;
       
    //         if($inscompany->save()){
    //             return redirect('manage-insurance-componies')->with('success', 'Insurance company is added to the menu');
    //         }else{
    //             return redirect()->back()->with('error', 'Insurance company not inserted');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }    
       

        
    // }
}
