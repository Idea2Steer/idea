//var urls = "http://www.scs-gos.com/";
var urls  = $('#base_urls').val();
jQuery(document).ready(function($) {
     $('.c_icons').tooltip({ placement: "right",  container: 'body'  });
     $('.c_action_icons').tooltip({ placement: "top",  container: 'body'  });
	//Div Hide Ofter 7 Second
	jQuery('.flasMsg').fadeOut(7000);
    $(".onlyNumericKey").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                   jQuery('.onlynumeric').html('only numeric value are insert');    
                   return false;
        }else{
             jQuery('.onlynumeric').html('');    
        }
   });
});

 
$("#check_all").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#displayImages').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
} 

$("#profile_image").change(function(){
    readURL(this);
});
 

function setvalidation(strId,strT,strMsg){
   if(strT=='S'){
	       jQuery('#'+strId).css('border','');
		   jQuery('#err_'+strId).html('');
	   }else if(strT=='F'){			      
		      jQuery('#'+strId).css('border','1px solid #F00');
		      jQuery('#err_'+strId).html(strMsg);
	  }
} 

function adminLogin(){
   var submircheak = 0 ;
   var email = jQuery('#email').val();    
    if (email==null || email==""){		     
        submircheak =1; 
		setvalidation('email','F',"Please enter email");
     }else{			  
		 setvalidation('email','S',''); 
	 }
	var password = jQuery('#password').val();    
    if (password==null || password==""){		     
        submircheak =1; 
		setvalidation('password','F',"Please enter password");
     }else{			  
		 setvalidation('password','S',''); 
    }	 
	if(submircheak ==1){  
			   return false;
			}else{
				$("#submiteAdminButtons").hide();
				$("#waiteAdminButtons").show();
				$( "#adminLoginForm" ).submit();
			}	 
}

function changePassword(){
   var submircheak = 0 ;
   var old_password = jQuery('#old_password').val();    
    if (old_password==null || old_password==""){         
        submircheak =1; 
    setvalidation('old_password','F',"Please enter old password");
     }else{       
     setvalidation('old_password','S',''); 
   }
  var new_password = jQuery('#new_password').val();    
    if (new_password==null || new_password==""){         
        submircheak =1; 
    setvalidation('new_password','F',"Please enter password");
     }else{       
     setvalidation('new_password','S',''); 
    }
  var c_password = jQuery('#c_password').val();    
    if (c_password==null || c_password==""){         
        submircheak =1; 
    setvalidation('c_password','F',"Please enter confirm password");
     }else{       
     setvalidation('c_password','S',''); 
    }   
  if(new_password !='' && c_password !=''){
    if (new_password != c_password){         
        submircheak =1; 
        setvalidation('c_password','F',"password and confirm password not match");
     }else{       
        setvalidation('c_password','S',''); 
    }  
  }   
  if(submircheak ==1){  
         return false;
      }else{
        $("#submiteAdminButtons").hide();
        $("#waiteAdminButtons").show();
        $("#change_password_from").submit();
      }  
}
 
function updateProfile(){
    $("#submiteAdminButtons").hide();
    $("#waiteAdminButtons").show();
    $("#updateProfileForm").submit();
}

