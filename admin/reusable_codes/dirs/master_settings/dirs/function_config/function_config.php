<div id="FunctionConfig_Content"></div>
<script src="dirs/master_settings/dirs/function_config/script/function_config.js"></script>

<?php include 'modal.php';  ?>

<style>
   /* Container for the whole system */
   .folder-tabs-container {
       margin-top: 2rem;
   }

   /* Base Tab Styling */
   .folder-tabs-container .nav-tabs .nav-link {
       border: 1px solid transparent;
       border-bottom: none;
       color: #6c757d;
       font-weight: 600;
       font-size: 0.85rem;
       padding: 10px 35px 10px 20px; /* Extra right padding for the slant */
       background-color: #f8f9fa; /* Your recessed color */
       margin-right: -10px; /* Slight overlap */
       transition: all 0.2s ease;
       
       /* The "Chop" Slant */
       clip-path: polygon(0% 0%, 85% 0%, 100% 100%, 0% 100%);
   }

   /* THE ACTIVE TAB: Combining your Primary Border with the Slant */
   .folder-tabs-container .nav-tabs .nav-link.active {
       background-color: #fff; 
       color: #0d6efd; 
       
       /* Your specific primary border logic */
       border-top: 3px solid #0d6efd !important; 
       border-left: 1px solid #dee2e6 !important;
       border-right: 1px solid #dee2e6 !important;
       
       /* Layering */
       position: relative;
       z-index: 10;
       
       /* Slightly wider clip for the active state to show the borders clearly */
       clip-path: polygon(0% 0%, 88% 0%, 100% 100%, 0% 100%);
   }

   /* Hover State */
   .folder-tabs-container .nav-tabs .nav-link:hover:not(.active) {
       background-color: #e9ecef;
       border-color: transparent;
       transform: translateY(-1px);
   }

   /* The Card Body connection */
   .folder-card {
       border: 1px solid #dee2e6 !important;
       border-top: none !important; /* Let the active tab's bottom border-less nature join it */
       border-radius: 0 8px 8px 8px !important;
       background-color: #fff;
       margin-top: -1px; /* Seamless overlap */
       z-index: 5;
   }
</style>