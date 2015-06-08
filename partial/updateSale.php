	<?php 
	 include("navigation.php");
	?>
	
	<div class="panel" ng-init="getYearList(this);" >
				<div class="panel-heading" style="border-bottom:1px solid #ddd;">
        <h3>Sale datails :</h3>	
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
             <button  style="position:relative;top:4px;" class="btn btn-info form-control"  ng-click="getSaleDetails(this,month,year);">Select&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
									</div>
									</div>
							</div>
					<table class="table table-responsive table-striped" id="saleTable" ng-show="datesSelected"> 
						<thead>
							<tr>
									<td>Sale no.</td>
									<td>Item name</td>
									<td>Item price</td>
									<td>Sold price</td>
									<td>Sold date</td>
									<td>Edit</td>
							</tr>
						</thead>
					<tbody >
					<tr ng-repeat="sale in saleObj" datas-table>
						<td >{{sale.sno}}
							<div ng-show="sale.edit">
										<table clas="table table-striped" >
											<span ng-show="valueError" style="color:#E92626">Invalid data.</span>
													<div class="row">
														<div >
      														<label>Sold price</label>
																				<input type="text" ng-model="price" class="form-control" style="width:100%;" id="2" ng-init="validArray[2]=true;" data-validation-type="number" input-validation value="{{sale.sitemsold}}"/> 
														</div><label>Date</label><br><div class="datepic input-group"><input  ng-model="saleDate" ng-init="saleDate=sale.solddate"   class="form-control" id="3" style="width:100%;" ng-init="validArray[3]=false;" data-validation-type="text" input-validation type="text"  date-picker><span class="input-group-addon">
      <i class="glyphicon glyphicon-calendar">
      </i>
    </span></div>
                 <div>
                     <button  class="btn btn-success pull-left" ng-click="addToSale(this,sale.sno,sale.sitemname,sale.sitemprice,price,saleDate,sale.sno);">Update&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                     <button class="btn btn-warning pull-right" ng-click="changeEditStatus(sale.sno,false,sale.sitemname,sale.sitemsold);">Cancel&nbsp;&nbsp;<span class="glyphicon glyphicon-erase"></span></button>
                 </div>
											</div>
														
											</table></div>
						</td>
						
						<td>{{sale.sitemname}}</td>
						<td>{{sale.sitemprice}}</td>
						<td>{{sale.sitemsold}}</td>
						<td>{{sale.solddate}}</td>
         <td><button  class="btn btn-info"  ng-click="changeEditStatus(sale.sno,true,sale.sitemname,sale.sitemsold);" >Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></button>
						<button class="btn btn-danger"  ng-click="ConfirmAction(sale.sno,sale.sitemname,sale.sitemprice);" >Remove&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
						</td>
					
						</tr>
	
					</tbody>
						
						
					</table>
				</div>
	</div>
 <div class="modal" show-modal=modalShow data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
		  <h2>AE</h2>
		</div>
		<div class="modal-body">
		    Do you want to add this item back to stock ?
		</div>
		<div class="modal-footer">
		  <button class="btn btn-danger" ng-click="deleteSale(true);">Yes</button>
	      <button class="btn btn-success" ng-click="deleteSale(false);" >No</button>
		</div>
	  </div>
	</div>
  </div>
	