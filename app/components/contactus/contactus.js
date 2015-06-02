(function(){
    'use strict';

    angular
        .module("doccompApp.contactus", [])
        .controller("ContactusController", ['$rootScope', ContactusController]);

    function ContactusController($rootScope) {
        var vm = this;
        $rootScope.page = "pageContactus";
        $rootScope.title = $rootScope.site_name + " | Contact Us";

        // Component Lifecycle Hooks
        // Note: This is where you load everything before component is rendered into viewport.
        vm.activate = ['pageService', function(pageService){
            // Initialize data store
            vm._init(pageService);
        }];

        // Private init() function
        vm._init = function(pageService){
            pageService.loadPageData('contact-us');
            vm.data = pageService.pagedata;
        }

    }

}());
