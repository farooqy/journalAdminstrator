
$(document).ready(function(){

	$('#abstractText').html($('#abstractText').text());
	// $('#newsEditor').html($('#newsEditor').text());
	
	var editor = new Jodit('#newsEditor', {
		useInputsPlaceholder: true,
		buttons: [
		'source', '|',
        'bold',
        'italic', '|',
        'font',
        'fontsize',
        'brush',
        'paragraph', '|',
        'table',
        'link', '|',
        'undo', 
        'redo', '|',
        'hr',
        'eraser',
        'fullsize',
    ],
    removeButtons: [
    'image',
    'ul',
    'ol'
  ]
	});

});