(function(){
    'use strict';

    angular
        .module("doccompApp.home", [])
        .controller("HomeController", ['$rootScope', HomeController]);

    function HomeController($rootScope) {
        var vm = this;
        $rootScope.page = "pageHome";
        $rootScope.title = $rootScope.site_name + " | Home";

        // Component Lifecycle Hooks
        // Note: This is where you load everything before component is rendered into viewport.
        vm.activate = ['pageService', function(pageService){
            // Initialize data store
            vm._init(pageService);
        }];

        // Private init() function
        vm._init = function(pageService){
            pageService.loadPageData('home');
            vm.data = pageService.pagedata;
        }
    }

}());


