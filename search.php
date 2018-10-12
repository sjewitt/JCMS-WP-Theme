<?php 
/*
 Template Name: Search 
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
                <div class="strapline"><h1>SEARCH <?php the_title(); ?></h1></div>
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
  <?php 
  /*
   * ensure results/pagination work OK. See codex.wordpress.org/Creating_a_Search_Page
   *  - which is not quite right, as the signature for wp_parse_str() now takes 2 arguments.
   */
  global $query_string;
  wp_parse_str($query_string,$vars);
  $search = new WP_Query($vars);
  ?>
             <div class="pure-u-1 linkpanel row">
                <div class="panel-title">
                    <h2>Search results</h2>
                </div>
                <!-- Loop over results: -->
                <?php 
                if($search->have_posts())
                {
                    //now loop over them:
                    while($search->have_posts()){
                        //the iterator:
                        $search->the_post();
                ?>
                <div class="panel-text">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <?php the_excerpt(); ?>
                    
                </div>
                
                <?php 
                    }
                }
                ?>
            </div>

            <!-- end content blocks -->
        </div>

<?php
get_footer(); ?>
</body>
</html>