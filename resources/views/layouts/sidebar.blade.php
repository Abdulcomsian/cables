
<!--Filters Start-->
<div id="filter-panel" class="fixed overflow-y-auto	h-dvh md:relative top-0 left-0 h-full md:h-auto w-full md:w-3/12 bg-white px-4 hidden md:block transition-transform transform -translate-x-full md:translate-x-0 z-50">
  <div class="flex justify-between">
    <h2 class="font-bold text-xl text-[#000038]">Filter results</h2>
    <button id="close-button" class="px-2 py-1 font-bold text-white bg-gray-400 text-base rounded md:hidden">
      Close
  </button>
  <button id="reset-button" class="px-2 py-1 font-bold text-white bg-gray-400 text-base rounded">
      Reset
  </button>
  </div>
 <form action="" id="">
  <!--Speed Filters Start-->
  <div class="mb-4 speed-section">
    <h2 class="font-bold text-xl text-filter mb-3">Speed</h2>
    <div class="grid grid-cols-2 gap-2">
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center">
        <input type="checkbox" id="bb-mbps-1" data-type="speed" data-name="speed[]" value="1mb-60mb"  class="submitform hidden simple-checkbox" />
        1-60MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox"  name="bb-mbps-60" id="bb-mbps-60" data-type="speed" data-name="speed[]" value="60mb-100mb" class="hidden simple-checkbox submitform" />
        60-100MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="bb-mbps-100" id="bb-mbps-100" data-type="speed" data-name="speed[]" value="100mb-500mb" class="hidden simple-checkbox submitform" />
        100-500MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox"  name="bb-mbps-500" id="bb-mbps-500" data-type="speed" data-name="speed[]" value="500mb-999mb-1gb" class="hidden simple-checkbox submitform"  />
        500-1GB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox"  name="bb-mbps-1000" id="bb-mbps-1000" data-type="speed" data-name="speed[]" value="1gb+"  class="hidden simple-checkbox submitform" />
        1GB+
      </label>
    </div>
  </div>
  <!--Speed Filters End-->

  <!--Provider Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Providers</h2>

    <div class="grid grid-cols-3 gap-2">
      <label      class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="provider-sky" data-type="provider" id="provider-sky"  data-name="provider[]" value="2" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Sky_logo_thunbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label    class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox" name="provider-virgin" data-type="provider"  id="provider-virgin" data-name="provider[]" value="1"  class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Virgin_Media_logo_thunbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="provider-bt" data-type="provider"  id="provider-bt"  data-name="provider[]" value="3" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/BT_logo_thunbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="provider-talktalk" data-type="provider"  id="provider-talktalk"  data-name="provider[]" value="8" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/TalkTalk_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="provider-plusnet" data-type="provider"  id="provider-plusnet"  data-name="provider[]" value="5" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Hyperoptic_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-now-broadband" data-type="provider"  id="provider-now-broadband"  data-name="provider[]" value="6" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/NOW_Broadband_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>

      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-ee" data-type="provider"  id="provider-ee"  data-name="provider[]" value="4" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/EE_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-plusnet" data-type="provider"  id="provider-plusnet"  data-name="provider[]" value="7" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Plusnet_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      {{-- new providers --}}
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-befibre" data-type="provider"  id="provider-befibre"  data-name="provider[]" value="9" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/befibre_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-brsk" data-type="provider"  id="provider-brsk"  data-name="provider[]" value="10" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets/images/brsk_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-communityfibre" data-type="provider"  id="provider-communityfibre"  data-name="provider[]" value="11" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets/images/community_fibre_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-fibrus" data-type="provider"  id="provider-fibrus"  data-name="provider[]" value="12" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets/images/fibrus_logo_thumbnal.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-rebel" data-type="provider"  id="provider-rebel"  data-name="provider[]" value="13" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets/images/rebel_internet_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox"  name="provider-vodafone" data-type="provider"  id="provider-vodafone"  data-name="provider[]" value="14" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets/images/vodafone_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>


    </div>
  </div>
  <!--Provider Filters End-->


  <!--Tv Channel Filter starts-->
  <div class="mb-4 channel-section">
    <div class="channel-content">
      <h2 class="font-bold text-xl text-filter mb-3">Channels</h2>
  
      <div class="grid grid-cols-3 gap-2">
        <label      class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
        >
          <input type="checkbox"  name="channel-cartoon-network" data-type="channel" id="channel-cartoon-network"  data-name="channel[]" value="cartoon network" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/cartoon-network.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label    class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox" name="channel-comedy-centeral" data-type="channel"  id="channel-comedy-centeral"  data-name="channel[]" value="comedy central"  class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/comedy-central.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label
          class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
        >
          <input type="checkbox" name="channel-discovery" data-type="channel"  id="channel-discovery"  data-name="channel[]" value="discovery" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/discovery.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label
          class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
        >
          <input type="checkbox" name="channel-discovery+" data-type="channel"  id="channel-discovery+"  data-name="channel[]" value="discovery+" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/discovery-plus.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label
          class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
        >
          <input type="checkbox" name="channel-eurosport" data-type="channel"  id="channel-eurosport"  data-name="channel[]" value="eurosport" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/eurosport.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-mtv" data-type="channel"  id="channel-mtv"  data-name="channel[]" value="Mtv" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/mtv.png')}}" alt="" class="w-full" />
          </div>
        </label>
  
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-ee" data-type="channel"  id="channel-netflix"  data-name="channel[]" value="netflix" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/netflix.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="nickelodeon" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/nickelodeon.png')}}" alt="" class="w-full" />
          </div>
        </label>
  
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-paramount+" data-type="channel"  id="channel-paramount+"  data-name="channel[]" value="paramount+" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/paramount-plus.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="sky atlantic" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/sky-atlantic.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="sky cinema" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/sky-cinema.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="sky kids" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/sky-kids.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="sky sci-fi" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/sky-sci-fi.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="sky sports" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/sky-sports.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="sky witness" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/sky-witness.png')}}" alt="" class="w-full" />
          </div>
        </label>
        <label class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
          <input type="checkbox"  name="channel-nikelodeon" data-type="channel"  id="channel-nikelodeon"  data-name="channel[]" value="tnt sport" class="hidden image-checkbox submitform" />
          <div class="w-16">
            <img src="{{asset('images/tnt-sports.png')}}" alt="" class="w-full" />
          </div>
        </label>
  
  
      </div>
    </div>
  </div>
  <!--Tv Channel Filter ends-->





  <!--Package Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Package</h2>
    <div class="grid grid-cols-1 gap-2">
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="pkg-bbtv" id="pkg-bbtv" data-type="package" data-package-name="broadband-tv"   data-name="package[]" value="2"  class="hidden simple-checkbox submitform " />
        Broadband + TV
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"   name="pkg-bbcalls" id="pkg-bbcalls" data-type="package" data-package-name="broadband-call"   data-name="package[]" value="5"  class="hidden simple-checkbox submitform" />
        Broadband + calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="pkg-bb" id="pkg-bb" data-type="package" data-package-name="broadband-only"   data-name="package[]" value="1"  class="hidden simple-checkbox submitform" />
        Broadband only
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="pkg-bb" id="pkg-bb" data-type="package" data-package-name="tv-only"   data-name="package[]" value="4"  class="hidden simple-checkbox submitform" />
        TV only
      </label>
      <label
      class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
    >
      <input type="checkbox" name="pkg-bb" id="pkg-bb" data-type="package" data-package-name="packages"   data-name="package[]" value="3"  class="hidden simple-checkbox submitform" />
      Packages
    </label>
    </div>
  </div>
  <!--Package Filters End-->
  <!--Monthly Cost Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Monthly cost</h2>
    <div class="grid grid-cols-2 gap-2">
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox"  name="monthly-s" id="monthly-s" data-type="cost"   data-name="monthlycost[]" value="0-25" class="hidden simple-checkbox submitform" />
        £0-£25
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="monthly-m" id="monthly-m" data-type="cost"    data-name="monthlycost[]" value="25-50" class="hidden simple-checkbox submitform" />
        £25-£50
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="monthly-l" id="monthly-l" data-type="cost"   data-name="monthlycost[]" value="50-75" class="hidden simple-checkbox submitform" />
        £50-£75
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="monthly-xl" id="monthly-xl" data-type="cost"   data-name="monthlycost[]" value="75+"   class="hidden simple-checkbox submitform" />
        £75+
      </label>
    </div>
  </div>
  <!--Monthly Cost Filters End-->

  <!--Offers Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Offers</h2>
    <div class="grid grid-cols-1 gap-2">
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="no_upfront_cost" id="no_upfront_cost" data-type="offers" name="offers[]"  value="no_upfront_cost" class="hidden simple-checkbox submitform" />
        Deals with no upfront cost
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="off" id="off"  value="not required" data-type="offers" name="offers[]"  class="hidden simple-checkbox submitform" />
        Deals with rewards and offers
      </label>
    </div>
  </div>
  <!--Offers Filters End-->

  <!--Providers Filters Start-->
  {{-- <div class="mb-4">
    <h2 class="font-bold text-xl text-primary mb-3">TV channels</h2>
    <div class="grid grid-cols-3 gap-2">
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform"  data-type="channels" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform"   data-type="channels" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform"  data-type="channels"  />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform"  data-type="channels"  />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform"  data-type="channels"  />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform"  data-type="channels"  />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>

    </div>
  </div> --}}
  <!--Providers Filters End-->

  <!--Contract length Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Contract length</h2>
    <div class="grid grid-cols-2 gap-2">
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" name="contract" value="1" data-type="contract"  data-name="contract[]"  />
        1 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="contract"  class="hidden simple-checkbox submitform" value="12" data-type="contract" data-name="contract[]"  />
        12 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="contract"  class="hidden simple-checkbox submitform" value="18" data-type="contract"  data-name="contract[]" />
        18 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center"
      >
        <input type="checkbox" name="contract" class="hidden simple-checkbox submitform" value="18+" data-type="contract" data-name="contract[]"  />
        18+ month
      </label>
    </div>
  </div>
  <!--Contract length Filters End-->

  <!--Phone & line Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Phone & line</h2>
    <div class="grid grid-cols-1 gap-2">
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform" value='anytime'  data-type="phone" data-name="phone[]" />
        Anytime calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="phone"  class="hidden simple-checkbox submitform" value='Evenings & Weekends' data-type="phone" data-name="phone[]" />
        Evening & weekend calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform" value='weekend'  data-type="phone"  data-name="phone[]"/>
        Weekend calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform" value='Pay as you go'   data-type="phone" data-name="phone[]" />
        Pay as you go calls
      </label>
      <label class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer">
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform"  value='No' data-type="phone" data-name="phone[]" />No phone line
      </label>

      <label class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer">
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform"  value='international' data-type="phone" data-name="phone[]" />International Calls
      </label>
    </div>
   

  </div>
  {{-- <input id="sort" name="sort" type="text" value="idasc"> --}}
