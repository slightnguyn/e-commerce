<?php include_once 'app/views/layouts/header.php'; extract($data); ?>

	<div class="container-fluid">
	<?php if (count($books) == 0) : ?>
		<div class="notify"><span class="text-danger"><i class="fa fa-bell"></i></span> Book library is empty! Please come back again.</div>
	<?php else: ?>
		<div class="row" id="books">
		<?php foreach ($books as $book) : ?>
			<div class="col-md-4 col-sm-6 col-xs-10 book">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-12">
								<h3 class="book-title">
									<a href="/book/show/<?php echo $book->id; ?>"><?php echo $book->title; ?></a>
									<span class="text-danger pull-right book-price">$<?php echo $book->price; ?></span>
									<small class="help-block">written by <?php echo $book->author; ?></small>
								</h3>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<p class="book-image"><img src="<?php echo App::BOOK_PATH . $book->image; ?>" alt="<?php echo $book->title; ?>" class="img-responsive" width="200" height="200"></p>
							</div>
							<div class="col-md-8 hidden-sm hidden-xs book-info">
								<ul style="list-style-type: square;">
									<li>ISBN: <?php echo $book->isbn; ?></li>
									<li>Publisher: <?php echo $book->publisher; ?></li>
									<li>Pages: <?php echo $book->pages; ?></li>
									<li>Category: <a href="/category/show/<?php echo $book->category_id; ?>">
									<?php
										if (! isset($model)) {
											$model = $this->model('Category');
										}
										echo $model->find($book->category_id)->name;
									?>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="add-cart">
							<p>
								<form action="/cart/add" method="POST">
									<input type="hidden" name="bookId" value="<?php echo $book->id; ?>">
									<button class="btn btn-primary pull-right">Add to Cart</button>
								</form>
							</p>
							<div class="rating">
							<?php
								if (! isset($rateModel)) {
									$rateModel = $this->model('Rate');
								}
								$rate = $rateModel->find($book->id);
								
								renderRating(ceil($rate->average));
							?>
							</div>
							<span class="rating-info">
								<i class="fa fa-flag"></i><span class="text-muted"> <?php echo $rate->times; ?> review</span>
							</span>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
	</div>

<?php include_once 'app/views/layouts/footer.php'; ?>
