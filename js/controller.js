var LCApp = angular.module('LCController', ['directives',
																																												'services',
																																												'ngCookies']);



LCApp.controller("loginCntrl",["$scope",
																															"$http",
																															"credentialService",
																															"cookieService",
																															"$location",
																															"$rootScope",
																															function($scope,$http,credentialService,cookieService,$location,$rootScope){
		$scope.username="";
		$scope.password="";
		$scope.userError=false;
		$scope.remember=false;
		$scope.checkCredential=credentialService.checkCredential;
	 $scope.getCookieDetails=cookieService.getCookieDetails;
		
	

}]);
LCApp.controller("homeCntrl",["destroySessionService",
																														"$scope",
																														"$http",
																														"$location",
																														"$cookies",
																														"$rootScope",
																														function(destroySessionService,$scope,$http,$location,$cookies,$rootScope){
	$scope.username=$rootScope.username;
	$scope.destroy_session=destroySessionService.destroySession;
}]);

LCApp.controller('stockCntrl',['addSaleToStockService',
																															"destroySessionService",
																															'addStockService',
																															'deleteStockService',
																															'loadStockService',
																															'printService',
																															'$scope',
																															'messageService',
                               
																															function(addSaleToStockService,destroySessionService,addStockService,deleteStockService,loadStockService,printService,$scope,messageService){
		$scope.destroy_session=destroySessionService.destroySession;
	$scope.itemName='';
	$scope.itemPrice='';
	$scope.clearValues=function(){$scope.itemName='';$scope.itemPrice='';			                                                                            $scope.validText=false;$scope.validNumber=false;
																														}
$scope.datesSelected=false;
 $scope.loadStockNames=loadStockService.loadStock;
	$scope.addStockFromSale=addSaleToStockService.addSaleToStock;
	$scope.validArray=[];
	$scope.valueError=false;
	$scope.valueAdded=false;
	$scope.itemNoToUpdate='';
	$scope.itemNameToUpdate='';
	$scope.itemPriceToUpdate='';
	
	$scope.editName='';
	$scope.editPrice='';
	$scope.addToStock=addStockService.addToStock;
	$scope.deleteStock=deleteStockService.deleteStock;
	$scope.stockObj={};
	$scope.printpage=printService.print;
	$scope.loadStock=loadStockService.loadStock;
	$scope.doComplete=function(elem){$("#stockTable").DataTable();};
	$scope.changeEditStatus=function(_code,_status,_name,_price){
					angular.forEach($scope.stockObj, function(value, key) {
							if(value.itemcode==_code){
										value.edit=_status;
										$scope.validText=true;
										$scope.validNumber=true;
							}
							});
		
		if(_status){
				$scope.editName=_name;
				$scope.editPrice=_price;
		}
	}
}]);

LCApp.controller("saleCntrl",['$location',
																														'$scope',
																														'loadStockService',
																														'addSaleService',
																														'getSaleService',
																														'deleteSaleService',
																														'getYearService',
																														'destroySessionService',
																														'messageService',
																														function($location,$scope,loadStockService,addSaleService,getSaleService,deleteSaleService,getYearService,destroySessionService,messageService){
		$scope.destroy_session=destroySessionService.destroySession;
		$scope.saleDate=new Date().toISOString().slice(0,10).replace(/-/g,"-");; 
		$scope.stockObj={};
		$scope.validArray=[];
		$scope.loadStock=loadStockService.loadStock;

		$scope.deleteSale=function(_addBackStatus){
							$scope.modalShow='hide';
deleteSaleService.deleteSale($scope.itemNoToUpdate,$scope.itemNameToUpdate,$scope.itemPriceToUpdate,_addBackStatus);
		}
	$scope.clearValues=function(){$scope.itemName='';$scope.itemPrice='';			                                                                            $scope.validText=false;$scope.validNumber=false;
																														}
		$scope.validText=false;
		$scope.monthObj=[{"name":"January","id":"1"},
																			{"name":"February","id":"2"},
																			{"name":"March","id":"3"},
																			{"name":"April","id":"4"},
																			{"name":"May","id":"5"},
																			{"name":"June","id":"6"},
																		{"name":"July","id":"7"},
																		{"name":"August","id":"8"},
																		{"name":"September","id":"9"},
																		{"name":"October","id":"10"},
																		{"name":"November","id":"11"},
																		{"name":"December","id":"12"}];;
	 $scope.changeEditStatus=function(_code,_status,_name,_price){
					angular.forEach($scope.saleObj, function(value, key) {
							if(value.sno==_code){
										value.edit=_status;
										$scope.validText=true;
										$scope.validNumber=true;
							}
							});
		
		if(_status){
				$scope.price=_price;
		}
	}
		$scope.ConfirmAction=function(no,name,price){
				$scope.modalShow='show';
				$scope.itemNoToUpdate=no;
				$scope.itemNameToUpdate=name;
				$scope.itemPriceToUpdate=price;
		};
		$scope.modalShow='hide';
		$scope.yearObj=[];
		$scope.saleObj={};
		$scope.doComplete=function(elem){$("#saleTable").DataTable();};
		$scope.getYearList=getYearService.getYearList;
		$scope.validNumber=false;
		$scope.valueError=false;
		$scope.Item='';
		$scope.price=''
  $scope.datesSelected=false;
		$scope.onItemChange=function(){$scope.Item!=null?$scope.validText=true:$scope.validText=false;}
		$scope.addToSale=addSaleService.addToSale;
		$scope.getSaleDetails=getSaleService.getSaleDetails;

}]);




