/*
* @Author: felipelopesrita
* @Date:   2016-07-18 20:22:24
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-26 16:21:07
*/

angular.module('rpg').controller('FileController', FileController);
function FileController( $location, $resource, Fullscreen, FUNCTIONS, FileService ) {
	var vm  = this;
	vm.load = () => {
		FileService.load()
		.then(function(json) {
			vm.files = json.data;
		});
	}
	vm.delete = function( id, filename ) {
		//Confirma a exclusão do item
		if( !confirm('Deseja excluir permanentemente esse arquivo?') ) return false;
		FileService.delete(filename, removeEl);
		function removeEl() {
			var el = angular.element( document.querySelector('#'+id).parentNode.parentNode );
			el.remove();
		}
	}
	vm.load();
};
FileController['$inject'] = [ '$location', '$resource', 'Fullscreen', 'FUNCTIONS', 'FileService' ];