</form>
  <!--Phone & line Filters End-->
</div>

<!--Filters  End-->
  {{-- for info modal --}}

  <div id="modal-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

{{---- Modal toggle ----}}
<!-- Main modal -->
<div id="default-modal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow bg-white" id="packagedetial">
 
     
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(()=>{

  //   $(document).on("change", "#deals", function(e){
  //   let optValue = $(this).find(":selected").val();
  //   console.log(optValue);
  //   let sort_val = optValue;
    
  // });

  

  $(document).on("click" , ".submitform" , function(e){
    e.stopPropagation();
    e.stopImmediatePropagation();
      let provider = [];
      let speed = [];
      let package = [];
      let cost = [];
      let offers = [];
      let contract = [];
      let phone = [];
      let sort = [];
      let channel = [];
      // checkedFilters = document.querySelectorAll("input[type='checkbox']:checked")
      let checkedCheckboxes = document.querySelectorAll("input[type='checkbox']:checked");
      let selectedOption = document.querySelector("select option:checked");
      let checkedFilters = [...checkedCheckboxes, selectedOption];

     
    checkedFilters.forEach( item => {
    switch(item.dataset.type){
          case 'provider':
           provider.push(item.value);
          break;
          case 'speed':
           speed.push(item.value);
          break;
          case 'package':
           package.push(item.value);
          break;
          case 'cost':
           cost.push(item.value); 
          break;
          case 'offers':
           offers.push(item.value); 
          break;
          case 'contract':
          contract.push(item.value); 
          break;
          case 'phone':
          phone.push(item.value);
          break;
          case 'channel':
          channel.push(item.value);
          break;
          default:
          sort.push(item.value); 
        }

    })
    
    filterApplied = document.querySelector("#items_container").dataset.appliedFilter;
    // loadedTickets = parseInt(filterApplied) ? document.querySelectorAll(".ticket").length : 0 
    loadedTickets =  0 
    $.ajax({
          type : 'POST',
          url : '{{route("apply.filter")}}',
          data : { provider , speed , package , cost , offers , contract , phone ,sort, channel ,'_token' : '{{csrf_token()}}' , loadedTicket : loadedTickets},
          success : function(res){
            document.querySelector("#tot_count").innerHTML =res.total_count;
            document.querySelector("#items_container").innerHTML =res.html;

            applyFilteredContract(res.filteredContract);
            applyFilteredPackage(res.filteredPackage);
            applyFilteredCost(res.filteredCost);
            applyFilteredProvider(res.filteredProvider);
            applyFilteredPhone(res.filteredPhone);
            applyFilteredSpeed(res.filteredSpeed);
            applyFilteredOffers(res.filteredOffer);
            applyFilteredChannels(res.filteredChannel);

            if (res.html=='') {
              $('#load_more_button').html('No more deals');
              $('#load_more_button').attr('disabled', true);
            }
            else{
              $('#load_more_button').html('Show me more deals');
              $('#load_more_button').attr('disabled', false);

            }
          }
        })
  })

  let searchBox = document.querySelector("#postcode-input");
  searchBox.addEventListener("keyup", function(){
    let postcode = this.value;
    $.ajax({
          type : 'POST',
          url : '{{route("get.address")}}',
          data : { '_token' : '{{csrf_token()}}' , postcode : postcode},
          success : function(res){
            if(res.status){
              document.querySelector(".address-list").innerHTML = res.html;
            } else {
              document.querySelector(".address-list").innerHTML = '';
            }
          }
    })
  })


  $(document).on("click" , ".address" , function(e){
    let postcode = this.dataset.addressPostcode;
    let latitude = this.dataset.addressLat;
    let longitude = this.dataset.addressLng;
    $.ajax({
          type : 'POST',
          url : '{{route("locate.network")}}',
          data : { '_token' : '{{csrf_token()}}' , postcode , latitude , longitude},
          success : function(res){
            document.querySelector("#tot_count").innerHTML =res.total_count;
            document.querySelector("#items_container").innerHTML =res.html;
            let apiProviders = res.apiProviders;
            applyFilteredContract(res.filteredContract);
            applyFilteredPackage(res.filteredPackage);
            applyFilteredCost(res.filteredCost);
            applyFilteredProvider(res.filteredProvider);
            applyFilteredPhone(res.filteredPhone);
            applyFilteredSpeed(res.filteredSpeed);
            applyFilteredOffers(res.filteredOffer);
          
            apiProviders.forEach( provider => {
              let checkbox = document.querySelector(`input[data-type="provider"][value="${provider}"]`)
              let label = checkbox.closest(".checkbox-label")
              label.setAttribute("class" , "checkbox-label bg-white border flex justify-center items-center w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer bg-lightGray border-primary");
              checkbox.checked = true;
            })

          }
    })
  })

  function applyFilteredContract(contracts){
    let contractsChexbox = document.querySelectorAll("input[name='contract']");
    if(contracts.length > 0){
      contractsChexbox.forEach( contract => {
        let value = contract.value;
        haveElement = false;
        if(value.includes("+")){
          contracts.every( eachContract => {
            if( eachContract >= parseInt(value.replace("+" , "")) ){
              haveElement = true;
              return false;
            }
            return true;
          })
          toggleChexbox( !haveElement  , contract );
          // !haveElement ? contract.closest(".checkbox-label").classList.add('label-disable') : contract.closest(".checkbox-label").classList.remove('label-disable'); 
        } else {
          toggleChexbox( !contracts.includes(value)  , contract );
          // !contracts.includes(value) ? contract.closest(".checkbox-label").classList.add('label-disable') : contract.closest(".checkbox-label").classList.remove('label-disable');
        }

      })
    } 
  }  

function applyFilteredPackage(packages){
  let packagesChexbox = document.querySelectorAll("input[data-name='package[]']");
  let channelSection = document.querySelector(".channel-section");
  let speedSection  = document.querySelector(".speed-section");

  // for hiding  channels
  document.querySelector('input[name="pkg-bb"][value="1"]:checked') || document.querySelector('input[name="pkg-bbcalls"][value="5"]:checked') ? channelSection.classList.add('inactive') : channelSection.classList.remove('inactive');

  // for hiding speed
  document.querySelector('input[name="pkg-bb"][value="4"]:checked') ? speedSection.classList.add('inactive') : speedSection.classList.remove('inactive');

  if(packages.length > 0){
      packagesChexbox.forEach( package => {
        let value = package.value;
        toggleChexbox( !packages.includes(parseInt(value)) , package );
        // !packages.includes(parseInt(value)) ? package.closest(".checkbox-label").classList.add('label-disable') : package.closest(".checkbox-label").classList.remove('label-disable');
      })
   } 
}

function applyFilteredCost(costs){
  let costsChexbox = document.querySelectorAll("input[data-name='monthlycost[]']");
  if(costs.length > 0){
    costsChexbox.forEach( cost => {
        let value = cost.value;
        
        if(value.includes("+")){
          let haveElement = false;
          costs.every( eachCost => {
            if( eachCost >= parseInt(value.replace("+" , ""))){
              haveElement = true;
              return false;
            }
            return true;
          })
          
          toggleChexbox( !haveElement , cost );
          // !haveElement ? cost.closest(".checkbox-label").classList.add('label-disable') : cost.closest(".checkbox-label").classList.remove('label-disable'); 
        } else {
          [lowerCost , upperCost ] = value.split("-")
          let haveElement = false;
          costs.every( eachCost => {
            if( eachCost >= lowerCost  && eachCost <= upperCost ){
              haveElement = true;
              return false;
            }
            return true;
          })
          toggleChexbox( !haveElement , cost );
          // !haveElement ? cost.closest(".checkbox-label").classList.add('label-disable') : cost.closest(".checkbox-label").classList.remove('label-disable');
        }

      })
    } 
}

function applyFilteredProvider(providers){
  let providersChexbox = document.querySelectorAll("input[data-name='provider[]']");
  if(providers.length > 0){
      providersChexbox.forEach( provider => {
        let value = provider.value;
        toggleChexbox( !providers.includes(parseInt(value)) , provider )
        // !providers.includes(parseInt(value)) ? provider.closest(".checkbox-label").classList.add('label-disable') : provider.closest(".checkbox-label").classList.remove('label-disable');
      })
   }
}

function applyFilteredPhone(phones){
  let phonesChexbox = document.querySelectorAll("input[name='phone']");
  if(phones.length > 0){
      phonesChexbox.forEach( phone => {
        let value = phone.value;
        toggleChexbox( !phones.includes(value) , phone )
        // !phones.includes(value) ? phone.closest(".checkbox-label").classList.add('label-disable') : phone.closest(".checkbox-label").classList.remove('label-disable');
      })
    } 
}


function applyFilteredSpeed( speeds ){
  let speedChexbox = document.querySelectorAll("input[data-name='speed[]']");
  Array.from(speedChexbox).forEach( chexbox => {
      let value = chexbox.value;
      speedList = value.split("-");
      let lowerSpeed = parseInt(speedList[0].replace(/[a-zA-Z]/g, ""));
      let upperSpeed = speedList[1] ? parseInt(speedList[1].replace(/[a-zA-Z]/g, "")) : null;
      let extremeSpeed = speedList[2] ? parseInt(speedList[2].replace(/[a-zA-Z]/g, "")) : null;
      haveElement = false;

      speeds.forEach( speed => {
        let unit = speed.download_speed_unit;
        let downloadSpeed = speed.download_speed;
      
        if(value.includes("+")){
          let lowerSpeed = parseInt(speedList[0].replace(/[a-zA-Z]/g, ""));
          if(downloadSpeed >= lowerSpeed && unit.toLowerCase() == 'gb'){
              haveElement = true;
              return false;
          }
        } else {
          if(speedList.length == 2) {
            if(downloadSpeed >= lowerSpeed && downloadSpeed <= upperSpeed)
            {
              haveElement = true;
              return false;
            }
          } else {
            if(unit.toLowerCase() == 'mb'){
                    if(downloadSpeed >= lowerSpeed && downloadSpeed <= upperSpeed){
                      haveElement = true;
                      return false;
                    }
              } else {
                  if( extremeSpeed == downloadSpeed){
                      haveElement = true;
                      return false;
                  }
              }
          }

        }


      })
      toggleChexbox( !haveElement , chexbox )
      // !haveElement ? chexbox.closest(".checkbox-label").classList.add('label-disable') : chexbox.closest(".checkbox-label").classList.remove('label-disable');
      });
}


function applyFilteredOffers(offers){
  let label = document.querySelector("input[name='no_upfront_cost']").closest(".checkbox-label");
  offers.includes(0) ? label.classList.remove("label-disable") : label.classList.add("label-disable")  
}

function applyFilteredChannels(channels){
  let channelCheckboxes = document.querySelectorAll("input[data-name='channel[]']");
  Array.from(channelCheckboxes).forEach( checkbox => {
    let channelName = checkbox.value;
    let haveElement = channels.includes(channelName) ? true : false;
    toggleChexbox(!haveElement , checkbox);
  });
}


function toggleChexbox( condition , chexbox ) {
    if( condition ) {
      let label = chexbox.closest(".checkbox-label");
      $class = label.classList.contains('center-center') ? 'checkbox-label bg-white border  flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer label-disable center-center' : 'checkbox-label bg-white border px-4 border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer label-disable'
      label.setAttribute('class' , $class);
      chexbox.checked = false;
    } else {
      chexbox.closest(".checkbox-label").classList.remove('label-disable');
    }
}

  document.querySelector("#load_more_button").addEventListener("click" , function(e){
    applyFilter()
  })

  function applyFilter()
  {
      let provider = [];
      let speed = [];
      let package = [];
      let cost = [];
      let offers = [];
      let contract = [];
      let phone = [];
      let sort = [];
      let channel = [];
      //checkedFilters = document.querySelectorAll("input[type='checkbox']:checked")
      let checkedCheckboxes = document.querySelectorAll("input[type='checkbox']:checked");
      let selectedOption = document.querySelector("select option:checked");
      let checkedFilters = [...checkedCheckboxes, selectedOption];

      checkedFilters.forEach( item => {
      switch( item.dataset.type){
            case 'provider':
            provider.push(item.value);
            break;
            case 'speed':
            speed.push(item.value);
            break;
            case 'package':
            package.push(item.value);
            break;
            case 'cost':
            cost.push(item.value); 
            break;
            case 'offers':
            offers.push(item.value); 
            break;
            case 'contract':
            contract.push(item.value); 
            break;
            case 'phone':
            phone.push(item.value);
            break;
            case 'channel':
            channel.push(item.value)
            break;
            default:
            sort.push(item.value); 
          }

      })

    // filterApplied = document.querySelector("#items_container").dataset.appliedFilter;
    
    loadedTickets = document.querySelectorAll(".ticket").length; 
    //console.log(loadedTickets);
    $.ajax({
          type : 'POST',
          url : '{{route("apply.filter")}}',
          data : { provider , speed , package , cost , offers , contract , phone , sort , channel , '_token' : '{{csrf_token()}}' , loadedTicket : loadedTickets},
          success : function(res){
            //console.log(res.html);
              document.querySelector("#items_container").insertAdjacentHTML("beforeend" , res.html);
              document.querySelector("#items_container").setAttribute('data-applied-filter' , 1);
            
              if (res.html=='') {
              //console.log('test', res);
              $('#load_more_button').html('No more deals');
              $('#load_more_button').attr('disabled', true);
            }
            else{
              $('#load_more_button').html('Show me more deals');
              $('#load_more_button').attr('disabled', false);

            }
    
          }
         
        })
  }
  
})
 


