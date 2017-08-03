<div id="addEventModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content padding-lr-20">
			<div class="modal-header">
				<h2 class="modal-title col-xs-11">Add Event</h2>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{url('addEvent')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<input  id="id" type="hidden" name="id">
					<div class="form-group">
		 				<label for="venue" class="col-xs-2 control-label">Venue:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="venue" name="link" maxlength="150">
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="date" class="col-xs-2 control-label">Date:</label>
		 				<div class="col-xs-4">
		 				 <div class='input-group'>
		 					<input type="text" class="form-control" id="date" name="date" data-provide="datepicker" maxlength="150">
		                    <span class="input-group-addon">
                        		<span class="glyphicon glyphicon-calendar">
                    		</span>
		 				 </div>
                    </span>
		 				</div>
		 				<label for="time" class="col-xs-2 control-label">Time:</label>
		 				<div class="col-xs-4">
		 					<div class='input-group'>
			 					<input type="text" class="form-control" id="time" name="time" maxlength="150">
			                    <span class="input-group-addon">
	                        		<span class="glyphicon glyphicon-time">
	                    		</span>
		 					</div>
	 					</div>
					</div>
					<div class="form-group">
		 				<label for="clientName" class="col-xs-2 control-label">Link:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="link" name="link" maxlength="150">
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="price" class="col-xs-2 control-label">Price:</label>
		 				<div class="col-xs-10">
		 					<input type="text" class="form-control" id="price" name="price" maxlength="150">
		 				</div>
					</div>
					<div class="form-group">
		 				<label for="ticket" class="col-xs-2 control-label">Ticket:</label>
		 				<div class="col-xs-10">
		 					<input type="ticket" class="form-control" id="ticket" name="ticket" maxlength="150">
		 				</div>
					</div>
					
					<div class="row">
						<button type="submit" class="btn btn-success pull-right margin-right-15 pull-right">Submit</button>
						
						<input id="file-upload" class="hidden" type="file" name="image" data-preview-file-type="any">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
