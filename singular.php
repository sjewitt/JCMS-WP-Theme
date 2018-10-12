<?php 
/*
 Template Name: Singular 
 */?><html>
<head><?php 
$funcs = new JCMSThemeFunctions();
get_header(); ?>
</head>
<body class="home jcms-purple" id="page-1">
        <div class="pure-g row-smaller heading purple">
            <div class="pure-u-1">
                <a><img class="inline-logo" src="<?php bloginfo('template_directory');?>/images/logo-large-purple.jpg" alt="JCMS Logo"/></a>
                <div class="strapline"><h1>SINGULAR <?php the_title(); ?></h1></div>
            </div>
        </div>
        <div class="pure-g divider">
            <div class="pure-u-1">

            </div>
        </div>

        <div class="pure-g" id="body-content">
            <div class="pure-u-1 row-tiny linkpanel panel-title" id="bc">
            <!--  Breadcrumb/back link  -->
<?php 
print($funcs->getBreadcrumbLinks($funcs->getBreadcrumbIdArray(get_queried_object_id())));
?>            
            </div>  
             <div class="pure-u-1 linkpanel row">
                <div class="panel-title"><h2><a><?php the_title();?></a></h2></div>
                <div class="panel-text">
<?php the_content(); ?>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
</body>
</html>