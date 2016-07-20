/*
 * @Author: felipe
 * @Date:   2016-07-11 14:46:55
 * @Last Modified by:   felipelopesrita
 * @Last Modified time: 2016-07-19 11:48:44
 */

angular.module('rpg').controller('RpgController', RpgController );

function RpgController( $routeParams, $resource, CSRF_TOKEN, Fullscreen ) {
	var vm = this;
	vm.state = '';
	vm.login = 0;
	vm.token = CSRF_TOKEN;
};

RpgController['$inject'] = [ '$routeParams', '$resource', 'CSRF_TOKEN', 'Fullscreen' ];
