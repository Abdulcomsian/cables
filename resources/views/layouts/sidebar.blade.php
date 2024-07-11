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
        <input type="checkbox" id="bb-mbps-1" data-name="speed[]" value="1-60"  class="submitform hidden simple-checkbox" />
        1-60MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="bb-mbps-60" id="bb-mbps-60" data-name="speed[]" value="60-100" class="hidden simple-checkbox submitform" />
        60-100MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="bb-mbps-100" id="bb-mbps-100" data-name="speed[]" value="100-500" class="hidden simple-checkbox submitform" />
        100-500MB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="bb-mbps-500" id="bb-mbps-500" data-name="speed[]" value="500-1gb" class="hidden simple-checkbox submitform"  />
        500-1GB
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full py-1 text-center rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="bb-mbps-1000" id="bb-mbps-1000" data-name="speed[]" value="1gb+"  class="hidden simple-checkbox submitform" />
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
        <input type="checkbox"  name="provider-sky" id="provider-sky"  data-name="provider[]" value="2" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Sky_logo_thunbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label    class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer" >
        <input type="checkbox" name="provider-virgin" id="provider-virgin"  data-name="provider[]" value="1"  class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Virgin_Media_logo_thunbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="provider-bt" id="provider-bt"  data-name="provider[]" value="3" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/BT_logo_thunbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="provider-talktalk" id="provider-talktalk"  data-name="provider[]" value="8" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/TalkTalk_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="provider-plusnet" id="provider-plusnet"  data-name="provider[]" value="7" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="/assets//images/Plusnet_logo_thumbnail.png" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"  name="provider-now-broadband" id="provider-now-broadband"  data-name="provider[]" value="6" class="hidden image-checkbox submitform" />
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
        <input type="checkbox" name="pkg-bbtv" id="pkg-bbtv" data-name="package[]" value="2"  class="hidden simple-checkbox submitform " />
        Broadband + TV
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox"   name="pkg-bbcalls" id="pkg-bbcalls" data-name="package[]" value="5"  class="hidden simple-checkbox submitform" />
        Broadband + calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border text-left px-4 border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="pkg-bb" id="pkg-bb" data-name="package[]" value="1"  class="hidden simple-checkbox submitform" />
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
        <input type="checkbox"  name="monthly-s" id="monthly-s"  data-name="monthlycost[]" value="0-25" class="hidden simple-checkbox submitform" />
        $0-$25
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="monthly-m" id="monthly-m"  data-name="monthlycost[]" value="25-50" class="hidden simple-checkbox submitform" />
        $25-$50
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="monthly-l" id="monthly-l" data-name="monthlycost[]" value="50-75" class="hidden simple-checkbox submitform" />
        $50-$75
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="monthly-xl" id="monthly-xl" data-name="monthlycost[]" value="75plus"   class="hidden simple-checkbox submitform" />
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
        <input type="checkbox" name="no_upfront_cost" id="no_upfront_cost" value="no_upfront_cost" class="hidden simple-checkbox submitform" />
        Deals with no upfront cost
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" name="off" id="off"  value="off" class="hidden simple-checkbox submitform" />
        Deals with rewards and offers
      </label>
    </div>
  </div>
  <!--Offers Filters End-->

  <!--Providers Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-primary mb-3">TV channels</h2>
    <div class="grid grid-cols-3 gap-2">
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>
      <label
        class="checkbox-label bg-white border flex justify-center items-center border-gray-400 w-full py-2 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden image-checkbox submitform" />
        <div class="w-16">
          <img src="./images/sky.webp" alt="" class="w-full" />
        </div>
      </label>

    </div>
  </div>
  <!--Providers Filters End-->

  <!--Contract length Filters Start-->
  <div class="mb-4">
    <h2 class="font-bold text-xl text-filter mb-3">Contract length</h2>
    <div class="grid grid-cols-2 gap-2">
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        1 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        12 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        18 month
      </label>
      <label
        class="checkbox-label text-sm bg-white border border-gray-400 w-full text-center py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
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
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        Anytime calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        Evening & weekend calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        Weekend calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        Pay as you go calls
      </label>
      <label
        class="checkbox-label text-sm bg-white border px-4 text-left border-gray-400 w-full py-1 rounded transition-shadow duration-500 hover:inner-shadow cursor-pointer"
      >
        <input type="checkbox" class="hidden simple-checkbox submitform" />
        No phone line
      </label>
    </div>
  </div>
</form>
  <!--Phone & line Filters End-->
</div>

<!--Filters  End-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
 $(document).ready(function() { 

//   $(document).on("click", ".submitform", function(e){
//     let selectedCheckboxes = [];
    
//     $(".submitform:checked").each(function(){
//         let name = $(this).data('name');
//         let value = $(this).val();
//         selectedCheckboxes.push(name + "=" + value);
//     });
    
//     let params = selectedCheckboxes.join("&");
    
//     $.ajax({
//         url: "{{url('/filter?')}}" + params,
//         type: "GET",
//         success: function(res){
//             console.log("success");
//         },
//         error: function(errRes){
//             console.log("error");
//         }
//     });
// });


$(document).on("click", ".submitform", function(e){
    let selectedCheckboxes = [];
    // let name = [];
    $(".submitform:checked").each(function(){
        let name = $(this).data('name');
        let value = $(this).val();
        selectedCheckboxes.push(name + "=" + value);
    });
    
    let params = selectedCheckboxes.map(function(value) {
        return name + value;
    }).join("&");
    
    $.ajax({
        url: "{{url('/filter?')}}" + params,
        type: "GET",
        success: function(res){
          $("#items_container").html(res);
        },
        error: function(errRes){
            console.log("error");
        }
    });
});



  });


  // jQuery(document).ready(function() {
      
  //   jQuery(document).on("click", ".submitform", function(event){
  //         event.preventDefault();
  //         var form = $(this);
  //         var formData = $(this).serialize();
  //         var formId = $(this).attr('id');
  //         //var submitBtn = form.find('button[type="submit"]');

  //         // Disable the submit button
  //         //alert(formData);
  //         //submitBtn.prop('disabled', true);
  //         // Check if the form is valid
  //         if (form[0].checkValidity() === false) {
  //             event.stopPropagation();
  //             form.addClass('was-validated');
  //             submitBtn.prop('disabled', false);
  //             return;
  //         }
  //        // alert(formData);
  //         jQuery.ajax({
  //             type: 'POST',
  //             url: 'https://prod-64.eastus.logic.azure.com:443/workflows/fbfb410800b54e7ea96f16c96efc1fd5/triggers/When_a_HTTP_request_is_received/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=CLjokW1cFjXOvLaldKqnxLucopVjUSRsqIdyuQIF6Wc', // your PHP script that handles the form submission
  //             data: formData,
  //             success: function(response) {
  //                 // handle the server-side response here
  //                 var modalId = modalIds[formId];
  //                 if (modalId) {
  //                     jQuery(modalId).addClass("out");
  //                 }
  //                 $("#close_modal2").trigger("click");
  //                 $("body").removeClass("modal-active");
  //                 jQuery("#modal-container5").removeAttr("class").addClass("two");
  //                 // Enable the submit button
  //                 submitBtn.prop('disabled', false);
  //                 // reset the form
  //                 form.removeClass('was-validated').trigger('reset');
  //               alert("ok");
  //               },
  //             error: function(xhr, textStatus, errorThrown) {
  //                 console.log(errorThrown);
  //                 // handle any errors here
  //                 alert("ok2");
  //             }
  //         });
  //     });
  // });
    
</script>