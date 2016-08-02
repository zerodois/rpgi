/*
* @Author: felipelopesrita
* @Date:   2016-07-26 14:57:09
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-26 15:10:32
*/

angular.module('rpg')
	.factory('UserService', UserService);

function UserService( WebService ) {
	UserServices = {};

	UserServices.sigin = sigin;
	function sigin( data, callback ) {
    var promise = WebService.get('/login');
    promise.then( callback, WebService.err );
  };

	return UserServices;
};
UserService['$inject'] = [ 'WebService' ];