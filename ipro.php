<?php
/*
Plugin Name: Import Pro
Plugin URI: http://anthonydelgado.me/
Description: Import Pro will import posts using various API's
Author: Anthony Delgado 
Author URI: http://anthonydelgado.me/
*/

// Hook for adding admin menus


$noplacelikehome = home_url();





function updatedapostmeta( $post_id, $field_name, $value )
{
    if ( empty( $value ) OR ! $value )
    {
        delete_post_meta( $post_id, $field_name );
    }
    elseif ( ! get_post_meta( $post_id, $field_name ) )
    {
        add_post_meta( $post_id, $field_name, $value );
    }
    else
    {
        update_post_meta( $post_id, $field_name, $value );
    }
} 



add_action('admin_menu', 'ipro_add_pages');

// action function for above hook
function ipro_add_pages() {

    // Add a new top-level menu (ill-advised):
add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

    add_menu_page(__('Import Pro','menu-ipro'), __('Import Pro','menu-ipro'), 'manage_options', 'ipro-top-level-handle', 'ipro_toplevel_page' );

    // Add a submenu to the custom top-level menu:
    add_submenu_page('ipro-top-level-handle', __('Import Youtube','menu-youtube'), __('Import Youtube','menu-youtube'), 'manage_options', 'youtube-importer', 'ipro_youtube_page');

    // Add a second submenu to the custom top-level menu:
    add_submenu_page('ipro-top-level-handle', __('Import Cranium','menu-craniumfitteds'), __('Import Cranium','menu-craniumfitteds'), 'manage_options', 'sub-craniumfitteds', 'ipro_sublevel_craniumfitteds');

}


