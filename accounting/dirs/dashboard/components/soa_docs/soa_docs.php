<div class="container-fluid">
	<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
	    <div class="d-flex align-items-center">
	        <button type="button"
	                class="btn btn-light border shadow-sm rounded-circle me-3"
	                title="Go back"
	                onclick="loadApprovalContent()"
	                style="width:40px;height:40px;">
	            <i class="bi bi-arrow-left"></i>
	        </button>

	        <div>
	            <h5 class="fw-bold text-dark mb-0">Payment Transactions</h5>
	            <small class="text-muted">Customer receivables and payment history</small>
	        </div>
	    </div>

	    <!-- Right Section -->
	    <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2">
	        <button type="button" class="btn btn-secondary">
	            Customer Ledger
	        </button>
	        <button type="button" class="btn btn-success">
	            Post Payment
	        </button>
	        <button type="button" class="btn btn-primary">
	            Post Amendment
	        </button>
	        <button type="button" class="btn btn-primary" onclick="loadStatementofAccount()">
	            Refresh
	        </button>
	    </div>
	</div>
	<!-- Statement of ACcount Table -->
	<div class="mb-1 justify-content-end d-flex">
	    <nav aria-label="Page navigation">
	        <ul class="pagination pagination-sm mb-0" id="pagination-soa">
	            <li class="page-item" id="li-prev-soa">
	                <a class="page-link shadow-none" href="#" id="btn-preview-soa">
	                    <i class="bi bi-chevron-left small"></i>
	                </a>
	            </li>
	            <li class="page-item" id="li-next-soa">
	                <a class="page-link shadow-none" href="#" id="btn-next-soa">
	                    <i class="bi bi-chevron-right small"></i>
	                </a>
	            </li>
	        </ul>
	    </nav>
	</div>
	<div class="justify-content-end d-flex">
	    <div id="page-info-soa" class="mt-1 small text-muted"></div>
	</div>
	    <div class="table-responsive border shadow overflow-auto" style="height: 100vh;">
	        <table class="table table-sm table-bordered table-hover align-middle mb-0" style="font-size: 13px;">

	            <thead class="sticky-top border-bottom align-middle" style="z-index: 5; height: 52px;">
	            	    <tr class="text-muted text-sm">
	            	    	<th></th>
	            	        <th>
	            	            <input type="date" class="form-control form-control-sm border border-dark" id="transaction-date">
	            	        </th>
	            	        <th>
	            	            <input type="text" class="form-control form-control-sm border border-dark" placeholder="Search..." id="search-docnum">
	            	        </th>
	            	        <th>
	            	            <div class="d-flex gap-1">
	            	                <select class="form-select form-select-sm border border-dark" style="width:120px;" id="filter-customertype">
	            	                	<option value="" selected>Default</option>
	            	                    <option value="Regular">Regular</option>
									    <option value="Corporate">Corporate</option>
									    <option value="Government">Government</option>
									    <option value="Private">Private</option>
	            	                </select>
	            	                <input type="text" class="form-control form-control-sm border border-dark" placeholder="Search..." id="search-customer">
	            	            </div>
	            	        </th>
	            	        <th>
	            	            <select class="form-select form-select-sm border border-dark" id="filter-transactions">
	            	                <option value="">Default</option>
	            	                <option>Down Payment</option>
	            	                <option>Partial Payment</option>
	            	                <option>Final Payment</option>
	            	                <option>Other Charges</option>
	            	                <option>Refund</option>
	            	                <option>Adjustment</option>
	            	            </select>
	            	        </th>
	            	        <th>
	            	            <select class="form-select form-select-sm border border-dark" id="filter-paymentmethods">
	            	                <option value="">Default</option>
	            	                <option value="Cash">Cash</option>
	            	                <option value="Credit Card">Credit Card</option>
	            	                <option value="Debit Card">Debit Card</option>
	            	                <option value="Bank Transfer">Bank Transfer</option>
	            	                <option value="Online Banking">Online Banking</option>
	            	                <option value="GCash">GCash</option>
	            	                <option value="Maya">Maya</option>
	            	                <option value="Check">Check</option>
	            	                <option value="Company Charge">Company Charge</option>
	            	                <option value="Account Receivable">Account Receivable</option>
	            	                <option value="Split Payment">Split Payment</option>
	            	                <option value="Check">Check</option>
	            	            </select>
	            	        </th>
	            	        <th class="text-center" style="width:200px;">
	            	        </th>

	            	        <th class="text-center" style="width:200px;">
	            	        </th>

	            	        <th class="text-center" style="width:200px;">
	            	        </th>
	            	    </tr>
	                <tr class="text-uppercase">
	                	<th class="text-center" style="width: 10px;">#</th>
	                    <th class="ps-4 fw-bold bg-secondary" style="width: 120px;">Date</th>
	                	<th class="ps-4 fw-bold bg-secondary" style="width: 150px;">Reference No.</th>
	                    <th class="fw-bold bg-secondary text-center">Customer</th>
	                    <th class="fw-bold bg-secondary text-center">Transaction Type</th>
	                    <th class="fw-bold bg-secondary text-center" style="width: 200px;">Payment Method</th>
	                    <th class="fw-bold bg-secondary text-center" style="width: 200px;">Bill. Amnt</th>
	                    <th class="fw-bold bg-secondary text-center" style="width: 200px;">Credit</th>
	                    <th class="fw-bold bg-secondary text-center" style="width: 200px;">Debit /Bal. Payable</th>
	                </tr>
	            </thead>
	            <tbody id="load_PaymentsTransactions">
	               
	            </tbody>
	        </table>
	    </div>
