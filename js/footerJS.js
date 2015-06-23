/**
 * Created by toinebakkeren on 22/06/15.
 */

$(document).on(initButtons());

function initButtons() {
    $('body').on('click','#editButton',function(){
        postNewFooterData();
    });
    $('body').on('click','#restoreButton',function(){
        location.reload();
    });
}

function postNewFooterData() {
    var left = tinyMCE.get('leftArea').getContent();
    var middle = tinyMCE.get('middleArea').getContent();
    var right = tinyMCE.get('rightArea').getContent();

    var array = new Array();
    array.push(left);
    array.push(middle);
    array.push(right);

    var json = JSON.stringify(array);

    var success = '<div class="alert alert-success" role="alert">De footer is met succes aangepast.</div>'

    $.ajax({
        type: "POST",
        url: "/footerbeheer/post",
        data: json,
        success: function() {
            $(success).appendTo('#melding-box');
        }
    });

}