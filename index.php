<?php
/**
 * This file is mostly a tutorial for the template class.
 * In my opinion, PHP is a fine template engine on its own.
 * I'm not a fan of template engines that muddle presentation logic
 * and business logic so the gs_libs template class doesn't do that.
 * Read all the comments below to figure out what to do.
 */


// to start, create an instance of the template class.
// the template class is in gs_libs repo
// the three parameters here are:
//      $tPath (comes from envConfig, so don't worry about it)
//      $tags (set to null here, but you could actually just pass all of the tags in right here if you want)
//      $templateDefaults (array of template defaults, used in cases where you don't need/ want to define on each page,
//      it is also set in envConfig
$template = new template($tPath, null, $templateDefaults);

// This top portion lists all of the *current* template tags in use. During design you can & should
// modify the template to include a tag for anything that may eventually be variable in nature.
// for instance, if you wanted to include the user's name somewhere in the template you could create a tag for that
// in the template and then set it on the page.

// NOTE: basically, all template tags will take any arbitrary string of any arbitrary length.
// they can (and often should) be set as the result of a function call that returns a string.

// for this example, we've named our array $tTags and all our data for our template tags will go into the array
// no real need to instantiate the array like this, but I like to do it that way.
$tTags = array();

// NOTE a lot of these tags can be set to default values, as listed in the envConfig file. They're listed here for demo
// purposes

// ISO language code
$tTags['lang'] = 'en';

// Language direction
$tTags['dir'] = 'ltr';

// arbitrary string of text in <head>, for stylesheets
// this is primarily meant for non-global stuff.
// anything global should be in the template itself.
$tTags['headerSheets'] = '';

// arbitrary string of text in <head>, for javascripts
// this is primarily meant for non-global stuff.
// anything global should be in the template itself.
$tTags['headerScripts'] = '';

// arbitrary string of text at the end of the page after </body>, for javascripts
// this is primarily meant for non-global stuff.
// anything global should be in the template itself.
$tTags['footerScripts'] = '';


// NOTE: the above three tags take any arbitrary string, but if you want better control, you can use
// a method from the template class. That method is the setAssets() method.
// Parameters
//      $path path(s) to the assets. Can be string or array
//      $type what type of assets these are. Options are only 'CSS' or 'Javascript' (case insensitive)
//      $return what to return. Options are only 'string' or 'array'. Default is string so no need to set it unless
//                              you really want to return an array for some silly reason
// usage would be:
// $tTags['headerScripts'] = $template->setAssets('/path/to/script.js', 'javascript');


// arbitrary string of text for breadcrumb. This should be a string coming from a function call
$tTags['breadCrumb'] = '';

// Again, all of the above are *currently* set to defaults, so in order to make a page, they aren't required.
// the two which really are needed are page_title and mainContent

// unique page title
$tTags['page_title'] = '';

// and this is the actual page content
// very often this will be the result of one or more PHP functions, pulling shit from a database
// For static content, you can use the getStaticContent method, as defined in aquaTemplate
// usage: $tTags['mainContent'] = $template->getStaticContent($file); where file is a system path to the static content.
// also, getStaticContent($file) isn't limited to use in the mainContent. It can be anything but must be HTML/CSS/JS. No PHP
$tTags['mainContent'] = '';


// So here goes. Let's do this
// the parameter here in the load method is the template file to use.
// in other words you're not limited to just one template. You could have any infinite number of templates
// also, you could actually have sub-templates if you want
$template->load('template.tpl.php');


// set the title
$tTags['page_title'] = 'Yay! Test Page';

// set the content
// this example uses the getStaticContent function that grabs a static HTML file.
// in reality, you'd probably want to just use the result(s) of some PHP code.
$tTags['mainContent'] = $template->getStaticContent($_SERVER['DOCUMENT_ROOT'] . '/static_content/index.html');

// this method injects the tags into the template object
$template->setTags($tTags);

// this spits out the generated string of HTML for our page.
// and BANG we're done
echo $template->parse();

