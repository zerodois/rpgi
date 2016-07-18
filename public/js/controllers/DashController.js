/*
* @Author: felipe
* @Date:   2016-07-18 02:38:50
* @Last Modified by:   felipe
* @Last Modified time: 2016-07-18 12:02:33
*/

angular.module('rpg').controller('DashController', DashController);
function DashController( $location, $resource, Fullscreen, FUNCTIONS ) {

	var vm   = this;
	var func = FUNCTIONS($location);
	vm.icon  = 'fullscreen';
	
	vm.toggleScreen = function() {
		if (Fullscreen.isEnabled())
		{
    	Fullscreen.cancel();
    	vm.icon = 'fullscreen';
		}
    else
    {
    	vm.icon = 'fullscreen_exit';
    	Fullscreen.all();
    }
	}

	vm.logout = function () {
		var Logout  = $resource('/logout');
		var promise = Logout.get().$promise;
		promise.then( func.redirect('/sigin') )
					 .catch( func.erro );
	}

};
DashController['$inject'] = [ '$location', '$resource', 'Fullscreen', 'FUNCTIONS' ];