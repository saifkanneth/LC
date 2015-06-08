
	<?php 
	 include("navigation.php");
	?> 

 <div class="panel" ng-init="loadStockNames(this);">
     <div class="panel-heading" style="border-bottom:1px solid #ddd;"><h3>Add stock</h3> </div>
		<div class="panel-body">
			<span ng-show="valueError" style="color:#E92626">Invalid name or price.</span>
			 <div class="form-group">
							<label for="AS">Item name :</label>
							<input type="text" list="stockNames"  class="form-control"  ng-model='itemName' id="0" ng-init="validArray[0]=false;" data-validation-type="text" input-validation>
        <datalist id="stockNames">
            <option ng-repeat="stock in stockObj" value="{{stock.itemname}}">{{stock.itemname}}</option>
        </datalist>
			</div>
			 <div class="form-group">
							<label for="AP">Item price :</label>
							<input type="text" class="form-control"  ng-model='itemPrice' id="1" ng-init="validArray[1]=false;" data-validation-type="number" input-validation>
			</div>
			<button class="btn btn-success"  ng-click="addToStock(itemName,itemPrice,this);">Save&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></button>

			
		
		</div>
		
</div >

