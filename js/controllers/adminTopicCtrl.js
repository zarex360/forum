'use strict';

angular.module('Forum.AdminTopicCtrl', [])

.controller('AdminTopicCtrl', [
	'$scope', '$rootScope', '$location', 'HttpServices', 'UserService', 'AdminServices',
	function($scope, $rootScope, $location, HttpServices, UserService, AdminServices) {
	
	UserService.role().then(function(response) {
		if(response['data']['authUserResponse'] === '9') {
			$scope.buildMainMenu(response['data']['authUserResponse']);
		}else {
			$location.path('/home');
		}	
	});

	$scope.buildMainMenu = function(menu) {
		if(!$rootScope.adminMenu) {
			HttpServices.get('menu/admin').then(function(response) {
				$rootScope.adminMenu = response['data']['menuResponse'];
			});
		}
	}

	$scope.topics = AdminServices.getTopic;
}]);