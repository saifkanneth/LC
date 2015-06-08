	<?php 
	 include("navigation.php");
	?> 

 <div class="panel" ng-init="getYearList(this);">
				<div class="panel-heading" style="border-bottom:1px solid #ddd;">
        <h3>Report</h3>
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
												<button style="position:relative;top:4px;" class="btn btn-info form-control" value="select" ng-click="getReport(this,month,year);">Select&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
									</div>
									</div>
							</div>
        <div  ng-show="reportSet">
            <table class="table table-bordered">
                <thead>
                    <td><b>Sale</b></td>
                    <td><b>Profit</b></td>
                    <td><b>Expense</b></td>                    
                </thead>
                <tbody>
                    <tr>
                        <td>{{saleTotal}}</td>
                        <td>{{profitTotal}}</td>
                        <td>{{expenseTotal}}</td>
                        
                    </tr>
                </tbody>
            </table>
             <div class="row">
            <div class="col-md-2 col-sm-2">
        <button class="btn btn-info form-control" ng-click="showChart();">Open chart&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-down"></span></button>
            </div></div>
        </div>
       
        <div class="container" ng-if="chartshow">
            <div  class="report" ng-if="dateSelect==true">
                <div class="row">
                <span><u><b>Sale :</b></u></span>
                    <div class="table-responsive" style="width:90%;">
                        <div id="saleChart"  sale-chart=saleArr ></div></div>
                <span><u><b>Profit :</b></u></span>
                    <div class="table-responsive" style="width:90%;">
                        <div id="profitChart"  profit-chart=profitArr ></div></div>
                <span><u><b>Expense :</b></u></span>
                    <div class="table-responsive" style="width:90%;">
                        <div id="expenseChart"  expense-chart=expenseArr ></div></div>
            </div>
           
        </div>
     </div>
</div>
</div>

