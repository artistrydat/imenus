(function ($) {
  "use strict";


	var base_url = $('#base_url').attr('href');
	var csrf_value = $('#csrf_value').attr('href');
	var shop_id = $('#id').attr('href');


	$(document).ready(function() {
	    setInterval(function(){
	     	order_notification();
	    }, 20000);

	});

function order_notification(){
  var url = `${base_url}/admin/kds/get_new_order/${shop_id}`;
  $.get(url, {'csrf_test_name': csrf_value }, function(json){
    if (json.st == 1) {
    	$('.view_kds').html(json.load_data);
    }else{
      return true;
    }
  },'json');
}


/*----------------------------------------------
  kds order status
----------------------------------------------*/

$(document).on('click','.kdsOrder',function(){
    var id = $(this).data('id');
    var shop_id = $(this).data('shop');
    var url = $(this).attr('href');
    $.post(url, {'csrf_test_name': csrf_value }, function(json){
      if(json.st == 1){
        $('.view_kds').html(json.load_data);       
      }
    },'json');
    return false;
  });

}(jQuery)); 