LCApp.controller('expenseCntrl',['$scope',
																																	'expenseLoadService',
																																	'getYearService',
																																	'destroySessionService',
                                 'addExpenseService',
                                 'getExpenseService',
                                 'deleteExpenseService',
																																	function($scope,expenseLoadService,getYearService,destroySessionService,addExpenseService,getExpenseService,deleteExpenseService){
$scope.destroy_session=destroySessionService.destroySession;
$scope.loadExpense=expenseLoadService.loadExpense;
$scope.getExpenseDetails=getExpenseService.getExpenseDetails;
$scope.deleteExpense=deleteExpenseService.deleteExpense;
$scope.expenseObj={};
$scope.yearObj=[];
$scope.year='';
$scope.month='';
$scope.expName='';
$scope.expAmount='';
$scope.datesSelected=false;
$scope.modalShow='hide';
$scope.eDate='';
$scope.eCode='';
$scope.expIndex='';
$scope.doComplete=function(elem){$("#expenseTable").DataTable();};
$scope.setAlready=false;
$scope.validArray=[];
$scope.addToExpense=addExpenseService.addToExpense;
$scope.addExpense=function(_date,_setalready,_code,_name,_price,_index){
			$scope.modalShow='show';
			$scope.eDate=_date;
    if(_code!="")
        $scope.eCode=_code;
    else if(Object.keys($scope.expenseObj).length!=0){
        $scope.eCode=parseInt($scope.expenseObj[(Object.keys($scope.expenseObj).length-1)].expid)+1;
    }
    else{
        $scope.eCode=1;
    }
   $scope.expIndex=_index;
			$scope.expName=_name;
			$scope.expAmount=_price;
			$scope.setAlready=_setalready=="false"?false:true;
    if(!$scope.setAlready){
    $scope.validArray[3]=false;
    $scope.validArray[2]=false;
    }else{
        $scope.validArray[3]=true;
    $scope.validArray[2]=true;
    }
	};
$scope.calendarRow=[];
$scope.monthObj=[{"name":"January","id":"1"},
																			{"name":"February","id":"2"},
																			{"name":"March","id":"3"},
																			{"name":"April","id":"4"},
																			{"name":"May","id":"5"},
																			{"name":"June","id":"6"},
																		{"name":"July","id":"7"},
																		{"name":"August","id":"8"},
																		{"name":"September","id":"9"},
																		{"name":"October","id":"10"},
																		{"name":"November","id":"11"},
																		{"name":"December","id":"12"}];
$scope.getYearList=getYearService.getYearList;
$scope.validArray=[];
$scope.valueError=false;

}]);

LCApp.controller('reportCntrl',['$scope','getYearService','getReportService','destroySessionService',function($scope,getYearService,getReportService,destroySessionService){
$scope.destroy_session=destroySessionService.destroySession;
$scope.monthObj=[{"name":"January","id":"1"},
																			{"name":"February","id":"2"},
																			{"name":"March","id":"3"},
																			{"name":"April","id":"4"},
																			{"name":"May","id":"5"},
																			{"name":"June","id":"6"},
																		{"name":"July","id":"7"},
																		{"name":"August","id":"8"},
																		{"name":"September","id":"9"},
																		{"name":"October","id":"10"},
																		{"name":"November","id":"11"},
																		{"name":"December","id":"12"}];
$scope.getYearList=getYearService.getYearList;
$scope.yearObj=[];
$scope.year='';
$scope.validArray=[];
$scope.month='';
$scope.chartshow=false;
$scope.showChart=function(){$scope.chartshow=true;};
$scope.getReport=getReportService.getReport;
$scope.saleArr=[1];
$scope.profitArr=[5];
$scope.expenseArr=[5];
$scope.dateArr=[];
$scope.saleTotal=0;
$scope.reportSet=false;
$scope.profitTotal=0;
$scope.expenseTotal=0;
$scope.dateSelect=false;
}]);

LCApp.controller('passwordCntrl',['$scope','changePasswordService','destroySessionService',function($scope,changePasswordService,destroySessionService){
$scope.destroy_session=destroySessionService.destroySession;
$scope.validArray=[];
$scope.oldpassword='';
    $scope.newpassword='';
    $scope.confirmpassword='';
$scope.valueError=false;
$scope.changePasswod=changePasswordService.changePassword;
}]);



