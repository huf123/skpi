$(document).ready(function(){
	// Tombol "Saya Sudah Puas"
	$("#satisfied").on("click",function(){
		$("input[type='checkbox']").prop("checked",false);
		$("input[type='checkbox']").prop("disabled",true);
		$("#satisfied").css("display","none");
		$("#unsatisfied").css("display","block");
		$("#submit-btn").prop("disabled",false);
	})
	// Tombol "Undo"
	$("#unsatisfied").on("click",function(){
		$("input[type='checkbox']").prop("disabled",false);
		$("#unsatisfied").css("display","none");
		$("#satisfied").css("display","block");
		$("#submit-btn").prop("disabled",true);
	})
	// 
	$("input[type='checkbox']","input[type='radio']").on("change",function(){
		if ($("input[type='checkbox']","input[type='radio']").is(':checked')) {
			$("#submit-btn").prop("disabled",false);
		} else {
			$("#submit-btn").prop("disabled",true);
		}		
	})

	// capture photo via camera & submit polling
	$("#submit-btn").on("click", function(e){
		e.preventDefault();
		$("#photo").click();
	})

	$("#photo").on("change",function(){
		$("#myform").submit();
	});
});