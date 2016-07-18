/*
 * @Author: felipe
 * @Date:   2016-07-11 14:46:55
 * @Last Modified by:   felipe
 * @Last Modified time: 2016-07-18 02:52:03
 */

angular.module('rpg').controller('RpgController', RpgController );

function RpgController( $routeParams, $resource, Fullscreen ) {
	var vm = this;
	vm.state = '';
	vm.login = 0;
};

RpgController['$inject'] = [ '$routeParams', '$resource', 'Fullscreen' ];
