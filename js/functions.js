/**
 * Created by Yuvraj on 3/8/2015.
 */
function showActions(thisElement){
    console.log('display');
    $(thisElement).children('actions').css('display','block');
}

function hideActions(thisElement){
    console.log('hide');
}

function formValidation(){
    return true;
}