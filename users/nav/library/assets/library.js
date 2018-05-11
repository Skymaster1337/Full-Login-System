 $("#edit").click(function () {

     $("#note").show();
	 $(this).hide();
  });

 $("#save").click(function () {

     $("#note").show();
	 $(this).hide();
	 document.getElementById("editMessage").setAttribute('readonly', true);
  });

/*$('#edit').on('click', function(e){
  e.preventDefault();
  var $parent = $(this).closest('button'); 
  $parent.find('#edit').hide();
  $parent.find('div#note').show();
  $parent.find('#save').show();
  $(this).hide();
});*/