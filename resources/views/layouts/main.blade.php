<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Cables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#000038",
              pink: "#FF006D",
              lightBlue: "#EDF2F5",
              filter: "#333",
            },
            backgroundColor: {
              primary: "#000038",
              pink: "#FF006D",
              lightBlue: "#EDF2F5",
              resetBtn: "rgba(0, 0, 55, 0.3)",
              lightGray: "#e3e7ea",
            },
            borderColor: {
              primary: "#000038",
              pink: "#FF006D",
            },
            fontSize: {
              display1: "calc(50px + 100%)",
            },
            fontFamily: {
              sans: "sans-serif",
            },
            screens: {
              // Corrected this line
              xsm: "320px",
              ysm: "375px",
              zsm: "425px",
            },
          },
        },
      };
    </script>

    <style>
      .loading-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Black overlay with opacity */
    color: white;
    z-index: 999;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loading-spinner {
    border: 4px solid rgba(255, 255, 255, 0.3); /* White border */
    border-top: 4px solid #fff; /* White top border */
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite; /* Spinner animation */
}


    .inner-shadow:hover {
      box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    }
    @media (min-width: 768px) {
      #filter-panel {
        transform: translateX(0) !important;
      }
    }


      .inner-shadow:hover {
      box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    }
    @media (min-width: 768px) {
      #filter-panel {
        transform: translateX(0) !important;
      }
    }

      ::-webkit-scrollbar {
        display: none;
      }

      ::-webkit-scrollbar-button {
        display: none;
      }

      body {
        -ms-overflow-style: none;
      }
      .hover\:inner-shadow:hover {
        box-shadow: inset 0 0 18px rgba(0, 0, 0, 0.3);
      }
      .li-with-dot::after {
        content: "\2022"; /* Unicode for bullet character */
        color: black;
        margin-left: 0.4rem; /* Space between text and dot */
      }
      .li-with-dot:last-child::after {
        content: ""; /* No content for the last child */
      }
      .p-4 {
    padding: 0.5rem;
    }   			
    </style>
  </head>
    {{-- @section('body') --}}
    @include('layouts.body')
    {{-- @show --}}
  
    <!-- Start Topbar Content here -->
    @include('layouts.topbar')
    <!-- End right side Content here -->


    <!-- Start right side Content here -->
    @include('layouts.sidebar')
    <!-- End right side Content here -->

    <!-- Start Body Content here -->
    @yield("content")
    <!-- End right side Content here -->

     <!-- Start Footer Content here -->
     @include('layouts.footer')
     <!-- End right side Content here -->
 
