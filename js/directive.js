var directives=angular.module("directives",['services'])
directives.directive('checkUser', ['$rootScope', '$location','$http',
  function ($rootScope, $location,$http) {
    return {
						restrict:'A',
      link: function (scope, elem, attrs, ctrl) {
        	$rootScope.$on('$routeChangeStart', function(e, curr, prev){
										$http({
    								method: "get",
    								url: "server/getLoginSession.php",
    								headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		   					}).success(function(data){
											
						    		if(data=="true"){
													if($location.url()=='/login')
		  											$location.url('/home');
												}else
													$location.url("/login");
						 			})
        });
      }
    }
  }]);



directives.directive("inputValidation",[function(){
			var validationObj={};
			validationObj.restrict='A';

			validationObj.link=function(scope,elem,attr,ctrl){
						elem.on('change click',function(){
											switch(attr.validationType){
												
																case "number":
												
																			if((/^[1-9]\d{0,7}(?:\.\d{1,4})?$/).test($(this).val())){
																					scope.validArray[attr.id]=true;
																			}else{
																					scope.validArray[attr.id]=false;
																			}
																			break;
																case "text":
																			if((/\S/).test($(this).val())){
																					scope.validArray[attr.id]=true;
																			}else{
																					scope.validArray[attr.id]=false;
																			}
																			break;
							
											}
						});
			
			
			};
return validationObj;
}]);

directives.directive('datasTable',[function(){
	dtObj={};
	dtObj.restrict='A';
	dtObj.link=function(scope,elem,attr,ctrl){
	if (scope.$last) {
								scope.doComplete(elem);
      }
		};
			return dtObj;
}]);


directives.directive('datePicker',[function(){
		dpObj={};
		dpObj.restrict='A',
		dpObj.link=function(scope,elem,attr,ctrl){
					$(elem).datepicker({format:'yyyy-mm-dd'});
							$(elem).on('changeDate',function(){
							scope.$apply(function(){
									scope.saleDate=$(elem).val();
									$(elem).click();
							});
					})
	};
	return dpObj;

}]);

directives.directive('showModal',[function(){
	mObj={};
	mObj.restrict='A';
		scope= {
            modalShow: '='
        };
		mObj.link=function(scope,elem,attr,ctrl){
		scope.$watch('modalShow',function(){
				$(elem).modal(scope.modalShow);
		});
	};
	return mObj;
}]);


directives.directive('addExpense',[function(){
		aeObj={};
	aeObj.restrict='A';
	aeObj.link=function(scope,elem,attr,ctrl){
		$(elem).click(function(){
		scope.$apply(function(){ 
 scope.addExpense($(elem).closest("td").attr("Date"),$(elem).attr("Set"),$(elem).attr("Code"),$(elem).attr("Name"),$(elem).attr("Price"),$(elem).attr("Index"))}
  
              );
              if($(elem).data("set")==false){    
                 scope.ExpnameContains=false;
    scope.ExppriceContains=false;
  }
		
	});
 };
	return aeObj;

}]);

directives.directive('saleChart',[function(){
    var scObj={};
    scObj.restrict='A';
    scope={
        saleArr:'='
    };
    scObj.link=function(scope,elem,attr,ctrl){
        scope.$watch('saleArr',function(){
            var nDays=new Date(scope.year,scope.month,0).getDate(scope.year,scope.month);
            scope.dateArr=[];
            for(var i=0;i<nDays;i++){
                scope.dateArr.push(i+1);
            }
            var plot1 = $.jqplot(attr.id, [scope.saleArr], {
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true},
            
        },
        series:[
		          {label:'Sale'}
        ],
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: scope.dateArr
            },
            yaxis: {
              min:0,
                tickOptions: {formatString: '%d'}
            }
        },
           seriesColors:[ "#126AB5"]

    }).replot();
        });
    };
    
    return scObj;
}]);
directives.directive('profitChart',[function(){
    var scObj={};
    scObj.restrict='A';
    scope={
        profitArr:'='
    };
    scObj.link=function(scope,elem,attr,ctrl){
        scope.$watch('profitArr',function(){
            var nDays=new Date(scope.year,scope.month,0).getDate(scope.year,scope.month);
            scope.dateArr=[];
            for(var i=0;i<nDays;i++){
                scope.dateArr.push(i+1);
            }
            var plot1 = $.jqplot(attr.id, [scope.profitArr], {
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true},
            
        },
        series:[
		          {label:'Profit'}
        ],
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: scope.dateArr
            },
            yaxis: {
              min:0,
                tickOptions: {formatString: '%d'}
            }
        },
                seriesColors: [ "#37A52B"]

    }).replot();
        });
    };
    
    return scObj;
}]);
directives.directive('expenseChart',[function(){
    var scObj={};
    scObj.restrict='A';
    scope={
        expenseArr:'='
    };
    scObj.link=function(scope,elem,attr,ctrl){
        scope.$watch('expenseArr',function(){
            var nDays=new Date(scope.year,scope.month,0).getDate(scope.year,scope.month);
            scope.dateArr=[];
            for(var i=0;i<nDays;i++){
                scope.dateArr.push(i+1);
            }
             $('#saleChart').bind('jqplotDataHighlight', 
            function (ev, seriesIndex, pointIndex, data) {
                 $(".saleHint").html(data[data.length-1]);
            }
                                  
        );
            $('#chart2').bind('jqplotDataUnhighlight', 
            function (ev) {
                $(".saleHint").html("");
            }
        );
            var plot1 = $.jqplot(attr.id, [scope.expenseArr], {
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true},
            
        },
        series:[
		          {label:'Expense'}
        ],
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: scope.dateArr
            },
            yaxis: {
              min:0,
                tickOptions: {formatString: '%d'}
            }
        },
                seriesColors:[ "#C81919"]

    }).replot();
        });
    };
    
    return scObj;
}]);


  



