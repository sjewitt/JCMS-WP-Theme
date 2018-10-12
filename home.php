<?php 
/*
 Template Name: Home 
 */?><html>
<head><?php 
$funcs = new JCMSThemeFunctions();
get_header(); ?>
</head>
<body class="home jcms-purple" id="page-1">
        <div class="pure-g row-smaller heading purple">
            <div class="pure-u-1">
                <a><img class="inline-logo" src="<?php bloginfo('template_directory');?>/images/logo-large-purple.jpg" alt="JCMS Logo"/></a>
                <!-- see www.orderofbusiness.net/blog/get-title-for-posts-page-in-wordpress/ -->
                <div class="strapline"><h1>HOME <?php single_post_title(); ?></h1></div> 
            </div>
        </div>
        <div class="pure-g divider">
            <div class="pure-u-1">

            </div>
        </div>

        <div class="pure-g" id="body-content">
            <div class="pure-u-1 row-tiny linkpanel panel-title" id="bc">
            <!--  Breadcrumb/back link  -->
<?php print( $funcs->getBreadcrumbLinks($funcs->getBreadcrumbIdArray(get_queried_object_id()))); ?>            
            </div>
<?php print($funcs->getRecentPosts(3)['links'] ); ?> <!-- Figure out how to add UI to allow author control over limit number... -->
        </div>

<?php get_footer(); ?>
</body>
</html>