function saveBankDetails(){
    var submircheak = 0 ;
    var account_holder_name = jQuery('#account_holder_name').val();    
    if (account_holder_name==null || account_holder_name==""){         
        submircheak =1; 
     setvalidation('account_holder_name','F',"Please enter account holder name");
     }else{       
     setvalidation('account_holder_name','S',''); 
    }
    var account_number = jQuery('#account_number').val();    
    if (account_number==null || account_number==""){         
        submircheak =1; 
     setvalidation('account_number','F',"Please enter account no");
     }else{       
     setvalidation('account_number','S',''); 
    }
    var bank_details_id = jQuery('#bank_details_id').val();
    if(bank_details_id != ''){
        var c_account_number = jQuery('#c_account_number').val();    
        if (c_account_number==null || c_account_number==""){         
            submircheak =1; 
         setvalidation('c_account_number','F',"Please enter conf. account no");
         }else{       
         setvalidation('c_account_number','S',''); 
        } 
        if(c_account_number !='' && account_number !=''){
            if (c_account_number != account_number){         
                submircheak =1; 
             setvalidation('c_account_number','F',"account no & conf. account no not match");
             }else{       
             setvalidation('c_account_number','S',''); 
            }  
        }

    }
    var bank_name = jQuery('#bank_name').val();    
    if (bank_name==null || bank_name==""){         
        submircheak =1; 
     setvalidation('bank_name','F',"Please enter bank name");
     }else{       
     setvalidation('bank_name','S',''); 
    } 
    var bank_ifsc_code = jQuery('#bank_ifsc_code').val();    
    if (bank_ifsc_code==null || bank_ifsc_code==""){         
        submircheak =1; 
     setvalidation('bank_ifsc_code','F',"Please enter bank ifsc code");
     }else{       
     setvalidation('bank_ifsc_code','S',''); 
    } 
    var bank_branch = jQuery('#bank_branch').val();    
    if (bank_branch==null || bank_branch==""){         
        submircheak =1; 
     setvalidation('bank_branch','F',"Please enter bank branch");
     }else{       
     setvalidation('bank_branch','S',''); 
    }
    var cancelled_cheque = jQuery('#cancelled_cheque').val();    
    if (cancelled_cheque==null || cancelled_cheque==""){         
        submircheak =1; 
     setvalidation('cancelled_cheque','F',"Please select cancelled cheque");
     }else{       
     setvalidation('cancelled_cheque','S',''); 
    }

    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#saveBankDetailsForm").submit(); 
   }
}

function updateBankDetails(){
    $("#submiteAdminButtons").hide();
    $("#waiteAdminButtons").show();
    $("#saveBankDetailsForm").submit(); 
}

function contactWizard(srt,srt2){
    if(srt2 == 'next'){
     $("#tab_button_"+srt).removeClass("btn-light").addClass("btn-primary");
     $(".tab_content").hide();
     $("#tab_content_"+srt).show();
    }else{
      $("#tab_button_"+srt).removeClass("btn-primary").addClass("btn-light");  
      $(".tab_content").hide();
      var bac_no = parseInt(srt)-1;
      $("#tab_content_"+bac_no).show();
    }
}

