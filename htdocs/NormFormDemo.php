<?php
/**
 * include define declarations
 */
require_once '../src/defines.inc.php';
require_once SMARTY;
require_once TNORMFORM;
require_once '../src/NormFormDemo.php';
// --- This is the main call of the norm form process

/* First, define a View object. It will usually be of type FORM. You'll usually need to supply parameters for the template.
 * These parameters are used for setting name and id parameters (and "for" in the label) in the input element as well as
 * its value (see PostParameter class for details).
 */
$view = new View("normFormDemo.tpl", [
    new PostParameter(NormFormDemo::FIRST_NAME),
    new PostParameter(NormFormDemo::LAST_NAME),
    new PostParameter(NormFormDemo::MESSAGE),
]);

/* Create a new instance of your class, supply the view object and (optionally) the paths for the template engine.
 * Then call normForm() to get the party started!
 */
$form = new NormFormDemo($view);
$form->normForm();
