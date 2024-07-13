@foreach($products as $product )

<div class="bg-white mx-4 ticket hidden md:flex justify-between p-4 rounded-lg shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px] mb-8">
    <!--First Div Start-->
    <div class="w-1/6 flex flex-col justify-center items-center">
      <div class="w-30 h-20">
        <img src="{{asset('assets/'.$product->thumbnail_retailer)}}" alt="sky" class="w-full h-full">
      </div>

    </div>
    <!--First Div End-->
    <!--Second Div Start-->
    <div class="w-4/6 px-4">
      <h1 class="w-full text-primary font-bold text-xl">
        {{$product->title}}
      </h1>
      <div class="flex justify-between py-5">
        <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
          <div class="flex flex-col lg:flex-row lg:justify-between items-center">
            <span class="text-primary font-bold text-[1.3125rem] order-2 lg:order-1 lg:mr-auto">{{$product->download_speed}}{{$product->download_speed_unit}}</span>
            <div class="w-5 h-5 order-1 lg:order-2 lg:ml-auto">
              <img src="./images/info-icon.svg" alt="" class="w-full h-full">
            </div>
          </div>
          <p class="text-primary text-sm text-center lg:text-left lg:max-w-16 order-3">
            average speed
          </p>
        </div>

        <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
          <div class="flex flex-col lg:flex-row lg:justify-between items-center">
            <span class="text-primary font-bold  text-[1.3125rem] order-2 lg:order-1 lg:mr-auto">{{$product->channels}}</span>
            <div class="w-5 h-5 order-1 lg:order-2 lg:ml-auto">
              <img src="./images/info-icon.svg" alt="" class="w-full h-full">
            </div>
          </div>
          <p class="text-primary text-sm text-center lg:text-left order-3 lg:max-w-16">
            Tv channels
          </p>
        </div>

        <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
          <div class="flex flex-col lg:flex-row lg:justify-between items-center text-primary font-semibold text-lg">
            <span class="text-primary font-bold  text-[1.3125rem] order-1 lg:order-none">                 @if ($product->set_up_cost=='0')
                {{'Zero'}}
            @else 
            {{$product->set_up_cost}}   
            @endif
              </span>
            <div class="w-5 h-5">
              <img src="./images/info-icon.svg" alt="" class="w-full h-full order-0 lg:order-none">
            </div>
          </div>
          <p class="text-primary text-sm text-center lg:max-w-16 lg:text-left">
            one-off cost
          </p>
        </div>

        <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
          <div class="flex flex-col lg:flex-row lg:justify-between items-center text-primary font-semibold text-lg">
            <span class="text-primary font-bold  text-[1.3125rem] order-1 lg:order-none">  {{$product->contract_months}}    </span>
            <div class="w-5 h-5">
              <img src="./images/info-icon.svg" alt="" class="w-full h-full order-0 lg:order-none">
            </div>
          </div>
          <p class="text-primary text-sm text-center lg:max-w-16 lg:text-left">
            months contract
          </p>
        </div>

        <div class="bg-lightBlue px-2 py-2 rounded w-full">
          <div class="flex flex-col lg:flex-row lg:justify-between items-center lg:items-start text-primary">
            <p class="text-primary text-sm text-center lg:max-w-16 order-1 lg:order-none lg:text-left">
              pay as you go calls
            </p>
            <div class="w-5 h-5 order-0 lg:order-none">
              <img src="./images/info-icon.svg" alt="" class="w-full h-full">
            </div>
          </div>
        </div>
      </div>
      <ul class="w-full flex flex-wrap text-base font-medium">
        <li class="li-with-dot">New customers only</li>
        <li class="li-with-dot ml-[0.4rem]">No dish needed</li>
        <li class="li-with-dot ml-[0.4rem]">Stream live TV</li>
      </ul>
    </div>
    <!--Second Div End-->
    <!--Third Div Start-->
    <div class="relative w-1/6 flex flex-col justify-center items-center text-center">
      <div class="absolute top-0 right-0 w-5 h-5">
        <img src="./images/regular-heart.svg" alt="Heart Icon" class="w-full h-full">
      </div>
      <div class="flex items-end">
        <span class="text-primary font-bold text-3xl">£{{$product->stand_monthly}}</span>
        {{-- <span class="text-primary font-medium text-lg">.00</span> --}}
      </div>
      <div class="flex items-center">
        <span class="text-primary font-bold mr-2">per month</span>
        <div class="w-5 h-5">
          <img src="./images/info-icon.svg" alt="Info Icon" class="w-full h-full">
        </div>
      </div>
      <span class="text-primary text-xs mb-2">(prices may change during contract)</span>
      <button class="bg-pink hover:bg-primary text-white rounded-full mb-2 px-4 lg:px-6 py-2 font-bold text-lg">
        Get Deal
      </button>
      <button class="text-[#FF006D] hover:text-primary underline font-normal">
        More Info
      </button>
    </div>
    <!--Third Div End-->
  </div>

  @endforeach