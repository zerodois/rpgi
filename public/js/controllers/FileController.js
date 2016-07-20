/*
* @Author: felipelopesrita
* @Date:   2016-07-18 20:22:24
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-20 02:49:42
*/

angular.module('rpg').controller('FileController', FileController);
function FileController( $location, $resource, Fullscreen, FUNCTIONS ) {

	var vm   		= this;
	var File 		= $resource('/api/file');
	
	vm.load = function() {
		var promise = File.query().$promise;
		promise
			.then(function(json) {
				vm.files = json;
			})
			.catch(function(erro){
				console.log(erro);
			});
	};

	vm.delete = function( id, filename ) {
		//Confirma a exclusão do item
		if( !confirm('Deseja excluir permanentemente esse arquivo?') ) return false;
		
		var Delete  = $resource('/file/:id');
		var promise = Delete.remove({id: filename}).$promise;
		promise
			.then(removeEl)
			.catch(FUNCTIONS.erro);

		function removeEl() {
			var el = angular.element( document.querySelector('#'+id).parentNode.parentNode );
			el.remove();
		}
	}

	vm.load();

};
FileController['$inject'] = [ '$location', '$resource', 'Fullscreen', 'FUNCTIONS' ];