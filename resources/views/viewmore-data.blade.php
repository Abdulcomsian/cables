     <!-- Modal header -->
     {{-- @foreach($moreinfodata as $moreinf ) --}}
     <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <div class="w-28 h-16">
            <img src="{{asset('assets/'.$productdetail->thumbnail_retailer)}}" alt="sky" class="w-full h-full" />
          </div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
             {{$productdetail->title}}
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal-btn">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!--Mudasar-->
      <!-- Modal body -->
      <div class="w-full">
        <div class="relative right-0">
          <ul
            class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60 w-full"
            data-tabs="tabs"
            role="list"
          >
            <li class="z-30 flex-auto text-center">
              <a
                class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                data-tab-target=""
                active=""
                role="tab"
                aria-selected="true"
                aria-controls="app"
              >
                <span class="ml-1">Overview</span>
              </a>
            </li>
            
          </ul>
          <div data-tab-content="" class="p-5">
            <div class="block opacity-100" id="app" role="tabpanel">
              @if ($productdetail->download_speed!='0' && $productdetail->download_speed!='' && $productdetail->upload_speed!='0' && $productdetail->upload_speed!='None')
                  
            
               <div class="box">
                  <h2 class="font-bold text-lg text-[#000038]">Broadband</h2>
                <ul class="w-full py-4 border-b border-gray-300">
                 <li class="flex justify-between">
                  <span class="text-sm">Download speed (average)</span>
                  <span class="text-sm text-[#333] font-bold"> {{$productdetail->download_speed}}{{$productdetail->download_speed_unit}}</span>
                 </li>

                <li class="flex justify-between">
                    
                 
                <span class="text-sm">Upload speed (average)</span>
                <span class="text-sm text-[#333] font-bold"> {{$productdetail->upload_speed}}{{$productdetail->upload_speed_unit}}</span>
              </li>
            </ul>
            </div>
            @endif
            @if ($productdetail->channels!='No')
                  
            
            <div class="box">
               <h2 class="font-bold text-lg text-[#000038]">TV package</h2>
             <ul class="w-full py-4 border-b border-gray-300">
              <li class="flex justify-between">
               <span class="text-sm">TV channels</span>
               <span class="text-sm text-[#333] font-bold"> {{$productdetail->channels}}</span>
              </li>

             {{-- <li class="flex justify-between">
                 
              
             <span class="text-sm">HD channels/span>
             <span class="text-sm text-[#333] font-bold"> {{$productdetail->upload_speed}}{{$productdetail->upload_speed_unit}}</span>
           </li> --}}
         </ul>
         </div>
         @endif
            <div class="py-4">
              <h2 class="font-bold text-lg text-[#000038]">Pricing and contract </h2>
                <span class="text-sm">Please note: prices may change during contract</span>
                <ul class="w-full py-4 border-b border-gray-300">
                  <li class="flex justify-between">
                <span class="text-sm">Monthly cost</span>
                <span class="text-sm text-[#333] font-bold">£{{$productdetail->promo_monthly}}</span>
              </li>
              @php
              $fristyearcost=$productdetail->promo_monthly*12;
             @endphp
              <li class="flex justify-between">
                <span class="text-sm">First year cost</span>
                <span class="text-sm text-[#333] font-bold">£{{$fristyearcost}}</span>
              </li>
             
              <li class="flex justify-between">
                <span  class="text-sm">Minimum contract length</span>
                <span class="text-sm text-[#333] font-bold">{{$productdetail->contract_months}} months</span>
              </li>
              @php
              $overallcost=$productdetail->promo_monthly*$productdetail->contract_months;
             @endphp
              <li class="flex justify-between">
                <span class="text-sm">Overall cost</span>
                <span class="text-sm text-[#333] font-bold">£{{$overallcost}}</span>
              </li>
            </ul>
              </div>
              <div class="py-4">
                <h2 class="font-bold text-lg text-[#000038]">One-off and upfront costs </h2>
                <ul class="w-full py-4 border-b border-gray-300">
                  <li class="flex justify-between">
                  <span class="text-sm">Set-up cost</span>
                  <span class="text-sm text-[#333] font-bold">£{{$productdetail->set_up_cost}}</span>
                </li>
              </ul>
                </div>   
                
            
             
            </div>
            <div class="hidden opacity-0" id="message" role="tabpanel">
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500">
                The reading of all good books is like a conversation with the finest
                minds of past centuries.
              </p>
            </div>
            <div class="hidden opacity-0" id="settings" role="tabpanel">
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500">
                Comparing yourself to others is the thief of joy.
              </p>
            </div>
            <div class="hidden opacity-0" id="settings" role="tabpanel">
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500">
                Comparing yourself to others is the thief of joy.
              </p>
            </div>
          </div>
        </div>
      </div>
      <style>
        .cl-package-details .bold-head-2 {
    font-size: 19px;
    margin-bottom: 20px;
    color: #000038;
}
.cl-package-details .list-col, .cl-package-details .list-col-row {
    vertical-align: top;
    padding: 0px 0px 6px 0px;
    font-size: 14px;
    color: #333;
    font-weight: normal;
    text-align: left;
}
.cl-package-details .list-col {
    width: 70%;
    float: left;
}
      </style>
      {{-- @endforeach --}}