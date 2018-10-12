<?php 
/*
 Template Name: Searchpage 
 */?>
<html>
<head><?php 
$funcs = new JCMSThemeFunctions();
get_header(); ?>
</head>
<body class="home jcms-purple" id="page-1">
        <div class="pure-g row-smaller heading purple">
            <div class="pure-u-1">
                <a><img class="inline-logo" src="<?php bloginfo('template_directory');?>/images/logo-large-purple.jpg" alt="JCMS Logo"/></a>
                <div class="strapline"><h1>SEARCHPAGE <?php the_title(); ?></h1></div>
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
print( $funcs->getBreadcrumbLinks($funcs->getBreadcrumbIdArray(get_queried_object_id())));
?>            
            </div>


            <!-- content blocks -->
  
             <div class="pure-u-1 linkpanel row">
                <div class="panel-title">
                    <h2>Search page</h2>
                </div>
                <div class="panel-text">
                    <h3>Search...</h3>
                    <?php get_search_form(); ?>
                </div>
            </div>

            <!-- end content blocks -->
        </div>

<?php
get_footer(); ?>
</body>
</html>