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
				<div class="row page-header">
					<div id="book-image" class="col-md-6 col-sm-6">
						<img src="<?php echo App::BOOK_PATH . $book->image; ?>" alt="<?php echo $book->title ?>" class="img-responsive">
					</div>
					<div id="book-info" class="col-md-6 col-sm-6">
						<h2 class="text-info"><?php echo $book->title ?></h2>
						<span class="help-block">written by <?php echo $book->author ?></span>
						<ul style="list-style-type: square;">
							<li>ISBN: <strong><?php echo $book->isbn; ?></strong></li>
							<li>Publisher: <strong><?php echo $book->publisher; ?></strong></li>
							<li>Pages: <strong><?php echo $book->pages; ?></strong></li>
							<li>Price: <strong>$<?php echo $book->price; ?></strong></li>
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
				<div class="row page-header" id="rating">
					<div class="col-md-12">
						<h3 id="rating-title"><i class="fa fa-bookmark"></i> Your rating for this book</h3>
						<span class="rating fa-2x" data-id="<?php echo $book->id; ?>">
							<a href data-star="1"><i class="fa fa-star-o" data-toggle="tooltip" data-placement="bottom" title="very bad"></i></a>
							<a href data-star="2"><i class="fa fa-star-o" data-toggle="tooltip" data-placement="bottom" title="bad"></i></a>
							<a href data-star="3"><i class="fa fa-star-o" data-toggle="tooltip" data-placement="bottom" title="normal"></i></a>
							<a href data-star="4"><i class="fa fa-star-o" data-toggle="tooltip" data-placement="bottom" title="good"></i></a>
							<a href data-star="5"><i class="fa fa-star-o" data-toggle="tooltip" data-placement="bottom" title="very good"></i></a>	
						</span>
						<span class="rating-action fa-2x">
							<a href class="confirm text-success my-hidden"><i class="fa fa-check" data-toggle="tooltip" data-placement="right" title="confirm"></i></a>
						</span>
					</div>
				</div>
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

<?php $data['javascript-in-body'] = 'rating.js';
include_once 'app/views/layouts/footer.php'; ?>
