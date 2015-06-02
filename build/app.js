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

/*
Code refactoring:
http://www.effectiveui.com/blog/2015/04/20/learned-ng-conf-write-angularjs-migration-mind/
*/
(function(){
    'use strict';

    angular.module('doccompApp.directives', []).directive('resize', ['$timeout', function($timeout) {
        return {
            restrict: 'EA',
            scope: {},
            controller: ['$attrs', '$scope', '$element', resizeController],
            controllerAs: 'resize',
            bindToController: {
                containerClass: '='
            }
        };

        function resizeController($attrs, $scope, $element) {
            // Get wrapper/container name
            var className = $attrs.containerClass;

            // Hide and wait until everything loaded
            $element.hide();

            $timeout(function() {
                // Show content after everything has been loaded
                $element.fadeIn(150, function(){
                    // WP Plugin "Contact Form 7" workaround if the form is loaded using AJAX.
                    if ($attrs.class == "pageContactus"){
                        // Manually initialize Contact Form 7 after the template is loaded into the ng-viewport.
                        $('div.wpcf7 > form').wpcf7InitForm();

                        // Change the ugly Contact Form 7 spinner.
                        $('.ajax-loader').attr('src', site.theme_url + '/assets/img/spinner.gif');
                    }
                });

                // Set main wrapper/container height
                //$('.' + className).css('height', $element.height() +  'px');
            },400);
        }
    }]);

}());

(function(){
    'use strict';

    angular.module('doccompApp.filters', [])
    .filter('unsafe', ['$sce', function($sce) { return $sce.trustAsHtml; }]);

}());

(function(){
    'use strict';

    angular.module('doccompApp.services', [])
    .service('pageService', ['$http', function($http) {
        // Initialize empty object
        this.pagedata = {};

        this.loadPageData = function(page_name) {
            var that = this;
            $http.get('/wp-json/pages/' + page_name).then(
                function(response) {
                      angular.copy(response.data, that.pagedata);
                },
                function(error) {

                }
            );
        };

    }]);

}());