</div>


<script>

	/*Function to clean display decimal and with fomating with comma*/
	function cleanDecimal(value) {
	    let num = parseFloat(value || 0);

	    if (Number.isNaN(num)) {
	        return "0";
	    }

	    return Number.isInteger(num)
	        ? num.toLocaleString()
	        : num.toLocaleString(undefined, {
	            minimumFractionDigits: 2,
	            maximumFractionDigits: 2
	        });
	}

    var CurrentPage = 1;
    var PageSize = 50;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadPaymentTransactions(page = 1) {
        CurrentPage = page; 
        var srvdisplay = $("#load_PaymentsTransactions");
        srvdisplay.html(`
           <tr>
             	<td colspan="9" class="p-5 text-center text-muted">
                   <h6 class="fw-semibold text-dark mb-1">
                      <p>Loading....</p>
                   </h6>
               </td>
           </tr>
        `);
        var Search = $("#search-customer").val();
        var EntryDate = $("#transaction-date").val();
        var DocNum = $("#search-docnum").val();
        var CustomerType = $("#filter-customertype").val();
        var Transaction = $("#filter-transactions").val();
        var PaymentM = $("#filter-paymentmethods").val();


        $.post("dirs/dashboard/actions/get_paymentrecords.php", {
            CurrentPage,
            PageSize,
            Search,
            EntryDate,
            DocNum,
            CustomerType,
            Transaction,
            PaymentM
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                srvdisplay.html(`
                    <tr>
                      	<td colspan="9" class="p-5 text-center text-muted">
                          <div class="mb-3">
                              <i class="bi bi-wifi-off fs-1 text-secondary"></i>
                          </div>
                          <br>
                            <h6 class="fw-semibold text-dark mb-1">
                                No Internet Connection
                            </h6>
                			<p class="text-muted mb-0">
                			    Please check your network settings and try again.
                			</p>
                         </td>
                    </tr>
                `);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                SoaContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    SoaPaginationUi();
                    SoapageNumber();
            } else {
                showEmptyStateSoa("No Record Found.");
            }
        });
    }

      


    function SoaContent(data) {
        const srvdisplay = $("#load_PaymentsTransactions");
        if (!data || data.length === 0) {
            showEmptyStateSoa("No Records Found.");
            return;
        }
        srvdisplay.empty();

        data.forEach(srv => {
            srvdisplay.append(`
            	<tr>
            		<td class="ps-4 text-center">${srv.OrderNumber}</td>
            	    <td class="ps-4">${srv.EntryDate || '--'}</td>
            	    <td class="ps-4">${srv.DocNum || '--'}</td>
            	    <td class="text-center">
            	        <a href="#" class="text-decoration-none fw-medium" onclick="reviewCustomerRecord('${srv.DocEntry}')">
            	            ${srv.CustomerName || '--'}
            	        </a>
            	    </td>
            	    <td class="text-center">
            	    	${srv.Transaction_Type || '--'}
            	    </td>
            	    <td class="text-center">
            			${srv.PaymentMethod || '--'}
            	    </td>
            		<td class="text-end ${!srv.Bal_Amnt || srv.Bal_Amnt == 0 ? '' : 'text-dark'}">
            		    ${!srv.Bal_Amnt || srv.Bal_Amnt == 0 
            		        ? '--' 
            		        : 'PHP ' + cleanDecimal(srv.Bal_Amnt)
            		    }
            		</td>
            		<td class="text-end ${!srv.Credit || srv.Credit == 0 ? '' : 'text-success'}">
            		    ${!srv.Credit || srv.Credit == 0 
            		        ? '--' 
            		        : 'PHP ' + cleanDecimal(srv.Credit)
            		    }
            		</td>
	            	<td class="text-end ${!srv.Debit || srv.Debit == 0 ? '' : 'text-danger'}">
	            	    ${!srv.Debit || srv.Debit == 0 
	            	        ? '--' 
	            	        : 'PHP ' + cleanDecimal(srv.Debit)
	            	    }
	            	</td>
	            	
	            	
            	</tr>
            `);
        });
    }




    /*Function for no record of beverages*/
    function showEmptyStateSoa(message = "No records found") {
        $("#load_PaymentsTransactions").html(`
            <tr>
              	<td colspan="9" class="p-5 text-center">
              	    <div class="d-flex flex-column align-items-center justify-content-center py-4">

              	        <div class="d-flex align-items-center justify-content-center mb-3"
              	             style="width:80px;height:80px;">
              	            <i class="bi bi-receipt-cutoff text-secondary fs-1"></i>
              	        </div>

              	        <h6 class="fw-semibold text-dark mb-1">
              	            ${message}
              	        </h6>

              	        <small class="text-muted">
              	            No payment transactions found for this record.
              	        </small>

              	    </div>
              	</td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function SoaPaginationUi() {
        $("#page-info-soa").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-soa").addClass("disabled");
        } else {
            $("#li-prev-soa").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-soa").addClass("disabled");
        } else {
            $("#li-next-soa").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function SoapageNumber() {
        $("#pagination-soa li.page-number-soa").remove();
        let prevLi = $("#li-prev-soa");
        let maxVisible = 5;
        let start = Math.max(1, CurrentPage - 2);
        let end = Math.min(totalPages, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPageSoa(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-soa disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageSoa(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-soa disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageSoa(totalPages, prevLi);
        }
        function insertPageSoa(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-soa ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }


    /*search-customer name*/
    $("#search-customer").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadPaymentTransactions();
        }
    });

    /*search document number*/
    $("#search-docnum").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadPaymentTransactions();
        }
    });


    /*Filter transaction date*/
    $("#transaction-date").on("change", function () {
        loadPaymentTransactions();
    });


    /*filter payment method*/
    $("#filter-paymentmethods").on("change", function(e) {
        loadPaymentTransactions();
    });

    /*filter transaction type*/
    $("#filter-transactions").on("change", function(e) {
        loadPaymentTransactions();
    });

    /*Filter custoer type*/
    $("#filter-customertype").on("change", function(e) {
        loadPaymentTransactions();
    });






      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-soa").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadPaymentTransactions(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-soa").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadPaymentTransactions(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-soa .page-link[data-page]", function (e) {
          e.preventDefault();

          loadPaymentTransactions($(this).data("page"));
      });


</script>