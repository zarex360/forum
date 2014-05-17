'use strict';

/* Filters */

angular.module('Forum.filters', [])
  
  // not used, just here for reference:
  .filter('interpolate', ['version', function(version) {
    return function(text) {
      return String(text).replace(/\%VERSION\%/mg, version);
    }
  }]);
