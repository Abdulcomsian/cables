<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{

    BroadbandProvider,
    ProviderDetail,
    
 
};
class BroadbandProviderController extends Controller
{
    public function index()
    {
        $providerdetails=ProviderDetail::groupBy('provider_id')->where('category','TV_broad')->get();
        return view('home', compact('providerdetails'));
    } 

    public function ManageProviders(){
      
        return view('manage-providers');

    }

    public function AddProvider(Request $request){

         // validation
         $request->validate([
            'name'=>'required'
            
        ],[
            'name.required' => 'Provider name is required',
            
        ]);
    // error handling using try and catch
    try {
        
            $broadbandprovider=new BroadbandProvider;
            $broadbandprovider->name =$request->name;
            if($broadbandprovider->save()){
                return redirect('broadband-providers')->with('success', 'Broadband Provider is added to the menu');
            }else{
                return redirect()->back()->with('error', 'Broadband Provider not added');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }       

    }
}
