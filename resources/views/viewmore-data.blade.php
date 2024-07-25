     <!-- Modal header -->
     {{-- @foreach($moreinfodata as $moreinf ) --}}
     <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
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
      <div class="w-2/3">
        <div class="relative right-0">
          <ul
            class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60"
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
            <li class="z-30 flex-auto text-center">
              <a
                class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                data-tab-target=""
                role="tab"
                aria-selected="false"
                aria-controls="message"
              >
                <span class="ml-1">broadband</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a
                class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit"
                data-tab-target=""
                role="tab"
                aria-selected="false"
                aria-controls="settings"
              >
                <span class="ml-1">pricing</span>
              </a>
            </li>
          </ul>
          <div data-tab-content="" class="p-5">
            <div class="block opacity-100" id="app" role="tabpanel">
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500">
                Because it's about motivating the doers. Because I'm here to follow
                my dreams and inspire other people to follow their dreams, too.
              </p>
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
          </div>
        </div>
      </div>
      {{-- @endforeach --}}