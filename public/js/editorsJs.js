$(document).ready(function(){

    $('.editorSelectRole').on('change', function(){
        
        var target = (this.value);
        if(target !== "dft" && isNaN(target) === false)
        {
        	$('.roleIndexValue').val(target);
        	var roleForm = document.getElementById('roleIndexForm');
        	var formData = new FormData(roleForm);
        	var url = $('.roleIndexForm').attr('action');
        	ajax_call(url, formData, 'roleIndexForm');
        }
        else
        {
        	$('.hintValue').text('Select role to view highest index');
        }

    });

});




function ajax_call(url, data, indicator)
{
    $.ajax({
        method:"POST",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function(data){
            data = JSON.parse(data);
            // alert('success '+JSON.stringify(data));
            if(data.success === true)
            {
            	$('.hintValue').text('The highest index used is '+data.indexValue);
            }
            else
            {
            	alert(data.error);
            }

            
        },  
        statusCode: {
            404: function() {
                alert( "page not found" );
           },
           500: function(){
                alert('There is server error. Please contact support');
           },
           422: function(error){
            alert(JSON.stringify(error.responseJSON.message));
            // alert(JSON.stringify(error.responseJSON.errors.addFile[0]));
           }
        },
    })
    .done(function(){
        console.log('done request');

    })
    .fail(function(error){
        alert('request failed '+JSON.stringify(error.statusText+' '+error.status));
    });
}