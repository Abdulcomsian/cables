<!--Filters Start-->

<div class="w-3/12 px-4 hidden lg:block">
  <div class="flex justify-between">
    <h2 class="font-bold text-xl text-[#000038]">Filter results</h2>
    <button
      class="px-2 py-1 font-bold text-white bg-gray-400 text-base rounded"
    >
      Reset
    </button>
  </div>
 <form action="" id="">
  <!--Speed Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Speed</h2>
    <div class="grid grid-cols-2 gap-2">
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer">
        <input type="checkbox" id="bb-mbps-1" data-type="speed" data-name="speed[]" value="1mb-60mb"  class="submitform hidden simple-checkbox" />
        1-60MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="bb-mbps-60" id="bb-mbps-60" data-type="speed" data-name="speed[]" value="60mb-100mb" class="hidden simple-checkbox submitform" />
        60-100MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="bb-mbps-100" id="bb-mbps-100" data-type="speed" data-name="speed[]" value="100mb-500mb" class="hidden simple-checkbox submitform" />
        100-500MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="bb-mbps-500" id="bb-mbps-500" data-type="speed" data-name="speed[]" value="500mb-1gb" class="hidden simple-checkbox submitform"  />
        500-1GB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="bb-mbps-1000" id="bb-mbps-1000" data-type="speed" data-name="speed[]" value="1gb"  class="hidden simple-checkbox submitform" />
        1GB+
      </label>
    </div>
  </div>
  <!--Speed Filters End-->

  <!--Tv Channels Filters Start-->
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
        <input type="checkbox" name="provider-virgin" data-type="provider"  id="provider-virgin"  data-name="provider[]" value="1"  class="hidden image-checkbox submitform" />
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
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="provider-now-broadband" data-type="provider"  id="provider-now-broadband"  data-name="provider[]" value="6" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/NOW_Broadband_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
    </div>
  </div>
  <!--Tv Channels Filters End-->

  <!--Package Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Package</h2>
    <div class="grid grid-cols-1 gap-2">
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="pkg-bbtv" id="pkg-bbtv" data-type="package"  data-name="package[]" value="2"  class="hidden simple-checkbox submitform " />
        Broadband + TV
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"   name="pkg-bbcalls" id="pkg-bbcalls" data-type="package"  data-name="package[]" value="5"  class="hidden simple-checkbox submitform" />
        Broadband + calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="pkg-bb" id="pkg-bb" data-type="package"  data-name="package[]" value="1"  class="hidden simple-checkbox submitform" />
        Broadband only
      </label>
    </div>
  </div>
  <!--Package Filters End-->
  <!--Monthly Cost Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Monthly cost</h2>
    <div class="grid grid-cols-2 gap-2">
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="monthly-s" id="monthly-s" data-type="cost"   data-name="monthlycost[]" value="0-25" class="hidden simple-checkbox submitform" />
        $0-$25
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="monthly-m" id="monthly-m" data-type="cost"    data-name="monthlycost[]" value="25-50" class="hidden simple-checkbox submitform" />
        $25-$50
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="monthly-l" id="monthly-l" data-type="cost"   data-name="monthlycost[]" value="50-75" class="hidden simple-checkbox submitform" />
        $50-$75
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="monthly-xl" id="monthly-xl" data-type="cost"   data-name="monthlycost[]" value="75plus"   class="hidden simple-checkbox submitform" />
        $75+
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
        <input type="checkbox" name="no_upfront_cost" id="no_upfront_cost" data-type="offers"   value="no_upfront_cost" class="hidden simple-checkbox submitform" />
        Deals with no upfront cost
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="off" id="off"  value="off" data-type="offers"  class="hidden simple-checkbox submitform" />
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
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="contract" class="hidden simple-checkbox submitform" value="1" data-type="contract"  data-name="contract[]"  />
        1 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="contract"  class="hidden simple-checkbox submitform" value="12" data-type="contract" data-name="contract[]"  />
        12 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="contract"  class="hidden simple-checkbox submitform" value="18" data-type="contract"  data-name="contract[]" />
        18 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="contract" class="hidden simple-checkbox submitform" value="19" data-type="contract" data-name="contract[]"  />
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
        <input type="checkbox" name="phone"  class="hidden simple-checkbox submitform" value='weekend' data-type="phone" data-name="phone[]" />
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
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform" value='international'   data-type="phone" data-name="phone[]" />
        Pay as you go calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="phone" class="hidden simple-checkbox submitform"  value='No' data-type="phone" data-name="phone[]" />
        No phone line
      </label>
    </div>
   

  </div>
  {{-- <input id="sort" name="sort" type="text" value="idasc"> --}}
</form>
  <!--Phone & line Filters End-->
</div>

<!--Filters  End-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>

$(document).ready(()=>{
    // $("#deals").change(function () {
    //       //  alert($("#deals").val());
    //         document.getElementById("sort").value=document.getElementById("deals").value;
    //     });
  
  document.querySelectorAll(".submitform").forEach(function(item){
    item.addEventListener("click" , function(e){
        e.stopPropagation();
        e.stopImmediatePropagation();
        let provider = [];
      let speed = [];
      let package = [];
      let cost = [];
      let offers = [];
      let contract = [];
      let phone = [];
      checkedFilters = document.querySelectorAll("input[type='checkbox']:checked")
      // let type = item.dataset.type;
     
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
          default:
          phone.push(item.value); 
        }

    })
    filterApplied = document.querySelector("#items_container").dataset.appliedFilter;
    loadedTickets = parseInt(filterApplied) ? document.querySelectorAll(".ticket").length : 0 
    $.ajax({
          type : 'POST',
          url : '{{route("apply.filter")}}',
          data : { provider , speed , package , cost , offers , contract , phone , '_token' : '{{csrf_token()}}' , loadedTicket : loadedTickets},
          success : function(res){
            if(!filterApplied || document.querySelectorAll("input[type='checkbox']:checked").length== 1){
              document.querySelector("#items_container").innerHTML =res.html;
              document.querySelector("#items_container").setAttribute('data-applied-filter' , 1);
            }else{
              document.querySelector("#items_container").insertAdjacentHTML("afterbegin" , res.html);
              document.querySelector("#items_container").setAttribute('data-applied-filter' , 1);
            }
              
            if (res.html=='') {
              console.log('test');
              $('#load_more_button').html('No More Data Available');
              $('#load_more_button').attr('disabled', true);
            }
            else{
              $('#load_more_button').html('Show me more deals');
              $('#load_more_button').attr('disabled', false);

            }
          }
        })
    })
   
  })

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
      checkedFilters = document.querySelectorAll("input[type='checkbox']:checked")
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
            default:
            phone.push(item.value); 
          }

      })

    filterApplied = document.querySelector("#items_container").dataset.appliedFilter;
    console.log(filterApplied);
    loadedTickets = parseInt(filterApplied) ?  document.querySelectorAll(".ticket").length : 0 
    $.ajax({
          type : 'POST',
          url : '{{route("apply.filter")}}',
          data : { provider , speed , package , cost , offers , contract , phone , '_token' : '{{csrf_token()}}' , loadedTicket : loadedTickets},
          success : function(res){
            
              document.querySelector("#items_container").insertAdjacentHTML("beforeend" , res.html);
              document.querySelector("#items_container").setAttribute('data-applied-filter' , 1);
            
    
          }
         
        })
  }
  
})
 
// document.getElementbyID(#deals).change(function () {
//             alert("test");
//         });

//document.getElementbyID(#deals)

// $(document).on("click" , "#load_more_button" , function(){
//   applyFilter()
// })



</script>