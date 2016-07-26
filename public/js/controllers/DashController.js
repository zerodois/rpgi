/*
* @Author: felipe
* @Date:   2016-07-18 02:38:50
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-25 19:33:48
*/

angular.module('rpg')
	.controller('DashController', DashController)

function DashController( $location, $resource, Fullscreen, FUNCTIONS ) {

	var vm   	 = this;
	var func 	 = FUNCTIONS($location);
	vm.icon    = 'fullscreen';
	vm.display = false;
	vm.mode    = 'list';

	var login = $resource('/login');
  var res   = login.get().$promise;
  res.then( function(json) {
    vm.logged = !json.guest;
    if( json.guest ) func.redirect('/sigin');
  } );
	
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

	vm.toogleMode = function() {
		if( vm.mode == 'list' )
			vm.mode = 'module';
		else vm.mode = 'list';
	}

	vm.toogleObject = function( ) {
		if(vm.display) vm.display = false;
		else vm.display = true;
	}

	vm.logout = function () {
		var Logout  = $resource('/logout');
		var promise = Logout.get().$promise;
		promise.then( func.redirect('/sigin') )
					 .catch( func.erro );
	}

};
DashController['$inject'] = [ '$location', '$resource', 'Fullscreen', 'FUNCTIONS' ];