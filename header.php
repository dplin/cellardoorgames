<!doctype html>
<html class="no-js" ng-app="doccompApp" ng-controller="AppController as app" <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title ng-bind="$root.title"></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <?php wp_head(); ?>
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Mobile Menu -->
        <?php get_template_part( 'parts/mobile-menu' ); ?>
        <!-- Menu -->
        <?php get_template_part( 'parts/top-bar' ); ?>
        <?php get_template_part( 'parts/feature' ); ?>

    <main>
        <div class="page-wrapper">
            <div class="{{$root.page}}" ng-viewport resize container-class="page-wrapper"></div>
        </div>