function saveBasicInformation(){
    var submircheak = 0 ;
    var user_type_id = jQuery('#user_type_id').val();    
    if (user_type_id==null || user_type_id==""){         
        submircheak =1; 
     setvalidation('user_type_id','F',"Please select user type");
     }else{       
     setvalidation('user_type_id','S',''); 
    }
    var designation = jQuery('#designation').val();    
    if (designation==null || designation==""){         
        submircheak =1; 
     setvalidation('designation','F',"Please select designation");
     }else{       
     setvalidation('designation','S',''); 
    }

    var first_name = jQuery('#first_name').val();    
    if (first_name==null || first_name==""){         
        submircheak =1; 
     setvalidation('first_name','F',"Please enter first name");
     }else{       
     setvalidation('first_name','S',''); 
    }
    var last_name = jQuery('#last_name').val();    
    if (last_name==null || last_name==""){         
        submircheak =1; 
     setvalidation('last_name','F',"Please enter last name");
     }else{       
     setvalidation('last_name','S',''); 
    }
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = jQuery('#email').val();
    if (!regex.test(email)){         
        submircheak =1; 
        setvalidation('email','F',"Please enter  valid Email");
    }else{       
        setvalidation('email','S',''); 
    }
    // var phone_no = jQuery('#phone_no').val();    
    // if (phone_no==null || phone_no==""){         
    //     submircheak =1; 
    //  setvalidation('phone_no','F',"Please select phone no");
    //  }else{       
    //  setvalidation('phone_no','S',''); 
    // }
    // var address = jQuery('#address').val();    
    // if (address==null || address==""){         
    //     submircheak =1; 
    //  setvalidation('address','F',"Please enter address");
    //  }else{       
    //  setvalidation('address','S',''); 
    // }
    // var country = jQuery('#country').val();    
    // if (country==null || country==""){         
    //     submircheak =1; 
    //  setvalidation('country','F',"Please select country");
    //  }else{       
    //  setvalidation('country','S',''); 
    // }
    // var state = jQuery('#state').val();    
    // if (state==null || state==""){         
    //     submircheak =1; 
    //  setvalidation('state','F',"Please select state");
    //  }else{       
    //  setvalidation('state','S',''); 
    // }
    // var city = jQuery('#city').val();    
    // if (city==null || city==""){         
    //     submircheak =1; 
    //  setvalidation('city','F',"Please select city");
    //  }else{       
    //  setvalidation('city','S',''); 
    // }
    // var zip_code = jQuery('#zip_code').val();    
    // if (zip_code==null || zip_code==""){         
    //     submircheak =1; 
    //  setvalidation('zip_code','F',"Please enter zip code");
    //  }else{       
    //  setvalidation('zip_code','S',''); 
    // }
    // var zip_code = jQuery('#zip_code').val();    
    // if (zip_code==null || zip_code==""){         
    //     submircheak =1; 
    //  setvalidation('zip_code','F',"Please enter zip code");
    //  }else{       
    //  setvalidation('zip_code','S',''); 
    // }
    // var facebook_link = jQuery('#facebook_link').val();    
    // if (facebook_link==null || facebook_link==""){         
    //     submircheak =1; 
    //  setvalidation('facebook_link','F',"Please enter facebook link");
    //  }else{       
    //  setvalidation('facebook_link','S',''); 
    // }
    // var insta_link = jQuery('#insta_link').val();    
    // if (insta_link==null || insta_link==""){         
    //     submircheak =1; 
    //  setvalidation('insta_link','F',"Please enter insta link");
    //  }else{       
    //  setvalidation('insta_link','S',''); 
    // }
    // var insta_link = jQuery('#insta_link').val();    
    // if (insta_link==null || insta_link==""){         
    //     submircheak =1; 
    //  setvalidation('insta_link','F',"Please enter insta link");
    //  }else{       
    //  setvalidation('insta_link','S',''); 
    // }
    // var linkedin_link = jQuery('#linkedin_link').val();    
    // if (linkedin_link==null || linkedin_link==""){         
    //     submircheak =1; 
    //  setvalidation('linkedin_link','F',"Please enter linkedin link");
    //  }else{       
    //  setvalidation('linkedin_link','S',''); 
    // }
    // var twitter_link = jQuery('#twitter_link').val();    
    // if (twitter_link==null || twitter_link==""){         
    //     submircheak =1; 
    //  setvalidation('twitter_link','F',"Please enter twitter link");
    //  }else{       
    //  setvalidation('twitter_link','S',''); 
    // }
    if(submircheak ==1){  
         return false;
      }else{
      $.ajax({
            url: urls+"Home/checkEmail",
            type: 'POST',    
            data: {
                email : email 
            },
            success: function (result) {
               var obj = $.parseJSON(result); 
               if(obj.msg == 'used'){
                 $("#err_email").html('This email is already exists');
               }else{
                 $("#submiteAdminButtons").hide();
                 $("#waiteAdminButtons").show();
                 $("#saveContactDetailsForm").submit(); 
               }
            },
            error: function () {
                alert('error');
            }
        });
    }
}    
 

function getStateBycountryID(srt){
   $.ajax({
        url: urls+"Home/getStateBycountryID",
        type: 'POST',    
        data: {
            country_id : srt 
        },
        success: function (result) {
           var obj = $.parseJSON(result); 
           $("#state").html(obj.state_htmls);  
        },
        error: function () {
            alert('error');
        }
    });
} 

function getCityList(srt){
   $.ajax({
        url: urls+"Home/getCityListByStateID",
        type: 'POST',    
        data: {
            state_id : srt 
        },
        success: function (result) {
           var obj = $.parseJSON(result); 
            $("#city").html(obj.htmls);   
        },
        error: function () {
            alert('error');
        }
    });
}

  

function deleteContactInformation(srt){
    Swal.fire({title: 'Are you sure want delete?',confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
             window.location.href = urls+"Admin/deleteEmployeeContactInfo/"+srt;
          }  
        });
}

function saveProjectInfo(){
    var submircheak = 0 ;
    var project_title = jQuery('#project_title').val();    
    if (project_title==null || project_title==""){         
        submircheak =1; 
     setvalidation('project_title','F',"Please enter project title");
     }else{       
     setvalidation('project_title','S',''); 
    }
    var user_type_id = jQuery('#user_type_id').val();    
    if (user_type_id==null || user_type_id==""){         
        submircheak =1; 
     setvalidation('user_type_id','F',"Please select client type");
     }else{       
     setvalidation('user_type_id','S',''); 
    }
    var user_id = jQuery('#user_id').val();    
    if (user_id==null || user_id==""){         
        submircheak =1; 
     setvalidation('user_id','F',"Please select client");
     }else{       
     setvalidation('user_id','S',''); 
    }
    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#saveProjectInfoForm").submit(); 
    }
}

