<?php
include_once ('Config.php');
   include_once ('inc/sessionsetting.class.php');
   $sessionobj	=	new sessionsetting();
   if(!$_SESSION['login_id'])
   {
       header("Location: http://127.0.0.1:82/Angular/login.php");  
   }
   
   if($approveId)
   {
      $approvQ = "
                  UPDATE
                    careers_job
                  SET
                    Job_Approval = 1,
                    Modified_By       = $_SESSION[login_id],
                    Modified_Date     = now()
                  WHERE
                    Job_Approval != 1
                    AND Job_Id = ".$approveId;
      $resApprovQ = mysql_query($approvQ);
      if($resApprovQ) 
      {
        header("Location:http://127.0.0.1:82/Angular/Index.php?bit=3");
      }
   }
   if($deleteId)
   {
      $DeleteQ = "
                  UPDATE
                    careers_job
                  SET
                    Job_Approval  = 0,
                    Record_Status = 0,
                    Modified_By   = $_SESSION[login_id],
                    Modified_Date = now()
                  WHERE
                    Job_Id = ".$deleteId;
      $resDelQ = mysql_query($DeleteQ);
      if($resDelQ) 
      {
        header("Location:http://127.0.0.1:82/Angular/Index.php");
      }
   }
   
   if($_POST['SelectedApprove'])
   {
   
   if($_POST['Check_List']){
      foreach($_POST['Check_List'] as $Job_Id){
        $AprovQ= "
                  UPDATE
                    careers_job
                  SET
                    Job_Approval  = 1,
                    Modified_By   = $_SESSION[login_id],
                    Modified_Date = now()
                  WHERE
                    Job_Approval != 1
                    AND Job_Id = ".$Job_Id;
        $resApp  = mysql_query($AprovQ);
        if($resApp) 
        {
          header("Location: http://127.0.0.1:82/Angular/Index.php?bit=3");
        }
      }
      }
      
   }
   
   if($_POST['SelectedDelete'])
   {
      foreach($_POST['Check_List'] as $Job_Id){
        $DelAllQ= "
                  UPDATE
                    careers_job
                  SET
                    Job_Approval  = 0,
                    Record_Status = 0,
                    Modified_By   = $_SESSION[login_id],
                    Modified_Date = now()
                  WHERE
                    Record_Status != 0
                    AND Job_Id = ".$Job_Id;
        $resDelAll  = mysql_query($DelAllQ);
        if($resDelAll) 
        {
          header("Location: http://127.0.0.1:82/Angular/Index.php");
        }
      }
   }
?>
<?
 
  if($bit && $bit == 2) {
    echo "<script>alert('Successfully Added');</script>";
  }
  else if($bit == 1){
    echo "<script>alert('Successfully Updated');</script>";
  }
  else if($bit == 3)
  {
    echo "<script>alert('Successfully Approved');</script>";
  }
            
