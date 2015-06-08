  <div class="row">
    <div class="col-md-4 ">
        <div class="panel" ng-init="getCookieDetails(this);">
          <div class="panel-heading" style="border-bottom:1px solid #ddd;">
            <h4>Enter your credential:</h4>
          </div>
          <div class="panel-body">
											<span ng-show="userError" style="color:#E92626">Invalid username/password!</span>
            <div class="form-group">
                <label for="username">username:</label>
                <input type="text" class="form-control" ng-model="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" ng-model="password" placeholder="Enter password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" ng-model="remember"> Remember me</label>
            </div>
            <button type="button" style="width:100%;" class=" btn btn-default btn-success" ng-click="checkCredential(username,password,remember,this);">login</button>
          </div>
        </div>
  </div>
</div>
</div>
<style>

    @media (min-width: 992px){
.col-md-4 {
  margin-left: 30%;
    margin-top:50px;
}
    }
    

    </style>


