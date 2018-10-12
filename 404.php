<html>
<head><?php 
get_header(); ?>
</head>
<body class="home jcms-purple" id="page-1">
        <div class="pure-g row-smaller heading purple">
            <div class="pure-u-1">
                <a><img class="inline-logo" src="<?php bloginfo('template_directory');?>/images/logo-large-purple.jpg" alt="JCMS Logo"/></a>
                <div class="strapline"><h1>404 <?php the_title(); ?></h1></div>
            </div>
        </div>
        <div class="pure-g divider">
            <div class="pure-u-1">

            </div>
        </div>

        <div class="pure-g" id="body-content">
            <div class="pure-u-1 row-tiny linkpanel panel-title" id="bc">
            
            </div>


            <!-- content blocks -->
             <div class="pure-u-1 linkpanel row">
                <div class="panel-title"><h2>Not found...</h2></div>
                <div class="panel-text"><p>
No content found at the url entered.
                </p></div>
            </div>
            <!-- end content blocks -->
        </div>

<?php
get_footer(); ?>
</body>
</html>