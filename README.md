# Cafe
### WebApp Template ###  
011221	: 
*************************************************************************************************** 
***************************************************************************************************  
090521	: Hello Elementor Child theme install  
		: Advanced Custom Fields PRO  
		: Classic Editor  
		: Polylang  
		: Which Template Am I  
		: 
***************************************************************************************************  
***************************************************************************************************   
***************************************************************************************************  
***************************************************************************************************  
***************************************************************************************************  
***************************************************************************************************  
***************************************************************************************************  
***************************************************************************************************  
Create a WordPress Theme with Twitter Bootstrap
* Create 4 Different WordPress Themes
* Convert 26 PSD files into WordPress Templates
* Learn how to transform any PSD file into a WordPress Theme
* Learn Good Practices in WordPress Theme Development
* Learn some advanced Features like Custom fields and Custom Post Types
* Understand WordPress Theme Development
* Create Mobile First WordPress Themes
* Learn how to Write Secure WordPress Code
* Learn how to create Options Pages in WordPress
*****************************************************************************************************
# Become a WordPress Developer: Unlocking Power with Code #
" https://www.youtube.com/watch?v=FVqzKAUsM68&ab_channel=LearnWebCode "  
  
The WordPress REST API:	https://developer.wordpress.org/rest-api/reference/	|| sitename/wp-json/wp/v2/resource  

Resource						Base Route  
============================================================================  
Posts							/wp/v2/posts  
Post Revisions				/wp/v2/posts/<id>/revisions  
Categories					/wp/v2/categories  
Tags								/wp/v2/tags  
Pages							/wp/v2/pages  
Page Revisions				/wp/v2/pages/<id>/revisions  
Comments					/wp/v2/comments  
Taxonomies					/wp/v2/taxonomies  
Media							/wp/v2/media  
Users							/wp/v2/users  
Post Types					/wp/v2/types  
Post Statuses					/wp/v2/statuses  
Settings						/wp/v2/settings  
Themes							/wp/v2/themes  
Search							/wp/v2/search  
Block Types					/wp/v2/block-types  
Blocks							/wp/v2/blocks  
Block Revisions				/wp/v2/blocks/<id>/autosaves/  
Block Renderer				/wp/v2/block-renderer  
Block Directory Items		/wp/v2/block-directory/search  
Plugins							/wp/v2/plugins  
============================================================================  
  

5520***FUNCTIONS***  
  
  
	<?php  
	  
		function greet(&name, $color) {  
			echo "<p>Hi, my name is $name and my favourite color is $color.</p>";  
		}  
		  
		greet('John', 'blue');  
		greet('Jane', 'green');  
	  
	?>  
	
	<h1><?php  bloginfo('name');  ?></h1>				:: bloginfo() gives us a lot of information about a website; Site title in this particular example...  
	<p><?php  bloginfo('description'); ?></p>			:: dinamically displaying a site tagline  
	
1:08:50***ARRAYS***    

	<?php  
	  
		$myName = "Brad";  
	  
	?>  
	<p>Hi, my name is <?php  echo $myName; ?></p>  
	  
	In PHP, an array is a collection of mulstiple values.  
	  

	
	
1:13:55 ***LOOPING***  
  
		<?php  
	  
		$names = array('Brad', 'John', 'Jane', 'Meowsalot');  
	  
		?>  
		<p>Hi, my name is <?php echo $names[0]; ?></p>  
		
		  
		
		<?php  
		
			while(have_posts()) {  
				the_post(); ?>  
				  
				<h2>Hello</h2>  
			<?php }  
		  
		?>  
==============================================================================  
testing:  
<?php  
		  
	while(have_posts()) {  
		the_post(); ?>  
		  
		<h2><?php the_title(); ?></h2>					<!-- the_title() displays a blog's title. This way we have a title for each post.-->  
		<?php the_content(); ?>								<!-- the content() displays a post's content; ?>
		<hr>															<!-- "horizontal rule just for making visual separation between each post--->"
	<?php }

?>

<?php
		
	while(have_posts()) {
		the_post(); ?>
		
		<h2><a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a></h2>			
		<?php the_content(); ?>							<!-- the content() displays a post's content; ?>  
		<hr>											<!-- "horizontal rule just for making visual separation between each post--->  
	<?php }  

?>  
  
