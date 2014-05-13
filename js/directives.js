'use strict';

/* Directives */


angular.module('myApp.directives', [])
  
  // not used, just here for reference
  .directive('appVersion', ['version', function(version) {
    return function(scope, elm, attrs) {
      elm.text(version);
    };
  }]);
