'use strict';

var app=angular.module("lcApp",['ngRoute','LCController']);
app.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/login', { 
    templateUrl: 'partial/login.php', 
    controller: 'loginCntrl' 
  }).when('/home', { 
    templateUrl: 'partial/addSale.php', 
    controller: 'homeCntrl' 
  }).when('/addstock',{
				templateUrl:'partial/addStock.php',
				controller:'stockCntrl'
		}).when('/updatestock',{
				templateUrl:'partial/updateStock.php',
				controller:'stockCntrl'
		}).when('/viewstock',{
				templateUrl:'partial/viewStock.php',
				controller:'stockCntrl'
		}).when('/addsale',{
				templateUrl:'partial/addSale.php',
				controller:'saleCntrl'
		}).when('/viewsale',{
				templateUrl:'partial/viewSale.php',
				controller:'saleCntrl'
		}).when('/updatesale',{
				templateUrl:'partial/updateSale.php',
				controller:'saleCntrl'
		}).when('/addexpense',{
				templateUrl:'partial/addExpense.php',
				controller:'expenseCntrl'
		}).when('/viewexpense',{
    templateUrl:'partial/viewExpense.php',
    controller:'expenseCntrl'
  }).when('/viewreport',{
    templateUrl:'partial/viewReport.php',
    controller:'reportCntrl'
  }).when('/changepassword',{
    templateUrl:'partial/changePassword.php',
    controller:'passwordCntrl'
  }).otherwise({ redirectTo: '/login' }); 
}]);



  



