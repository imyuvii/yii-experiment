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