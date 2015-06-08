'use strict';
var services=angular.module("services",[]);

services.factory('credentialService', ["$location","$http","$rootScope",function($location,$http,$rootScope) {
  var sObj = {};
  sObj.checkCredential=function(_username,_password,_remember,_scope){
		$http({
    		method: "post",
    		url: "server/credential.php",
    		data: {
        	username: _username,
        	password: _password,
			remember: _remember
    		},
    	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(data){
			if(data=="success"){
					$location.url("/addsale");
			}else{
					_scope.userError=true;
			}
		});
	}
  return sObj;
}]);

services.service('addSaleToStockService',['$location',function($location){
	var assObj={};
	assObj.addSaleToStock=function(_scope){
					var _qStr=$location.search();
					if(_qStr.name!=undefined){
							_scope.itemName=_qStr.name;
							_scope.itemPrice=_qStr.price;
						angular.forEach(_scope.validArray,function(value,key){
							_scope.validArray[key]=true;
								value=true;
						});
							
					}
	};
	
	return assObj;
}]);

services.service('messageService',['$rootScope',function($rootScope){
var msObj={};
	msObj.sendMessage=function(msg,data){
		$rootScope.$broadcast('messageAdded');
	}
	
	return msObj;

}])

services.factory('cookieService',["$http",function($http){
		var cObj={};
		cObj.getCookieDetails=function(_scope){
					$http({url:"server/getCookie.php",method:"POST"}).success(function(data){
							if(data.length>0){
										_scope.username=data[0];
										_scope.password=data[1];
									_scope.remember=true;
								
							}
					});
	};
	return cObj;
}]);

services.factory('destroySessionService',['$http','$location',function($http,$location){
	var dsObj={};
	dsObj.destroySession=function(){
					$http({url:"server/destroySession.php",method:"GET"}).success(function(data){
							$location.url('/login');
					})
	};
	return dsObj;
}]);


services.factory('addStockService',['$http','$location','$window',function($http,$location,$window){
		var asObj={};
		asObj.addToStock=function(_itemName,_itemPrice,_scope,_itemcode){
						_itemcode==undefined||""?_itemcode=0:_itemcode=_itemcode;
					var _valid=true;
				angular.forEach(_scope.validArray, function(value, key) {
							if(!value)
  							_valid=false;
							});
						if(_valid)
						{
										$http({url:"server/addToStock.php",method:"POST",data: {
													itemcode:_itemcode,
        					itemname: _itemName,
        					itemprice: _itemPrice
    						},}).success(function(data){
													$location.url($location.url());
													_scope.itemName='';
													_scope.itemPrice='';
													_scope.valueError=false;
													_scope.valueAdded=true;
													angular.forEach(_scope.stockObj, function(value, key) {
														value.edit=false;
															if(value.itemcode== _itemcode){
																value.itemname=_itemName;
																value.itemprice=_itemPrice;
															}
             });
													$.simplyToast('Stocks updated!','success');
              $window.location.reload();
									})
						}else{
								_scope.valueError=true;
						}
		};
return asObj;
}]);


services.factory('loadStockService',['$http',function($http){
	var lsObj={};
	lsObj.loadStock=function(_scope){
					_scope.validText=false;
					_scope.validNumber=false;
					_scope.valueError=false;
					$http({url:'server/loadStock.php',method:'POST'}).success(function(data){
					_scope.stockObj=data;
					
				});
	};
	return lsObj;
}]);

services.factory('deleteStockService',['$http','$window',function($http,$window){
	var dsObj={};
	dsObj.deleteStock=function(_itemcode,_scope){
			$http({url:'server/deleteStock.php',method:'POST',data:{
					itemcode:_itemcode
			
			}}).success(function(data){
				$window.location.reload()
				});
		
	}
	return dsObj;
}]);

services.factory('addSaleService',['$http','$location','$window','deleteStockService',function($http,$location,$window,deleteStockService){
		var asObj={};
		asObj.addToSale=function(_scope,_itemcode,_itemname,_itemprice,_price,_date,_sno){
				var _valid=true;
				_sno==undefined?_sno=0:_sno=_sno;
				angular.forEach(_scope.validArray, function(value, key) {
							if(!value)
  							_valid=false;
							});
		
						if(_valid)
						{
										$http({url:"server/addToSale.php",method:"POST",data: {
														sno:_sno,
													itemcode:_itemcode,
        					itemname: _itemname,
        					itemprice: _itemprice,
													itemsold:_price,
													solddate:_date
    						},}).success(function(data){
														deleteStockService.deleteStock(_itemcode,this);
											   angular.forEach(_scope.saleObj, function(value, key) {
														value.edit=false;
															if(value.sno== _sno){
																value.sitemsold=_price;
																value.solddate=_date;
															}
             });
														$.simplyToast('sale updated!','success');
             });
													
									
						}else{
								_scope.valueError=true;
						}
		};
		
return asObj;
}]);

services.service('getSaleService',['$http',function($http){
var gss={};
	
	gss.getSaleDetails=function(_scope,_month,_year){
				var _valid=true;
				angular.forEach(_scope.validArray, function(value, key) {
							if(!value)
  							_valid=false;
							});
		  if(_valid){
								$http({url:"server/loadSale.php",method:"POST",data: {
													month:_month,
        					year: _year
    						},}).success(function(data){
														_scope.saleObj=data;
            _scope.datesSelected=true;
             });
					
				}else{
						_scope.valueError=true;
				}
	
	}
return gss;
}]);

services.service('deleteSaleService',['$http','$location','$window',function($http,$location,$window){
var dsObj={};
	dsObj.deleteSale=function(_sno,_itemname,_itemprice,_addBackStatus){
					$http({url:"server/deleteSale.php",method:"POST",data: {
													Sno:_sno
    						},}).success(function(data){
														if(_addBackStatus)
																$location.url('/addstock?name='+_itemname+'&price='+_itemprice+'');
															else
																$window.location.reload();
             });
	}
return dsObj;
}]);

services.service('expenseLoadService',['$http',function($http){
	var expObj={};
	expObj.loadExpense=function(_scope,_month,_year){
		var _valid=true;
				angular.forEach(_scope.validArray, function(value, key) {
							if(!value)
  							_valid=false;
							});
		if(_valid){
						_scope.valueError=false;
						var _Day=1;
      var _Date=new Date(_year,_month,0);
      _Date.setDate(1);
      var _startDay=_Date.getDay();
      var _NDays=new Date(_year,_month,0).getDate(_year,_month);
						var rowIndex=0;
						var colIndex=0;
						_scope.calendarRow=[];
						  for(var i=0;i<(_startDay+_NDays);i++)
           {
              if(i%7==0)
              {
															var _index=[];
															for(var j=0;j<7;j++){
																	if(j>=_startDay||rowIndex>0){
																		if(colIndex<_NDays){
                 	colIndex++;
																		_index.push({"val":true,date:colIndex})
																		}else
																				_index.push({"val":false,date:""})
																	}else
																		_index.push({"val":false,date:""})
              }
															rowIndex++;
															_scope.calendarRow.push({"index":_index})
           }
											}
						$http({url:"server/loadExpense.php",method:"POST",data:{
								month:_month,
								year:_year
						}}).success(function(data){
								_scope.expenseObj=data;
           
						});
		}else{
										_scope.valueError=true;
		}
	}
	return expObj;
}]);

services.service('addExpenseService',['$http',function($http){
var aesObj={};
aesObj.addToExpense=function(_scope,eCode,year,month,eDate,expName,expAmount,setAlready,expIndex){
			 var _valid=true;
    
    
				angular.forEach(_scope.validArray, function(value, key) {
							if(!value)
  							_valid=false;
							});
    if(_valid){
        _scope.modalShow='hide'
        _scope.valueError=false;
        if(!setAlready){
         _scope.expenseObj.push({"expid":eCode,"expname":expName,"expprice":expAmount,"expdate":eDate,"expmonth":month,"expyear":year});
        }else{
            _scope.expenseObj[(expIndex)]={"expid":eCode,"expname":expName,"expprice":expAmount,"expdate":eDate,"expmonth":month,"expyear":year};

        }
        if ( eDate < 10 ) eDate = '0' + eDate
    if ( month < 10 ) month = '0' + month
    var _date=year+"-"+month+"-"+eDate;
        $http({url:"server/addToExpense.php",method:"POST",data:{
            ecode:eCode,
            edate:_date,
            ename:expName,
            eamount:expAmount,
            setAlready:setAlready
            
        }}).success(function(data){
            
        });
    }else{
        _scope.valueError=true;
    }
}
return aesObj;
}]);

services.service('getExpenseService',['$http',function($http){
var gss={};
	
	gss.getExpenseDetails=function(_scope,_month,_year){
				var _valid=true;
				angular.forEach(_scope.validArray, function(value, key) {
							if(!value)
  							_valid=false;
							});
		  if(_valid){
								$http({url:"server/loadExpense.php",method:"POST",data: {
													month:_month,
        					year: _year
    						},}).success(function(data){
														_scope.expenseObj=data;
            _scope.datesSelected=true;
             });
					
				}else{
						_scope.valueError=true;
				}
	
	}
return gss;
}]);


services.service('deleteExpenseService',['$http',function($http){
    var deObj={};
    deObj.deleteExpense=function(_scope,_code,_setAlready,_expArrayIndex){
        _scope.modalShow='hide'
        _scope.valueError=false;
        if(_setAlready){
               _scope.expenseObj[(_expArrayIndex)]={};
               $http({url:"server/deleteExpense.php",method:"POST",data:{
                    code:_code
               }});
        }
    };
    return deObj;
    
}]);

services.service('getReportService',['$http',function($http){
    var grObj={};
    grObj.getReport=function(_scope,month,year){
        var _valid=true;
        angular.forEach(_scope.validArray, function(value, key) {
							         if(!value)
  							           _valid=false;
							         });
		              if(_valid){
                    _scope.valueError=false;
                    $http({url:'server/getTotalMonthSale.php',method:'POST',data:{
                        month:month,
                        year:year
                    }}).success(function(data){
                        _scope.saleArr=[];
                        _scope.profitArr=[];
                        _scope.expenseArr=[];
                        var nDays=new Date(year,month,0).getDate(year,month);
                        var saleTemp=data.sale;
                        var profitTemp=data.profit;
                        var expenseTemp=data.expense;
                        _scope.saleTotal=0;
                        _scope.profitTotal=0;
                        _scope.expenseTotal=0;
                        _scope.reportSet=true;
                        for(var i=0;i<nDays;i++){
                            _scope.saleTotal+=saleTemp[i];
                            _scope.profitTotal+=profitTemp[i];
                            _scope.expenseTotal+=expenseTemp[i];
                            
                            _scope.saleArr.push(saleTemp[i]);
                            _scope.profitArr.push(profitTemp[i]);
                            _scope.expenseArr.push(expenseTemp[i]);
                        }
                        _scope.dateSelect=true;  
                    });
                }else{
                    _scope.valueError=true;

                }
        
        
    };
    return grObj;

}]);

services.service('getYearService',[function(){
var gys={};
	gys.getYearList=function(_scope){
  var currentYear=new Date().getFullYear();
		_scope.yearObj.push(currentYear-1);
		_scope.yearObj.push(currentYear);
		_scope.yearObj.push(currentYear+1);
	}
	return gys;
}])

services.service('changePasswordService',['$http','$window',function($http,$window){
    var cpObj={};
    cpObj.changePassword=function(_scope){
          var _valid=true;
        angular.forEach(_scope.validArray, function(value, key) {
							         if(!value)
  							           _valid=false;
							         });
        if(_valid){
            if(_scope.newpassword!=_scope.confirmpassword)
                _scope.valueError=true;
            else{
                _scope.valueError=false;
                $http({url:'server/changePassword.php',method:'POST',data:{
                    oldpassword:_scope.oldpassword,
                    newpassword:_scope.newpassword,
                    confirmpassword:_scope.confirmpassword
                
                }}).success(function(data){
                    $window.location.reload();
                });
            }
            
        }else{
            _scope.valueError=true;
        }
    }
    return cpObj;
}]);

services.service('printService',[function(){
	var psObj={};
	psObj.print=(function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})();
	
	return psObj;

}]);





