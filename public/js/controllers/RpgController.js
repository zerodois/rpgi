/*
 * @Author: felipe
 * @Date:   2016-07-11 14:46:55
 * @Last Modified by:   felipelopesrita
 * @Last Modified time: 2016-07-25 19:31:58
 */

angular.module('rpg').controller('RpgController', RpgController )

function RpgController( CSRF_TOKEN ) {
	var vm = this;
	vm.state = '';
	vm.login = 0;
	vm.token = CSRF_TOKEN;
};

RpgController['$inject'] = [ 'CSRF_TOKEN' ];
