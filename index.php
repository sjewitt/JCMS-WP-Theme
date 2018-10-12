<?php 
/*
 Template Name: Index 
 */?><html>
<head><?php 
$funcs = new JCMSThemeFunctions();
get_header(); ?>
</head>
<body class="home jcms-purple">
        <div class="pure-g row-smaller heading purple">
            <div class="pure-u-1">
                <a><img class="inline-logo" src="<?php bloginfo('template_directory');?>/images/logo-large-purple.jpg" alt="JCMS Logo"/></a>
                <div class="strapline"><h1>INDEX <?php the_title(); ?></h1></div>
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


            <!-- content blocks -->
<?php 
$_childdata = $funcs->getChildLinks(get_queried_object_id(),false);
if($_childdata['count']){
    print($_childdata['links']); 
}
else{
    $_page_post = get_page(get_queried_object_id());
?>   
             <div class="pure-u-1 linkpanel row">
                <div class="panel-title"><h2><a><?php print($_page_post->post_title);?></a></h2></div>
                <div class="panel-text">
<?php print($_page_post->post_content);?>
                </div>
            </div>
<?php       
}
?>
            <!-- end content blocks -->
        </div>

<?php
get_footer(); ?>
</body>
</html>