<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\{
    Product,
    Provider
};
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;
class ProviderController extends Controller
{
    public function index()
    {
        //$products=Product::where('category_id','3')->groupBy('provider_id')->paginate(5);
        $products=Product::orderBy("promo_monthly", "asc")->paginate(5);
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
      $costItems = explode("-" , $costs);
      $costList[] = $costItems[0];
      if(count($costItems) > 1){
        $costList[] = $costItems[1];
      }
 

      $minCost = $costList[0];
      $maxCost = count($costList) > 1 ? $costList[1] : null;

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
      $sortValue = $request->sort;
      $offers = $request->offers;
      $channels = $request->channel;
      $query = Product::query();
      
      $query->when(isset($request->broadband_type) && count($request->broadband_type) > 0, function($query1) use ($request){
        $query1->whereIn('broadband_type', $request->broadband_type);
      });

      $query->when(isset($speed) && count($speed) , function($query) use ($speed) {
          $query->where( function($query1) use ($speed) {
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
                
  
  
                $query1->when($minMb , function($subquery) use ($minMb , $maxMb){
  
                  $subquery->orWhere(function($query2)  use ($minMb , $maxMb){
                      $query2->when(!isset($maxMb), function($query3) use ($minMb){
                          $query3->where('download_speed' , $minMb);
                       });
  
                       $query2->when(isset($maxMb) , function($query3) use($minMb , $maxMb){
                          $query3->whereBetween( 'download_speed' , [$minMb , $maxMb]);
                       });
  
  
                       $query2->where('download_speed_unit' , 'mb');
                      
                  });
  
              });
  
  
  
                $query1->when($minGb , function($subquery) use ($minGb , $maxGb , $flag){
                  $subquery->orWhere( function($query2) use ($minGb , $maxGb , $flag){
                    
                    $query2->when(!isset($maxGb) && !$flag, function($query3) use ($minGb){
                          $query3->where('download_speed' , $minGb);
                        });
  
                        $query2->when(isset($maxGb) && !$flag, function($query3) use ($minGb , $maxGb){
                          $query3->whereBetween( 'download_speed' , [$minGb , $maxGb]);
                        });
  
                        $query2->when($flag , function($query3) use ($minGb){
                          $query3->where('download_speed' , '>' , $minGb);
                        });
  
                        $query2->where('download_speed_unit' , 'gb');
  
                  });
  
              });
  
              
  
  
            }

          });



      });

     
      $query->when(isset($channels) && count($channels) > 0 , function($query1) use ($channels){
          $query1->where(function($query2) use ($channels){
            foreach($channels as $channel)
            {
              $query2->where('keywords' ,'Like' , "%$channel%");
            }
          });
      });

      $query->when(isset($provider) && count($provider), function ($query1) use ($provider) {
        $query1->whereIn('provider_id' , $provider);
      });

      $query->when(isset($cost) && count($cost) , function($query) use ($cost) {
        $query->where(function($query1) use ($cost){
  
          $costList = [];
          foreach($cost as $ct){
            $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
            $ct = str_replace("+" , "" , $ct);
            [$minCost , $maxCost] = $this->mutateCost($ct);
            $costList[] = ["minCost" => $minCost , 'maxCost' => $maxCost , 'haveIncrement' => $haveIncrement ]; 
          }


          foreach($costList as $currentCost)
          {
            if(!$currentCost['maxCost'])
            {
              if($currentCost['haveIncrement']){
                $query1->orWhere(function($query2) use ($currentCost){
                  $query2->where('promo_monthly' , '>' , $currentCost['minCost'] );
                });
              } else {
                $query1->orWhere(function($query2) use ($currentCost){
                  $query2->where('promo_monthly' , '=' , $currentCost['minCost'] );
                });
              }

            } else {
              $query1->orWhere(function($query2) use ($currentCost){
                $query2->where('promo_monthly' , '>=' , $currentCost['minCost'])->where('promo_monthly' , '<=' , $currentCost['maxCost']);
              });
            }


          }
          
  
        });
      });


      $query->when(isset($package) && count($package), function ($query1) use ($package) {
          $query1->whereIn('category_id' , $package);
      });

      $query->when(isset($contract) && count($contract), function ($query1) use ($contract) {
        $query1->where(function($query2) use ($contract){
            foreach($contract as $ct)
            {
              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
              $ct = (int)str_replace("+" , "" , $ct);
              $haveIncrement ? $query2->orWhere('contract_months' , '>=' , $ct) : $query2->orWhere('contract_months' , $ct); 
            }
          });
      });

      $query->when(isset($offers) && count($offers), function ($query1) use ($offers) {
        if(in_array('no_upfront_cost' , $offers)){
          $query1->where('set_up_cost' , 0);
        }

        if(in_array('not required' , $offers)){
          $query1->whereNotNull('offer_ends')->where(DB::raw("TRIM(offer_ends)") , '!=' , '')->whereNotNull('promo_and_info')->where(DB::raw("TRIM(promo_and_info)") , '!=' , '');
        }



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
        if($sorty == "download_desc"){
          $query1->orderByRaw("
          CASE 
              WHEN download_speed_unit = 'GB' THEN download_speed * 1024 
              ELSE download_speed 
          END DESC
      ");
        }

        if($sorty == "price_asc"){
          $query1->orderBy("promo_monthly", "asc");
        }
        if($sorty == "price_desc"){
          $query1->orderBy("promo_monthly", "desc");
        }
        if($sorty == "contract_plan"){
          $query1->orderByRaw("CAST(contract_months as SIGNED) asc");
        }

      }
     });