$('#reset-button').on('click',function(){

  
  let provider = [];
  let speed = [];
  let package = [];
  let cost = [];
  let offers = [];
  let contract = [];
  let phone = [];
  let sort = ['price_asc'];
  filterApplied = document.querySelector("#items_container").dataset.appliedFilter;
  //loadedTickets = parseInt(filterApplied) ? document.querySelectorAll(".ticket").length : 0 
  loadedTickets =  0 
    $.ajax({
          type : 'POST',
          url : '{{route("apply.filter")}}',
          data : { provider , speed , package , cost , offers , contract , phone ,sort, '_token' : '{{csrf_token()}}' , loadedTicket : loadedTickets},
          success : function(res){
            document.querySelector("#tot_count").innerHTML =res.total_count;
            document.querySelector("#tot_count").innerHTML =res.total_count;
            document.querySelector("#items_container").innerHTML =res.html;
            resetFilter();
          }
        })
    

        
          // $(".submitform").prop("checked", false);
          // document.querySelectorAll(".checkbox-label").forEach(el =>
          // { 
          //   el.classList.remove("bg-primary"); 
          //   el.classList.remove("text-white");
          //   el.classList.remove("bg-lightGray");
          //   el.classList.remove("border-primary");
          // })

         
  
  });

  // function handleIconClick(event) {
  //   const recordId = event.target.getAttribute("data-record-id");
  //   console.log("Record ID:", recordId); // For debugging
  // }

  function toggleModal() {
    const modal = document.getElementById("default-modal1");
    const overlay = document.getElementById("modal-overlay");
    modal.classList.toggle("hidden");
    modal.classList.toggle("flex");
    overlay.classList.toggle("hidden");
  }
  

