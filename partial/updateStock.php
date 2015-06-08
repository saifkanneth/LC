<div class="container">
	<?php 
	 include("navigation.php");
	?> 

<div class="panel" ng-init="loadStock(this);" >
    <div class="panel-heading" style="border-bottom:1px solid #ddd;"><h3>Stock details</h3></div>
		<div class="panel-body">
			    <div class="table-responsive">
         
             <table class="table table-striped table-hover" >
    <thead>
        <tr>
									<td><b>Item code</b></td>
													<td><b>Item name</b></td>
													<td><b>Item price</b></td>
													<td><b>Edit</b></td>
            
        </tr>
								<tr ng-repeat=" stock in stockObj">
									<td>{{stock.itemcode}}<br>
										<div ng-show="stock.edit">
										<table clas="table table-striped" >
											<span ng-show="valueError" style="color:#E92626">Invalid name or price.</span>
															<div class="form-inline">
      														<label>SN</label><br>
																				<input type="text" ng-model="editName" class="form-control" style="width:100%;" id="0" ng-init="validArray[0]=true;" data-validation-type="text" input-validation="" value="{{stock.itemname}}"/>
														</div>
														<div class="form-inline">
      														<label>SP</label><br>
																				<input type="text"   ng-model="editPrice" class="form-control" style="width:100%;" id="1" ng-init="validArray[1]=true;"  data-validation-type="number" input-validation="" value="{{stock.itemprice}}"/> 
														</div><br>
														<button  class="btn btn-success pull-left" ng-click="addToStock(editName,editPrice,this,stock.itemcode);">Update&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
														<button  class="btn btn-warning pull-right" ng-click="changeEditStatus(stock.itemcode,false);">Cancel&nbsp;&nbsp;<span class="glyphicon glyphicon-collapse-up"></span></button>
											</table></div></td>
									<td>{{stock.itemname}}</td>
									<td>{{stock.itemprice}}</td>
									<td><button class="btn btn-info"  ng-click="changeEditStatus(stock.itemcode,true,stock.itemname,stock.itemprice);">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></button>
																		<button class="btn btn-danger"  ng-click="deleteStock(stock.itemcode,this);">Remove&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></button>

									</td>
									
								
								</tr>
				
    </thead>
    <tbody>
        
    </tbody>
    </table>
  
          </div>
		</div>
		
</div>
 </div>