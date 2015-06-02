(function(){
    'use strict';

    angular.module('doccompApp.filters', [])
    .filter('unsafe', ['$sce', function($sce) { return $sce.trustAsHtml; }]);

}());