    // $products = $query->toSql();
    //  dd($query->toSql());
    // dd($query->get());

    $products = $query->skip($request->loadedTicket)->take(5)->get();
    $productCount=$query->skip($request->loadedTicket)->count();
    $html = view('search-filters' , ['products' => $products])->render();
    $filteredSpeed = $this->filteredSpeed($request);
    $filteredProvider = $this->filteredProvider($request);
    $filteredContract = $this->filteredContract($request);
    $filteredPhone = $this->filteredPhone($request);
    $filteredCost = $this->filteredCost($request);
    $filteredPackage = $this->filteredPackage($request);
    $filteredOffer = $this->filteredOffer($request);
    $filteredChannel = $this->filteredChannels($request);


    return response()->json([ 
                              'status' => true, 
                              'html' => $html, 
                              'total_count' => $productCount,
                              'filteredSpeed' => $filteredSpeed,
                              'filteredProvider' => $filteredProvider,
                              'filteredContract' => $filteredContract,
                              'filteredPhone' => $filteredPhone,
                              'filteredCost' => $filteredCost,
                              'filteredPackage' => $filteredPackage,
                              'filteredOffer' => $filteredOffer,
                              'filteredChannel' => $filteredChannel,
                              'apiProviders' => $request->apiProviders,
                            ]);
    }

    public function getMoreInfo(Request $request){
      $productdetial=Product::where('id',$request->id)->first();
      $moreinfodata = view('viewmore-data' , ['productdetail' => $productdetial])->render();
      return response()->json(['status' => true , 'moreinfodata' => $moreinfodata]);

    }

    public function ManageProviders(){  
        return view('manage-providers');
    }


    public function filteredProvider($request)
    {
      $provider = Product::select('provider_id')
                        ->when(isset($request->type) && $request->type == "api", function($query) use ($request) {
                            $query->when(isset($request->provider), function($query) use ($request) {
                                $provider = $request->provider;
                                $query->whereIn('provider_id', $provider);
                            });
                        })
                        ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                            $query->where(function($query1) use($request){

                                foreach($request->speed as $speed)
                                {
                                  $speedList = explode("-" , $speed);
                                  $speedListCount = count($speedList);
                                  if($speedListCount == 1){
                                    [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                    $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                      $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  } else if($speedListCount == 2){
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    });
                                  } else {
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                
                                    });
                                    $query1->orWhere(function($query2) use ($speedList){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                      $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  }
                                  
                                }
                              });

                        })
                        ->when( isset($request->package) && count($request->package), function($query) use($request){
                            $query->whereIn('category_id' , $request->package);
                        })
                        ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                          $query->where(function($query1) use($request){

                            foreach($request->cost as $cost)
                            {
                              $costList = explode("-" , $cost);
                              $lowerCost = $costList[0];
                              $upperCost = $costList[1] ?? null;
  
                              if($upperCost){
                                $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                              }else{
                                $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                              }
  
                            }
                          });

                        })
                        ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                          $query->where(function($query1) use($request){
                            foreach($request->contract as $ct)
                            {
                              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                              $ct = (int)str_replace("+" , "" , $ct);
                              $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months' , $ct); 
                            }
                          });
                        })
                        ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                          
                            foreach($request->phone as $phone)
                            {
                              $query->where('calls' , 'Like' , "%$phone%");
                            }
                        })
                        ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                          $query->where(function($query1) use ($request){
                                if(in_array('no_upfront_cost' , $request->offers)){
                                  $query1->orWhere('set_up_cost' , 0);
                                }
                            });
                        })
                        ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                            $query->where(function($query1) use ($request){
                              foreach($request->channel as $channel)
                              {
                                $query1->where('keywords' ,'Like' , "%$channel%");
                              }
                            });
                        })
                        ->distinct('provider_id')
                        ->orderBy('provider_id' , 'asc')
                        ->get()
                        ->pluck('provider_id')
                        ->toArray();
      return $provider;
    }

    
    public function filteredSpeed(Request $request)
    {
      $speed = Product::select('download_speed' , 'download_speed_unit')
                        ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                            $query->whereIn('provider_id' , $request->provider);
                        })
                        ->when( isset($request->package) && count($request->package), function($query) use($request){
                            $query->whereIn('category_id' , $request->package);
                        })
                        ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                          $query->where(function($query1) use($request){

                            foreach($request->cost as $cost)
                            {
                              $costList = explode("-" , $cost);
                              $lowerCost = $costList[0];
                              $upperCost = $costList[1] ?? null;
  
                              if($upperCost){
                                $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                              }else{
                                $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                              }
  
                            }
                          });

                        })
                        ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                          $query->where(function($query1) use($request){
                            foreach($request->contract as $ct)
                            {
                              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                              $ct = (int)str_replace("+" , "" , $ct);
                              $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months' , $ct); 
                            }
                          });
                        })
                        ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                          $query->where( function($query1) use ($request){
                            foreach($request->phone as $phone)
                            {
                              $query1->where('calls' , 'Like' , "%$phone%");
                            }
                          });
                        })
                        ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                          $query->where(function($query1) use ($request){
                                if(in_array('no_upfront_cost' , $request->offers)){
                                  $query1->orWhere('set_up_cost' , 0);
                                }
                                if(in_array('not required' , $request->offers)){
                                  $query1->where('line_rental' , 'not required');
                                }
                            });
                        })
                        ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                          $query->where(function($query1) use ($request){
                            foreach($request->channel as $channel)
                            {
                              $query1->where('keywords' ,'Like' , "%$channel%");
                            }
                          });
                        })
                        ->distinct('download_speed')
                        ->orderBy('download_speed' , 'asc')
                        ->get()
                        // ->pluck('download_speed' , 'download_speed_unit')
                        ->toArray();
        // dd($speed);
        return $speed;
    }

    public function filteredPackage(Request $request)
    {
      $package = Product::select('category_id')
                        ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                            $query->where(function($query1) use($request){

                                foreach($request->speed as $speed)
                                {
                                  $speedList = explode("-" , $speed);
                                  $speedListCount = count($speedList);
                                  if($speedListCount == 1){
                                    [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                    $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                      $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  } else if($speedListCount == 2){
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    });
                                  } else {
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                
                                    });
                                    $query1->orWhere(function($query2) use ($speedList){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                      $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  }
                                  
                                }
                              });

                        })
                        ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                          $query->where(function($query1) use($request){

                            foreach($request->cost as $cost)
                            {
                              $costList = explode("-" , $cost);
                              $lowerCost = $costList[0];
                              $upperCost = $costList[1] ?? null;
  
                              if($upperCost){
                                $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                              }else{
                                $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                              }
  
                            }
                          });

                        })
                        ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                          $query->whereIn('provider_id' , $request->provider);
                        })
                        ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                          $query->where(function($query1) use($request){
                            foreach($request->contract as $ct)
                            {
                              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                              $ct = (int)str_replace("+" , "" , $ct);
                              $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months' , $ct); 
                            }
                          });
                        })
                        ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                          $query->where( function($query1) use ($request){
                            foreach($request->phone as $phone)
                            {
                              $query1->where('calls' , 'Like' , "%$phone%");
                            }
                          });
                        })
                        ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                          $query->where(function($query1) use ($request){
                              if(in_array('no_upfront_cost' , $request->offers)){
                                $query1->orWhere('set_up_cost' , 0);
                              }
                              if(in_array('not required' , $request->offers)){
                                $query1->where('line_rental' , 'not required');
                              }
                            });
                        })
                        ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                            $query->where(function($query1) use ($request){
                              foreach($request->channel as $channel)
                              {
                                $query1->where('keywords' ,'Like' , "%$channel%");
                              }
                            });
                        })
                        ->distinct('category_id')
                        ->orderBy('category_id' , 'asc')
                        ->get()
                        ->pluck('category_id')
                        ->toArray();
      return $package;
    }

    public function filteredChannels(Request $request)
    {
      $channels = Product::select('keywords')
                        ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                            $query->where(function($query1) use($request){

                                foreach($request->speed as $speed)
                                {
                                  $speedList = explode("-" , $speed);
                                  $speedListCount = count($speedList);
                                  if($speedListCount == 1){
                                    [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                    $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                      $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  } else if($speedListCount == 2){
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    });
                                  } else {
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                
                                    });
                                    $query1->orWhere(function($query2) use ($speedList){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                      $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  }
                                  
                                }
                              });

                        })
                        ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                          $query->where(function($query1) use($request){

                            foreach($request->cost as $cost)
                            {
                              $costList = explode("-" , $cost);
                              $lowerCost = $costList[0];
                              $upperCost = $costList[1] ?? null;
  
                              if($upperCost){
                                $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                              }else{
                                $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                              }
  
                            }
                          });

                        })
                        ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                          $query->whereIn('provider_id' , $request->provider);
                        })
                        ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                          $query->where(function($query1) use($request){
                            foreach($request->contract as $ct)
                            {
                              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                              $ct = (int)str_replace("+" , "" , $ct);
                              $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months' , $ct); 
                            }
                          });
                        })
                        ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                          $query->where( function($query1) use ($request){
                            foreach($request->phone as $phone)
                            {
                              $query1->where('calls' , 'Like' , "%$phone%");
                            }
                          });
                        })
                        ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                          $query->where(function($query1) use ($request){
                              if(in_array('no_upfront_cost' , $request->offers)){
                                $query1->orWhere('set_up_cost' , 0);
                              }
                              if(in_array('not required' , $request->offers)){
                                $query1->where('line_rental' , 'not required');
                              }
                            });
                        })
                        ->when( isset($request->package) && count($request->package), function($query) use($request){
                            $query->whereIn('category_id' , $request->package);
                        })
                        ->get()
                        ->pluck('keywords')
                        ->toArray();

      $keywords = [];
      foreach($channels as $channel)
      {
        $channel = preg_replace('/[,\\n]+$/', '', $channel);
        $keywords = [...$keywords , ...explode("," , $channel) ];
      }
      
      $channels = array_unique($keywords);
      $channels = array_map(function($channel) { return trim($channel); } , array_values(array_filter( $channels , function($channel) {
                return !empty(trim($channel));
            })));

      return $channels;
    }

    public function filteredOffer(Request $request)
    {
      $package = Product::select('set_up_cost')
                        ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                            $query->where(function($query1) use($request){

                                foreach($request->speed as $speed)
                                {
                                  $speedList = explode("-" , $speed);
                                  $speedListCount = count($speedList);
                                  if($speedListCount == 1){
                                    [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                    $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                      $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  } else if($speedListCount == 2){
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    });
                                  } else {
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                
                                    });
                                    $query1->orWhere(function($query2) use ($speedList){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                      $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  }
                                  
                                }
                              });

                        })
                        ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                          $query->where(function($query1) use($request){

                            foreach($request->cost as $cost)
                            {
                              $costList = explode("-" , $cost);
                              $lowerCost = $costList[0];
                              $upperCost = $costList[1] ?? null;
  
                              if($upperCost){
                                $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                              }else{
                                $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                              }
  
                            }
                          });

                        })
                        ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                          $query->whereIn('provider_id' , $request->provider);
                        })
                        ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                          $query->where(function($query1) use($request){
                            foreach($request->contract as $ct)
                            {
                              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                              $ct = (int)str_replace("+" , "" , $ct);
                              $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months' , $ct); 
                            }
                          });
                        })
                        ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                          $query->where( function($query1) use ($request){
                            foreach($request->phone as $phone)
                            {
                              $query1->where('calls' , 'Like' , "%$phone%");
                            }
                          });
                        })
                        ->when( isset($request->package) && count($request->package), function($query) use($request){
                            $query->whereIn('category_id' , $request->package);
                        })
                        ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                            $query->where(function($query1) use ($request){
                              foreach($request->channel as $channel)
                              {
                                $query1->where('keywords' ,'Like' , "%$channel%");
                              }
                            });
                        })
                        ->distinct('set_up_cost')
                        ->orderBy('set_up_cost' , 'asc')
                        ->get()
                        ->pluck('set_up_cost')
                        ->toArray();
      return $package;
    }

    public function filteredCost(Request $request)
    {
      $package = Product::select('promo_monthly')
                        ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                            $query->where(function($query1) use($request){

                                foreach($request->speed as $speed)
                                {
                                  $speedList = explode("-" , $speed);
                                  $speedListCount = count($speedList);
                                  if($speedListCount == 1){
                                    [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                    $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                      $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  } else if($speedListCount == 2){
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    });
                                  } else {
                                    $query1->orWhere( function($query2) use ($speedList) {
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                        $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                      $query2->where( function($query3) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                        $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                
                                    });
                                    $query1->orWhere(function($query2) use ($speedList){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                      $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                    });
                                  }
                                  
                                }
                              });

                        })
                        ->when( isset($request->package) && count($request->package), function($query) use($request){
                            $query->whereIn('category_id' , $request->package);
                        })
                        ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                          $query->whereIn('provider_id' , $request->provider);
                        })
                        ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                          $query->where(function($query1) use($request){
                            foreach($request->contract as $ct)
                            {
                              $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                              $ct = (int)str_replace("+" , "" , $ct);
                              $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months' , $ct); 
                            }
                          });
                        })
                        ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                          $query->where( function($query1) use ($request){
                            foreach($request->phone as $phone)
                            {
                              $query1->where('calls' , 'Like' , "%$phone%");
                            }
                          });
                        })
                        ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                          $query->where(function($query1) use ($request){
                              if(in_array('no_upfront_cost' , $request->offers)){
                                $query1->orWhere('set_up_cost' , 0);
                              }
                              if(in_array('not required' , $request->offers)){
                                $query1->where('line_rental' , 'not required');
                              }
                            });
                        })
                        ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                            $query->where(function($query1) use ($request){
                              foreach($request->channel as $channel)
                              {
                                $query1->where('keywords' ,'Like' , "%$channel%");
                              }
                            });
                        })
                        ->distinct('promo_monthly')
                        ->orderBy('promo_monthly' , 'asc')
                        ->get()
                        ->pluck('promo_monthly')
                        ->toArray();
                  return $package;
    }

    public function filteredContract(Request $request)
    {
      $contract = Product::select('contract_months')
                          ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                              $query->where(function($query1) use($request){

                                  foreach($request->speed as $speed)
                                  {
                                    $speedList = explode("-" , $speed);
                                    $speedListCount = count($speedList);
                                    if($speedListCount == 1){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                      $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                        $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    } else if($speedListCount == 2){
                                      $query1->orWhere( function($query2) use ($speedList) {
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                          $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                          $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                      });
                                    } else {
                                      $query1->orWhere( function($query2) use ($speedList) {
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                          $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                          $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                  
                                      });
                                      $query1->orWhere(function($query2) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                        $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    }
                                    
                                  }
                                });

                          })
                          ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                            $query->where(function($query1) use($request){
  
                              foreach($request->cost as $cost)
                              {
                                $costList = explode("-" , $cost);
                                $lowerCost = $costList[0];
                                $upperCost = $costList[1] ?? null;
    
                                if($upperCost){
                                  $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                                }else{
                                  $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                                }
    
                              }
                            });
  
                          })
                          ->when( isset($request->package) && count($request->package), function($query) use($request){
                              $query->whereIn('category_id' , $request->package);
                          })
                          ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                            $query->whereIn('provider_id' , $request->provider);
                          })
                          ->when( isset($request->phone) && count($request->phone) , function($query) use ($request) {
                            $query->where( function($query1) use ($request){
                              foreach($request->phone as $phone)
                              {
                                $query1->where('calls' , 'Like' , "%$phone%");
                              }
                            });
                          })
                          ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                            $query->where(function($query1) use ($request){
                                if(in_array('no_upfront_cost' , $request->offers)){
                                  $query1->orWhere('set_up_cost' , 0);
                                }
                                if(in_array('not required' , $request->offers)){
                                  $query1->where('line_rental' , 'not required');
                                }
                              });
                          })
                          ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                              $query->where(function($query1) use ($request){
                                foreach($request->channel as $channel)
                                {
                                  $query1->where('keywords' ,'Like' , "%$channel%");
                                }
                              });
                          })
                          ->distinct('contract_months')
                          ->orderBy('contract_months' , 'asc')
                          ->get()
                          ->pluck('contract_months')
                          ->toArray();
      return $contract;
    }

    public function filteredPhone(Request $request)
    {
      $package = Product::select('calls')
                          ->when( isset($request->speed) && count($request->speed), function($query) use($request){
                              $query->where(function($query1) use($request){

                                  foreach($request->speed as $speed)
                                  {
                                    $speedList = explode("-" , $speed);
                                    $speedListCount = count($speedList);
                                    if($speedListCount == 1){
                                      [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                      $query1->orWhere( function($query2) use ($speedNum , $speedUnit) {
                                        $query2->where('download_speed' , '>' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    } else if($speedListCount == 2){
                                      $query1->orWhere( function($query2) use ($speedList) {
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                          $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                          $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                      });
                                    } else {
                                      $query1->orWhere( function($query2) use ($speedList) {
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[0]);
                                          $query3->where('download_speed' , '>=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                        $query2->where( function($query3) use ($speedList){
                                          [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[1]);
                                          $query3->where('download_speed' , '<=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                        });
                                  
                                      });
                                      $query1->orWhere(function($query2) use ($speedList){
                                        [$speedNum , $speedUnit] = $this->mutateSpeed($speedList[2]);
                                        $query2->where('download_speed' , '=' , $speedNum )->where('download_speed_unit' , $speedUnit);
                                      });
                                    }
                                    
                                  }
                                });

                          })
                          ->when( isset($request->cost) && count($request->cost) , function($query) use ($request){

                            $query->where(function($query1) use($request){
  
                              foreach($request->cost as $cost)
                              {
                                $costList = explode("-" , $cost);
                                $lowerCost = $costList[0];
                                $upperCost = $costList[1] ?? null;
    
                                if($upperCost){
                                  $query1->orWhere('promo_monthly' , '>=' , $lowerCost)->where('promo_monthly' , '<=' , $upperCost);
                                }else{
                                  $query1->orWhere('promo_monthly' , '>' , $lowerCost);
                                }
    
                              }
                            });
  
                          })
                          ->when( isset($request->package) && count($request->package), function($query) use($request){
                              $query->whereIn('category_id' , $request->package);
                          })
                          ->when( isset($request->provider) && count($request->provider), function($query) use($request){
                            $query->whereIn('provider_id' , $request->provider);
                          })
                          ->when( isset($request->contract) && count($request->contract) , function($query) use ($request){
                            $query->where(function($query1) use($request){
                              foreach($request->contract as $ct)
                              {
                                $haveIncrement = str_contains( $ct , '+') ? 1 : 0;
                                $ct = (int)str_replace("+" , "" , $ct); 
                                $haveIncrement ? $query1->orWhere('contract_months' , '>' , $ct) : $query1->where('contract_months', '>' , $ct); 
                              }
                            });
                          })
                          ->when(isset($request->offers) && count($request->offers), function ($query) use ($request) {
                            $query->where(function($query1) use ($request){
                                if(in_array('no_upfront_cost' , $request->offers)){
                                  $query1->orWhere('set_up_cost' , 0);
                                }
                                if(in_array('not required' , $request->offers)){
                                  $query1->where('line_rental' , 'not required');
                                }
                              });
                          })
                          ->when(isset($request->channel) && count($request->channel) > 0 , function($query) use ($request){
                              $query->where(function($query1) use ($request){
                                foreach($request->channel as $channel)
                                {
                                  $query1->where('keywords' ,'Like' , "%$channel%");
                                }
                              });
                          })
                          ->distinct('calls')
                          ->orderBy('calls' , 'asc')
                          ->get()
                          ->pluck('calls')
                          ->toArray();
                          return $package;
    }


    public function mutateSpeed($speed)
    {
      $speedNum = preg_replace("/[^0-9 ]/", '', $speed);
      $speedUnit =  preg_replace("/[^a-z ]/", '', $speed);
      return [$speedNum , $speedUnit];
    }

    

    public function getDetail($is_subcat, $title, Request $request){
      // dd($is_subcat, $title, $request->id);
      $product = Product::where('id', $request->product_id)->first();
      $provider = Provider::where('id', $request->id)->first();
      return view('go', compact('product','provider'));

    }



    public function locateNetwork(Request $request)
    {
      // $postcode = 'TS26 9LS';
      $postcode = $request->postcode;
      $latitude = $request->latitude;
      $longitude = $request->longitude;
      $client = new Client();
      $response = $client->get('https://api.thinkbroadband.com/inquiry.php', [
          'query' => [
              'postcode' => $postcode,
              // 'lat' => 50.8606212,
              // 'lng' => -1.1782874,
              'version' => '2.73',
              'guid' => '{B67673F3-9CE5-2C2B-0EF1-85170E3C2261}'
          ]
      ]);
      
      
      $responseBody = $response->getBody()->getContents(); 
      $data = json_decode($responseBody);
      $providers = [];
      $speeds = [];
      $broadband_type = [];

      $data = (array)$data;
    //   $data = [ 
    //     "api_version" => 2.73,
    //     "postcode" => "TS26 9LS",
    //     "exchange_name" => "HARTLEPOOL",
    //     "avail_retail_zone_broadband_gea_fttp" => "NOT_AVAILABLE",
    //     "avail_retail_zone_broadband_gea_fttc" => "NOT_AVAILABLE",
    //     "avail_infra_voneus_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_upp_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_factco_fttp" => "NOT_AVAILABLE",
    //     "avail_retail_zen_gea_fttp" => "AVAILABLE",
    //     "avail_retail_zen_gea_fttc" => "AVAILABLE",
    //     "avail_uprn_networks" => [],
    //     "avail_infra_4thutility_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_gofibre_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_swsbroadband_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_ogi_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_toob" => "NOT_AVAILABLE",
    //     "avail_infra_airband_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_grayshottgigabit_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_connect_fibre_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_any_alt_net_fttp" => "AVAILABLE",
    //     "avail_infra_connexin_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_fullfibreltd_fttp" => "NOT_AVAILABLE",
    //     "openreach_fttp_priority_active" => "NO",
    //     "openreach_fttp_priority_predicted" => "06-11-2025",
    //     "avail_retail_plusnet_adsl" => "NOT_AVAILABLE",
    //     "avail_retail_plusnet_fttc" => "AVAILABLE",
    //     "avail_infra_cityfibre_cuckoo" => "AVAILABLE",
    //     "avail_infra_cityfibre_beebu" => "AVAILABLE",
    //     "avail_infra_freedomfibre_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_quickline_wireless" => "NOT_AVAILABLE",
    //     "avail_retail_talktalk_fttc" => "NOT_AVAILABLE",
    //     "avail_retail_sky_fttc" => "AVAILABLE",
    //     "avail_retail_vodafone_fttc" => "AVAILABLE",
    //     "openreach_fttp_speed" => 900,
    //     "avail_retail_cuckoo_gea_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_4thutility" => "AVAILABLE",
    //     "latlng" => "54.681268000000000,-1.226190000000000",
    //     "lat" => "54.681268000000000",
    //     "lng" => "-1.226190000000000",
    //     "exchange_code" => "NEHAL",
    //     "exchange_distance" => 1718,
    //     "exchange_code_near_1" => "NEGM",
    //     "exchange_name_near_1" => "GREATHAM",
    //     "exchange_distance_near_1" => 3919,
    //     "exchange_code_near_2" => "NEWV",
    //     "exchange_name_near_2" => "WOLVISTON",
    //     "exchange_distance_near_2" => 7745,
    //     "exchange_code_near_3" => "NESSDS",
    //     "exchange_name_near_3" => "SEAL SANDS",
    //     "exchange_distance_near_3" => 8702,
    //     "exchange_code_near_4" => "NEHHL",
    //     "exchange_name_near_4" => "HAVERTON HILL",
    //     "exchange_distance_near_4" => 9382,
    //     "avail_infra_virginmedia_cable" => "AVAILABLE",
    //     "avail_retail_virginmedia" => "AVAILABLE",
    //     "avail_infra_virginmedia_gig1" => "AVAILABLE",
    //     "avail_infra_nexfibre" => "NOT_AVAILABLE",
    //     "avail_infra_openreach_fttc" => "AVAILABLE",
    //     "avail_retail_bt_consumer_gea_fttp" => "AVAILABLE",
    //     "avail_retail_sky_gea_fttp" => "AVAILABLE",
    //     "avail_retail_talktalk_gea_fttp" => "NOT_AVAILABLE",
    //     "avail_retail_vodafone_gea_fttp" => "NOT_AVAILABLE",
    //     "avail_retail_pine_media_gea_fttp" => "NOT_AVAILABLE",
    //     "avail_retail_1310io_gea_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_openreach_fttp" => "AVAILABLE",
    //     "avail_infra_openreach_gfast" => "NOT_AVAILABLE",
    //     "avail_retail_bt_consumer" => "AVAILABLE",
    //     "avail_retail_ee" => "AVAILABLE",
    //     "avail_retail_plusnet" => "AVAILABLE",
    //     "avail_infra_btwholesale_ipstream_max" => "AVAILABLE",
    //     "avail_infra_btwholesale_adsl2plus_wbc" => "AVAILABLE",
    //     "avail_retail_sky" => "AVAILABLE",
    //     "avail_infra_sky_llu_adsl2plus" => "AVAILABLE",
    //     "avail_retail_talktalk" => "AVAILABLE",
    //     "avail_infra_talktalk_llu_adsl2plus" => "NOT_AVAILABLE",
    //     "avail_exchange_area_openreach_fttp" => "LIMITED_AVAILABILITY",
    //     "avail_exchange_area_openreach_fttc" => "LIMITED_AVAILABILITY",
    //     "avail_exchange_area_virginmedia_cable" => "LIMITED_AVAILABILITY",
    //     "exchange_market" => "B",
    //     "avail_infra_kc_adsl2plus" => "NOT_AVAILABLE",
    //     "avail_infra_kc_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_hyperoptic_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_gigaclear_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_ifnl_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_b4rn_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_airband_wireless" => "NOT_AVAILABLE",
    //     "avail_infra_vodafone_gigafast" => "AVAILABLE",
    //     "avail_infra_community_fibre" => "NOT_AVAILABLE",
    //     "avail_infra_truespeed" => "NOT_AVAILABLE",
    //     "avail_infra_trooli" => "NOT_AVAILABLE",
    //     "avail_infra_zzoomm" => "NOT_AVAILABLE",
    //     "avail_infra_gnetwork" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_talktalk" => "AVAILABLE",
    //     "avail_infra_cityfibre_zen" => "AVAILABLE",
    //     "avail_infra_cityfibre_brawband" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_vodafone" => "AVAILABLE",
    //     "avail_infra_fwnetworks_heybroadband" => "NOT_AVAILABLE",
    //     "avail_infra_youfibre" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_giganet" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_quickline" => "NOT_AVAILABLE",
    //     "avail_infra_toob" => "NOT_AVAILABLE",
    //     "avail_infra_wightfibre_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_wessexinternet_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_lila_connect" => "NOT_AVAILABLE",
    //     "avail_infra_fibrus" => "NOT_AVAILABLE",
    //     "avail_infra_pine_media" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_airbroadband" => "AVAILABLE",
    //     "avail_infra_cityfibre_legendfibre" => "NOT_AVAILABLE",
    //     "avail_infra_brsk" => "NOT_AVAILABLE",
    //     "avail_infra_swish_fibre" => "NOT_AVAILABLE",
    //     "avail_infra_lit_fibre" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_fibrehop" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_idnet" => "NOT_AVAILABLE",
    //     "avail_infra_lothianbroadband_fibre" => "NOT_AVAILABLE",
    //     "avail_infra_runfibre" => "NOT_AVAILABLE",
    //     "avail_infra_6ginternet_wireless" => "NOT_AVAILABLE",
    //     "avail_infra_box_broadband" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_digitalhome" => "NOT_AVAILABLE",
    //     "avail_infra_exascale" => "NOT_AVAILABLE",
    //     "avail_infra_cambridgefibre" => "NOT_AVAILABLE",
    //     "avail_infra_cityfibre_pure_broadband" => "NOT_AVAILABLE",
    //     "avail_infra_ms3_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_1310io_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_lightspeed_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_quickline_rural_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_digital_infrastructure_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_jurassic_fibre" => "NOT_AVAILABLE",
    //     "avail_infra_lightning_fibre" => "NOT_AVAILABLE",
    //     "avail_infra_country_connect_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_alncom_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_box_broadband_fttp" => "NOT_AVAILABLE",
    //     "avail_infra_borderlink" => "NOT_AVAILABLE",
    //     "avail_infra_nycomm_fttp" => "NOT_AVAILABLE"
    // ];
    


    \Log::info($postcode, $data);

    // New code for Providers

    // for virgin - start
    if(isset($data['avail_infra_virginmedia_gig1']) && $data['avail_infra_virginmedia_gig1'] == "AVAILABLE")
    {
      $providers[] = "Virgin";
      $broadband_type[] = "avail_infra_virginmedia_gig1";
    }

    if(isset($data['avail_infra_nexfibre']) && $data['avail_infra_nexfibre'] == "AVAILABLE"){
      $providers[] = "Virgin";
      $broadband_type[] = "avail_infra_nexfibre"; 	
    }
    // for virgin - end

    // for Sky and Now - start
    if(isset($data['avail_retail_sky_fttc']) && $data['avail_retail_sky_fttc'] == "AVAILABLE")
    {
      $providers[] = "Sky";
      $providers[] = "NOW";
      $broadband_type[] = "avail_retail_sky_fttc";
    }

    if(isset($data['avail_retail_sky_gea_fttp']) && $data['avail_retail_sky_gea_fttp'] == "AVAILABLE"){
      $providers[] = "Sky";
      $providers[] = "NOW";
      $broadband_type[] = "avail_retail_sky_gea_fttp";
    }
    // for sky and now - end

    // for bt, ee, Rebel -start 
    if(isset($data['avail_infra_openreach_fttc']) && $data['avail_infra_openreach_fttc'] == "AVAILABLE")
    {
      $providers[] = "BT";
      $providers[] = "EE";
      $providers[] = "Rebel";
      $broadband_type[] = "avail_infra_openreach_fttc";
    }
    

    if(isset($data['avail_retail_bt_consumer_gea_fttp']) && $data['avail_retail_bt_consumer_gea_fttp'] == "AVAILABLE"){
      $providers[] = "BT";
      $providers[] = "EE";
      $providers[] = "Rebel";
      $broadband_type[] = "avail_retail_bt_consumer_gea_fttp";
    }

    // for bt, ee, Rebel - end

    // for talk talk - start

    if(isset($data['avail_retail_talktalk_fttc']) && $data['avail_retail_talktalk_fttc'] == "AVAILABLE")
    {
      $providers[] = "TalkTalk";
      $broadband_type[] = "avail_retail_talktalk_fttc";
    }

    if(isset($data['avail_retail_talktalk_gea_fttp']) && $data['avail_retail_talktalk_gea_fttp'] == "AVAILABLE"){
      $providers[] = "TalkTalk";
      $broadband_type[] = "avail_retail_talktalk_gea_fttp";
    }

    if(isset($data['avail_infra_cityfibre_talktalk']) && $data['avail_infra_cityfibre_talktalk'] == 'AVAILABLE'){
      $providers[] = "TalkTalk";
      $broadband_type[] = "avail_infra_cityfibre_talktalk";
    }

    // for talk talk - end

    if(isset($data['avail_infra_hyperoptic_fttp']) && $data['avail_infra_hyperoptic_fttp'] == "AVAILABLE")
    { // not available
      $providers[] = "Hyperoptic";
      $broadband_type[] = "avail_infra_hyperoptic_fttp";
    }


    // plusnet start
    if(isset($data['avail_retail_plusnet_fttc']) && $data['avail_retail_plusnet_fttc'] == "AVAILABLE")
    {
      $providers[] = "Plusnet";
      $broadband_type[] = "avail_retail_plusnet_fttc";
     
    }

    if(isset($data['avail_infra_openreach_fttc_hide_fast']) && $data['avail_infra_openreach_fttc_hide_fast'] == 'NO'){
      $providers[] = "Plusnet";
      $broadband_type[] = "avail_infra_openreach_fttc_hide_fast";
    }

    if(isset($data['avail_infra_openreach_fttc_hide_all']) && $data['avail_infra_openreach_fttc_hide_all'] == 'NO'){
      $providers[] = "Plusnet";
      $broadband_type[] = "avail_infra_openreach_fttc_hide_all";
    }

    // plusnet -end

    if(isset($data['avail_infra_fullfibreltd_fttp']) && $data['avail_infra_fullfibreltd_fttp'] == "AVAILABLE")
    { // not
      $providers[] = "Befibre";
      $broadband_type[] = "avail_infra_fullfibreltd_fttp";
    }

    if(isset($data['avail_infra_brsk']) && $data['avail_infra_brsk'] == "AVAILABLE")
    { // not
      $providers[] = "Brsk";
      $broadband_type[] = "avail_infra_brsk";
    }
    
    if(isset($data['avail_infra_community_fibre']) && $data['avail_infra_community_fibre'] == "AVAILABLE")
    { // not
      $providers[] = "Community_Fibre";
      $broadband_type[] = "avail_infra_community_fibre";
    }

    if(isset($data['avail_infra_fibrus']) && $data['avail_infra_fibrus'] == "AVAILABLE"){ // not
      $providers[] = "Fibrus";
      $broadband_type[] = "avail_infra_fibrus";
    }

    // vodafone -start

    if(isset($data['avail_retail_vodafone_fttc']) && $data['avail_retail_vodafone_fttc'] == "AVAILABLE")
    {
      $providers[] = "Vodafone";
      $broadband_type[] = "avail_retail_vodafone_fttc";
      
    }

    if(isset($data['avail_infra_cityfibre_vodafone']) && $data['avail_infra_cityfibre_vodafone'] == 'AVAILABLE'){
      $providers[] = "Vodafone";
      $broadband_type[] = "avail_infra_cityfibre_vodafone";
    }

    if(isset($data['avail_retail_vodafone_gea_fttp']) && $data['avail_retail_vodafone_gea_fttp'] == 'AVAILABLE'){
      $providers[] = "Vodafone";
      $broadband_type[] = "avail_retail_vodafone_gea_fttp";
    }

    // vodafone - end

    // if($data['avail_infra_openreach_fttc'] == "AVAILABLE" || $data['avail_retail_bt_consumer_gea_fttp'] == "AVAILABLE")
    // {
    //   $providers[] = "BT";
    // }

      // $data  = get_object_vars($data);
    //   foreach($data as $key => $value)
    //   {
    //       if(str_contains($key , 'avail_retail') && $value == 'AVAILABLE')
    //       {
    //         $providers[] =  str_replace("avail_retail_" , "" , $key);
    //         continue;
    //       }
        
    //       if(str_contains($key , 'download'))
    //       {
    //         $speeds[] = [ $key => $value ];
    //         continue;
    //       }
          
    //   }

     $query = Provider::query();

     foreach($providers as $provider)
     {
        // $query->orWhere('name', 'REGEXP', implode("|" ,explode("_", $provider) ) );
        $query->orWhere('name', $provider);
     }

     $providers = $query->get()->pluck('id')->toArray();

     $newRequest = new Request([
                        'provider' => $providers,
                        'apiProviders' => $providers,
                        'type' => "api",
                        'broadband_type' => $broadband_type,
                      ]);
     
     
     return $this->getFIlteredProvider($newRequest);

    }


    public function getGeoAddress(Request $request)
    {
      $validator = Validator::make( $request->all() , [
        'postcode' => 'required|string'
      ]);

      if($validator->fails())
      {
        return response()->json(['status' => false , 'error' => implode(", " , $validator->errors()->all())]);
      }
      
      try{
  
        $key = env('IDEAL_POSTCODE');
        $postcode = $request->postcode;
        $api = "https://api.ideal-postcodes.co.uk/v1/postcodes/$postcode?api_key=$key";
        $client = new Client();
        $response = $client->request('GET', $api);
        $body = $response->getBody();
        $data = json_decode($body, true);
        $results = $data['result']; 
        // $results[] = [ 
        //   "postcode" => "EH1 1YZ",
        //   "postcode_inward" => "1YZ",
        //   "postcode_outward" => "EH1",
        //   "post_town" => "Edinburgh",
        //   "dependant_locality" => "",
        //   "double_dependant_locality" => "",
        //   "thoroughfare" => "The Mound",
        //   "dependant_thoroughfare" => "",
        //   "building_number" => "",
        //   "building_name" => "",
        //   "sub_building_name" => "",
        //   "po_box" => "",
        //   "department_name" => "",
        //   "organisation_name" => "Lloyds Banking Group",
        //   "udprn" => 8196162,
        //   "postcode_type" => "L",
        //   "su_organisation_indicator" => "",
        //   "delivery_point_suffix" => "1A",
        //   "line_1" => "Lloyds Banking Group",
        //   "line_2" => "The Mound",
        //   "line_3" => "",
        //   "premise" => "",
        //   "longitude" => -3.1929496,
        //   "latitude" => 55.9501846,
        //   "eastings" => 325601,
        //   "northings" => 673660,
        //   "country" => "Scotland",
        //   "traditional_county" => "Midlothian",
        //   "administrative_county" => "",
        //   "postal_county" => "Midlothian",
        //   "county" => "Midlothian",
        //   "district" => "City of Edinburgh",
        //   "ward" => "City Centre",
        //   "uprn" => "906468513",
        //   "id" => "paf_8196162",
        //   "country_iso" => "GBR",
        //   "country_iso_2" => "GB",
        //   "county_code" => "",
        //   "language"
        // ];
        $html = view('ajax.address' , ['locations' => $results])->render();
        return response()->json(['status' => true , 'html' => $html]);
      
      } catch (\Exception $e){
        dd($e->getMessage());
         if($e->hasResponse())
         {
          $response = $e->getResponse();
          $errorBody = $response->getBody();
          $errorData = json_decode($errorBody, true);
          return response()->json(['status' => false , 'error' => $errorData['message']]);
         }else {
          return response()->json(['status' => false , 'error' => 'something went wrong while getting data']);
         }
      }
    }


    
}