function deleteProjectInformation(srt){
    Swal.fire({title: 'Are you sure want delete?',confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
             window.location.href = urls+"Admin/deleteProjectInformation/"+srt;
          }  
        });
}

function saveAssignedInfo(){
    var submircheak = 0 ;
    var project_id = jQuery('#project_id').val();    
    if (project_id==null || project_id==""){         
        submircheak =1; 
     setvalidation('project_id','F',"Please select project");
     }else{       
     setvalidation('project_id','S',''); 
    }
    var user_id = jQuery('#user_id').val();    
    if (user_id==null || user_id==""){         
        submircheak =1; 
     setvalidation('user_id','F',"Please select user");
     }else{       
     setvalidation('user_id','S',''); 
    }
    var price_type = jQuery('#price_type').val();    
    if (price_type==null || price_type==""){         
        submircheak =1; 
     setvalidation('price_type','F',"Please select price type");
     }else{       
     setvalidation('price_type','S',''); 
    }
    var price = jQuery('#price').val();    
    if (price==null || price==""){         
        submircheak =1; 
     setvalidation('price','F',"Please enter price");
     }else{       
     setvalidation('price','S',''); 
    }
    var currency = jQuery('#currency').val();    
    if (currency==null || currency==""){         
        submircheak =1; 
     setvalidation('currency','F',"Please select  currency");
     }else{       
     setvalidation('currency','S',''); 
    }
    var assigned_on = jQuery('#assigned_on').val();    
    if (assigned_on==null || assigned_on==""){         
        submircheak =1; 
     setvalidation('assigned_on','F',"Please select assigned on");
     }else{       
     setvalidation('assigned_on','S',''); 
    }
    
    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#saveAssignedInfoForm").submit(); 
    }
}

function getAssignedDevelopers(srt){
    //$('#mygetAssignedDevelopersModal').modal('show');
     $.ajax({
        url: urls+"Admin/getAssignedDevelopers",
        type: 'POST',    
        data: {
            project_id : srt 
        },
        success: function (result) {
           var obj = $.parseJSON(result); 
            $("#assigned_dev_list").html(obj.htmls);   
            $('#mygetAssignedDevelopersModal').modal('show');
        },
        error: function () {
            alert('error');
        }
    });
}

function saveCreditCardInfo(){
    var submircheak = 0 ;
    var card_holder_name = jQuery('#card_holder_name').val();    
    if (card_holder_name==null || card_holder_name==""){         
        submircheak =1; 
     setvalidation('card_holder_name','F',"Please enter name");
     }else{       
     setvalidation('card_holder_name','S',''); 
    }
    var card_no = jQuery('#card_no').val();    
    if (card_no==null || card_no==""){         
        submircheak =1; 
     setvalidation('card_no','F',"Please enter Credit card number");
     }else{       
     setvalidation('card_no','S',''); 
    }
    var cvv_cvc = jQuery('#cvv_cvc').val();    
    if (cvv_cvc==null || cvv_cvc==""){         
        submircheak =1; 
     setvalidation('cvv_cvc','F',"Please enter cvv/cvc");
     }else{       
     setvalidation('cvv_cvc','S',''); 
    }   
    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons_c").hide();
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#saveUserCardDetailsForm").submit(); 
    }
} 

function editCardInformation(srt){
   $.ajax({
        url: urls+"Admin/getCardInformation",
        type: 'POST',    
        data: {
            card_details_id : srt 
        },
        success: function (result) {
           var obj = $.parseJSON(result); 
            $("#myModalLabel").html('Edit Credit Card'); 
            $("#process_type").val('edit');
            $("#card_details_id").val(obj.card_details_id);    
            $("#card_no").val(obj.card_no); 
            $("#card_holder_name").val(obj.card_holder_name);     
            $("#card_expiry_month").val(obj.card_expiry_month);     
            $("#card_expiry_year").val(obj.card_expiry_year);     
            $("#cvv_cvc").val(obj.cvv_cvc);     
            $('#myaddCreditCardInformationModal').modal('show');
        },
        error: function () {
            alert('error');
        }
    });
}

function addNewCardInfo(){
 jQuery('#card_holder_name').val('');    
 jQuery('#card_no').val('');   
 jQuery('#cvv_cvc').val('');   
 jQuery('#process_type').val('add');   
 jQuery('#card_details_id').val('');   
 $("#myModalLabel").html('Add  Credit Card'); 
 $('#myaddCreditCardInformationModal').modal('show');   
}