?>
<!DOCTYPE html>
<html>
<head>
<STYLE type=text/css>
.CurrentLink{background-color:#E43226}
</STYLE>
   
<?
require_once ('HeaderJob.php');

set_error_handler("customHandler");

function customHandler(a,b,c,d,e){
echo a.b.c.d.e;
}
?>
<script language="Javascript">

function editJob(jobId)
{
    document.forms[0].action = 'PostJob.php?jobId='+jobId;
    document.forms[0].submit();
}
function ApproveJob(jobId)
{
    document.forms[0].action = "Index.php?approveId="+jobId;
    document.forms[0].submit();
}
function DeleteJob(jobId)
{
    document.forms[0].action = "Index.php?deleteId="+jobId;
    document.forms[0].submit();
}

function selectall()
  {
     for (i=0;i<document.forms['Index'].elements.length;i++) 
  		  {
         if(document.forms[0].chkall.checked == true) 
          { 			
         		// Checking if the current element in this iteration is a check box. 
            if(document.forms['Index'].elements[i].type == "checkbox") 
            {            
             document.forms['Index'].elements[i].checked = true; 	                   					
            }
          }
          else
          {
            if(document.forms['Index'].elements[i].type == "checkbox" ) 
            {            
             document.forms['Index'].elements[i].checked = false;                     					
            }
          }
  			}
  }
  
function FilterJob()
{ var deptF = '';
  var stsF  = '';
  if(document.getElementById('DeptFltr'))
  {
  deptF  = document.getElementById('DeptFltr').value;
  }
  stsF   = document.getElementById('StatusFltr').value;
  document.forms[0].action = "Index.php?deptF="+deptF+"&stsF="+stsF;
  document.forms[0].submit();
  
}
</script>
 
</head>

<body>
  
   <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Contracting PLUS Career Data</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            <li><a href="http://127.0.0.1:82/Angular/home.php" style="color:#fff">Home</a></li>
                <li><a href="http://127.0.0.1:82/Angular/Index.php" style="color:#fff">Job</a></li>
                <li><a href="http://127.0.0.1:82/Angular/AppIndex.php?Status=14" style="color:#fff">Application</a></li>
                <?if($_SESSION['login_id'])
                {
                  echo "Hi ".$_SESSION['user_name']."!!";
                }
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:#E43226">
                        <i class="fa fa-user fa-fw" style="color:#fff"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                   
                        <li><a href="http://127.0.0.1:82/Angular/UserProfile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                       
                        <li><a href="login.php?logOut=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!--
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="http://127.0.0.1:82/Angular/home.php"><i class="fa fa-home fa-fw"></i> Home </a>
                            
                        </li>
                        <li>
                            <a href="http://127.0.0.1:82/Angular/Index.php" class="CurrentLink"><i class="fa fa-list-ul fa-fw"></i><font color="#FFFFFF"> Job Summary </font></a>
                            
                        </li>
                        
                         <li>
                            <a href="http://127.0.0.1:82/Angular/PostJob.php"><i class="fa fa-cloud-upload fa-fw"></i> Post Job </a>
                            
                            <!-- /.nav-second-level -->
                        </li>
               
                       
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      </div>  


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Careers Data Bank</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form name="Index" action="Index.php" method="post">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a href="http://127.0.0.1:82/Angular/PostJob.php" class="btn btn-warning">Post a Job</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                                    
                            <div align="center"><span style="font-size:18px" ><b></b></span></div>
                            
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <td colspan="6">
                                         <? $QString1 = '';
                                            if($deptF)
                                            {
                                              $QString1 = " AND Job_Department = $deptF";
                                            }
                                            if($stsF)
                                            {
                                              $QString1.= " AND Job_Status = $stsF";
                                            }
                                            
                                            
                                            $CountApprv = "
                                                    SELECT 
                                                      Count(Job_Id)
                                                    FROM 
                                                      careers_job 
                                                    WHERE
                                                      Record_Status = 1
                                                      AND Job_Approval != 1
                                                      AND Job_Status = 10
                                                      $QString1
                                                   ";
                                            $ApprvdQ = mysql_query($CountApprv) or die($CountApprv . " -> " . mysql_error()); 
                                            $AppCount = mysql_fetch_row($ApprvdQ);    
                                            
                                            if($AppCount[0] > 0 && $_SESSION['User_Type'] == 2 || $_SESSION['User_Type'] == 4)
                                            {
                                         ?>
                                              <input type="submit" class="btn btn-success" name="SelectedApprove" id="SelectedApprove" value="Selected Approve">
                                         <? }
                                            
                                            if($_SESSION['User_Type'] == 2)
                                            {
                                            ?>Dept : 
                                            <select name="DeptFltr" id="DeptFltr" class="form-control">
                                            <option value="">--Select--</option>
                                            <?
                                              $depQ="
                                                      SELECT 
                                                        Pickup_Id,
                                                        Description
                                                      FROM
                                                        careers_pickup_code
                                                      WHERE
                                                        Parent_Id = 5
                                                        AND Record_Status = 1";
                                              $depQrst = mysql_query($depQ) or die($depQ . " -> " . mysql_error());
      
                                              while($DeptRow = mysql_fetch_array($depQrst))
                                          		{
                                                $sel = ''; 
                                                if($_POST['DeptFltr'] == $DeptRow['Pickup_Id'] )
                                                {
                                                    $sel = 'selected';
                                                }
                                               
                                                echo "<option " . $sel . " value = '" . $DeptRow['Pickup_Id'] . "'>" . $DeptRow['Description'] . "</option>";	
                                          
                                              }
                                            ?>
                                            </select>
                                          
                                            <?
                                            }
                                           
                                         
                                         ?>
                                         Status : 
                                         <select name="StatusFltr" id="StatusFltr" class="form-control">
                                         <option value="">--Select--</option>
                                         <?
                                         $StatusQ = "
                                                    SELECT 
                                                    	Pickup_Id,
                                                    	Description
                                                    FROM 
                                                    	careers_pickup_code
                                                    WHERE
                                                    	Parent_Id=6";
                                        $stsQrst = mysql_query($StatusQ) or die($StatusQ . " -> " . mysql_error());
                                        
                                        while($StsRow = mysql_fetch_array($stsQrst))
                                          {
                                            $selS = ''; 
                                            if($_POST['StatusFltr']==$StsRow['Pickup_Id']) 
                                            { 
                                              $selS = 'selected'; 
                                            }
                                             echo "<option " . $selS . " value = '" . $StsRow['Pickup_Id'] . "'>" . $StsRow['Description'] . "</option>";	
                                           }
                                          ?>
                                         </select>
                                         <input type="button" name="filterBtn" id="filterBtn" value="Filter" class="btn btn-warning" onclick="FilterJob()">
                                         <!--
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-danger" name="SelectedDelete" id="SelectedDelete" value="Selected Delete"> -->
                                        </td>
                                        </tr>
                                        <tr>
                                        <? if(($_SESSION['User_Type'] == 2 || $_SESSION['User_Type'] == 4) )
                                          {
                                        ?>  
                                            <th><div class="checkbox">
                                                <label>
                                                 <input type="checkbox" id="chkall" name="chkall" title="Select All" style="cursor:pointer" onclick="JavaScript: selectall();" value="0">
                                                </label>
                                            </div>&nbsp;All</th>
                                        <?
                                          }
                                        ?>
                                            <th>Job ID</th>
                                            <th>Job Title</th>
                                            <th>Status</th>
                                            <th>Approved</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $QString = "";
                                      if($_SESSION['User_Type'] != 2 && $_SESSION['User_Type'] != 4)
                                      {
                                        $QString = "AND J.Job_Department = $_SESSION[Department]";
                                        if($stsF)
                                        {
                                          $QString.= " AND Job_Status = $stsF";
                                        }
                                      }
                                      else
                                      {
                                        if($deptF)
                                        {
                                          $QString = " AND J.Job_Department = $deptF";
                                        }
                                        if($stsF)
                                        {
                                          $QString.= " AND Job_Status = $stsF";
                                        }
                                      }
                                      $JobListQ = "
                                                    SELECT 
                                                      J.Job_Id,
                                                      J.Job_Code,
                                                      J.Job_Title,
                                                      J.Job_Status,
                                                      P.Description,
                                                      J.Job_Approval,
                                                      J.Job_Status
                                                    FROM 
                                                      careers_job J
                                                    LEFT JOIN
                                                      careers_pickup_code P
                                                      ON P.Pickup_Id = J.Job_Status
                                                    WHERE
                                                      J.Record_Status = 1
                                                      $QString
                                                    ORDER BY
                                                      J.Created_Date DESC
                                                  ";
                                       
                                      $JobListQrst = mysql_query($JobListQ) or die($JobListQ . " -> " . mysql_error());
                                      $indexNum = 1;
                                      while($JobListRow = mysql_fetch_array($JobListQrst))
                                          		{
                                     ?>
                                        <tr class="odd gradeX">
                                            <?
                                            if(($_SESSION['User_Type'] == 2 || $_SESSION['User_Type'] == 4) )
                                            {
                                            ?><td> <div class="checkbox">
                                                <label>
                                                  <? if($JobListRow['Job_Approval']!=1 && $JobListRow['Job_Status'] == 10)
                                                     {
                                                  ?>  
                                                  <input type="checkbox" name="Check_List[]" value="<?=$JobListRow['Job_Id'];?>">
                                                  <?
                                                     }
                                                  ?>
                                                </label><div style="display:none"><?=$indexNum;?></div>
                                            </div></td>
                                            <?
                                            }
                                            ?>
                                            <td><?=$JobListRow['Job_Code'];?></td>
                                            <td><?=$JobListRow['Job_Title'];?></td>
                                            <td class="center"><?=$JobListRow['Description'];?></td>
                                            <td class="center" align="center">
                                            <? 
                                              if($JobListRow['Job_Approval']==1)
                                              {
                                            ?>
                                               <img border="0" src="Images/tick.gif" width="14" height="19">
                                            <?
                                              }
                                              
                                            ?>
                                            </td>
                                            <td class="center"> 
                                              <button type="button" class="btn btn-primary" name="View_<?=$JobListRow['Job_Id']?>" id="View_<?=$JobListRow['Job_Id']?>" onClick="editJob(<?=$JobListRow['Job_Id']?>)">View</button>
                                              <!--<button type="button" class="btn btn-danger" name="Delete_<?=$JobListRow['Job_Id']?>" id="Delete_<?=$JobListRow['Job_Id']?>" OnClick="DeleteJob(<?=$JobListRow['Job_Id']?>)">Delete</button>-->
                                              <? if($JobListRow['Job_Approval']!=1 && ($_SESSION['User_Type'] == 2 || $_SESSION['User_Type'] == 4) && $JobListRow['Job_Status'] == 10)
                                              {
                                              ?>
                                                <button type="button" class="btn btn-success" name="Approve_<?=$JobListRow['Job_Id']?>" id="Approve_<?=$JobListRow['Job_Id']?>" OnClick="ApproveJob(<?=$JobListRow['Job_Id']?>)">Approve</button>
                                              <? 
                                              }
                                              ?>
                                              <input type="hidden" name="Job_Id" id="Job_Id" value="">
                                              
                                            </td>
                                        </tr>
                                      <?
                                      $indexNum++;
                                      }
                                      ?>
                                                                        
                                  
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>  </h4>
                                <p></p>
                               
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
 <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable({
        "bFilter": false,
        
 <?php  if(($_SESSION['User_Type'] == 2 || $_SESSION['User_Type'] == 4) ) {   ?>
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 0 ] }
       ]
       
 <?php }?>      
       
});
        
    });
 </script>  
  <script src="js/respond.min.js"></script>
     <script src="js/html5shiv.js"></script> 
</body>

</html>
 
