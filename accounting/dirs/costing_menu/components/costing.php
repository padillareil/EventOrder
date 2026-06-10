       
       <!-- TOP NAVIGATION & GLOBAL TOOLBAR -->
       <div class="bg-white border-bottom px-4 py-1">
           <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
               
               <!-- Modern Segmented Navigation Tabs (ERP Workspace switcher) -->
               <div class="p-1 bg-light rounded-3 d-inline-flex" style="border: 1px solid #e9ecef;">
                   <ul class="nav nav-pills gap-1" id="costingcontrol_tab" role="tablist">
                       <li class="nav-item" role="presentation">
                           <button class="nav-link active px-3 py-1.5 fs-7 fw-semibold rounded-2 border-0 text-capitalize" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu-pane" type="button" role="tab" style="font-size: 0.85rem;">
                               Menu
                           </button>
                       </li>
                       <li class="nav-item" role="presentation">
                           <button class="nav-link px-3 py-1.5 fs-7 fw-semibold rounded-2 border-0 text-capitalize" id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients-pane" type="button" role="tab" style="font-size: 0.85rem;">
                               Ingredients
                           </button>
                       </li>
                   </ul>
               </div>
           </div>
       </div>

       <!-- MAIN WORKSPACE CONTENT AREA -->
       <div class="tab-content bg-white" >
           <div class="tab-pane fade show active p-4" id="menu-pane" role="tabpanel" aria-labelledby="menu-tab">
               <?php include 'menu.php';  ?>
           </div>
           <div class="tab-pane fade" id="ingredients-pane" role="tabpanel" aria-labelledby="ingredients-tab">
           	  <?php include 'ingredients.php';  ?>

          </div>
       </div>
