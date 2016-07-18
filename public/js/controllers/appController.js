/*
* @Author: felipe
* @Date:   2016-07-18 02:10:50
* @Last Modified by:   felipe
* @Last Modified time: 2016-07-18 02:26:06
*/

angular.module('rpg').controller('appController', appController);
function appController( $routeParams, $resource, $location, Fullscreen ) {
	var vm = this;
	vm.redirect = function( location ) {
		$location.path(location);
	};
}

appController['$inject'] = [ '$routeParams', '$resource', '$location', 'Fullscreen' ];