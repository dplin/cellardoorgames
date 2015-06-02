(function(){
    'use strict';

            angular.module("doccompApp", [
               "ngNewRouter",
               "ngAnimate",
               "doccompApp.home",
               "doccompApp.ourservices",
               "doccompApp.contactus",
               "doccompApp.filters",
               "doccompApp.directives",
               "doccompApp.services"
            ])
            .controller('AppController', ['$rootScope', '$router', AppController])
            .config(['$componentLoaderProvider', componentLoaderConfig]);

            function AppController($rootScope, $router){
                var vm = this;

                $router.config([
                    {path:"/", redirectTo: "home"},
                    {path:"/home", component: "home", as: "home"},
                    {path:"/ourservices", component: "ourservices", as: "ourservices"},
                    {path:"/contactus", component: "contactus", as: "contactus"}
                ]);

                $rootScope.site_name = "Doc Comp";

                // Inject 'active' class into navigation menu
                vm.isActive = function(viewlocation){
/*                    viewlocation = viewlocation.replace('#/', '')

                    if (/#\/$/.test(window.location.href) == true && viewlocation == ''){
                        return true;
                    }*/

                    return window.location.href.indexOf(viewlocation) > 0 ? true : false;
                };
            }

            // copied from router.es5.js
            function dashCase(str) {
                return str.replace(/([A-Z])/g, function ($1) {
                    return '-' + $1.toLowerCase();
                });
            }

            // direct AngularJS to load from theme folder
            function componentLoaderConfig($componentLoaderProvider){
                $componentLoaderProvider.setTemplateMapping(function(name){
                    var dashName = dashCase(name);
                    // customized to use app prefix
                    return './wp-content/themes/doccomp/app/components/' + dashName + '/' + dashName + '.html';
                });
            }

}());


