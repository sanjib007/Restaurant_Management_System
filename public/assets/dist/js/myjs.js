$(document).ready(function() {

$(function () {
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: true
    });
  });

  /*$('.filter-container').filterizr({gutterPixels: 3});
  $('.btn[data-filter]').on('click', function() {
     $('.btn[data-filter]').removeClass('active');
     $(this).addClass('active');
   });*/
});


$.ajax({
    url: "/getAllSessionItem",
    dataType: "json",
    success: function (data) {
		var base_url = window.location.origin;
		var newText = "";	
		if(data !== undefined){
			data.forEach((item)=>{
				
				var htmlText = `
							  <div class="dropdown-item">
							  <div class="media">
								<div id="setItemImage">
								  <img src="${base_url}/assets/img/items/${item.item_image}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								</div>
								<div class="media-body">
								  <h3 id="setItemName" class="dropdown-item-title">
									${item.item_name}
									<button value="${item.id}" type="button" class="btn bg-gradient-warning btn-xs float-right removedItem">
										<i class="fas fa-times"></i>
									</button>
								  </h3>
								  <p class="text-sm">Price: <span  id="setItemPrice">${item.item_price}</span>/-</p>
								  <p class="text-sm">Item: <span id="setTotalItem">${item.totalItem}</span></p>
								  <p class="text-sm">Total Price: <span id="setTotalItemPrice">${item.totalItem * item.item_price}</span>/-</p></p>
								</div>
							  </div>
							</div>
							<div class="dropdown-divider"></div>
							  `;
				
				newText += htmlText;
			});
			$('#appendItemData').html(newText);
			$('#setTotalItem').text(data.length);
		}
		
    }
});



jQuery('body').on('click', '.test_click', function () {
	var link_id = $(this).val();
	$.get('getItem/' + link_id, function (data) {
		jQuery('#item_id').val(data.id);
		jQuery('#item_name').text(data.item_name);
		jQuery('#item_price').text(data.item_price);
		jQuery('#item_description').text(data.item_description);
		//jQuery('#item_image').val(data.item_image);
		$("#dynamic").remove();
		var base_url = window.location.origin;
		var img = $('<img width="200" id="dynamic">'); //Equivalent: $(document.createElement('img'))
		img.attr('src', base_url+"/assets/img/items/"+ data.item_image);
		img.empty().appendTo('#imagediv');
	})
});

$('#orderSubmit').click(()=>{
	var id = $('#item_id').val();
	var totalItem = $('#orderItem').val();
	console.log('id', id, '/ total', totalItem);
	$.ajax({
	   type:'POST',
	   url:"setOrder",
	   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	   data:{id:id, totalItem:totalItem},
	   success:function(data){
		  //alert(data.success);
		  console.log('data', data);
		  var base_url = window.location.origin;
		var newText = "";	
		
		data.forEach((item)=>{
			
			var htmlText = `
						  <div class="dropdown-item">
						  <div class="media">
							<div id="setItemImage">
							  <img src="${base_url}/assets/img/items/${item.item_image}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
							</div>
							<div class="media-body">
							  <h3 id="setItemName" class="dropdown-item-title">
								${item.item_name}
								<button value="${item.id}" type="button" class="btn bg-gradient-warning btn-xs float-right removedItem">
									<i class="fas fa-times"></i>
								</button>
							  </h3>
							  <p class="text-sm">Price: <span  id="setItemPrice">${item.item_price}</span>/-</p>
							  <p class="text-sm">Item: <span id="setTotalItem">${item.totalItem}</span></p>
							  <p class="text-sm">Total Price: <span id="setTotalItemPrice">${item.totalItem * item.item_price}</span>/-</p></p>
							</div>
						  </div>
						</div>
						<div class="dropdown-divider"></div>
						  `;
			
			newText += htmlText;
		});

		$('#appendItemData').html(newText);
		$('#setTotalItem').text(data.length);
		$('#orderItem').val("");
		$('#modal-default').modal('toggle');
		$.notify("Your food request is added. Choose another one", "success");
	   }
	});
});


