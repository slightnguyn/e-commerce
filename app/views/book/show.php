<?php include_once 'app/views/layouts/header.php'; ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1860473287513398";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="container">
		<div id="book-details" class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="row">
					<div id="book-image" class="col-md-5 col-sm-6">
						<img src="<?php echo App::BOOK_PATH . $book->image; ?>" alt="<?php echo $book->title ?>" class="img-responsive">
					</div>
					<div id="book-info" class="col-md-7 col-sm-6">
						<h2 class="text-info"><?php echo $book->title ?></h2>
						<span class="help-block">written by <?php echo $book->author ?></span>
						<ul style="list-style-type: square;">
							<li>ISBN: <?php echo $book->isbn ?></li>
							<li>Publisher: <?php echo $book->publisher ?></li>
							<li>Pages: <?php echo $book->pages ?></li>
							<li>Price: $<?php echo $book->price ?></li>
							<li>Category: <a href="/category/show/<?php
								if (! isset($model)) {
									$model = $this->model('Category');
								}
								echo $model->find($book->category_id)->slug; ?>">
							<?php
								if (! isset($model)) {
									$model = $this->model('Category');
								}
								echo $model->find($book->category_id)->name;
							?>
							</a></li>
						</ul>
						<ul id="features" class="list-unstyled list-inline">
							<li>
								<form action="/cart/add" method="POST">
									<input type="hidden" name="bookId" value="<?php echo $book->id; ?>">
									<button class="btn btn-primary pull-right"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</form>
							</li>
						</ul>
						<ul class="list-unstyled list-inline">
							<li>
								<div class="fb-like" data-href="http://localhost/book/show/<?php echo $book->id; ?>" 
									data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-header"></div>
				<div class="row">
					<div id="book-description" class="col-md-12">
						<h3 class="title"><i class="fa fa-quote-left"></i> Book description</h3>
						<div class="text-justify hidden" id="show-detail">
							<?php echo $book->description; ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once 'app/views/layouts/footer.php'; ?>
