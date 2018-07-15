<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$view->extend('MauticCoreBundle:Default:content.html.php');

$view['slots']->set('mauticContent', 'leadImport');
$view['slots']->set('headerTitle', $view['translator']->trans('mautic.lead.import.leads', ['%object%' => $view['request']->getParameter('object')]));

?>

<div class="scott" style="text-align: center;">
       <h2>Want to seriously fuck up a working relationship?</h2>
       <h3><span style="color:darkblue">Hit that blue import button</span> without first snapshotting the database.</h3>
       <h6 style="color:#aaa">(I don't know how else to fucking say it.)</h6>
</div>

<?php if (isset($form['file'])): ?>
<?php echo $view->render('MauticLeadBundle:Import:upload_form.html.php', ['form' => $form]); ?>
<?php else: ?>
<?php echo $view->render('MauticLeadBundle:Import:mapping_form.html.php', ['form' => $form]); ?>
<?php endif; ?>
