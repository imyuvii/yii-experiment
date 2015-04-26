/**
 * Created by Yuvraj on 3/8/2015.
 */
function showActions(thisElement){
    /*console.log('display');
    $(thisElement).children('actions').css('display','block');*/
}

function hideActions(thisElement){
    //console.log('hide');
}

function registerValid(){
    alert('test'+jQuery("#reward-partner-form"));

    //return false;
}

jQuery(document).ready(function($) {
    $("#reward-partner-form").validate({
        //debug: true,
        rules:{
            organizationName:'required',
            firstName:'required',
            lastName:'required',
            contactNo:'required',
            emailId:{
                required: true,
                email: true
            },
            password:'required'
            /*organizationName:{
                required:true
            }*/
        },
        submitHandler:function(form){
            form.submit();
        }
        /*messages:{
            organizationName:"please enter name"
        }*/
    });

});

function formWizard(id){
    var formId = "#form"+id;
    jQuery(".wizard-forms").css("display","none");
    jQuery(formId).fadeIn();
}

function errorMessage(errorType,message,errorCode){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    switch(errorType){
        case 'info':
            toastr.info(message,errorCode);
            break;
        case 'warning':
            toastr.warning(message,errorCode);
            break;
        case 'error':
            toastr.error(message,errorCode);
            break;
        case 'success':
            toastr.success(message,errorCode);
            break;
    }
}

function blockThisElement(elementId){
    jQuery(elementId).block({
        message:'<div class="loading-message loading-message-boxed"><i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;&nbsp;LOADING...</span></div>',
        css:{
            border: 'none',
            backgroundColor: 'none'
        }
    });
}

function unBlockThisElement(elementId){
    jQuery(elementId).unblock();
}