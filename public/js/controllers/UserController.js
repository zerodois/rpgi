/*
 * @Author: felipe
 * @Date:   2016-07-11 14:46:55
 * @Last Modified by:   felipelopesrita
 * @Last Modified time: 2016-07-18 19:54:35
 */

angular.module('rpg').controller('UserController', UserController);

function UserController( $resource, $window, $location, CSRF_TOKEN, FUNCTIONS ) {
  var vm   = this;
  var func = FUNCTIONS($location);
  vm.login = 1;
  vm.token = CSRF_TOKEN;

  var login = $resource('/login');
  var res   = login.get().$promise;
  res.then( function(json) {
    if( !json.guest ) func.redirect('/dashboard');
  } );

  vm.position = 'horizontal';
  if( $(window).width() < $(window).height() )
    vm.position = 'vertical';

  vm.sigin = function() {
    var data = this.formData;
    var User = $resource('/login');
    var promise = User.save(data).$promise;
    promise.then( function(json) {
              if( json.auth ) func.redirect('/dashboard');
              else vm.erro = true;
            } )
            .catch(func.erro);
  };

  vm.sigup = function() {
    var data = this.formData;
    var User = $resource('/sigup');
    var promise = User.save(data).$promise;
    promise
      .then(func.redirect('/sigin'))
      .catch(func.erro);
  };
};

UserController['$inject'] = [ '$resource', '$window', '$location', 'CSRF_TOKEN', 'FUNCTIONS' ];

