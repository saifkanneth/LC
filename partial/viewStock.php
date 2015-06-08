<div class="container">
	<?php 
	 include("navigation.php");
	?> 
<div class="panel" ng-init="loadStock(this);" >
    <div class="panel-heading" style="border-bottom:1px solid #ddd;"><h3>Stock details</h3><input type="button" class="btn btn-default btn-info pull-right" value="page print" style="position:relative;top:-40px;" ng-click="printpage('stockTable', 'W3C Example Table');"></div>
								
		<div class="panel-body">
			    <div class="table-responsive">
             <table id="stockTable" class="table table-striped table-hover"  >
    <thead>
        <tr>
									<td><b>Item code</b></td>
													<td><b>Item name</b></td>
													<td><b>Item price</b></td>
        </tr>
    </thead>
    <tbody>
        		<tr ng-repeat=" stock in stockObj" datas-table>
									<td>{{stock.itemcode}}</td>
									<td>{{stock.itemname}}</td>
									<td>{{stock.itemprice}}</td>
					</td>
							</tr>
    </tbody>
    </table>
          </div>
		</div>
</div>
</div>
