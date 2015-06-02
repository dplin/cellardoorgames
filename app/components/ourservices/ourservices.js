(function(){
    'use strict';

    angular
        .module("doccompApp.ourservices", [])
        .controller("OurservicesController", ['$rootScope', OurservicesController]);

    function OurservicesController($rootScope) {
        var vm = this;
        $rootScope.page = "pageOurservices";
        $rootScope.title = $rootScope.site_name + " | Our Services";

        // Component Lifecycle Hooks
        // Note: This is where you load everything before component is rendered into viewport.
        vm.activate = ['pageService', function(pageService){
            // Initialize data store
            vm._init(pageService);
        }];

        // Private init() function
        vm._init = function(pageService){
            pageService.loadPageData('our-services');
            vm.data = pageService.pagedata;
        }
    }

}());
