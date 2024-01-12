$((function(){"use strict";var t=$(".datatable-project"),e=$(".invoice-table"),a="app-invoice-preview.html",s="../../../app-assets/";if("laravel"===$("body").attr("data-framework")&&(s=$("body").attr("data-asset-path"),a=s+"app/invoice/preview"),t.length)t.DataTable({ajax:s+"data/projects-list.json",ordering:!1,columns:[{data:""},{data:"project_name"},{data:"total_task"},{data:"progress"},{data:"hours"}],columnDefs:[{className:"control",responsivePriority:2,targets:0,render:function(t,e,a,s){return""}},{targets:1,responsivePriority:4,render:function(t,e,a,o){var n=a.project_name,r=a.framework,l=a.project_image;if(l)var i='<img src="'+s+"images/icons/brands/"+l+'" alt="Project Image" width="32" class="rounded-circle">';else{var d=["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())+1],c=(n=a.full_name).match(/\b\w/g)||[];i='<span class="avatar-initial rounded-circle bg-label-'+d+'">'+(c=((c.shift()||"")+(c.pop()||"")).toUpperCase())+"</span>"}return'<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar me-1">'+i+'</div></div><div class="d-flex flex-column"><span class="text-truncate fw-bolder">'+n+'</span><small class="text-muted">'+r+"</small></div></div>"}},{targets:-2,responsivePriority:1,render:function(t,e,a,s){var o,n=a.progress+"%";switch(!0){case a.progress<25:o="bg-danger";break;case a.progress<50:o="bg-warning";break;case a.progress<75:o="bg-info";break;case a.progress<=100:o="bg-success"}return'<div class="d-flex flex-column"><small class="mb-1">'+n+'</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar '+o+'" style="width: '+n+'" aria-valuenow="'+n+'" aria-valuemin="0" aria-valuemax="100"></div></div></div>'}}],order:[[1,"desc"]],dom:"t",displayLength:7,language:{sLengthMenu:"Show _MENU_",searchPlaceholder:"Search Project"},responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(t){return"Details of "+t.data().framework}}),type:"column",renderer:function(t,e,a){var s=$.map(a,(function(t,e){return""!==t.title?'<tr data-dt-row="'+t.rowIndex+'" data-dt-column="'+t.columnIndex+'"><td>'+t.title+":</td> <td>"+t.data+"</td></tr>":""})).join("");return!!s&&$('<table class="table"/><tbody />').append(s)}}}});if(e.length){e.DataTable({ajax:s+"data/invoice-list.json",autoWidth:!1,pageLength:6,columns:[{data:"responsive_id"},{data:"invoice_id"},{data:"invoice_status"},{data:"total"},{data:"issued_date"},{data:""}],columnDefs:[{className:"control",responsivePriority:2,targets:0},{targets:1,width:"46px",render:function(t,e,s,o){var n=s.invoice_id;return'<a class="fw-bolder" href="'+a+'"> #'+n+"</a>"}},{targets:2,width:"42px",render:function(t,e,a,s){var o=a.invoice_status,n=a.due_date,r={Sent:{class:"bg-light-secondary",icon:"send"},Paid:{class:"bg-light-success",icon:"check-circle"},Draft:{class:"bg-light-primary",icon:"save"},Downloaded:{class:"bg-light-info",icon:"arrow-down-circle"},"Past Due":{class:"bg-light-danger",icon:"info"},"Partial Payment":{class:"bg-light-warning",icon:"pie-chart"}};return"<span data-bs-toggle='tooltip' data-bs-html='true' title='<span>"+o+'<br> <span class="fw-bold">Balance:</span> '+a.balance+'<br> <span class="fw-bold">Due Date:</span> '+n+"</span>'><div class=\"avatar avatar-status "+r[o].class+'"><span class="avatar-content">'+feather.icons[r[o].icon].toSvg({class:"avatar-icon"})+"</span></div></span>"}},{targets:3,width:"73px",render:function(t,e,a,s){return"$"+a.total}},{targets:4,width:"130px",render:function(t,e,a,s){var o=new Date(a.issued_date);return moment(o).format("DD MMM YYYY")}},{targets:-1,title:"Actions",width:"80px",orderable:!1,render:function(t,e,s,o){return'<div class="d-flex align-items-center col-actions"><a class="me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Mail">'+feather.icons.send.toSvg({class:"font-medium-2 text-body"})+'</a><a class="me-1" href="'+a+'" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Invoice">'+feather.icons.eye.toSvg({class:"font-medium-2 text-body"})+'</a><a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Download">'+feather.icons.download.toSvg({class:"font-medium-2 text-body"})+"</a>"}}],order:[[1,"desc"]],dom:'<"card-header pt-1 pb-25"<"head-label"><"dt-action-buttons text-end"B>>t',buttons:[{extend:"collection",className:"btn btn-outline-secondary dropdown-toggle",text:feather.icons["external-link"].toSvg({class:"font-small-4 me-50"})+"Export",buttons:[{extend:"print",text:feather.icons.printer.toSvg({class:"font-small-4 me-50"})+"Print",className:"dropdown-item",exportOptions:{columns:[1,3,4]}},{extend:"csv",text:feather.icons["file-text"].toSvg({class:"font-small-4 me-50"})+"Csv",className:"dropdown-item",exportOptions:{columns:[1,3,4]}},{extend:"excel",text:feather.icons.file.toSvg({class:"font-small-4 me-50"})+"Excel",className:"dropdown-item",exportOptions:{columns:[1,3,4]}},{extend:"pdf",text:feather.icons.clipboard.toSvg({class:"font-small-4 me-50"})+"Pdf",className:"dropdown-item",exportOptions:{columns:[1,3,4]}},{extend:"copy",text:feather.icons.copy.toSvg({class:"font-small-4 me-50"})+"Copy",className:"dropdown-item",exportOptions:{columns:[1,3,4]}}],init:function(t,e,a){$(e).removeClass("btn-secondary"),$(e).parent().removeClass("btn-group"),setTimeout((function(){$(e).closest(".dt-buttons").removeClass("btn-group").addClass("d-inline-flex")}),50)}}],responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(t){return"Details of "+t.data().client_name}}),type:"column",renderer:function(t,e,a){var s=$.map(a,(function(t,e){return 2!==t.columnIndex?'<tr data-dt-row="'+t.rowIdx+'" data-dt-column="'+t.columnIndex+'"><td>'+t.title+":</td> <td>"+t.data+"</td></tr>":""})).join("");return!!s&&$('<table class="table"/>').append("<tbody>"+s+"</tbody>")}}},initComplete:function(){$(document).find('[data-bs-toggle="tooltip"]').tooltip()},drawCallback:function(){$(document).find('[data-bs-toggle="tooltip"]').tooltip()}});$("div.head-label").html('<h4 class="card-title">Invoices</h4>')}setTimeout((()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")}),300),$("body").tooltip({selector:'[data-bs-toggle="tooltip"]',container:"body"})}));