function deleteCardInformation(srt){
    Swal.fire({title: 'Are you sure want delete?',confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
             window.location.href = urls+"Admin/deleteCardInformation/"+srt;
          }  
        });
}

function getUserListByUserType(srt){
    $.ajax({
        url: urls+"Admin/getUserListByUserType",
        type: 'POST',    
        data: {
            user_type_id : srt 
        },
        success: function (result) {
           var obj = $.parseJSON(result); 
          $("#user_id").html(obj.htmls); 
        },
        error: function () {
            alert('error');
        }
    });
}

function addProjectAttached(srt){
  var total_project_attached =  parseInt($("#total_project_attached").val()); 
  if(srt == 'add'){
      if(total_project_attached <= 11){
          var total_project_attached_new = parseInt(total_project_attached)+1;
          var htmls = '';
          htmls = '<div class="col-md-12 col-xl-4 mt-3" id="pa_'+total_project_attached_new+'">';
          htmls += '<div class="form-group">';
          htmls += '<label for="email">Project Attached - '+total_project_attached_new+' :</label>';
          htmls += '<input type="file" class="form-control" id="project_attached_'+total_project_attached_new+'" name="project_attached[]">'; 
          htmls += '<p class="error" id="err_project_attached_'+total_project_attached_new+'"></p>';
          htmls += '</div>';
          htmls += '</div>';
          $("#all_attached").append(htmls);
          $("#total_project_attached").val(total_project_attached_new); 
      }  
  }else{
     if(total_project_attached > '1'){
         $("#pa_"+total_project_attached).remove();
         var total_project_attached_new = parseInt(total_project_attached)-1;   
         $("#total_project_attached").val(total_project_attached_new); 
    }
  }
}

function editProjectAttached(srt){
  var total_project_attached =  parseInt($("#total_project_attached").val()); 
  if(srt == 'add'){
      if(total_project_attached <= 11){
          var total_project_attached_new = parseInt(total_project_attached)+1;
          var htmls = '';
          htmls = '<div class="col-md-12 col-xl-4 mt-3" id="pa_'+total_project_attached_new+'">';
          htmls += '<div class="form-group">';
          htmls += '<label for="email">Project Attached - '+total_project_attached_new+' :</label>';
          htmls += '<input type="file" class="form-control" id="project_attached_'+total_project_attached_new+'" name="project_attached_'+total_project_attached_new+'">'; 
          htmls += '<p class="error" id="err_project_attached_'+total_project_attached_new+'"></p>';
          htmls += '<input type="hidden" class="form-control" id="project_attached_old_'+total_project_attached_new+'" name="project_attached_old_'+total_project_attached_new+'" value="">'; 
          htmls += '<input type="hidden" class="form-control" id="project_attached_id_'+total_project_attached_new+'" name="project_attached_id_'+total_project_attached_new+'" value="">';  
          htmls += '</div>';
          htmls += '</div>';
          $("#all_attached").append(htmls);
          $("#total_project_attached").val(total_project_attached_new); 
      }  
  }else{
     if(total_project_attached > '1'){
         $("#pa_"+total_project_attached).remove();
         var total_project_attached_new = parseInt(total_project_attached)-1;   
         $("#total_project_attached").val(total_project_attached_new); 
    }
  }
}

function deleteAttachedFiles(srt1,srt2){
    Swal.fire({title: 'Are you sure want delete?',confirmButtonText: 'Yes',cancelButtonText: 'No',showCancelButton: true,showCloseButton: true }).then((result) => {
          if (result.isConfirmed) {
             window.location.href = urls+"Admin/deleteAttachedFiles/"+srt1+"/"+srt2;
          }  
        });
}


function enableTotalHours(srt){
    if(srt == 'Hourly'){
        $( ".total_hours" ).prop( "disabled", false );
    }else{
       $( ".total_hours" ).prop( "disabled", true );
    }
}

