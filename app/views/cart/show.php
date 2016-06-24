<?php include_once 'app/views/layouts/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="text-success"><i class="fa fa-bullhorn"></i> One product has been inserted into your shopping cart.</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo App::BOOK_PATH . $book->image; ?>" alt="<?php echo $book->title; ?>" class="img-responsive">
							</div>
							<div class="col-md-8">
								<ul class="list-unstyled">
									<li><a href="/book/show/<?php echo $book->slug; ?>"><?php echo $book->title; ?></a></li>
									<li><span class="text-muted">ISBN:</span> <?php echo $book->isbn; ?></li>
									<li><span class="text-muted">Publisher:</span> <?php echo $book->publisher; ?></li>
									<li><span class="text-muted">Pages:</span> <?php echo $book->pages; ?></li>
									<li><span class="text-muted">Category:</span> <a href="/category/show/<?php echo $book->category_id; ?>">
									<?php
										if (! isset($model)) {
											$model = $this->model('Category');
										}
										echo $model->find($book->category_id)->name;
									?>
									</a></li>
									<li><span class="text-muted">Author:</span> <?php echo $book->author; ?></li>
									<li><span class="text-muted">Price:</span> $<?php echo $book->price; ?></li>
									<li><span class="text-muted">Quantity:</span> 1</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<p><a href="/cart/" class="btn btn-primary pull-right">
						<i class="fa fa-cart-arrow-down"></i> MY SHOPPING CART</a></p>
						<a href="/"><i class="fa fa-chevron-circle-right"></i> Continue shopping!</a>		
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once 'app/views/layouts/footer.php'; ?>
