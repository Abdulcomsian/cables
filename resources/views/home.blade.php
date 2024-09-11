@extends('layouts.main' ,['page_title' => 'Broadbands'])
@section('content')
<!--Cards Start-->
<div class="w-full lg:w-9/12">
    <div class="flex justify-between items-center mb-4 mx-4">
      @yield("h2-9")
      <h2 class="w-full font-bold text-2xl text-primary ">
        <span id="tot_count">{{$productCount}}</span> Available deals  
      </h2>
    
      <div class="w-full flex justify-between items-center">
        <div
          class="w-full font-bold text-xl md:text-right text-primary mr-2 hidden lg:block"
        >
          Sort by
        </div>
        <button
          class="md:flex justify-center items-center border border-primary text-pink px-6 py-2 rounded mr-2 hidden lg:hidden"
        >
          <img src="./images//filters.svg" alt="" class="w-5 h-5 mr-1" />
          <span class="font-semibold"> Filter</span>
        </button>
        <form     class="w-full flex justify-between items-center md:max-w-xs mx-auto md:mr-2"       >
          <label
            for="deals"
            class="block w-full max-w-20 text-lg font-bold text-primary md:hidden"
            >Sort by</label
          >
          <select id="deals" data-type="sort" data-name="sort[]" class="border border-primary text-primary bg-white md:bg-transparent text-sm rounded focus:outline-none block w-full p-2.5 submitform"
          >
            {{-- <option value="Mostpopular_asc" selected>Most Popular Deals</option>
            <option value="Bestvalue_asc" >Best Value Deal</option> --}}
            <option value="price_asc" >Price (low to high)</option>
            <option value="price_desc" >Price (high to low)</option>
            <option value="download_asc" >Download speed (low to high)</option>
            <option value="download_desc" >Download speed (high to low)</option>
            <option value="contract_plan">Contract Plan</option>
          </select>
        </form>
  
        <img
          src="./images/question-mark-icon.svg"
          alt=""
          class="w-8 h-8 hidden md:block"
        />
      </div>
    </div>
   
  
    <!--Card Code on Desktop Start-->
    <div class="row" id="items_container" data-applied-filter="0">
@foreach ($products as $product)
    
