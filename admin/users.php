<div class="container-fluid">
	<div class="row m-3">
		<div class="card col-lg-12">
			<div class="card-body table-responsive">
				<div class="col-lg-12">
					<h2> Admin and Restaurant User </h2>
				</div>
				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Email ID</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include 'db_connect.php';
							$users = $conn->query("SELECT * FROM users order by name asc");
							$i = 1;
							while($row= $users->fetch_assoc()):
						?>
						<tr>
							<td>
								<?php echo $i++ ?>
							</td>
							<td>
								<?php echo $row['name'] ?>
							</td>
							<td>
								<?php echo $row['email'] ?>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<div class="card-body table-responsive">
				<div class="col-lg-12">
					<h2> Common User </h2>
				</div>
				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Email ID</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$users2 = $conn->query("SELECT * FROM user_info");
							$i = 1;
							while($row2 = $users2->fetch_assoc()):
						?>
						<tr>
							<td>
								<?php echo $i++ ?>
							</td>
							<td>
								<?php echo $row2['first_name'] ?> <?php echo $row2['last_name'] ?>
							</td>
							<td>
								<?php echo $row2['email'] ?>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>