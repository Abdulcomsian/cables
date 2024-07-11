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
          },
        },
      };
    </script>
    <style>
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
 