jQuery('body').on('click', '.removedItem', function (e) {
	e.preventDefault();
	var id = $(this).val();
	//console.log(id, ' /', this);
	$.ajax({
        type: "get",
          url: '/removeOrder/'+id,
          dataType:"json",
          success: function (data) {
              console.log("get data",data);
              
			  var base_url = window.location.origin;
		var newText = "";	
		
		data.forEach((item)=>{
			
			var htmlText = `
						  <div class="dropdown-item">
						  <div class="media">
							<div id="setItemImage">
							  <img src="${base_url}/assets/img/items/${item.item_image}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
							</div>
							<div class="media-body">
							  <h3 id="setItemName" class="dropdown-item-title">
								${item.item_name}
								<button value="${item.id}" type="button" class="btn bg-gradient-warning btn-xs float-right removedItem">
									<i class="fas fa-times"></i>
								</button>
							  </h3>
							  <p class="text-sm">Price: <span  id="setItemPrice">${item.item_price}</span>/-</p>
							  <p class="text-sm">Item: <span id="setTotalItem">${item.totalItem}</span></p>
							  <p class="text-sm">Total Price: <span id="setTotalItemPrice">${item.totalItem * item.item_price}</span>/-</p></p>
							</div>
						  </div>
						</div>
						<div class="dropdown-divider"></div>
						  `;
			
			newText += htmlText;
		});

		$('#appendItemData').html(newText);
		$('#setTotalItem').text(data.length);
		var urlinfo = $(location).attr('href');
		if(urlinfo.search("dashboard") > -1){
			location.reload();
		}
			  
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });
    });




jQuery('body').on('click', '.changeItemQuantity', function (e) {
e.preventDefault();
var id = $(this).val();
var totalItem = $('#getVal_'+id).val();

$.ajax({
	type: "post",
	  url: '/changeItemQuantity',
	  dataType:"json",
	  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	  data:{id:id, totalItem:totalItem},
	  success: function (data) {
		  location.reload();	  
	  },
	  error: function (data) {
		  console.log('Error:', data);
	  }
  });
});

$('#showUpload').hide();
$('#cancelUpload').hide();
$('#uploadImage').show();

$('#uploadImage').click(()=>{
	$('#showUpload').show();
	$('#cancelUpload').show();
	$('#uploadImage').hide();
});
$('#cancelUpload').click(()=>{
	$('#showUpload').hide();
	$('#cancelUpload').hide();
	$('#uploadImage').show();
});







/*$('.removedItem').click((e)=>{
	e.preventDefault();
	var id = $(this).val();
	console.log(id, ' /', this);
	$.get('removeOrder/' + id, function (data) {
		jQuery('#item_id').val(data.id);
		jQuery('#item_name').text(data.item_name);
		jQuery('#item_price').text(data.item_price);
		jQuery('#item_description').text(data.item_description);
		//jQuery('#item_image').val(data.item_image);
		$("#dynamic").remove();
		var base_url = window.location.origin;
		var img = $('<img width="200" id="dynamic">'); //Equivalent: $(document.createElement('img'))
		img.attr('src', base_url+"/assets/img/items/"+ data.item_image);
		img.empty().appendTo('#imagediv');
	})
});*/




/*
$('#undo').click(function(){
      $(this).hide();
      $('#done').show();

      var requested_to = document.getElementById('undo').value;

      $.ajax({
        type: "post",
          url: '/requestmeet/{{$id}}',
          data:{requested_to:requested_to,"_token": "{{ csrf_token() }}"},
          dataType:"json",
          success: function (data) {
              console.log(data);
              //$( "#disp" ).append( "<strong>"+data.description+":</strong></br>");
              //document.getElementById('disp').innerHTML=data.description;
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });
    });
*/
	
	
	
});

