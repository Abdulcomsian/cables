@extends('layouts.main' ,['page_title' => 'Broadbands'])
@section('content')
<!--Cards Start-->
<div class="w-full lg:w-9/12">
    <div class="flex justify-between items-center mb-4 mx-4">
      <h2 class="w-full font-bold text-2xl text-primary hidden md:block">
        60 deals available
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
        <form
          class="w-full flex justify-between items-center md:max-w-xs mx-auto md:mr-2"
        >
          <label
            for="deals"
            class="block w-full max-w-20 text-lg font-bold text-primary md:hidden"
            >Sort by</label
          >
          <select
            id="deals"
            class="border border-primary text-primary bg-white md:bg-transparent text-sm rounded focus:outline-none block w-full p-2.5"
          >
            <option selected>Most Popular Deals</option>
            <option >Best Value Deal</option>
            <option >Price (low to high)</option>
            <option >Download speed (low to high)</option>
          </select>
        </form>
  
        <img
          src="./images/question-mark-icon.svg"
          alt=""
          class="w-8 h-8 hidden md:block"
        />
      </div>
    </div>
    <!--Card Code on Mobile view Start-->
    <div  class="bg-white mx-4 flex flex-col md:flex-row justify-between p-4 rounded-lg shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px] mb-8 black md:hidden"
    >
      <!--First div showing Heading and Heart-->
      <div class="flex justify-between items-start md:items-center mb-4">
        <h1 class="text-primary font-bold text-lg font-sans mr-4">
          Sky Stream + Entertainment + Netflix + Superfast
        </h1>
        <div class="w-7 h-7">
          <img
            src="./images/regular-heart.svg"
            alt=""
            class="w-full h-full"
          />
        </div>
      </div>
      <!--First div End-->
  
      <!--Second div showing company logo and price Start-->
      <div class="grid grid-cols-2 sm:grid-cols-3 mb-4">
        <div class="flex items-center justify-center">
          <div class="w-20 sm:w-28">
            <img
              src="./images//sky-8.webp"
              alt="sky"
              class="w-full object-cover"
            />
          </div>
        </div>
  
        <div class="pl-5 border-l border-gray-300">
          <div class="flex items-end">
            <span class="text-primary font-bold text-2xl">£39</span>
            <span class="text-primary font-medium text-sm">.00</span>
          </div>
  
          <div class="flex items-center">
            <span class="text-primary font-bold mr-2">per month</span>
            <div class="w-5 h-5">
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-full h-full"
              />
            </div>
          </div>
          <span class="text-primary text-xs mb-2"
            >(prices may change during contract)</span
          >
        </div>
      </div>
  
      <!--Second Div end-->
      <!--Ul List Start-->
      <p class="w-full flex flex-wrap break-words text-[0.9375rem] mb-4 font-medium">
        <span class="li-with-dot">New customers only</span>
        <span class="li-with-dot ml-[0.4rem]">No dish needed</span>
        <span class="li-with-dot ml-[0.4rem]">Stream live TV</span>
      </p>
      <!--Ul List End-->
      <!--Speed Cards Start-->
      <div class="grid grid-cols-3 gap-2 mb-4">
        <div class="bg-lightBlue p-2 rounded-lg w-full">
          <div
            class="flex justify-between "
          >
            <span class="text-primary font-bold text-[1.3125rem]">65MB</span>
            <div class="w-5 h-5">
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-full h-full"
              />
            </div>
          </div>
          <p class="text-primary text-sm font-sans">average speed</p>
        </div>
        <div class="bg-lightBlue p-2 rounded-lg w-full">
          <div
            class="flex justify-between text-primary font-semibold text-lg"
          >
             <span class="text-primary font-bold text-[1.3125rem]">Zero</span>
            <div class="w-5 h-5">
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-full h-full"
              />
            </div>
          </div>
         <p class="text-primary text-sm font-sans">one-off cost</p>
        </div>
        <div class="bg-lightBlue p-2 rounded-lg w-full">
          <div
            class="flex justify-between text-primary font-semibold text-lg"
          >
             <span class="text-primary font-bold text-[1.3125rem]">24</span>
            <div class="w-5 h-5">
              <img
                src="./images/info-icon.svg"
                alt=""
                class="w-full h-full"
              />
            </div>
          </div>
         <p class="text-primary text-sm font-sans">months contract</p>
        </div>
      </div>
      <!--Speed Cards End-->
      <!--Buttons Start-->
      <div class="flex justify-between gap-2 mb-4">
        <button
          class="w-full border-2 border-pink rounded-full py-2 text-pink font-semibold text-lg"
        >
          More Info
        </button>
        <button
          class="w-full bg-pink rounded-full py-2  text-white font-semibold text-lg"
        >
          Get Deal
        </button>
      </div>
      <p class="flex items-center justify-center text-base text-primary">
        <span class="mr-[3px]">or call </span>
        <span class="font-bold">0333 210 1143</span>
      </p>
      <!--Buttons End-->
    </div>
    <!--Card Code on Mobile view End-->
  
    <!--Card Code on Desktop Start-->
    <div class="bg-white mx-4 hidden md:flex justify-between p-4 rounded-lg shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px] mb-8">
      <!--First Div Start-->
      <div class="w-1/6 flex flex-col justify-center items-center">
        <div class="w-30 h-20">
          <img
            src="./images//sky-8.webp"
            alt="sky"
            class="w-full h-full"
          />
        </div>
  
        <p>order by phone</p>
        <p>0333 210 1135</p>
      </div>
      <!--First Div End-->
      <!--Second Div Start-->
      <div class="w-4/6 px-4">
        <h1 class="w-full text-primary font-bold text-xl">
          Sky Stream + Entertainment + Netflix + Superfast
        </h1>
        <div class="flex justify-between py-5">
          <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
            <div
              class="flex flex-col lg:flex-row lg:justify-between items-center"
            >
              <span
                class="text-primary font-bold text-[1.3125rem] order-2 lg:order-1 lg:mr-auto"
                >67MB</span
              >
              <div class="w-5 h-5 order-1 lg:order-2 lg:ml-auto">
                <img
                  src="./images/info-icon.svg"
                  alt=""
                  class="w-full h-full"
                />
              </div>
            </div>
            <p
              class="text-primary text-sm text-center lg:text-left lg:max-w-16 order-3"
            >
              average speed
            </p>
          </div>
  
          <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
            <div
              class="flex flex-col lg:flex-row lg:justify-between items-center"
            >
              <span
                class="text-primary font-bold  text-[1.3125rem] order-2 lg:order-1 lg:mr-auto"
                >150+</span
              >
              <div class="w-5 h-5 order-1 lg:order-2 lg:ml-auto">
                <img
                  src="./images/info-icon.svg"
                  alt=""
                  class="w-full h-full"
                />
              </div>
            </div>
            <p
              class="text-primary text-sm text-center lg:text-left order-3 lg:max-w-16"
            >
              Tv channels
            </p>
          </div>
  
          <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
            <div
              class="flex flex-col lg:flex-row lg:justify-between items-center text-primary font-semibold text-lg"
            >
              <span
                class="text-primary font-bold  text-[1.3125rem] order-1 lg:order-none"
                >Zero</span
              >
              <div class="w-5 h-5">
                <img
                  src="./images/info-icon.svg"
                  alt=""
                  class="w-full h-full order-0 lg:order-none"
                />
              </div>
            </div>
            <p
              class="text-primary text-sm text-center lg:max-w-16 lg:text-left"
            >
              one-off cost
            </p>
          </div>
  
          <div class="bg-lightBlue px-2 py-2 rounded w-full mr-2">
            <div
              class="flex flex-col lg:flex-row lg:justify-between items-center text-primary font-semibold text-lg"
            >
              <span
                class="text-primary font-bold  text-[1.3125rem] order-1 lg:order-none"
                >24</span
              >
              <div class="w-5 h-5">
                <img
                  src="./images/info-icon.svg"
                  alt=""
                  class="w-full h-full order-0 lg:order-none"
                />
              </div>
            </div>
            <p
              class="text-primary text-sm text-center lg:max-w-16 lg:text-left"
            >
              months contract
            </p>
          </div>
  
          <div class="bg-lightBlue px-2 py-2 rounded w-full">
            <div
              class="flex flex-col lg:flex-row lg:justify-between items-center lg:items-start text-primary"
            >
              <p
                class="text-primary text-sm text-center lg:max-w-16 order-1 lg:order-none lg:text-left"
              >
                pay as you go calls
              </p>
              <div class="w-5 h-5 order-0 lg:order-none">
                <img
                  src="./images/info-icon.svg"
                  alt=""
                  class="w-full h-full"
                />
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
      <div
        class="relative w-1/6 flex flex-col justify-center items-center text-center"
      >
        <div class="absolute top-0 right-0 w-5 h-5">
          <img
            src="./images/regular-heart.svg"
            alt="Heart Icon"
            class="w-full h-full"
          />
        </div>
        <div class="flex items-end">
          <span class="text-primary font-bold text-3xl">£39</span>
          <span class="text-primary font-medium text-lg">.00</span>
        </div>
        <div class="flex items-center">
          <span class="text-primary font-bold mr-2">per month</span>
          <div class="w-5 h-5">
            <img
              src="./images/info-icon.svg"
              alt="Info Icon"
              class="w-full h-full"
            />
          </div>
        </div>
        <span class="text-primary text-xs mb-2"
          >(prices may change during contract)</span
        >
        <button
          class="bg-pink hover:bg-primary text-white rounded-full mb-2 px-4 lg:px-6 py-2 font-bold text-lg"
        >
          Get Deal
        </button>
        <button
          class="text-[#FF006D] hover:text-primary underline font-normal"
        >
          More Info
        </button>
      </div>
      <!--Third Div End-->
    </div>
    <!--Card Code on Desktop End-->
    <!--Buttton to show more details-->
    <div class="flex justify-center">
      <button
        class="text-primary font-bold rounded-full md:rounded-none text-lg md:text-2xl border-2 md:border border-primary px-10 py-2 hover:bg-pink hover:text-white hover:border-pink"
      >
        Show me more deals
      </button>
    </div>
  </div>
  <!--Cards End-->
   <!-- End common section before side bar and content section -->
  </div>
  </div>
  @endsection