<style>
	.col-md-6 .well span{
		color: #f90;
		font-weight: 900;
	}
</style>
<!-- Modal -->
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Your Opinion Matters!</h4>
			</div>
			<form action="{{ url("suggestion") }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-md-offset-0">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
								<label for="name">Email</label>
								<input type="text" name="email" class="form-control" placeholder="Enter Your Email">
							</div>
							<div class="form-group">
								<label for="name">Comment</label>
								<textarea name="comment" id="comment" cols="3" rows="5" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Submit Request</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="donate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Donate to support us</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="well">
							<p><strong>Account Name:</strong><br><span>Akinloye Josiah Gboluwaga</span></p>
							<p><strong>Account Number:</strong><br><span>0210572909</span></p>
							<p><strong>Bank Name:</strong><br><span>Guaranty Trust Bank (GTB)</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="well">
							<p><strong>Account Name:</strong><br><span>Akinloye Josiah Gboluwaga</span></p>
							<p><strong>Account Number:</strong><br><span>2020563542</span></p>
							<p><strong>Bank Name:</strong><br><span>Skye Bank</span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>