$(document).on("click" , ".view-more-info" , function(){
  const recordId = event.target.getAttribute("data-record-id");
    //console.log("Record ID:", recordId); // For debugging
    $.ajax({
          type : 'POST',
          url : '{{route("apply.moreinfo")}}',
          data : { 
            'id': recordId,
            '_token' : '{{csrf_token()}}' 
          },
          success : function(res){
            document.querySelector("#packagedetial").innerHTML = res.moreinfodata;
         toggleModal()
        }
    })
})


$(document).on("click" , "#close-modal-btn" , function(){
  toggleModal()
})

function resetFilter(){
  let disableBtn =  document.querySelectorAll(".label-disable:not(.pre-disabled)");
  $centerAlign = 'checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer center-center';
  $rightAlign = 'checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer';
  disableBtn.forEach( btn => {
      $class = btn.classList.contains('center-center') ? $centerAlign : $rightAlign;
      btn.setAttribute( "class" , $class)
      btn.querySelector('input').checked = false;
    })
    
  let activeChecbox = document.querySelectorAll(".submitform:checked")
  activeChecbox.forEach( checkbox  => {
    $class = checkbox.classList.contains('center-center') ? $centerAlign : $rightAlign;
    checkbox.closest(".checkbox-label").setAttribute( "class" , $class)
      checkbox.checked = false;
    })

}






</script>