function saveReceivedInvoice(){
    var submircheak = 0 ;
    var price_type = jQuery('#price_type').val();    
    if (price_type==null || price_type==""){         
        submircheak =1; 
     setvalidation('price_type','F',"Please select price type");
     }else{       
     setvalidation('price_type','S',''); 
    }
    if(price_type == 'Hourly'){
        var total_hours = jQuery('#total_hours').val();    
        if (total_hours==null || total_hours==""){         
            submircheak =1; 
         setvalidation('total_hours','F',"Please enter total hours");
         }else{       
         setvalidation('total_hours','S',''); 
        }
    }
    var total_amount = jQuery('#total_amount').val();    
    if (total_amount==null || total_amount==""){         
        submircheak =1; 
     setvalidation('total_amount','F',"Please enter total amount");
     }else{       
     setvalidation('total_amount','S',''); 
    }
    var invoice_date = jQuery('#invoice_date').val();    
    if (invoice_date==null || invoice_date==""){         
        submircheak =1; 
     setvalidation('invoice_date','F',"Please select Invoice / Received date");
     }else{       
     setvalidation('invoice_date','S',''); 
    }
    var from_date = jQuery('#from_date').val();    
    if (from_date==null || from_date==""){         
        submircheak =1; 
     setvalidation('from_date','F',"Please select from date");
     }else{       
     setvalidation('from_date','S',''); 
    }
    var to_date = jQuery('#to_date').val();    
    if (to_date==null || to_date==""){         
        submircheak =1; 
     setvalidation('to_date','F',"Please select to date");
     }else{       
     setvalidation('to_date','S',''); 
    }
    var working_status = jQuery('#working_status').val();    
    if (working_status==null || working_status==""){         
        submircheak =1; 
     setvalidation('working_status','F',"Please select working status");
     }else{       
     setvalidation('working_status','S',''); 
    }
    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons_c").hide();
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#saveReceivedInvoiceInfoForm").submit(); 
    }
}

function viewAddInvoiceForm(srt1,srt2){
 if(srt1 == 'Received'){
    $("#modal_title").html('Received Invoice');
    $("#rp_invoice_type").val('Received');
 }else{
    $("#modal_title").html('Paid Invoice');
    $("#rp_invoice_type").val('Paid');
 }
 $("#rp_client_user_id").val(srt2);   
 $('#myReceivedInvoiceModal').modal('show');
}

function viewReceivedAmount(srt1,srt2){
    if(srt1 == 'Received'){
        $("#d_modal_title").html('Received ALL Amount List');
    }else{
        $("#d_modal_title").html('Paid Invoice');
    }
    $.ajax({
        url: urls+"Admin/viewReceivedAmount",
        type: 'POST',    
        data: {
            type : srt1,
            project_id : srt2  
        },
        success: function (result) {
           var obj = $.parseJSON(result); 
           $("#invoice_info").html(obj.htmls); 
           $('#myReceivedALLAmountDetailsModal').modal('show');
        },
        error: function () {
            alert('error');
        }
    });
}

function structureSetting(){
    $('#myTableStructureModal').modal('show'); 
}

function hideTableColumn(srt){
     var table = $('#datatable').DataTable( { "scrollY": "200px",  "paging": false  } );
     var column = table.column(srt);
     if ($("#square-switch"+srt).is(':checked')) {
        column.visible( true );
      }else{
        column.visible( false );
     }
}

function openFileSection(){
     $("#profile_image").trigger("click");
}

function saveInvoiceDetails(){
    var submircheak = 0 ;
    var project_id = jQuery('#project_id').val();    
    if (project_id==null || project_id==""){         
        submircheak =1; 
     setvalidation('project_id','F',"Please select project");
     }else{       
     setvalidation('project_id','S',''); 
    }
    var user_id = jQuery('#user_id').val();    
    if (user_id==null || user_id==""){         
        submircheak =1; 
     setvalidation('user_id','F',"Please select user");
     }else{       
     setvalidation('user_id','S',''); 
    }
    var price_type = jQuery('#price_type').val();    
    if (price_type==null || price_type==""){         
        submircheak =1; 
     setvalidation('price_type','F',"Please select price type");
     }else{       
     setvalidation('price_type','S',''); 
    }
    if(price_type == 'Hourly'){
        var total_hours = jQuery('#total_hours').val();    
        if (total_hours==null || total_hours==""){         
            submircheak =1; 
         setvalidation('total_hours','F',"Please enter total hours");
         }else{       
         setvalidation('total_hours','S',''); 
        }
    }
    var total_amount = jQuery('#total_amount').val();    
    if (total_amount==null || total_amount==""){         
        submircheak =1; 
     setvalidation('total_amount','F',"Please enter total amount");
     }else{       
     setvalidation('total_amount','S',''); 
    }
    var invoice_date = jQuery('#invoice_date').val();    
    if (invoice_date==null || invoice_date==""){         
        submircheak =1; 
     setvalidation('invoice_date','F',"Please select Invoice / Received date");
     }else{       
     setvalidation('invoice_date','S',''); 
    }
    var from_date = jQuery('#from_date').val();    
    if (from_date==null || from_date==""){         
        submircheak =1; 
     setvalidation('from_date','F',"Please select from date");
     }else{       
     setvalidation('from_date','S',''); 
    }
    var to_date = jQuery('#to_date').val();    
    if (to_date==null || to_date==""){         
        submircheak =1; 
     setvalidation('to_date','F',"Please select to date");
     }else{       
     setvalidation('to_date','S',''); 
    }
    var working_status = jQuery('#working_status').val();    
    if (working_status==null || working_status==""){         
        submircheak =1; 
     setvalidation('working_status','F',"Please select working status");
     }else{       
     setvalidation('working_status','S',''); 
    }
    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons_c").hide();
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#saveInvoiceDetailsForm").submit(); 
    }
}

