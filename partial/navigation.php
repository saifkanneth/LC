
<nav class="navbar navbar-default">
   <div class="navbar-header">
     <button class="navbar-toggle" data-toggle="collapse" data-target="#navmenu" >
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
      <a href="#/addsale" class="navbar-brand"><span class="glyphicon glyphicon-home"></span>&nbsp;L_C</a>
   </div>
    
   <div id="navmenu" class="collapse navbar-collapse">
     <ul class="nav navbar-nav">
						<li ><a href="" data-toggle="dropdown">Sale<b class="caret"></b></a><ul class="dropdown-menu">
							<li><a href="#/addsale">Add sale</a></li>
							<li><a href="#/viewsale">View sale</a></li>
							<li><a href="#/updatesale">Update sale</a></li>
							</ul></li>
								<li><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" >Expense<b class="caret"></b></a>
            <ul class="dropdown-menu">
                 <li><a href="#/addexpense">Add expense</span></a></li>
                 <li><a href="#/viewexpense" >View expense</a></li>
            </ul>
       	</li>
								<li><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" >Stock<b class="caret"></b></a>
            <ul class="dropdown-menu">
                 <li><a href="#/addstock">Add stock</span></a></li>
                 <li><a href="#/updatestock" >Update stock</a></li>
																	<li><a href="#/viewstock" >View stock</a></li>
            </ul>
       	</li>
								<li><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" >Report<b class="caret"></b></a>
            <ul class="dropdown-menu">
                 <li><a href="#/viewreport">View report</span></a></li>
            </ul>
       </li> 
   </ul>
   <ul class="nav navbar-nav navbar-right">
							<li><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><?php 
 session_start(); 
 Print_r ($_SESSION['user_name']);

 ?> <b class="caret"></b></a>
       <ul class="dropdown-menu">
             <li><a href="#/changepassword">Password<span class="glyphicon glyphicon-cog pull-right"></span></a></li>
             <li><a href="javascript:void(0);" ng-click="destroy_session();">Logout<span class="pull-right glyphicon glyphicon-off"></span></a></li>
            </ul>
       </li>
      </ul>
     
     
   
   </div>
 
</nav>

<style>
    .navbar-default{
     background-color:white !important;   
    }
    </style>