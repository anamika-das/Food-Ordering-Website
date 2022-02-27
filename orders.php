<div class="container" id="menu">
	<div class="card">
		<div class="card-body table-responsive">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Address</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Status</th>
						<th>Order</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					include 'admin/db_connect.php';
					$qry = $conn->query("SELECT * FROM orders WHERE email = '".$_SESSION['login_email']."'");
					while($row=$qry->fetch_assoc()):
					?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['address'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['mobile'] ?></td>
						<?php if($row['status'] == 1): ?>
							<td class="text-center"><span class="badge bg-success">Confirmed</span></td>
						<?php else: ?>
							<td class="text-center"><span class="badge bg-secondary">For Verification</span></td>
						<?php endif; ?>
						<td>
							<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>" >View Order</button>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
#uni_modal .modal-footer{
  display: none
}
</style>
<script>
$('.view_order').click(function(){
	uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
})
</script>