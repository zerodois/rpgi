/*
* @Author: felipelopesrita
* @Date:   2016-07-26 15:29:24
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-26 16:18:16
*/

angular.module('rpg')
	.factory('FileService', FileService );

function FileService( WebService ) {
	var FileServices = { };
	FileServices.load = ( callback )=> {
		var promise = WebService.get('/api/file');
		if( !callback ) 
			return promise;
		promise
			.then( callback, WebService.err );
	}
	FileServices.delete = ( id, callback ) => {
		var promise = WebService.delete( '/file/'+id );
		if( !callback )
			return promise;
		promise
			.then(callback, WebService.err);
	}

	return FileServices;
};
FileService['$inject'] = [ 'WebService' ];