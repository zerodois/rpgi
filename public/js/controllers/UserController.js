/*
 * @Author: felipe
 * @Date:   2016-07-11 14:46:55
 * @Last Modified by:   felipelopesrita
 * @Last Modified time: 2016-07-25 20:14:03
 */

angular.module('rpg')
  .controller('UserController', UserController)

function UserController( $routeParams, $resource, $window, $location, CSRF_TOKEN, FUNCTIONS ) {
  
  var vm   = this;
  var func = FUNCTIONS($location);
  vm.login = 1;
  vm.send  = 0;
  vm.token = CSRF_TOKEN;

  vm.email  = $routeParams.mail; 
  vm.hash   = $routeParams.hash;

  vm.confirm = function( id ) {
    var uri = '/confirm/:idObj';
    var req = $resource(uri);
    var promise = req.get({ idObj: id }).$promise;

    promise
      .then(function(json){
        console.log(json);
        vm.checked = json;
      });
  };

  if( $routeParams.id )
    vm.confirm( $routeParams.id );

  var login = $resource('/login');
  var res   = login.get().$promise;
  res.then( function(json) {
    if( !json.guest ) func.redirect('/dashboard');
  } );

  vm.position = 'horizontal';
  if( $(window).width() < $(window).height() )
    vm.position = 'vertical';

  vm.mail  = function(mail, callback) {
    vm.wait     = true; 
    var data    = { email: mail, _token: CSRF_TOKEN };
    var Mail    = $resource('/api/mail');
    var promise = Mail.save(data).$promise;
    promise
      .then(function(){
        vm.send++;
        vm.wait = false;
        if( callback!==undefined )
          callback();
      });
    return false;
  }

  vm.reset = function() {
    vm.wait   = true;
    var data  = vm.formData;
    var Reset = $resource('/mail/reset');
    promise   = Reset.save(data).$promise;
    promise
      .then(function(json){
        vm.message = json.message;
        vm.wait    = false;
        if( json.mail )
          vm.sucesso = true; 
        else
          vm.erro    = true;
      })
      .catch(func.erro);
  }

  vm.restart = function() {
    vm.wait   = true;
    vm.formData.hash = vm.hash;
    var data  = vm.formData;
    var Reset = $resource('/auth/reset');
    console.log(data);
    promise   = Reset.save(data).$promise;
    promise
      .then(function(json){
        vm.message = json.message;
        vm.wait    = false;
        if( json.success )
          vm.sucesso = true; 
        else
          vm.erro    = true;
      })
      .catch(func.erro);
  }

  vm.sigin = function() {
    var data = this.formData;
    var User = $resource('/login');
    var promise = User.save(data).$promise;
    promise
      .then( function(json) {
        if( json.auth ) func.redirect('/dashboard');
        else if( json.message )
        {
          vm.message = json.message;
          vm.erro    = true;
        }
        else vm.erro = true;
      } )
      .catch(func.erro);
  };

  vm.sigup = function() {
    vm.wait  = true;
    var data = this.formData;
    var User = $resource('/auth/sigup');
    var promise = User.save(data).$promise;
    promise
      .then(function(json){
        vm.message   = '';
        if ( json.erro ){
          vm.message = json.message;
          vm.wait    = false; 
          return false;
        }
        vm.mail(data.email, function() {
          func.redirect('/confirmation/'+data.email);
        });
      })
      .catch(func.erro);
  };
};

UserController['$inject'] = [ '$routeParams', '$resource', '$window', '$location', 'CSRF_TOKEN', 'FUNCTIONS' ];

