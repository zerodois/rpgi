/*
* @Author: felipelopesrita
* @Date:   2016-07-26 00:28:21
* @Last Modified by:   felipelopesrita
* @Last Modified time: 2016-07-26 02:45:18
*/

angular.module('rpg')
	.controller('DicesController', DicesController);

function createRandomNumber(ini, fim) {
	var n = Math.random() * Math.pow(10, 5);
	return Math.floor( n  % fim ) + ini;
}

function DicesController() {
	
	var vm = this;
	vm.add = add;
	function add( el ) {
		vm.formData[el]++;
	}

	console.log( Math.floor( 57707.68035373894  % (20+1) ) + 1 );

	vm.rolar    = rolar;
	function rolar() {
		//Clean result object
		vm.arrResul  = { };
		vm.sizeResul = 0;
		//Foreach for dices
		$.each( vm.formData, function(index, value) {
	    //Verify dice
	    if( !value )
	    	return false;
	    vm.arrResul[index] = [];
	    vm.sizeResul++;
      var n = parseInt( index.replace('d','') );
	    for( var i=0; i<value; i++ )
		    vm.arrResul[index].push( createRandomNumber(1, n) ); 	
		});
		console.log(vm.arrResul);
	}
}