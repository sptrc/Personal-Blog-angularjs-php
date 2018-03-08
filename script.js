var myApp = /**
* myMod Module
*
* Description
*/
angular.module('myMod', ["ngRoute","ngAnimate"]).config(function($routeProvider,$locationProvider) {
	$routeProvider
	.otherwise({
		redirectTo: '/home'
	})
	.when("/home",{
		templateUrl: 'template/sample.html'
	})
	.when("/about",{
		templateUrl: 'template/about.html'
	})
	.when("/gallery",{
		templateUrl: 'template/gallery.html', controller: 'galleryCon'
	})
	.when('/category/:id',{
		templateUrl: 'template/category.html',
		controller: 'categoryCon'
	})
	.when('/post/:id',{
		templateUrl: 'template/post.html',
		controller: 'singlePostCon'
	})
	.when('/contact',{
		templateUrl: 'template/contact.html'
	})
})

.controller('menuCon', function($scope,$http,$rootScope){
	$http.get('category.php')
	.then(function(response){
		$scope.category = response.data; 
	});
	$rootScope.$on('$stateChangeSuccess', function() {
		document.body.scrollTop = document.documentElement.scrollTop = 0;
	});
})

.controller('ownerCon', function($scope,$http,$rootScope){ 
	$http.get('owner.php')
	.then(function(response){
		$scope.owner = response.data;
		$scope.name = $scope.owner.name;
		$scope.img = $scope.owner.image;
		$scope.location = $scope.owner.location;
		$scope.banner = $scope.owner.banner;
		$scope.logo = $scope.owner.logo;
		$scope.intro = $scope.owner.intro;
		$scope.detail = $scope.owner.detail;
	});
	$rootScope.$on('$stateChangeSuccess', function() {
		document.body.scrollTop = document.documentElement.scrollTop = 0;
	});
})

.controller('postCon', function($scope,$http){
	$http.get('post.php')
	.then(function(response){
		$scope.posts = response.data;
	})
})

.controller('socialCon', function($scope,$http){
	$http.get('social.php')
	.then( function(response){
		$scope.media = response.data;
	})
})

.controller('categoryCon', function($scope,$http,$routeParams){
	$http({
		url: 'category.php?id='+$routeParams.id,
		method: 'get'
	})
	.then(function(response){
		$scope.cats = response.data;
		$scope.category = $scope.cats.category;
		$scope.banner = $scope.cats.banner;
		$scope.description = $scope.cats.description;
	})

	$http({
		url: 'post.php?cat='+$routeParams.id,
		method: 'get'
	})
	.then(function(response){
		$scope.posts = response.data;
	})
})

.controller('singlePostCon', function($scope,$rootScope,$http,$routeParams,facebookService){
	$http({
		url: 'post.php?id='+$routeParams.id,
		method: 'get'
	})
	.then(function(response){
		$scope.post = response.data;
		$scope.image = $scope.post.image;
		$scope.title = $scope.post.title;
		$scope.body = $scope.post.body;
		$scope.date = $scope.post.date;
		$scope.id = $scope.post.id;
		$scope.cmnt = $scope.post.cmnt;
	})
	$http({
		url: 'comment.php?post='+$routeParams.id,
		method: 'get'
	})
	.then(function(response){
		$scope.comments = response.data;
		console.log($scope.comments.length);

	})

	$scope.submit = function(){

		console.log($scope.comment);
		$.post(
			'add.comment.php',
			{
				name : $scope.comment.name,
				email : $scope.comment.email,
				website : $scope.comment.website,
				comment : $scope.comment.comment,
				pic : $scope.picture, 
				post : $routeParams.id
			},
			function(data){
				$http({url: 'comment.php?post='+$routeParams.id,method: 'get'})
				.then(function(response){
					$scope.comments = response.data;
					$scope.comment = false;
					console.log($scope.comments);
					$scope.login = false;
				});
				$rootScope.$digest();
				console.log(data);
			});

	}
	$scope.login=false;
	$scope.fbLogin = function(){
		facebookService.getMyLastName() 
		.then(function(response) {
			$scope.data = response;
			console.log(response);
			$scope.login = true;
			$scope.comment = {name:response.name,email:response.email};
			$scope.picture = response.picture.data.url;
		}
		);
	}
})
.controller('galleryCon', function($scope,$http){
	$http.get('gallery.php')
	.then(function(response){
		$scope.images = response.data;
		console.log($scope.images);
	})
})
.factory('facebookService', function($q) {
	return {
		getMyLastName: function() {
			var deferred = $q.defer();
			FB.api('/me', {
				fields: 'name,email,picture'
			}, function(response) {
				if (!response || response.error) {
					deferred.reject('Error occured');
				} else {
					deferred.resolve(response);
				}
			});
			return deferred.promise;
		},
		share:function(){
			FB.ui({
				method: 'feed',
				caption: 'Best Desgin Ever',
				link: 'https://sukanyagraphics.comli.com/',
			}, function(response){});
		}
		
	}
})