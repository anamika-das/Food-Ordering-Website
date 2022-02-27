<section class="page-section" id="menu">
    <div class="container">     
        <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php 
        include'admin/db_connect.php';
        $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
        while($row = $qry->fetch_assoc()):
        ?>
            <div class="col">
                <div class="card h-100">
                    <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name'] ?>
                        <?php if($row['status'] == 0): ?>
                            <span class="text-danger">(Unavailable)</span>
                        <?php endif; ?>
                        </h5>
                        <p class="card-text"><?php echo $row['description'] ?></p>
                        <div class="text-center">
                            <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>

<script>
$('.view_prod').click(function(){
    uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
})
</script>
	
