	<?php 
	 include("navigation.php");
	?>
	
	<div class="panel" ng-init="getYearList(this);">
				<div class="panel-heading" style="border-bottom:1px solid #ddd;">
        <h3>Expense details :</h3>	
				</div>
				<div class="panel-body">
							<span ng-show="valueError" style="color:#E92626">please select valid month and year.</span>
							<div class="row">
									<div class="col-md-5 col-sm-5">
											<div class="form-group">
												<label>Select month</label>
												<select class="form-control" ng-model="month" id="0" ng-init="validArray[0]=false;" data-validation-type="text" input-validation>
													<option value="">SELECT</option>
													<option value="{{month.id}}" ng-repeat="month in monthObj">{{month.name}}</option>
												</select>
											</div>
									</div>
									<div class="col-md-5 col-sm-5">
												<div class="form-group">
												<label>Select year</label>
															<select class="form-control" ng-model="year" id="1" ng-init="validArray[1]=false;" data-validation-type="text" input-validation>
																	<option value="">SELECT</option>
																	<option value="{{year}}" ng-repeat="year in yearObj">{{year}}</option>
												</select>
											</div>
									</div>
								<div class="col-md-2 col-sm-2">
									<div class="form-group">
									<br>
												<button style="position:relative;top:4px;" class="btn btn-info form-control"  ng-click="getExpenseDetails(this,month,year);">Select&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
									</div>
									</div>
							</div>
					<table class="table table-responsive table-striped" id="expenseTable" ng-show="datesSelected"> 
						<thead>
							<tr>
									<td>Expense code.</td>
									<td>Expense type</td>
									<td>Expense amount</td>
        <td>Expense date</td>
							</tr>
						</thead>
					<tbody>
					<tr ng-repeat="expense in expenseObj" ng-if="expense.expmonth==month&&expense.expyear==year" datas-table>
						<td>{{expense.expid}}</td>
						<td>{{expense.expname}}</td>
						<td>{{expense.expprice}}</td>
      <td>{{expense.expyear}} - {{expense.expmonth}} - {{expense.expdate}}</td>
						</tr>
						
					</tbody>
						
						
					</table>
				</div>
	</div>
	