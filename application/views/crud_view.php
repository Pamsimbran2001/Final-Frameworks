<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD Operations In CI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Cosmetics</a>
		</div>
	</nav>
	
	<div class="container mt-5">
		<?php if ($this->session->flashdata('inserted')): ?>

			<div  class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $this->session->flashdata('inserted'); ?>
				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php endif; ?>
		<?php if ($this->session->flashdata('updated')): ?>

			<div  class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $this->session->flashdata('updated'); ?>
				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php endif; ?>

		<?php if ($this->session->flashdata('deleted')): ?>

			<div  class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $this->session->flashdata('deleted'); ?>
				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php endif; ?>
		<div class="clear-fix">
			<h3 style="float: left;">All Products</h3>
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" style="float: right;"><i class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i>&nbsp;Add Product</button>
		</div>
		<table class="table table-hover">
			<thead class="table-dark">
				<tr>
					<th scope="col">Product Name</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col" class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($product_details as $product): ?>
					<tr>
						<td><?php echo $product->productName;?></td>
						<td><?php echo $product->productPrice;?></td>
						<td><?php echo $product->productQuantity;?></td>
						<td class="text-center">
							<a href="<?php echo base_url(); ?>crud/editProduct/<?php echo $product->id; ?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>&nbsp;Edit</a>
							<a href="<?php echo base_url(); ?>crud/deleteProduct/<?php echo $product->id; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

<!----Adding/Inserting New Item in data base --->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="productModalLabel">Add New Products</h1>
				
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url(); ?>crud/addProduct" method="POST">
				<div class="modal-body">
					<div class="form-group mb-3">				    
						<input type="text" name="pname" class="form-control" placeholder="Product Name" required>
					</div>
					<div class="form-group mb-3">				   
						<input type="text" name="price" class="form-control" placeholder="Enter Price" required>
					</div>
					<div class="form-group mb-3">				   
						<input type="text" name="qty" class="form-control" placeholder="Enter Quantity" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>&nbsp;Close</button>
					<button type="submit" name="btnSave" class="btn btn-primary"><i class="fa-solid fa-download"></i>&nbsp;Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!----End of Adding/Inserting New Item in data base code --->

<!--Form input validation -->
<?php if ($this->session->flashdata('error')): ?>
	<div align="center" style="color: #fff;" class="bg-danger">
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif; ?>
<!--End of Form input validation -->

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="js/index.js"></script>	
</body>
</html>