// ipro_toplevel_page() displays the page content for the custom Test Toplevel menu
function ipro_toplevel_page() {
    echo '<div class="wrap">
<div id="icon-tools" class="icon32"><br /></div><h2>Welcome to Import Pro!</h2>
<p>You can automagically add posts to your WordPress blog using the various APIs of some of the internets most popular websites! <br />To get started, enter in some search terms to import from below:</p>

<br class="clear" />
<p class="install-help">Search for images and videos by keyword.</p>
<form id="search-themes" method="get" action="">
	<input type="hidden" name="page" value="ipro-top-level-handle" />
		<label class="screen-reader-text" for="s">Search by keyword</label>
		<input type="search" name="s" id="s" size="30" value="';

 if (isset($_GET['s'])) { echo($_GET['s']); }

echo '" autofocus="autofocus" />
	<input type="submit" name="search" id="search" class="button" value="Search"  /></form>

<br class="clear" />';


                if (isset($_GET['s'])) 
                {

		echo '<h2 class="nav-tab-wrapper"><a href="' . $_SERVER['PHP_SELF'] . '?page=ipro-top-level-handle&s=' . $_GET['s'] . '" class="nav-tab nav-tab-active">Bing Images</a><a href="' . $_SERVER['PHP_SELF'] . '?page=youtube-importer&s=' . $_GET['s'] . '" class="nav-tab">Youtube</a><a href="' . $_SERVER['PHP_SELF'] . '?page=sub-craniumfitteds&s=' . $_GET['s'] . '" class="nav-tab">Cranium</a><a href="' . $_SERVER['PHP_SELF'] . '?page=sub-worldstar&s=' . $_GET['s'] . '" class="nav-tab">WorldStar</a></h2>';
	

                if (isset($_GET['goimport'])) { }else{
echo '<div class="updated" style="padding: 0; margin: 0; border: none; background: none;"> <style type="text/css">  
.ipro_go{min-width:825px;border:1px solid #4F800D;padding:5px;margin:15px 0;background:#83AF24;background-image:-webkit-gradient(linear,0% 0,80% 100%,from(#83AF24),to(#4F800D));background-image:-moz-linear-gradient(80% 100% 120deg,#4F800D,#83AF24);-moz-border-radius:3px;border-radius:3px;-webkit-border-radius:3px;position:relative;overflow:hidden}.ipro_go .aa_a{position:absolute;top:19px;right:10px;font-size:100px;color:#769F33;font-family:Georgia, "Times New Roman", Times, serif;z-index:1}.ipro_go .aa_button{font-weight:bold;border:1px solid #029DD6;border-top:1px solid #06B9FD;font-size:15px;text-align:center;padding:9px 0 8px 0;color:#FFF;background:#029DD6;background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));background-image:-moz-linear-gradient(0% 100% 90deg,#0079B1,#029DD6);-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px}.ipro_go .aa_button:hover{text-decoration:none !important;border:1px solid #029DD6;border-bottom:1px solid #00A8EF;font-size:15px;text-align:center;padding:9px 0 8px 0;color:#F0F8FB;background:#0079B1;background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#0079B1),to(#0092BF));background-image:-moz-linear-gradient(0% 100% 90deg,#0092BF,#0079B1);-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px}.ipro_go .aa_button_border{border:1px solid #006699;-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px;background:#029DD6;background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));background-image:-moz-linear-gradient(0% 100% 90deg,#0079B1,#029DD6)}.ipro_go .aa_button_container{cursor:pointer;display:inline-block;background:#DEF1B8;padding:5px;-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px;width:266px}.ipro_go .aa_description{position:absolute;top:22px;left:285px;margin-left:25px;color:#E5F2B1;font-size:15px;z-index:1000}.ipro_go .aa_description strong{color:#FFF;font-weight:normal}
					</style>                       
					<form name="ipro_go" action="' . $_SERVER['PHP_SELF'] . '?page=ipro-top-level-handle&s=' . str_replace(' ','+',$_GET['s'] ) . '&goimport=1" method="POST"> 
						
						
						<div class="ipro_go">  
							<div class="aa_a">Import Pro</div>     
							<div class="aa_button_container" onclick="document.ipro_go.submit();">  
								<div class="aa_button_border">          
									<div class="aa_button">Import these posts NOW!</div>  
								</div>  
							</div>  
							<div class="aa_description"><strong>Almost done</strong> - Below is a preview of the posts that will be imported. If everything looks good then click the import button to begin adding posts to your blog!</div>  
						</div>  
					</form>  
				</div>';  
}

                    // Replace this value with your account key
                   // $accountKey = 'NxMfjAyRN0UBl8t8xANtAizAizM/KsJ/d4ZxxyPlULY';
                    // Replace this value with your account key
                    $accountKey = 'Sw7No0bTa5OsttCZkVNpxCF6BaO8d9y6UOBgpTelwG8';
            
            
                    $ServiceRootURL =  'https://api.datamarket.azure.com/Bing/Search/';
                    
                    $WebSearchURL = $ServiceRootURL . 'Image?$format=json&Query=';
                    
                    $context = stream_context_create(array(
                        'http' => array(
                            'request_fulluri' => true,
                            'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
                        )
                    ));

                    $request = $WebSearchURL . urlencode( '\'' . $_GET["s"] . '\'');
                    
                    //echo($request);
                    
                    $response = file_get_contents($request, 0, $context);
                    
                    $jsonobj = json_decode($response);
                    
echo '<div id="availablethemes">';
 
                    foreach($jsonobj->d->results as $value)
                    {              

echo '<div class="available-theme">';
 
$valuetitle = preg_replace("/[^A-Za-z0-9 ]/", '', $value->Title);


$ititle = $_GET["s"];
$ititle .= ' - ';
$ititle .= $value->Title;
$ititle = strip_tags($ititle);
$ititle = strtoupper($ititle);
$ititle = strtoupper($ititle);
$ititle = preg_replace("/[^A-Za-z0-9 ]/", '', $ititle);

$ilink = $value->SourceUrl;




if (isset($_GET['goimport'])) { 




$imgfilename = $ititle;

$imgfilename = str_replace(' - ','-',$imgfilename ); 
$imgfilename = str_replace(' ','-',$imgfilename ); 
$imgfilename .= '-craniumfitteds.com'; 


if (strpos($value->MediaUrl,'.jpg') !== false) {

$imgfilename .= '.jpg'; 
}elseif (strpos($value->MediaUrl,'.png') !== false) {

$imgfilename .= '.png'; 
}elseif (strpos($value->MediaUrl,'.gif') !== false) {

$imgfilename .= '.gif'; 
}elseif (strpos($value->MediaUrl,'.bmp') !== false) {

$imgfilename .= '.bmp'; 
}else{

$imgfilename .= '.jpg'; 
} 

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .
             "Referer: $ilink\r\n"
  )
);
 
$Referer = stream_context_create($opts);


 
 



$image_url = $value->MediaUrl;

  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_URL, $image_url);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 20);
  curl_setopt ($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_HEADER, true); 
  curl_setopt($ch, CURLOPT_NOBODY, true);

  $content = curl_exec ($ch);
  $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
   

   if (strpos($contentType,'image') !== false) {

 echo 'GOOD MONEY';
$urlbits = $value->MediaUrl;
}else{

 echo 'BAD MONEY';
 $urlbits = $value->Thumbnail->MediaUrl;
}


  curl_close ($ch);

//$urlbits = $value->MediaUrl;

$bits = file_get_contents($urlbits, false, $Referer);


$upload = wp_upload_bits($imgfilename, null, $bits); 

$ipost_image = $upload['url'];


$noplacelikehome = home_url();

$ipost_content = '<a href="' . $ipost_image . '"><img src="' . $ipost_image . '" width="550" ></a><div class="detailz"><h4>' . $valuetitle . '</h4><p>Check out this ' . $valuetitle . '  Hat that was designed to match ' . $_GET['s'] . ' sneakers. If you are one of dem luck people out there who own a pair of <a href="' . $noplacelikehome . '" >' . $_GET['s'] . '</a> sneakers than this ' . $ititle . ' Hat is the perfect joint for you to match. <a href="' . $value->SourceUrl . '" title="' . $valuetitle . '" >via</a> x <a href="' . $ilinkz . '#shoutout" >s/o</a></p></div>';


$ilinkz = $value->SourceUrl;

// Create post object
$my_post = array(
  'post_title'    => $ititle,
  'post_content'  => $ipost_content,
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_category' => array(1)

);

// Insert the post into the database
//wp_insert_post( $my_post );

$the_post_id = wp_insert_post( $my_post );



if (isset($_GET['sneaker'])) {    

$fatcat = $_GET['sneaker'];
$itags_input = array($fatcat);
wp_set_post_terms( $the_post_id, $itags_input);

}else{

$fatcat2 = $_GET['s'];
$itags_input2 = array($fatcat2);
wp_set_post_terms( $the_post_id, $itags_input2);

}


update_post_meta( $the_post_id, 'syndication_permalink', $ilink );
update_post_meta( $the_post_id, 'ogtermz', $_GET['s'] );
//update_post_meta( $the_post_id, 'sneaker', $_GET['sneaker'] );
update_post_meta( $the_post_id, 'thumbnail', $ipost_image );
update_post_meta( $the_post_id, 'MediaUrl', $value->MediaUrl );
update_post_meta( $the_post_id, 'MediaUrl_thumbnail', $value->Thumbnail->MediaUrl );


} //END IF GOIMPORT




