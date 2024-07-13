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
        $products=Product::where('category_id','3')->groupBy('provider_id')->paginate(5);
        //dd($products)
        //$totalrecords=Product::where('category_id','3')->groupBy('provider_id');
        //$totladeals = $totalrecords->count();
        return view('home', compact('products'));
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

      $provider = $request->provider;
      $speed = $request->speed;
      $cost = $request->cost;
      $package = $request->package;
      $contract= $request->contract;
      $phone= $request->phone;
      $query = Product::query();
      
      $query->when(isset($provider) && count($provider), function ($query) use ($provider) {
          $query->whereIn('provider_id' , $provider);
      });

      $query->when(isset($speed) && count($speed) , function($query1) use ($speed) {

          [$minMb , $maxMb , $minGb , $maxGb , $flag] = $this->mutateSpeedUnits($speed);
          
          $query1->when($minMb , function($query2) use($minMb) {
            $query2->where('download_speed' , '>=' , $minMb)->where('download_speed_unit' , 'mb');
          });

          $query1->when($maxMb , function($query2) use($maxMb) {
            $query2->where('download_speed' , '<=' , $maxMb)->where('download_speed_unit' , 'mb');;
          });

          if(!$flag){
            $query1->when($minGb , function($query2) use($minGb) {
              $query2->where('download_speed' , '>=' , $minGb)->where('download_speed_unit' , 'gb');
            });
  
            $query1->when($maxGb , function($query2) use($maxGb) {
              $query2->where('download_speed' , '<=' , $maxGb)->where('download_speed_unit' , 'gb');
            });

          }  else {

            $query1->when($maxGb , function($query2) use($minGb) {
              $query2->where('download_speed' , '>=' , $minGb)->where('download_speed_unit' , 'gb');
            });

          }

      });


      $query->when(isset($cost) && count($cost) , function($query1) use ($cost) {
          [$minCost , $maxCost] = $this->mutateCost($cost);
          $query1->where('stand_monthly' , '>=' , $minCost);
          $query1->where('stand_monthly' , '<=' , $maxCost);
      });


      $query->when(isset($package) && count($package), function ($query) use ($package) {
        $query->whereIn('category_id' , $package);
    });

    $query->when(isset($contract) && count($contract), function ($query) use ($contract) {
      $query->whereIn('contract_months' , $contract);
     });

     $query->when(isset($phone) && count($phone), function ($query) use ($phone) {
      $query->whereIn('calls' , $phone);
     });

    $products = $query->skip($request->loadedTicket)->take(5)->get();

     $html = view('search-filters' , ['products' => $products])->render();
     


     return response()->json(['status' => true , 'html' => $html]);

     // dd($providerList);
            
            // $query->when(isset($speed) && !is_null($speed) , function($query) use ($request){
            //     $query->whereHas('product' , function($query1) use($request){
            //         $query1->whereIn('id' , $speed);
    
            //         $query1->when(isset($request->category) && !is_null($request->category) , function($query2) use ($request){
            //             $query2->whereHas('category' , function($query3) use($request){
            //                 $query3->whereIn('id' , $request->category);
            //             });
            //         });
    
            //     });
            // });


    // $speedArray = $request->speed;
    // $providerArray = $request->provider;
    // $packageArray = $request->package;
    // $monthlycostArray = $request->monthlycost;
    // $query = Product::query();

    // if (!empty($speedArray)) {
    //     $query->where(function ($query) use ($speedArray) {
    //         foreach ($speedArray as $index => $speed) {
    //             $query->when(isset($speed) && !is_null($speed), function ($query) use ($speed, $index) {
    //                 if ($speed == "1-60") {
    //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`download_speed`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [1, 60]);
    //                 }
    //                 if ($speed == "60-100") {
    //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`download_speed`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [60, 100]);
    //                 }
    //                 if ($speed == "100-500") {
    //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`download_speed`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [100, 500]);
    //                 }
    //                 if ($speed == "500-1gb") {
    //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`download_speed`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [500, 1000]);
    //                 }
    //                 if ($speed == "1gb") {
    //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`download_speed`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [1000, 10000]);
    //                 }
    //             });
    //         }
    //     });
    // }

    // if (!empty($monthlycostArray)) {
    //     $query->whereIn('provider_id', $monthlycostArray);
    // }
    // if (!empty($packageArray)) {
    //   $query->whereIn('category_id', $packageArray);
    //  }

  //    if (!empty($monthlycostArray)) {
  //     $query->where(function ($query) use ($monthlycostArray) {
  //         foreach ($monthlycostArray as $index => $monthlycost) {
  //             $query->when(isset($monthlycost) && !is_null($monthlycost), function ($query) use ($monthlycost, $index) {
  //                 if ($monthlycost == "1-25") {
  //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`stand_monthly`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [1, 25]);
  //                 }
  //                 if ($monthlycost == "25-50") {
  //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`stand_monthly`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [25, 50]);
  //                 }
  //                 if ($monthlycost == "50-75") {
  //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`stand_monthly`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [50, 75]);
  //                 }
  //                 if ($monthlycost == "75plus") {
  //                     $query->orWhereRaw("CAST(SUBSTRING_INDEX(`stand_monthly`, 'mb', 1) AS UNSIGNED) BETWEEN ? AND ?", [76, 100]);
  //                 }
                  
  //             });
  //         }
  //     });
  // }


  //previous code to show search results
    // $data = $query->get();
    //    $html = [];
    //     foreach($data as $product){
    //         $html[] = '
            
    // <div class="bg-white mx-4 hidden md:flex justify-between p-4 rounded-lg shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px] mb-8">
    //   <!--First Div Start-->
    //   <div class="w-1/6 flex flex-col justify-center items-center">
    //     <div class="w-30 h-20">
    //       <img
    //         src="/assets'.$product->thumbnail_retailer.'" alt="sky"       class="w-full h-full" />
    //     </div>
  
    //     <p>order by phone</p>
    //     <p>0333 210 1135</p>
    //   </div>
    //   <!--First Div End-->
    //   <!--Second Div Start-->
    //   <div class="w-4/6 px-4">
    //     <h1 class="w-full text-primary font-bold text-xl">
    //      '.$product->title.'
    //     </h1>
    //     <div class="flex justify-between py-5">
    //       <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
    //         <div
    //           class="flex flex-col lg:flex-row lg:justify-between items-center"
    //         >
    //           <span
    //             class="text-primary font-bold text-[1.3125rem] order-2 lg:order-1 lg:mr-auto"
    //             >'.$product->download_speed.'</span
    //           >
    //           <div class="w-5 h-5 order-1 lg:order-2 lg:ml-auto">
    //             <img
    //               src="./images/info-icon.svg"
    //               alt=""
    //               class="w-full h-full"
    //             />
    //           </div>
    //         </div>
    //         <p
    //           class="text-primary text-sm text-center lg:text-left lg:max-w-16 order-3"
    //         >
    //           average speed
    //         </p>
    //       </div>
  
    //       <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
    //         <div
    //           class="flex flex-col lg:flex-row lg:justify-between items-center"
    //         >
    //           <span
    //             class="text-primary font-bold  text-[1.3125rem] order-2 lg:order-1 lg:mr-auto"
    //             >'.$product->channels.'+</span
    //           >
    //           <div class="w-5 h-5 order-1 lg:order-2 lg:ml-auto">
    //             <img
    //               src="./images/info-icon.svg"
    //               alt=""
    //               class="w-full h-full"
    //             />
    //           </div>
    //         </div>
    //         <p
    //           class="text-primary text-sm text-center lg:text-left order-3 lg:max-w-16"
    //         >
    //           Tv channels
    //         </p>
    //       </div>
  
    //       <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
    //         <div
    //           class="flex flex-col lg:flex-row lg:justify-between items-center text-primary font-semibold text-lg"
    //         >
    //           <span
    //             class="text-primary font-bold  text-[1.3125rem] order-1 lg:order-none"
    //             ></span
    //           >
    //           <div class="w-5 h-5">
    //             <img
    //               src="./images/info-icon.svg"
    //               alt=""
    //               class="w-full h-full order-0 lg:order-none"
    //             />
    //           </div>
    //         </div>
    //         <p
    //           class="text-primary text-sm text-center lg:max-w-16 lg:text-left"
    //         >
    //           one-off cost
    //         </p>
    //       </div>
  
    //       <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
    //         <div
    //           class="flex flex-col lg:flex-row lg:justify-between items-center text-primary font-semibold text-lg"
    //         >
    //           <span
    //             class="text-primary font-bold  text-[1.3125rem] order-1 lg:order-none"
    //             >  '.$product->contract.'   </span
    //           >
    //           <div class="w-5 h-5">
    //             <img
    //               src="./images/info-icon.svg"
    //               alt=""
    //               class="w-full h-full order-0 lg:order-none"
    //             />
    //           </div>
    //         </div>
    //         <p
    //           class="text-primary text-sm text-center lg:max-w-16 lg:text-left"
    //         >
    //           months contract
    //         </p>
    //       </div>
  
    //       <div class="bg-lightBlue px-2 py-2 rounded w-full">
    //         <div
    //           class="flex flex-col lg:flex-row lg:justify-between items-center lg:items-start text-primary"
    //         >
    //           <p
    //             class="text-primary text-sm text-center lg:max-w-16 order-1 lg:order-none lg:text-left"
    //           >
    //             pay as you go calls
    //           </p>
    //           <div class="w-5 h-5 order-0 lg:order-none">
    //             <img
    //               src="./images/info-icon.svg"
    //               alt=""
    //               class="w-full h-full"
    //             />
    //           </div>
    //         </div>
    //       </div>
    //     </div>
    //     <ul class="w-full flex flex-wrap text-base font-medium">
    //       <li class="li-with-dot">New customers only</li>
    //       <li class="li-with-dot ml-[0.4rem]">No dish needed</li>
    //       <li class="li-with-dot ml-[0.4rem]">Stream live TV</li>
    //     </ul>
    //   </div>
    //   <!--Second Div End-->
    //   <!--Third Div Start-->
    //   <div   class="relative w-1/6 flex flex-col justify-center items-center text-center"   >
    //     <div class="absolute top-0 right-0 w-5 h-5">
    //       <img
    //         src="./images/regular-heart.svg"
    //         alt="Heart Icon"
    //         class="w-full h-full"
    //       />
    //     </div>
    //     <div class="flex items-end">
    //       <span class="text-primary font-bold text-3xl">£'.$product->stand_monthly.'</span>
    //       <span class="text-primary font-medium text-lg">.00</span>
    //     </div>
    //     <div class="flex items-center">
    //       <span class="text-primary font-bold mr-2">per month</span>
    //       <div class="w-5 h-5">
    //         <img
    //           src="./images/info-icon.svg"
    //           alt="Info Icon"
    //           class="w-full h-full"
    //         />
    //       </div>
    //     </div>
    //     <span class="text-primary text-xs mb-2"
    //       >(prices may change during contract)</span
    //     >
    //     <button
    //       class="bg-pink hover:bg-primary text-white rounded-full mb-2 px-4 lg:px-6 py-2 font-bold text-lg"
    //     >
    //       Get Deal
    //     </button>
    //     <button
    //       class="text-[#FF006D] hover:text-primary underline font-normal"
    //     >
    //       More Info
    //     </button>
    //   </div>
    // </div>
    //         ';
    //     }


    //     return $html;
    }

    public function ManageProviders(){
      
        return view('manage-providers');

    }
}
// foreach($providerArray as $provider){
        //     $query->when(isset($provider) && !is_null($provider), function ($query) use ($provider) {
        //             $query->whereIn('provider_id' , $provider);
               
               
        //     });

            
        // }
            
            // $query->when(isset($speed) && !is_null($speed) , function($query) use ($request){
            //     $query->whereHas('product' , function($query1) use($request){
            //         $query1->whereIn('id' , $speed);
    
            //         $query1->when(isset($request->category) && !is_null($request->category) , function($query2) use ($request){
            //             $query2->whereHas('category' , function($query3) use($request){
            //                 $query3->whereIn('id' , $request->category);
            //             });
            //         });
    
            //     });
            // });
       