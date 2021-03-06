<?php include_once 'app/views/layouts/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 id="cart-title" class="text-danger"><i class="fa fa-cart-arrow-down"></i> Your shopping cart</h2>

				<?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
					<h3 class="text-primary page-header"><i class="fa fa-bullhorn"></i> There are no items in your cart.</h3>
					<p><a href="/"><i class="fa fa-chevron-circle-right"></i> Please continue shopping!</p>
				<?php else: ?>
					<form action="/cart/update" method="POST">					
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Item</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>

								<?php
									if (! isset($bookModel)) $bookModel = $this->model('Book');

									foreach ($_SESSION['cart'] as $id => $qty) :
										$item = $bookModel->find($id);
								?>
									<tr class="cart-item">
										<td>
											<img src="<?php echo App::BOOK_PATH . $item->image; ?>" alt="<?php echo $item->title; ?>"
												class="img-responsive" width="100" height="100">
											<a href="/book/show/<?php echo $item->slug; ?>"><?php echo $item->title; ?></a>
											<span class="text-muted"> by <?php echo $item->author; ?></span>
										</td>
										<td style="vertical-align: middle;">$<span class="item-price"><?php echo $item->price; ?></span></td>
										<td style="vertical-align: middle;"><input type="number" name="items[<?php echo $item->id; ?>]" step="1" min="0" 
											value="<?php echo $qty; ?>" autocomplete="off" style="width: 5em;" class="qty"></td>
										<td style="vertical-align: middle;">$<span class="item-total"><?php echo $item->price * $qty; ?></span></td>
									</tr>	
								<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="4">
											<span class="pull-left"><strong>Items:</strong> <span class="items"><?php echo $_SESSION['items']; ?></span></span>
											<span class="pull-right"><strong>Total price:</strong> <span id="totalPrice">$<?php echo $_SESSION['totalPrice']; ?></span></span>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<p class="pull-right">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save changes</button>
								</p>
							</div>
						</div>
					</form>

					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">
								<a href="/"><i class="fa fa-chevron-circle-right"></i> Continue shopping!</a>
								or <a href="/cart/checkout" class="btn btn-success"><i class="fa fa-shopping-bag"></i> Go to Checkout</a>				
							</h3>
						</div>
					</div>
			<?php endif; ?>
			</div>
		</div>
	</div>

<?php $data['javascript-in-body'] = 'cart-change.js';
include_once 'app/views/layouts/footer.php'; ?>