echo('<p><h1><a href="' . $noplacelikehome . '?p=' . $the_post_id . '" >' . $ititle . '</a></h1></p>'); 


$requestMediaUrl = urlencode( '\'' . $value->Thumbnail->MediaUrl . '\'');
$requestSourceUrl = urlencode( '\'' . $value->SourceUrl . '\'');
$requestTitle = urlencode( '\'' . $value->Title . '\'');

          
                        echo('<p class="resultlistitem"><a href="' . $value->MediaUrl . '"><img src="' . $value->Thumbnail->MediaUrl . '" width="150" ></a>');
                        
                        echo('<div class="info"><h4><a href="' . $value->SourceUrl . '" title="' . $value->Title . '" >' . $value->Title . '</a></h4><p>' . $value->Title . '</p> - <a href="' . $noplacelikehome . '/wp-admin/press-this.php?u=' . $requestSourceUrl . '&t=' . $requestTitle . '&i=' . $requestMediaUrl . '" title="' . $value->Title . '" >Press This</a></div></p>');

echo '</div>';
                    }
                    
                    echo("</div>");
                } 




    echo '<p>If you are having trouble with the importer you may need to update your <a href="https://datamarket.azure.com/dataset/bing/search">Bing API Key.</a> If you are still having trouble with the importer please feel free to <a href="https://www.facebook.com/mrfresh86">contact me.</a>.</p></div>';
}



















