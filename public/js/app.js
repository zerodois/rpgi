/*
 * @Author: felipe
 * @Date:   2016-07-11 14:16:26
 * @Last Modified by:   felipelopesrita
 * @Last Modified time: 2016-07-20 01:28:42
 */

angular.module('rpg', ['ngRoute', 'ngResource', 'FBAngular', 'ngAnimate'])
	//Constante CSRF exigida pelo Laravel
	.constant('CSRF_TOKEN',
		document.getElementById('container').dataset.token
	)
	.constant('FUNCTIONS', function($location){
		var obj = {};
		//Funcao de redirecionamento
		obj.redirect = function(location) {
			$location.path(location)
		}
		obj.erro = function(error) {
			console.log(error);
		}
		return obj;
	})
	.config(function($interpolateProvider, $routeProvider) {

		//Rotas
		$routeProvider.when('/', {
			templateUrl: 'partials/welcome.html',
			controller: 'RpgController'
		});

		$routeProvider.when('/sigup', {
			templateUrl: 'partials/sigup.html',
			controller: 'UserController as User'
		});

		$routeProvider.when('/sigin', {
			templateUrl: 'partials/sigin.html',
			controller: 'UserController as User'
		});

		$routeProvider.when('/dashboard', {
			templateUrl: 'partials/dash.html',
			controller: 'DashController as Dash'
		});

		//Troca de chaves especiais do Angular (Conflito com o Blade do Laravel)
		$interpolateProvider.startSymbol('@{');
		$interpolateProvider.endSymbol('}');
	});
