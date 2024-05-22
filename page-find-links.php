<?php
/*
Template Name: Find Links
*/

get_header(); // Include the site header

$domain = 'examplewebsite.com'; // Change to your desired domain
$links = find_links_from_domain($domain); // Use the custom function
print_r($links);
echo '<h2>Posts with Links from ' . $domain . '</h2>';
echo '<ul>';
foreach ($links as $link) {
  echo '<li><a href="' . $link . '">' . $link . '</a></li>'; // Display found links
}
echo '</ul>';
?>
<p>Helllo</p>
<?php
get_footer(); // Include the site footer
?>