// ipro_sublevel_page() displays the page content for the first submenu
// of the custom Test Toplevel menu
function ipro_youtube_page() {


echo '<div class="wrap">
<div id="icon-tools" class="icon32"><br /></div><h2>Welcome to Import Pro!</h2>
<p>You can automagically add posts to your WordPress blog using the various APIs of some of the internets most popular websites! <br />To get started, enter in some search terms to import from below:</p>

<br class="clear" />
<p class="install-help">Search for images and videos by keyword.</p>
<form id="search-themes" method="get" action="">
	<input type="hidden" name="page" value="ipro-top-level-handle" />
		<label class="screen-reader-text" for="s">Search by keyword</label>
		<input type="search" name="s" id="s" size="30" value="';

 if (isset($_GET['s'])) { echo($_GET['s']); }

echo '" autofocus="autofocus" />
	<input type="submit" name="search" id="search" class="button" value="Search"  /></form>

<br class="clear" />';


 if (isset($_GET['s'])) { 
		echo '<h2 class="nav-tab-wrapper"><a href="' . $_SERVER['PHP_SELF'] . '?page=ipro-top-level-handle&s=' . $_GET['s'] . '" class="nav-tab nav-tab-active">Bing Images</a><a href="' . $_SERVER['PHP_SELF'] . '?page=youtube-importer&s=' . $_GET['s'] . '" class="nav-tab">Youtube</a><a href="' . $_SERVER['PHP_SELF'] . '?page=sub-craniumfitteds&s=' . $_GET['s'] . '" class="nav-tab">Cranium</a><a href="' . $_SERVER['PHP_SELF'] . '?page=sub-worldstar&s=' . $_GET['s'] . '" class="nav-tab">WorldStar</a></h2>';

                if (isset($_GET['goimport'])) { }else{
echo '<div class="updated" style="padding: 0; margin: 0; border: none; background: none;"> <style type="text/css">  
.ipro_go{min-width:825px;border:1px solid #4F800D;padding:5px;margin:15px 0;background:#83AF24;background-image:-webkit-gradient(linear,0% 0,80% 100%,from(#83AF24),to(#4F800D));background-image:-moz-linear-gradient(80% 100% 120deg,#4F800D,#83AF24);-moz-border-radius:3px;border-radius:3px;-webkit-border-radius:3px;position:relative;overflow:hidden}.ipro_go .aa_a{position:absolute;top:19px;right:10px;font-size:100px;color:#769F33;font-family:Georgia, "Times New Roman", Times, serif;z-index:1}.ipro_go .aa_button{font-weight:bold;border:1px solid #029DD6;border-top:1px solid #06B9FD;font-size:15px;text-align:center;padding:9px 0 8px 0;color:#FFF;background:#029DD6;background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));background-image:-moz-linear-gradient(0% 100% 90deg,#0079B1,#029DD6);-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px}.ipro_go .aa_button:hover{text-decoration:none !important;border:1px solid #029DD6;border-bottom:1px solid #00A8EF;font-size:15px;text-align:center;padding:9px 0 8px 0;color:#F0F8FB;background:#0079B1;background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#0079B1),to(#0092BF));background-image:-moz-linear-gradient(0% 100% 90deg,#0092BF,#0079B1);-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px}.ipro_go .aa_button_border{border:1px solid #006699;-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px;background:#029DD6;background-image:-webkit-gradient(linear,0% 0,0% 100%,from(#029DD6),to(#0079B1));background-image:-moz-linear-gradient(0% 100% 90deg,#0079B1,#029DD6)}.ipro_go .aa_button_container{cursor:pointer;display:inline-block;background:#DEF1B8;padding:5px;-moz-border-radius:2px;border-radius:2px;-webkit-border-radius:2px;width:266px}.ipro_go .aa_description{position:absolute;top:22px;left:285px;margin-left:25px;color:#E5F2B1;font-size:15px;z-index:1000}.ipro_go .aa_description strong{color:#FFF;font-weight:normal}
					</style>                       
					<form name="ipro_go" action="' . $_SERVER['PHP_SELF'] . '?page=youtube-importer&s=' . str_replace(' ','+',$_GET['s'] ) . '&goimport=1" method="POST"> 
						
						
						<div class="ipro_go">  
							<div class="aa_a">Import Pro</div>     
							<div class="aa_button_container" onclick="document.ipro_go.submit();">  
								<div class="aa_button_border">          
									<div class="aa_button">Import these posts NOW!</div>  
								</div>  
							</div>  
							<div class="aa_description"><strong>Almost done</strong> - Below is a preview of the posts that will be imported. If everything looks good then click the import button to begin adding posts to your blog!</div>  
						</div>  
					</form>  
				</div>';  
}  }
	

 



 $site_title = get_bloginfo( 'name' );
 $site_url = network_site_url( '/' );
 $site_description = get_bloginfo( 'description' );
 $GETtermz = str_replace(' ','+',$_GET['s'] ); 
 $iGETtermz = str_replace('+',' ',$_GET['s'] ); 



if (isset($_GET['s'])) {   



$youtubetermz = str_replace(" ","+",$_GET['s']);


$url = 'http://gdata.youtube.com/feeds/api/videos?vq=' . $youtubetermz . '&orderby=relevance&max-results=50&start-index=1&alt=json'; 

$get = file_get_contents($url);
$decode = json_decode($get, TRUE); // TRUE for in array format

$youtubetermz = str_replace("+"," ",$youtubetermz);
$youtubetermz = strtoupper($youtubetermz);



echo '<div id="availablethemes">';
  

foreach ($decode['feed']['entry'] as $entry) {

echo '<div class="available-theme">';



$youtubetitle  = $entry['title']['$t'];

$youtubecontent  = $entry['content']['$t'];

$youtubecontent = html_entity_decode($youtubecontent);
$youtubecontent = strip_tags($youtubecontent); 
$youtubecontent = preg_replace("/[^A-Za-z0-9 ]/", '', $youtubecontent);


$youtubelink  = $entry['link'][0]['href'];

$youtubelink  = str_replace("&feature=youtube_gdata","",$youtubelink);

$youtubeid  = str_replace("http://www.youtube.com/watch?","",$youtubelink);

$youtubeid  = str_replace("v=","",$youtubeid);


$youtubetitle  = str_replace("&","and",$youtubetitle);
$youtubetitle = preg_replace("/[^A-Za-z0-9 ]/", '', $youtubetitle);
$youtubetitle = strtoupper($youtubetitle);

$ytimg = 'http://i4.ytimg.com/vi/' . $youtubeid .'/0.jpg';

 $ytvideoembed = '<p><object width="320" height="180"><param name="movie" value="http://www.youtube.com/v/' . $youtubeid . '?autoplayer=1&modestbranding=1&controls=0&iv_load_policy=3&hl=en_US&rel=0&showinfo=1&theme=light"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="never"></param><param name="allowNetworking" value="internal" /><embed src="http://www.youtube.com/v/' . $youtubeid . '?autoplayer=1&modestbranding=1&controls=0&iv_load_policy=3&hl=en_US&rel=0&showinfo=1&theme=light" type="application/x-shockwave-flash" width="320" height="180"  allowScriptAccess="never" allowNetworking="internal"  allowfullscreen="true"></embed></object></p>';

$youtubetermz = strtoupper($youtubetermz);



if (isset($_GET['goimport'])) {   


$imgfilename = $youtubetitle;

$imgfilename = str_replace(' - ','-',$imgfilename ); 
$imgfilename = str_replace(' ','-',$imgfilename ); 
$imgfilename .= '-2013-craniumfitteds.com'; 
$imgfilename .= '.jpg'; 

$bits = file_get_contents($ytimg);

$upload = wp_upload_bits($imgfilename, null, $bits); 

$ipost_image = $upload['url'];


$noplacelikehome = home_url();

$ipost_content = '<a href="' . $ipost_image . '"><img src="' . $ipost_image . '" width="550" alt="' . $imgfilename . '" ></a><div><h4>Check out this ' . $youtubetitle . ' Video below!</h4><blockquote> ' . $youtubecontent . ' - <a href="' . $youtubelink . '" >s/o</a></blockquote>' . $ytvideoembed . '</div>';




// Create post object
$my_post = array(
  'post_title'    => $youtubetitle,
  'post_content'  => $ipost_content,
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_category' => array(1)

);

// Insert the post into the database
//wp_insert_post( $my_post );
$the_post_id = wp_insert_post( $my_post );


$itags_input = array($youtubetermz);
wp_set_post_terms( $the_post_id, $itags_input);

update_post_meta( $the_post_id, 'syndication_permalink', $youtubelink );
update_post_meta( $the_post_id, 'youtubeid', $youtubeid );
update_post_meta( $the_post_id, 'thumbnail', $ipost_image ); 



echo '<a href="' . $noplacelikehome . '/?p=' . $the_post_id . '">' . $youtubetitle . '<br />';

echo '<img src="http://i4.ytimg.com/vi/' . $youtubeid .'/0.jpg" width="200" /></a>';


echo '</div>';

}else{  


echo '<a href="' . $entry['link'][0]['href'] . '">' . $youtubetitle . '<br />';

echo '<img src="http://i4.ytimg.com/vi/' . $youtubeid .'/0.jpg" width="200" /></a>';


echo '</div>';
}///end goimport



}


echo '</div>';

 

} 




echo '</div>';
echo '</div>';

} // end ipro youtube submenu page




// ipro_sublevel_page2() displays the page content for the second submenu
// of the custom Test Toplevel menu
function ipro_sublevel_craniumfitteds() {
    echo "<h2>" . __( 'Test Sublevel2', 'menu-test' ) . "</h2>";
}

?>
