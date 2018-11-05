var canvasElement = document.querySelector('');
var imagePicker = document.querySelector('');
var imagePickerArea = document.querySelector('');
var captureBtn = document.querySelector('#capture-btn');

// initialize Media API (camera)
function initMedia(){
	if('mediaDevices' in navigator){
		navigator.mediaDevices.getUserMedia({video:true})
		.then(function(stream){

		})
		.catch(function(err){
			
		});
	}
}

function openCreatePostModal(){
	// initMedia();
}