<?php
/**
 * The index page basically just checks whether the user has our cookie
 * If they do, they're redirected right to the test page.  If not, they can "register"
 * on this page and then be redirected over to test.
 */

// if the user has a valid cookie redirect them to the chat
if ((isset($_SESSION['userKey'])) && (false !== $users->userExists($_SESSION['userKey']))) {
    header('Location: test.php');
    exit;
}

$template = new template($tPath, null, $templateDefaults);

$tTags = array();

$template->load('template.tpl.php');

// set the title
$tTags['page_title'] = _('Please Register: Open Accessibility Testing');

$preFormContent = "<p>In order to gather the best data possible, we need some information about your computer.";
$preFormContent .= "Please enter the information below to get started.</p>";
$preFormContent .= "<p>All fields are required</p>";

$form = new gForm();

require($_SERVER['DOCUMENT_ROOT'] . '/lib/vendor/gs_libs/gFormConfig.php');

$form->setConfigOpts($_gFormConfig);

//process form submission
if (isset($_POST['submit'])) {

    //add the POST values to the presets
    $form->setPresets($_POST);

    $form->validate('0', 'name', _('Name cannot be blank'));

    //@TODO VALIDATE ME
    //browserBrand
    //browserVersion
    //operatingSystem
    //osVersion
    //uaString
    //atType
    //atBrand
    //atVersion

    //if valfailed is FALSE then we've passed validation
    if (false == $form->valfailed) {
        try {
            //@TODO CHANGE ME
            if (false == $users->addUser($_POST['name'])) {
                throw new Exception(_('Could Not Add User'));
            } else {
                header('Location: /chat.php');
                exit;
            }
        } catch (PDOException $e) {
            //@TODO add the exception message to the form info
        }
    }
}

$warnAttrs = array('role' => 'alert');
$form->formWarn(null, $warnAttrs);
$formAttrs = array('accept-charset' => 'utf-8');
$form->formStart('', $formAttrs);
$form->hiddenbox('ssid', session_id());

$form->editbox(_('Browser'), 'browserBrand', true);

//@TODO create datalist with existing unique values

$form->editbox(_('Browser Version'), 'browserVersion', true);

//@TODO create datalist with existing unique values

$form->editbox(_('Operating System'), 'operatingSystem', true);

//@TODO create datalist with existing unique values

$form->editbox(_('Operating System Version'), 'osVersion', true);

//@TODO create datalist with existing unique values

$form->editbox(_('Assistive Technology'), 'atType', true);

//@TODO create datalist with existing unique values

$form->editbox(_('Brand of Assistive Technology'), 'atBrand', true);

//@TODO create datalist with existing unique values

$form->editbox(_('Assistive Technology Version'), 'atVersion', true);

//@TODO create datalist with existing unique values

$form->formEnd();

$tTags['registrationForm'] = $preFormContent;
$tTags['registrationForm'] .= $form->returnOutput();

$template->setTags($tTags);

echo $template->parse();
