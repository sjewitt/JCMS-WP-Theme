<?php

class JCMSThemeFunctions{
    function __construct(){
        
    }


    function getParent($id,$resetQuery){
        if($resetQuery){
            wp_reset_query();
        }
        $_par = wp_get_post_parent_id($id);
        $_page_parent = false;
        if($_par){
            $_page_parent = get_page($_par);
        }
        return $_page_parent;
    }
    
    function getBreadcrumbIdArray($pageId){
        $_bcArray = [];
        $counter = 0;
        while ($pageId ){
            $_bcArray[] = $pageId;
            $pageId = wp_get_post_parent_id($pageId);
        }
        return(array_reverse($_bcArray,false));
//         return $_bcArray;
    }
    
    function getBreadcrumbLinks($pageIdArray){
        
        $_out = "<div><ul>";
        $_page = null;
        for ($i = 0; $i < count($pageIdArray); $i++){
            $_page = get_page($pageIdArray[$i]);
            $_out .= "<li>";
            if($i < (count($pageIdArray))-1) $_out .= "<a href='" . get_permalink($_page) . "' title='" . $_page->post_title . "'>";
            $_out .= $_page->post_title;
            if($i < (count($pageIdArray))-1) $_out .= "</a> &raquo; ";
            $_out .= "</li>";
        }
        $_out .= "</ul></div>";
        wp_reset_query();
        return($_out);
    }
    
    
    function getChildArray($page){
        $_test = "TEST";
        return $_test;
    }
    
    // function getChildCount($pageId){
    //     wp_reset_query();
    //     $args = array(
    //         'post_parent' => $pageId,
    //         'post_type' => 'page',
    //         'posts_per_page'=> -1   //ALL, see WP codex     ,
    //     );
    //     //see codex. This is not the way to do this. TO MODIFY
    //     $result = query_posts($args);
    //     return count($result);
    // };
    
    
    function getRecentPosts($num){
        $_out = array();
        $_out['links'] = '';
        $_out['count'] = $num;
        $args = array(
            'posts_per_page'=> $num   //ALL, see WP codex     ,
        );
        //see codex. This is not the way to do this. TO MODIFY
        $result = query_posts($args);
        $_out['count'] = count($result);
    //     foreach($result as $thing){
        while(have_posts()){
            the_post();
            $_link = get_the_permalink();
            $_title = get_the_title();
            $_extract = get_the_excerpt();
            $_editLink = get_edit_post_link();
            $_out['links'] .= '<div class="pure-u-1 linkpanel row transparency jcms-green">';
            $_out['links'] .= '<div class="panel-title">';
            $_out['links'] .= '<h2><a href="' . $_link . '" title="' . $_title . '">' . $_title . '</a></h2>';
//             $_out['links'] .= '<div class="colour-flag"></div>';
            $_out['links'] .= '</div>';
            $_out['links'] .= '<div class="panel-text">';
            if($_editLink){
                $_out['links'] .= '<p><a href="'.$_editLink.'" title="Edit post">Edit</a></p>';
            }
            $_out['links'] .= '<p>' . $_extract . '</p>';
            $_out['links'] .= "<p><a href='" . $_link . "'>" . $_title . "</a></p>";
            $_out['links'] .= '</div>';
            $_out['links'] .= '</div>';
        }
        wp_reset_query();
//         var_dump($_out);
        return $_out;
    }
    
    //separate into array and formatting methods. That way I can use eth same formatting function for posts and pages
    function getChildLinks($pageId,$fullWidth){
        $_full_width_class = " pure-u-md-1-4 pure-u-sm-1-2 ";
        if($fullWidth){
            $_full_width_class = '';
        }
        
        $_out = array();
        $_out['links'] = '';
        $_out['count'] = -1;
        $args = array(
            'post_parent' => $pageId,
            'post_type' => 'page',
            'posts_per_page'=> -1   //ALL, see WP codex     ,
        );
        //see codex. This is not the way to do this. TO MODIFY
        $result = query_posts($args);
        $_out['count'] = count($result);
        foreach($result as $thing){
            
            $_link = get_permalink($thing);
            $_extract = explode('.',strip_tags($thing->post_content))[0];
            $_out['links'] .= '<div class="pure-u-1 ' . $_full_width_class . ' linkpanel row transparency jcms-green">';
            $_out['links'] .= '<div class="panel-title">';
            $_out['links'] .= '<h2><a href="' . $_link . '" title="' . $thing->post_title . '">' . $thing->post_title . '</a></h2>';
//             $_out['links'] .= '<div class="colour-flag"></div>';
            $_out['links'] .= '</div>';
            $_out['links'] .= '<div class="panel-text">';
            $_out['links'] .= '<p>' . $_extract . '</p>';
            $_out['links'] .= "<p><a href='" . $_link . "'>" . $thing->post_title . "</a></p>";
            $_out['links'] .= '</div>';
            $_out['links'] .= '</div>';
        }
        wp_reset_query();
    
        return $_out ;
    }
    
    function getPostLinks($ppp){
        wp_reset_query();
        $_out = "";
        $args = array(
            'posts_per_page'=> $ppp   //ALL, see WP codex     ,
        );
        $result = query_posts($args);
        
        foreach($result as $thing){
            $_link = get_permalink($thing);
            $_out .= '<div class="pure-u-1 pure-u-sm-1-2 linkpanel row transparency jcms-green">';
            $_out .= '<div class="panel-title">';
            $_out .= '<h2><a href="' . $thing->guid . '" title="' . $thing->post_title . '">' . $thing->post_title . '</a></h2>';
            $_out .= '<div class="colour-flag"></div>';
            $_out .= '</div>';
            $_out .= '<div class="panel-text">';
            $_out .= '<p>' . $thing->post_excerpt . '</p>';
            $_out .= "<p><a href='" . $thing->guid . "'>" . $thing->post_title . "</a></p>";
            $_out .= '</div>';
            $_out .= '</div>';
        }
        return $_out ;
    }
    
    function getPostsHomeLink(){
        $_out = "<a href='";
        $_out .= get_permalink(get_option('page_for_posts'));
        $_out .= "' title='" . get_the_title(get_option('page_for_posts')) . "'>";
        $_out .= get_the_title(get_option('page_for_posts'));
        $_out .= "</a>";
        return $_out;
    }

}






