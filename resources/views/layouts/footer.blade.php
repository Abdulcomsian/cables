<section
class="bg-[#001E70] py-8 md:py-10"
style="
  background-image: url('./images/header-banner-swoosh-light.svg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
"
>
<div
  class="flex flex-col justify-center items-center px-4 mx-auto max-w-7xl"
>
  <h2 class="text-white text-center text-[1.8rem] md:text-3xl font-normal mb-4">
    Need help choosing a deal? Call us on
  </h2>
  <p class="text-white text-4xl md:text-3xl font-bold mb-4">
    0333 210 1160
  </p>
  <p class="text-white text-base text-center">
    Our experts are available from 8am-8pm Monday to Sunday
  </p>
</div>
</section>

<!-- Scripts start from here -->
<script>
  const simpleCheckbox = document.querySelectorAll(".simple-checkbox");

  simpleCheckbox.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      const label = this.parentElement;
      if (this.checked) {
        label.classList.add("bg-primary", "text-white");
      } else {
        label.classList.remove("bg-primary", "text-white");
      }
    });
  });

  const imageCheckbox = document.querySelectorAll(".image-checkbox");

  imageCheckbox.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      const label = this.parentElement;
      if (this.checked) {
        label.classList.add("bg-lightGray", "border-primary");
        label.classList.remove("border-gray-400");
      } else {
        label.classList.remove("bg-lightGray", "border-primary");
        label.classList.add("border-gray-400");
      }
    });
  });
</script>
<!-- Scripts End here -->
<script>

document.getElementById('filter-button').addEventListener('click', function() {
      var filterPanel = document.getElementById('filter-panel');
      filterPanel.classList.toggle('hidden');
      filterPanel.classList.toggle('translate-x-0');
      filterPanel.classList.toggle('-translate-x-full');
    });

    document.getElementById('close-button').addEventListener('click', function() {
      var filterPanel = document.getElementById('filter-panel');
      filterPanel.classList.add('hidden');
      filterPanel.classList.add('-translate-x-full');
      filterPanel.classList.remove('translate-x-0');
    });





    // document.addEventListener('DOMContentLoaded', () => {
    //         const resetButton = document.getElementById('reset-button');
    //         const loadingOverlay = document.getElementById('loading-overlay');

    //         const showLoading = () => {
    //             loadingOverlay.style.display = 'block';
    //             setTimeout(() => {
    //                 loadingOverlay.style.display = 'none';
    //             }, 2000); // Adjust this timeout as needed
    //         };

    //         resetButton.addEventListener('click', showLoading);

    //         // Apply loading overlay to input clicks (example)
    //         const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //         checkboxes.forEach(checkbox => {
    //             checkbox.addEventListener('click', showLoading);
    //         });

    //         // Optional: Close button functionality
    //         const closeButton = document.getElementById('close-button');
    //         closeButton.addEventListener('click', () => {
    //             // Implement close button functionality as needed
    //             // For example: hide the filter panel
    //             document.getElementById('filter-panel').classList.add('hidden');
    //         });
    //     });



               
           
   

    
    

</script>
<!-- End body tag here -->
</body>
</html>
