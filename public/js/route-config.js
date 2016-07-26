/*
* @Author: felipelopesrita
* @Date:   2016-07-25 19:27:58
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-25 20:11:49
*/

angular.module('rpg')
	.config(function( $routeProvider ){
    
    $routeProvider.when('/dashboard', {
			templateUrl: 'partials/dash.html',
			controller: 'DashController as Dash'
		});

    $routeProvider.when('/sigup', {
      templateUrl: 'partials/sigup.html',
      controller: 'UserController as User'
    });

    $routeProvider.when('/confirmation/:mail', {
      templateUrl: 'partials/confirmation.html',
      controller: 'UserController as User'
    });

    $routeProvider.when('/sigin', {
      templateUrl: 'partials/sigin.html',
      controller: 'UserController as User'
    });

    $routeProvider.when('/sigin/:id', {
      templateUrl: 'partials/sigin.html',
      controller: 'UserController as User'
    });

    $routeProvider.when('/reset', {
      templateUrl: 'partials/reset.html',
      controller: 'UserController as User'
    });

    $routeProvider.when('/reset/:hash', {
      templateUrl: 'partials/new_password.html',
      controller: 'UserController as User'
    });

    $routeProvider.when('/', {
			templateUrl: 'partials/welcome.html',
			controller: 'RpgController'
		});

		$routeProvider.when('/campaign', {
			templateUrl: 'partials/campaign/dash.html',
			controller: 'CampaignController',
			controllerAs: 'Campaign'
		});

  });