function getUserByProjectID(srt){
    $.ajax({
            url: urls+"Admin/getUserByProjectID",
            type: 'POST',    
            data: {
                project_id : srt 
            },
            success: function (result) {
              var obj = $.parseJSON(result);    
              $("#user_id").html(obj.htmls);  
              $("#total_paid").val(obj.total_paid_amount);  

            },
            error: function () {
                alert('error');
            }
        });
}


function saveCustomInvoiceDetails(){
    var submircheak = 0 ;
    var c_user_id = jQuery('#c_user_id').val();    
    if (c_user_id==null || c_user_id==""){         
        submircheak =1; 
     setvalidation('c_user_id','F',"Please select user");
     }else{       
     setvalidation('c_user_id','S',''); 
    }
    var c_descriptions = jQuery('#c_descriptions').val();    
    if (c_descriptions==null || c_descriptions==""){         
        submircheak =1; 
     setvalidation('c_descriptions','F',"Please insert descriptions");
     }else{       
     setvalidation('c_descriptions','S',''); 
    }
    var c_price_type = jQuery('#c_price_type').val();    
    if (c_price_type==null || c_price_type==""){         
        submircheak =1; 
     setvalidation('c_price_type','F',"Please select price type");
     }else{       
     setvalidation('c_price_type','S',''); 
    }
    if(c_price_type == 'Hourly'){
        var c_total_hours = jQuery('#c_total_hours').val();    
        if (c_total_hours==null || c_total_hours==""){         
            submircheak =1; 
         setvalidation('c_total_hours','F',"Please enter total hours");
         }else{       
         setvalidation('c_total_hours','S',''); 
        }
    }
    var c_total_amount = jQuery('#c_total_amount').val();    
    if (c_total_amount==null || c_total_amount==""){         
        submircheak =1; 
     setvalidation('c_total_amount','F',"Please enter total amount");
     }else{       
     setvalidation('c_total_amount','S',''); 
    }
    var c_invoice_date = jQuery('#c_invoice_date').val();    
    if (c_invoice_date==null || c_invoice_date==""){         
        submircheak =1; 
     setvalidation('c_invoice_date','F',"Please select Invoice / Received date");
     }else{       
     setvalidation('c_invoice_date','S',''); 
    }
    var c_from_date = jQuery('#c_from_date').val();    
    if (c_from_date==null || c_from_date==""){         
        submircheak =1; 
     setvalidation('c_from_date','F',"Please select from date");
     }else{       
     setvalidation('c_from_date','S',''); 
    }
    var c_to_date = jQuery('#c_to_date').val();    
    if (c_to_date==null || c_to_date==""){         
        submircheak =1; 
     setvalidation('c_to_date','F',"Please select to date");
     }else{       
     setvalidation('c_to_date','S',''); 
    }
    if(submircheak ==1){  
         return false;
      }else{
         $("#c_submiteAdminButtons").hide();
         $("#c_submiteAdminButtons_c").hide();
         $("#c_waiteAdminButtons").show();
         $("#saveCustomInvoiceForm").submit(); 
    }
}


function getEmployeeByProjectID(srt){
    $("#hire_info").hide(); 
    $.ajax({
            url: urls+"Admin/getEmployeeByProjectID",
            type: 'POST',    
            data: {
                project_id : srt 
            },
            success: function (result) {
              var obj = $.parseJSON(result);    
              $("#user_id").html(obj.htmls);  
            },
            error: function () {
                alert('error');
            }
        });
}

