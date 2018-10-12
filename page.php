<?php 
/*
 Template Name: Page 
 */?><html>
<head><?php 
$funcs = new JCMSThemeFunctions();
get_header(); ?>
</head>
<body class="home jcms-purple" id="page-1">
        <div class="pure-g row-smaller heading purple">
            <div class="pure-u-1">
                <a><img class="inline-logo" src="<?php bloginfo('template_directory');?>/images/logo-large-purple.jpg" alt="JCMS Logo"/></a>
                <div class="strapline"><h1>PAGE <?php the_title(); ?></h1>
            <!-- See www.buildwpyourself.com/get-template-part/ -->
<?php get_template_part('partials/content','headersearch'); ?>                
                </div>
            </div>
        </div>
        <div class="pure-g divider">
            <div class="pure-u-1">

            </div>
        </div>

        <div class="pure-g" id="body-content">
            <div class="pure-u-1 row-tiny linkpanel panel-title" id="bc">
<?php 
print( $funcs->getBreadcrumbLinks($funcs->getBreadcrumbIdArray(get_queried_object_id())));
?>            
            </div>

<?php 
$_childdata = $funcs->getChildLinks(get_queried_object_id(),false);
if($_childdata['count']){
    print($_childdata['links']); 
}
// else{
    $_page_post = get_page(get_queried_object_id());
?>   
             <div class="pure-u-1 linkpanel row">
                <div class="panel-title"><h2><?php print($_page_post->post_title);?></h2></div>
                <div class="panel-text">
<?php the_content(); ?>
                </div>
            </div>
<?php       
// }
?>
            <!-- end content blocks -->
        </div>

<?php get_footer(); ?>
</body>
</html>