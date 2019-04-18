
<!-- Add Item To Wishlist -->
<script>
$(function(){
	$(".AddToWishlist").click(function(){
		var pro_id = $(this).attr('data-id');
		var Url = "{{ url('ajax/AddToWishlist') }}";
		$("#wishIcon_"+pro_id).removeClass('ti-heart').text('Loading..');
		$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		$.ajax({
			url: Url,
			type: 'POST',
			data: {pro_id:pro_id},
			datatype: 'json',
			success:function(data) {
                 if(data.success) {
                 	$("#wishIcon_"+pro_id).text('Ok');
                 } else {
                 	$("#wishIcon_"+pro_id).text('No');
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
		$("#cartIcon_"+pro_id).removeClass('ti-shopping-cart').text('Loading..');
		$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		$.ajax({
			url: Url,
			type: 'POST',
			data: {pro_id:pro_id},
			datatype: 'json',
			success:function(data) {
                 if(data.success) {
                 	$("#cartIcon_"+pro_id).text('Ok');
                 } else {
                 	$("#cartIcon_"+pro_id).text('No');
                 }
			}
		});
	});
});
</script>