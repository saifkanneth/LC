
	<?php 
	 include("navigation.php");
	?> 
<div class="panel">
    <div class="panel-heading" style="border-bottom:1px solid #ddd;">
        change password:
    </div>
    <div class="panel-body">
        			<span ng-show="valueError" style="color:#E92626">Invalid values!</span>
        <div class="form-group">
            <label class="col-md-3 col-sm-3">old password:</label>
            <div class="col-md-9 col-sm-9">
            <input type="password" class="form-control " id="0" ng-init="validArray[0]=false;" data-validation-type="text" input-validation   ng-model="oldpassword">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-3">new password:</label>
            <div class="col-md-9 col-sm-9">
            <input type="password" class="form-control" id="1" ng-init="validArray[1]=false;" data-validation-type="text" input-validation   ng-model="newpassword">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-3">confirm password:</label>
            <div class="col-md-9 col-sm-9">
            <input type="password" class="form-control" id="2" ng-init="validArray[2]=false;" data-validation-type="text" input-validation   ng-model="confirmpassword">
            </div>
        </div>
        
        <div class="form-group" >
            <div class="col-md-3 col-sm-4">
        <input style="width:100%;" type="button" value="update" class="btn btn-success" ng-click="changePasswod(this);">
            </div>
        </div>
    </div>
</div>