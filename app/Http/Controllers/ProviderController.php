<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\{
    Product,
    Provider
};

class ProviderController extends Controller
{
    public function index()
    {
        //$products=Product::where('category_id','3')->groupBy('provider_id')->paginate(5);
        $products=Product::paginate(5);
        $productCount=Product::count();
       
        return view('home', compact('products','productCount'));
    } 

    public function mutateSpeedUnits($speeds)
    {
      $mb = [];
      $gb = [];
      $flag = false;

      
      foreach($speeds as $speed){
        if(str_contains($speed , "+")){ $flag = true; }
        $speed = str_replace("+" , "" , $speed);

        $speedList = explode("-" , $speed);
        foreach($speedList as $thisSpeed)
        {
          preg_match('/(\d+)(\D*)/', $thisSpeed, $matches);
          $matches[2] == "mb" ? $mb[] = $matches[1] : $gb[] = $matches[1];
        }
      }

      
      $minMb = count($mb) ? MIN(array_unique($mb)) : null;
      $maxMb = count($mb) ? MAX(array_unique($mb)) : null;
      
      $minGb = count($gb) ?  MIN(array_unique($gb)) : null;
      $maxGb = count($gb) ?  MAX(array_unique($gb)) : null;
   

      return [$minMb , $maxMb , $minGb , $maxGb , $flag];

    }

    public function loadMoreData(Request $request)
    {
        $start = $request->input('start');

        $data = Product::where('category_id','3')->orderBy('id', 'ASC')
            ->offset($start)
            // ->where('category_id','2')
            // ->groupBy('provider_id')
            ->limit(5)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 5
        ]);
    }

    public function mutateCost($costs)
    {
      
      $costList = [];
      foreach($costs as $cost){
        $costItems = explode("-" , $cost);
        $costList[] = $costItems[0];
        if(count($costItems) > 1){
          $costList[] = $costItems[1];
        }
      }

      $maxCost = MAX(array_unique($costList));
      $minCost = MIN(array_unique($costList));

      return [$minCost , $maxCost];
    }


    public function getFIlteredProvider(Request $request)
    {

      // dd($request->all());
      $provider = $request->provider;
      $speed = $request->speed;
      $cost = $request->cost;
      $package = $request->package;
      $contract= $request->contract;
      $phone= $request->phone;
      $sortValue = $request->sort;
      $query = Product::query();
      
    

      $query->when(isset($speed) && count($speed) , function($query1) use ($speed) {

          foreach($speed as $thisSpeed)
          {
              $flag = false;
              $mb = $gb = [];
              if(str_contains($thisSpeed , "+")){ $flag = true; }
              $speed = str_replace("+" , "" , $thisSpeed);
      
              $speedList = explode("-" , $thisSpeed);
              foreach($speedList as $thisSpeed)
              {
                preg_match('/(\d+)(\D*)/', $thisSpeed, $matches);
                $matches[2] == "mb" ? $mb[] = $matches[1] : $gb[] = $matches[1];
              }

              $minMb = count($mb) ? MIN(array_unique($mb)) : null;
              $maxMb = count($mb) && count($mb) > 1 ? MAX(array_unique($mb)) : null;
              
              $minGb = count($gb) ?  MIN(array_unique($gb)) : null;
              $maxGb = count($gb) && count($gb) > 1 ?  MAX(array_unique($gb)) : null;
              

              // $query1->when($minMb , function($query2) use ($minMb , $maxMb){
              //     $query2->when(!isset($maxMb), function($query3) use ($minMb){
              //       $query3->orWhere('download_speed' , $minMb)->where('download_speed_unit' , 'mb');
              //     });

              //     $query2->when(isset($maxMb), function($query3) use ($minMb , $maxMb){
              //       $query3->orWhere( function($query4) use ($minMb , $maxMb){
              //         $query4->whereBetween( 'download_speed' , [$minMb , $maxMb])->where('download_speed_unit' , 'mb');
              //       });
              //     });

              // });


              $query1->when($minMb , function($subquery) use ($minMb , $maxMb){

                $subquery->orWhere(function($query2) use ($minMb , $maxMb) {
                  $query2->when(!isset($maxMb), function($query3) use ($minMb){
                    $query3->orWhere('download_speed' , $minMb);
                  });
  
                  $query2->when(isset($maxMb), function($query3) use ($minMb , $maxMb){
                    $query3->orWhere( function($query4) use ($minMb , $maxMb){
                      $query4->whereBetween( 'download_speed' , [$minMb , $maxMb]);
                    });
                  });

                  $query2->where('download_speed_unit' , 'mb');
                });


            });



              $query1->when($minGb , function($query2) use ($minGb , $maxGb , $flag){
          
                $query2->when(!isset($maxGb), function($query3) use ($minGb){
                  $query3->orWhere('download_speed' , $minGb)->where('download_speed_unit' , 'gb');
                });

                $query2->when(isset($maxGb), function($query3) use ($minGb , $maxGb){
                  $query3->orWhere( function($query4) use ($minGb , $maxGb){
                    $query4->whereBetween( 'download_speed' , [$minGb , $maxGb])->where('download_speed_unit' , 'gb');
                  });
                });

                $query2->when($flag , function($query3) use ($minGb){
                  $query3->orWhere('download_speed' , '>=' , $minGb)->where('download_speed_unit' , 'gb');
                });

            });

            


          }



      });

      $query->when(isset($provider) && count($provider), function ($query1) use ($provider) {
        $query1->whereIn('provider_id' , $provider);
      });

      $query->when(isset($cost) && count($cost) , function($query1) use ($cost) {
          [$minCost , $maxCost] = $this->mutateCost($cost);
          $query1->where('stand_monthly' , '>=' , $minCost);
          $query1->where('stand_monthly' , '<=' , $maxCost);
      });


      $query->when(isset($package) && count($package), function ($query1) use ($package) {
        $query1->whereIn('category_id' , $package);
    });

    $query->when(isset($contract) && count($contract), function ($query1) use ($contract) {
      $query1->whereIn('contract_months' , $contract);
     });

     $query->when(isset($phone) && count($phone), function ($query1) use ($phone) {
      $query1->whereIn('calls' , $phone);
     });

     $query->when(isset($sortValue), function($query1) use ($sortValue){
      foreach($sortValue as $sorty){
        if($sorty == "download_asc"){
          $query1->orderByRaw("
          CASE 
              WHEN download_speed_unit = 'GB' THEN download_speed * 1024 
              ELSE download_speed 
          END ASC
      ");
        }

        if($sorty == "price_asc"){
          $query1->orderBy("stand_monthly", "asc");
        }
      }
     });

     
    //$ordery="'id', 'ASC'";
    // dd($query->toSql());


    $products = $query->skip($request->loadedTicket)->take(5)->get();
    // $products = $yquery->take(5)->get();
    $productCount=$query->skip($request->loadedTicket)->count();
    $html = view('search-filters' , ['products' => $products])->render();
     


    return response()->json(['status' => true , 'html' => $html, 'total_count'=>$productCount]);

     // dd($providerList);
            

    }

    public function ManageProviders(){
      
        return view('manage-providers');

    }
}
