<?php
/**
 * This page pulls a random test up and presents it to the user for their comments
 */

$template = new template($tPath, null, $templateDefaults);

$tTags = array();

$template->load('template.tpl.php');

// set the title
// @TODO see what we can do to make this unique and informative
$tTags['page_title'] = _('Next test!');

$form = new gForm();

require($_SERVER['DOCUMENT_ROOT'] . '/lib/vendor/gs_libs/gFormConfig.php');

$form->setConfigOpts($_gFormConfig);

//process form submission
if (!isset($_POST['submit'])) {
//@TODO add test file's description here.

}
else{
    //add the POST values to the presets
    $form->setPresets($_POST);

    //@TODO VALIDATE ME
    $form->validate('0', 'name', _('Name cannot be blank'));

    //if valfailed is FALSE then we've passed validation
    if (false == $form->valfailed) {
        try {
            if (false == $users->addUser($_POST['name'])) {
                throw new Exception(_('Could Not Add Record'));
            } else {
                header('Location: /test.php');
                exit;
            }
        } catch (PDOException $e) {
            //@TODO add the exception message to the form info as form info
        }
    }
}

$warnAttrs = array('role' => 'alert');
$form->formWarn(null, $warnAttrs);
$formAttrs = array('accept-charset' => 'utf-8');
$form->formStart('', $formAttrs);
$form->hiddenbox('ssid', session_id());

// RADIO BUTTONS
fieldset_start('Did the file do what it said it would?');
// @TODO YES/NO
fieldset_end();


$form->editbox(_('Enter Comments Here'), 'comments', false);

$form->formExp("Comments are required if you select 'No' in the field above");

$form->formEnd();

$tTags['registrationForm'] .= $form->returnOutput();

$template->setTags($tTags);

echo $template->parse();
