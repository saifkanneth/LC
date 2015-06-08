
	<?php 
	 include("navigation.php");
	?> 

 <style>
		  .ExpenseSpace{
      position:relative;
	  border:1px solid #ccc;
	  margin-bottom:1px;
	  width:100%;
      height:25px;
  }
     .expense{
         position:relative;
         top:1px;
         margin-right:5px;
         background:rgb(45, 93, 168);
         border-radius:5px;
         border:1px solid #ccc;
         width:100%;
         height:20px;
         text-align:center;
         
     }
		</style>
<div class="panel" ng-init="getYearList(this);">
			<div class="panel-heading" style="border-bottom:1px solid #ddd;">
       <h3>Expense</h3>	
			</div>
			<div class="panel-body">
											<span ng-show="valueError" style="color:#E92626">please select valid month and year.</span>
									<div class="row">
									<div class="col-md-5 col-sm-5">
											<div class="form-group">
												<label>Select month :</label>
												<select class="form-control" ng-model="month" id="0" ng-init="validArray[0]=false;" data-validation-type="text" input-validation>
													<option value="">SELECT</option>
													<option value="{{month.id}}" ng-repeat="month in monthObj">{{month.name}}</option>
												</select>
											</div>
									</div>
									<div class="col-md-5 col-sm-5">
												<div class="form-group">
												<label>Select year :</label>
															<select class="form-control" ng-model="year" id="1" ng-init="validArray[1]=false;" data-validation-type="text" input-validation>
																	<option value="">SELECT</option>
																	<option value="{{year}}" ng-repeat="year in yearObj">{{year}}</option>
												</select>
											</div>
									</div>
								<div class="col-md-2 col-sm-2">
									<div class="form-group">
									<br>
             <button style="position:relative;top:4px;" class="btn btn-info form-control" ng-click="loadExpense(this,month,year);">Select&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
									</div>
									</div>
							</div>
		<table class="table table-responsive table-bordered" ng-show="calendarRow.length">
				<thead>
					<tr>
					<th>SUN</th>
					<th>MON</th>
					<th>TUE</th>
					<th>WED</th>
					<th>THU</th>
					<th>FRI</th>
					<th>SAT</th>
					</tr>
			</thead>
				<tbody>
        <tr ng-repeat="row in calendarRow"><td ng-repeat="field in row.index" Date={{field.date}}><span class="date"><b>{{field.date}}</b></span><div class="ExpenseSpace" Index="{{$index}}" Code="{{expense.expid}}" Name="{{expense.expname}}" Price="{{expense.expprice}}" Set="true"  ng-repeat="expense in expenseObj track by $index" ng-if="expense.expdate==field.date&&expense.expmonth==month&&expense.expyear==year" add-expense><div class="expense" >{{expense.expname}}</div></div><div class="ExpenseSpace" Set="false" Code="" Name="" Price="" ng-show="field.date!=''" data-set=false  add-expense></div></td></tr>
				</tbody>
		</table>
			</div>
</div>
  <div class="modal" show-modal=modalShow data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
		  <h2>Add expense :</h2>
		</div>
		<div class="modal-body">
      											<span ng-show="valueError" style="color:#E92626">Please fill valid data!</span>

		    <form class="" role="form">
	           <div class="form-group">
	             <label  >Expense type :</label>
	             <input  class="form-control " ng-model="expName" id="2" ng-init="validArray[2]=true;" data-validation-type="text" input-validation>
	           </div>
	          <div class="form-group">
	           <label  >Expense amount :</label>
	           <input  class="form-control" ng-model="expAmount" id="3" ng-init="validArray[3]=true;" data-validation-type="number" input-validation>
	          </div>
	        </form>
		</div>
		<div class="modal-footer">
      <button class="btn btn-danger" ng-click="deleteExpense(this,eCode,setAlready,expIndex);">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
	      <button class="btn btn-success" ng-click="addToExpense(this,eCode,year,month,eDate,expName,expAmount,setAlready,expIndex);">Update&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
		</div>
	  </div>
	</div>
  </div>

