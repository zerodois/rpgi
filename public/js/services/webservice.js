/*
* @Author: felipelopesrita
* @Date:   2016-07-26 14:34:32
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-26 16:11:14
*/

angular.module('rpg')
	.factory('WebService', ['$http', function($http){
		function request( method, path, data ) {
			return $http({
				method: method,
				url 	: path,
				data 	: data
			});
		}
		return { 
			get: function(path, data) {
				return request('GET', path, data);
			},
			post: function(path, data) {
				return request('POST', path, data);
			},
			put: function(path, data) {
				return request('PUT', path, data);
			},
			delete: function(path, data) {
				return request('DELETE', path, data);
			},
			err: function( err ) {
				console.log( err );
			}
		};
	}]);
