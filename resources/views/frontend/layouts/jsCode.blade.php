
<!-- Add Item To Wishlist -->
<script>
$(function(){
	$(".AddToWishlist").click(function(){
		var pro_id = $(this).attr('data-id');
		var Url = "{{ url('ajax/AddToWishlist') }}";
		$("span#wishIcon_"+pro_id).removeClass('ti-heart').addClass('ti-reload');
		$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		$.ajax({
			url: Url,
			type: 'POST',
			data: {pro_id:pro_id},
			datatype: 'json',
			success:function(data) {
                 if(data.success) {
                 	$("span#wishIcon_"+pro_id).removeClass('ti-reload').addClass('ti-check');
                 } else {
                 	$("span#wishIcon_"+pro_id).removeClass('ti-reload').addClass('ti-trash');
                 }
			}
		});
	});
});
</script>






<!-- Add Item To Cart -->
<script>
$(function(){
	$(".AddToCart").click(function(){
		var pro_id = $(this).attr('data-id');
		var Url = "{{ url('ajax/AddToCart') }}";
		$("span#cartIcon_"+pro_id).removeClass('ti-shopping-cart').addClass('ti-reload');
		$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		$.ajax({
			url: Url,
			type: 'POST',
			data: {pro_id:pro_id},
			datatype: 'json',
			success:function(data) {
                 if(data.success) {
                 	$("span#cartIcon_"+pro_id).removeClass('ti-reload').addClass('ti-check');
                 } else {
                 	$("span#cartIcon_"+pro_id).removeClass('ti-reload').addClass('ti-trash');
                 }
			}
		});
	});
});
</script>