<div class="relative xsm:min-h-[130vw] ysm:min-h-[96vw] ticket zsm:min-h-[86vw] sm:min-h-[64vw] md:min-h-[30vw] lg:min-h-[17vw] xl:min-h-[16vw] 2xl:min-h-[8vw] bg-white mx-4 border rounded-lg shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px] mb-8" >    <div class="hidden sm:flex justify-end absolute top-2 right-2">
      <img src="./images/regular-heart.svg" alt="" class="w-5 h-5" />
    </div>
  <div class="relative flex flex-col md:flex-row justify-between p-4">
      <!-- First Div Start -->
      <div         class="absolute md:static xsm:top-28 ysm:top-24 xsm:left-4 ysm:left-12 sm:left-10 md:w-1/6 flex flex-col justify-center items-center"      >
        <div class="w-28 h-16">
          <img src="{{asset('assets/'.$product->thumbnail_retailer)}}" alt="sky" class="w-full h-full" />
        </div>
        {{-- <p class="hidden md:block mt-2 text-center">order by phone</p>
        <p class="hidden md:block text-center">0333 210 1135</p> --}}
      </div>
      <!-- First Div End -->
  
      <!-- Second Div Start -->
  <div class="md:w-4/6 px-2 md:px-4">
        <div class="flex justify-between">
          <div>
            <div class="mb-4 md:mb-0">
              <h1
                class="absolute md:static left-4 -top-8 my-10 md:my-0 text-primary font-bold text-lg md:text-xl"
              >
              {{$product->title}}
              </h1>
            </div>
            @if ($product->promo_and_info!='')
                
           
            <div class="mt-3 flex items-center gap-2">
              <div
                class="absolute md:static top-48 left-1 ysm:left-2 sm:left-14 bg-[#C9EEF3] px-2 py-1 xl:px-3 md:py-1.5 rounded-full flex items-center"
              >
                <div class="text-primary text-sm">{{$product->promo_and_info}}</div>
                <div class="w-5 h-5 md:ml-1">
                  <img src="./images/info-icon.svg" alt="" class="" />
                </div>
              </div>
              {{-- <div
                class="absolute md:static top-48 left-32 ysm:left-[135px] sm:left-48 bg-[#C9EEF3] px-1 py-1 ysm:px-2 md:px-3 md:py-1.5 rounded-full flex items-center"
              >
                <div class="text-primary text-sm">No 2024 price Rise</div>
                <div class="w-5 h-5 md:ml-1">
                  <img src="./images/info-icon.svg" alt="" class="" />
                </div>
              </div> --}}
            </div>
            @endif
          </div>
          {{-- <div
            class="absolute md:static top-20 xsm:right-4 ysm:right-6 zsm:right-12 sm:right-28 bg-[#001E70] text-white w-16 h-18 zsm:w-20 zsm:h-20 rounded-xl flex flex-col items-center justify-center p-2"
          >
            <span class="text-[22px]">£90</span>
            <span class="text-[12px] text-center">GIFT CARD</span>
          </div> --}}
        </div>
  
        <div       class="zsm:pl-8 sm:pl-14 md:pl-0 absolute md:static xsm:top-52 ysm:top-44 left-0 flex gap-2 sm:gap-4 xl:gap-6 mt-10 md:mt-0 md:py-3"
        >
         @if($product->download_speed)
          <div class="bg-lightBlue">
            <div class="flex flex-col sm:flex-row sm:gap-7 xl:gap-10 items-center min-w-0">
              <span class="text-primary font-bold text-[1.3125rem] min-w-0 order-2 sm:order-none" >{{$product->download_speed}}{{$product->download_speed_unit}}</span>
              <img src="./images/info-icon.svg" alt="" class="w-5 h-5 order-1 sm:order-none"/>
            </div>
            <p class="text-primary text-sm ml-2 text-center sm:text-start">average speed</p>
          </div>
          @endif
            
          @if($product->channels != 'No' && !empty(trim($product->channels)))
          <div class="bg-lightBlue rounded">
            <div      class="flex flex-col sm:flex-row sm:gap-7 xl:gap-10 items-center min-w-0"
            >
              <span
                class="text-primary font-bold text-[1.3125rem] min-w-0 order-2 sm:order-none"
                >{{$product->channels}}</span
              >
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-5 h-5 order-1 sm:order-none"
              />
            </div>
            <p class="text-primary text-sm ml-2 text-center sm:text-start">
              Tv channels
            </p>
          </div>
          @endif
  
          <div class="bg-lightBlue rounded">
            <div
              class="flex flex-col sm:flex-row sm:gap-7 xl:gap-10 items-center min-w-0"
            >
              <span
                class="text-primary font-bold text-[1.3125rem] min-w-0 order-2 sm:order-none"
                >@if ($product->set_up_cost=='0')
                {{'Zero'}}
            @else 
            {{$product->set_up_cost}}   
            @endif</span
              >
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-5 h-5 order-1 sm:order-none"
              />
            </div>
            <p class="text-primary text-sm ml-2 text-center sm:text-start">
              one-off cost
            </p>
          </div>
          <div class="hidden sm:block bg-lightBlue rounded">
            <div
              class="flex flex-col justify-center sm:flex-row sm:gap-2 xl:gap-10 items-center min-w-0"
            >
              <span
                class="text-primary font-bold text-[1.3125rem] min-w-0 order-2 sm:order-none"
                >{{$product->contract_months}}</span
              >
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-5 h-5 order-1 sm:order-none"
              />
            </div>
            <p class="text-primary text-sm ml-2 text-center sm:text-start">
              month contract
            </p>
          </div>
          @if($product->calls != 'No')
          <div class="hidden sm:block sm:w-20 sm:mr-10 sm:mr-0 bg-lightBlue rounded w-full md:w-auto">
            <p class="text-primary text-sm ml-2">{{$product->calls}}</p>
          </div>
          @endif
        </div>
      </div>
      <!-- Second Div End -->
  
      <!-- Third Div Start -->
      <div class="relative md:w-1/6 flex flex-col justify-center items-center text-center"       >
        <div  class="absolute md:static xsm:left-32 ysm:left-44 zsm:left-48 sm:left-44 xsm:top-20 ysm:top-14 w-20 sm:w-40 md:w-full flex flex-col sm:items-center"         >
          <span class="text-primary font-bold text-3xl">£{{$product->promo_monthly}}</span>
          <span class="text-primary font-bold md:mr-2">per month</span>
          <span class="cursor-pointer">
            <img
              src="./images/info-icon.svg"
              alt=""
              class="w-5 h-5 order-1 view-more-info sm:order-none"  data-record-id="{{$product->id}}"
            />
          </span>
          <span class="md:w-full text-primary text-xs md:mb-2"
            >(prices may change during contract)</span
          >
        </div>
        
        <div
          class="flex flex-col sm:flex-row gap-4 sm:gap-2 sm:items-center md:block absolute md:static xsm:top-[20.2rem] ysm:top-[17rem] w-full"
        >
        <a href="{{url('/getdetail/'.$product->provider_id)}}" target="_blank">  
        <button  style="cursor: pointer"  class="w-full bg-pink hover:bg-primary text-white rounded-full sm:mb-2 px-4 sm:px-0 sm:grow xl:px-6 py-2 font-bold text-lg get-detail"
          >
            Get Deal
          </button></a>
          <button
            class="w-full text-[#FF006D] hover:text-primary sm:underline font-normal sm:mb-2 px-4 p-[10px] sm:grow border border-pink rounded-full view-more-info" data-record-id="{{$product->id}}"
          >
            More Info
          </button>

          <span class="sm:w-full"><strong> Offer Ends: {{$product->offer_ends}}</strong></span>
          <!-- Third Div End -->
        </div>
      </div>
    </div>
    {{-- <div class="hidden sm:block -mt-3 pl-[152px] xl:pl-[184px] pb-3">
      <p>New Customer only</p>
    </div> --}}
    <div      class="absolute left-14 top-[25.2rem] block sm:hidden text-[18px] text-[#000038]"    >
      <span>or call</span> <span class="font-bold">0333 2104567</span>
    </div>
  </div>
    @endforeach
    </div>
    <!--Card Code on Desktop End-->
    <!--Buttton to show more details-->
    <div class="flex justify-center">
      <button class="text-primary font-bold rounded-full md:rounded-none text-lg md:text-2xl border-2 md:border border-primary px-10 py-2 hover:bg-pink hover:text-white hover:border-pink" id="load_more_button" data-page="{{ $products->currentPage() + 1 }}">
        Show me more deals
      </button>
    </div>
  </div>
  <!--Cards End-->
   <!-- End common section before side bar and content section -->
  </div>
  </div>
  <!-- Overlay -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  @endsection