<div id="bookingModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content padding-lr-20">
			<div class="modal-header">
				<h2 class="modal-title col-xs-11">Booking Details</h2>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{url('addEvent')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input  id="id" type="hidden" name="id">
					<div class="form-group">
		 				<label for="event" class="col-xs-2 control-label">Event:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="event" name="event" maxlength="150" readonly>
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="date" class="col-xs-2 control-label">Date:</label>
		 				<div class="col-xs-4">
		 				 <div class='input-group'>
		 					<input type="text" class="form-control" id="date" name="date" data-provide="datepicker" maxlength="150" readonly>
		                    <span class="input-group-addon">
                        		<span class="glyphicon glyphicon-calendar">
                    		</span>
		 				 </div>
                    </span>
		 				</div>
		 				<label for="time" class="col-xs-2 control-label">Venue Time:</label>
		 				<div class="col-xs-4">
		 					<div class='input-group'>
			 					<input type="text" class="form-control" id="time" name="time" maxlength="150" readonly>
			                    <span class="input-group-addon">
	                        		<span class="glyphicon glyphicon-time">
	                    		</span>
		 					</div>
	 					</div>
					</div>
					<div class="form-group">
		 				<label for="noOfHeads" class="col-xs-2 control-label">No. of Heads:</label>
		 				<div class="col-xs-4">
		 					<input type="text" class="form-control" id="noOfHeads" name="noOfHeads" maxlength="150" readonly>
		 				</div>
		 				<label for="preparationTime" class="col-xs-2 control-label">Preparation Time:</label>
		 				<div class="col-xs-4">
			 				<div class='input-group'>
			 					<input type="text" class="form-control" id="preparationTime" name="preparationTime" maxlength="150" readonly>
			                    <span class="input-group-addon">
	                        		<span class="glyphicon glyphicon-time">
	                    		</span>		
			 				</div>
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="preparationVenue" class="col-xs-2 control-label">Preparation Venue:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="preparationVenue" name="preparationVenue" maxlength="150" readonly>
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="clientName" class="col-xs-2 control-label">Client:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="client" name="client" maxlength="150" readonly>
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="mobile" class="col-xs-2 control-label">Mobile:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="mobile" name="mobile" maxlength="150" readonly>
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="email" class="col-xs-2 control-label">Email:</label>
		 				<div class="col-xs-10">
		 					<input type="email" class="form-control" id="email" name="email" maxlength="150" readonly>
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="message" class="col-xs-2 control-label">Message:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="message" name="message" maxlength="150" readonly>
		 				</div>
					</div>
					<div id="status-form-group" class="form-group">
		 				<label for="message" class="col-xs-2 control-label">Status:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="status" name="status" readonly>
		 				</div>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-success pull-right margin-right-15 pull-right">Accept</button>
						<button type="submit" class="btn btn-danger pull-right margin-right-15 pull-right">Reject</button>
						
						<input id="file-upload" class="hidden" type="file" name="image" data-preview-file-type="any">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