function getEmployeeHireInfo(srt){
    var user_id = $("#user_id").val();
    if(user_id != ''){
    $.ajax({
            url: urls+"Admin/getEmployeeHireInfo",
            type: 'POST',    
            data: {
                project_id : $("#project_id").val(),
                user_id : srt
            },
            success: function (result) {
              var obj = $.parseJSON(result);    
              $("#total_paid").val(obj.total_paid_amount); 
              $("#hire_type").val(obj.hire_type); 
              $("#price").val(obj.price); 
              $("#hire_on").val(obj.hire_on); 
              $("#hire_info").show();
               
            },
            error: function () {
                alert('error');
            }
        });
   }else{
       $("#hire_info").hide(); 
   } 
}

function userRegister(){
    var submircheak = 0 ;
    var first_name = jQuery('#first_name').val();    
    if (first_name==null || first_name==""){         
        submircheak =1; 
     setvalidation('first_name','F',"Please insert name");
     }else{       
     setvalidation('first_name','S',''); 
    }
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = jQuery('#email').val();
    if (!regex.test(email)){         
        submircheak =1; 
        setvalidation('email','F',"Please enter  valid Email");
    }else{       
        setvalidation('email','S',''); 
    }
    var password = jQuery('#password').val();    
    if (password==null || password==""){         
        submircheak =1; 
     setvalidation('password','F',"Please insert password");
     }else{       
     setvalidation('password','S',''); 
    }
    var c_password = jQuery('#c_password').val();    
    if (c_password==null || c_password==""){         
        submircheak =1; 
     setvalidation('c_password','F',"Please insert confirm password");
     }else{       
     setvalidation('c_password','S',''); 
    }
    if(password !='' && c_password !=''){
         if (password != c_password){         
            submircheak =1; 
         setvalidation('c_password','F',"Password and confirm password not match");
         }else{       
         setvalidation('c_password','S',''); 
        }   
    }
    if(submircheak ==1){  
         return false;
      }else{
        $.ajax({
            url: urls+"Home/checkEmail",
            type: 'POST',    
            data: {
                email : email 
            },
            success: function (result) {
               var obj = $.parseJSON(result); 
               if(obj.msg == 'used'){
                 $("#err_email").html('This email is already exists');
               }else{
                 $("#submiteAdminButtons").hide();
                 $("#waiteAdminButtons").show();
                 $("#saveContactDetailsForm").submit(); 
               }
            },
            error: function () {
                alert('error');
            }
        });
          
    }
}

function resetPassword(){
    var submircheak = 0 ;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = jQuery('#email').val();
    if (!regex.test(email)){         
        submircheak =1; 
        setvalidation('email','F',"Please enter  valid Email");
    }else{       
        setvalidation('email','S',''); 
    }
    if(submircheak ==1){  
         return false;
      }else{
         $("#submiteAdminButtons").hide();
         $("#waiteAdminButtons").show();
         $("#resetPasswordProcessForm").submit(); 
    }
}

function updatePassword(){
  var submircheak = 0 ;
  var new_password = jQuery('#new_password').val();    
    if (new_password==null || new_password==""){         
        submircheak =1; 
    setvalidation('new_password','F',"Please enter password");
     }else{       
     setvalidation('new_password','S',''); 
    }
  var c_password = jQuery('#c_password').val();    
    if (c_password==null || c_password==""){         
        submircheak =1; 
    setvalidation('c_password','F',"Please enter confirm password");
     }else{       
     setvalidation('c_password','S',''); 
    }   
  if(new_password !='' && c_password !=''){
    if (new_password != c_password){         
        submircheak =1; 
        setvalidation('c_password','F',"password and confirm password not match");
     }else{       
        setvalidation('c_password','S',''); 
    }  
  }   
  if(submircheak ==1){  
         return false;
      }else{
        $("#submiteAdminButtons").hide();
        $("#waiteAdminButtons").show();
        $("#updatePassword_from").submit();
      }  
}

function headerCustomSearch(srt){
   if(srt != ''){
        $.ajax({
            url: urls+"Home/headerCustomSearch",
            type: 'POST',    
            data: {
                keyValue : srt 
            },
            success: function (result) {
                var obj = $.parseJSON(result); 
                $("#show_userList").html(obj.htmls);
                $("#custom_serch_result").show();
            },
            error: function () {
                alert('error');
            }
        });
   }else{
         $("#custom_serch_result").hide();
   }
}