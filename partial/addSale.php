<?php 
	 include("navigation.php");
	?> 

<div class="panel" ng-init="loadStock(this);">
		<div class="panel-heading" style="border-bottom:1px solid #ddd">
      <div class="row"><div class="col-sm-9 col-sm-10"><h3>Add sale</h3></div><div class="col-sm-3 col-md-2 col-xs-12 pull-right"><div class="datepic input-group"><input   readonly ng-model="saleDate" id="2" ng-init="validArray[2]=true;" data-validation-type="text" input-validation  class="form-control" type="text"  date-picker/> <span class="input-group-addon">
      <i class="glyphicon glyphicon-calendar">
      </i>
    </span></div>
			
				</div>
				
			</div>
    
	</div>
	<div class="panel-body">
				<span ng-show="valueError" style="color:#E92626">Error. Check the values!</span>
			<div class="form-group">
				
				<div class="row">
					<div class="col-md-10 col-sm-10">
						<label >Item name :</label>
						<select class="form-control"  id="0" ng-init="validArray[0]=false;" data-validation-type="text" input-validation   ng-model="Item" ng-change="onItemChange();" ng-options="stock.itemname for stock in stockObj">
									<option value="">SELECT</option>
						</select>
					</div>
					<div class="col-md-2 col-sm-2">
						<label >Stock price :</label>
						<input class="form-control" type="text" disabled ng-model="Item.itemprice">
						</div>
		</div>
		</div>
			<div class="form-group">
						<label >Sold price :</label>
						<input type="text" class="form-control" ng-model="price" id="1" ng-init="validArray[1]=false;" data-validation-type="number" input-validation></input>
		</div>
	
    <button  class="btn btn-success" ng-click="addToSale(this,Item.itemcode,Item.itemname,Item.itemprice,price,saleDate);" >Save&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
 
		</div>
		
	</div>
</div>