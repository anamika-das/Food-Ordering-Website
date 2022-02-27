<!-- index -->
<section class="page-section" id="menu">
	<div class="container">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<div class="align-self-end mb-4 page-title">
				<h3>Your cart</h3>
				<hr class="divider" />
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="sticky">
					<div class="card mb-3 shadow">
						<div class="card-body">
							<div class="row">
								<div class="col-md-9 text-center"><b>Cart Items</b></div>
								<div class="col-md-3 text-center"><b>Prices</b></div>
							</div>
						</div>
					</div>
				</div>
				<?php 
				if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total = 0;
				$get = $conn->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
				while($row= $get->fetch_assoc()):
					$total += ($row['qty'] * $row['price']);
				?>

				<div class="card mb-3 shadow-sm">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-md-3" style="text-align: -webkit-center; height: fit-content;">
								<img src="assets/img/<?php echo $row['img_path'] ?>">
							</div>
							<div class="col-md-6">
								<p><b><large><?php echo $row['name'] ?></large></b></p>
								<p class='truncate'> <b><small>Desc: <?php echo $row['description'] ?></small></b></p>
								<p> <b><small>Unit Price: <?php echo $row['price'] ?></small></b></p>
								<p><small>QTY: </small></p>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary qty-minus" type="button" data-id="<?php echo $row['cid'] ?>"><span class="fa fa-minus"></button>
									</div>
									<input type="number" readonly value="<?php echo $row['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
									<div class="input-group-prepend">
										<button class="btn btn-outline-secondary qty-plus" type="button" data-id="<?php echo $row['cid'] ?>"><span class="fa fa-plus"></span></button>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<input type="number" style="background-color: white; border: 0; pointer-events: none; font-weight:bold" readonly value="<?php echo $row['qty'] * $row['price'] ?>" min = 1 class="form-control text-center" name="price_item">
								<button class="btn btn-sm shadow delete_cart" type="button" data-id="<?php echo $row['cid'] ?>"><i class="fa fa-trash-alt"></i></button>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>

			<div class="col-md-4">
				<div class="sticky">
					<div class="card shadow">
						<div class="card-body">
							<b><large>Order Summary</large></b>
							<hr />
							<div class="row">
								<div class="col-6">
									<p>Cart Value</p>
								</div>
								<div class="col-6">
									<input type="number" readonly value="<?php echo $total ?>" min = 1 class="form-control text-center" id="cart_value">
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<p>Delivery Charge</p>
								</div>
								<div class="col-6">
									<input type="number" style="background-color: white;" readonly value="40" min = 1 class="form-control text-center charge">
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-6">
									<b><p>Amount to be paid</p></b>
								</div>
								<div class="col-6">
									<input type="number" readonly value="<?php echo $total + 40 ?>" min = 1 class="form-control text-center" id="amount">
								</div>
							</div>
							<hr />
							<div class="text-center">
								<button class="btn btn-block btn-primary" type="button" id="checkout">Proceed to Checkout</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
.card p {
	margin: unset
}
.card img{
	max-width: calc(100%);
	max-height: calc(59%);
}
div.sticky {
	position: -webkit-sticky; /* Safari */
	position: sticky;
	top: 4.7em;
	z-index: 10;
	background: white
}
.delete_cart{
	position: absolute;
	right: 10px;
	top: 10px;
}
#amount,
#cart_value,
.charge{
	background-color: white;
	border: 0;
	pointer-events: none;
	text-align-last: end;
	font-weight:bold;
}
</style>
<script>
$('.qty-minus').click(function(){
	var qty = $(this).parent().siblings('input[name="qty"]').val();
	var price =  $(this).parent().parent().parent().siblings().children('input[name="price_item"]').val();
	var amount = $('#amount').val();
	tamount = parseInt(amount)-parseInt(price)+parseInt(price)/parseInt(qty)*(parseInt(qty) -1);
	if(qty == 1){
		return false;
	}else{
		update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		$('#amount').val(parseInt(tamount));
		$('#cart_value').val(parseInt(tamount -40));
		$(this).parent().parent().parent().siblings().children('input[name="price_item"]').val(parseInt(price)/parseInt(qty)*(parseInt(qty) -1));
		$(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
	}
})

$('.qty-plus').click(function(){
var qty =  $(this).parent().siblings('input[name="qty"]').val();
var price =  $(this).parent().parent().parent().siblings().children('input[name="price_item"]').val();
var amount = $('#amount').val();
tamount = parseInt(amount)-parseInt(price)+parseInt(price)/parseInt(qty)*(parseInt(qty) +1);
	$('#amount').val(parseInt(tamount));
	$('#cart_value').val(parseInt(tamount -40));
	$(this).parent().parent().parent().siblings().children('input[name="price_item"]').val(parseInt(price)/parseInt(qty)*(parseInt(qty) +1));
	$(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
update_qty(parseInt(qty) +1,$(this).attr('data-id'))
})

function update_qty(qty,id){
	start_load()
	$.ajax({
		url:'admin/ajax.php?action=update_cart_qty',
		method:"POST",
		data:{id:id,qty},
		success:function(resp){
			if(resp == 1){
				load_cart()
				end_load()
			}
		}
	})
}

$('#checkout').click(function(){
	if('<?php echo isset($_SESSION['login_user_id']) ?>' == 1){
		location.replace("index.php?page=checkout")
	}else{
		uni_modal("Checkout","login.php?page=checkout")
	}
})

$('.delete_cart').click(function(){
	_conf("Are you sure to delete this item?","delete_cart",[$(this).attr('data-id')])
})

function delete_cart($id){
	start_load()
	$.ajax({
		url:'admin/ajax.php?action=delete_cart',
		method:'POST',
		data:{id:$id},
		success:function(resp){
			if(resp==1){
				alert_toast("Data successfully deleted",'success')
				setTimeout(function(){
					location.reload()
				},1500)
			}
		}
	})
}
</script>