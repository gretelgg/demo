<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;


// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap-responsive.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/plantilla.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/responsive.css');


// Adjusting content width
if ($this->countModules('izquierda') && $this->countModules('derecha'))
{
	$span = "span5";
}
elseif ($this->countModules('izquierda') && !$this->countModules('derecha'))
{
	$span = "span8";
}
elseif ($this->countModules('derecha') && !$this->countModules('izquierda'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="images/favicon.png" />
	<jdoc:include type="head" />
</head>

<body>
	<div class="body container">
		<div class="row-fluid">
			<header class="header row-fluid" role="banner">
				<div class="span6">
					<?php if ($this->countModules('logo')) : ?>
					<jdoc:include type="modules" name="logo" style="none" />
					<?php endif; ?>
				</div>
				<div class="span6">
					<?php if ($this->countModules('top')) : ?>
					<jdoc:include type="modules" name="top" style="none" />
					<?php endif; ?>	
				</div>
			</header>
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
 
						<!-- Everything you want hidden at 940px or less, place within here -->
						<?php if ($this->countModules('menu')) : ?>
							<nav class="navigation" role="navigation">
								<jdoc:include type="modules" name="menu" style="none" />
							</nav>
						<?php endif; ?>
					</div>
				</div>
			</div>	
		</div>
		<div class="row-fluid">
			<?php if ($this->countModules('ruta')) : ?>
				<jdoc:include type="modules" name="ruta" style="none" />
			<?php endif; ?>
		</div>
		<div class="row-fluid">
			<?php if ($this->countModules('galeria')) : ?>
				<jdoc:include type="modules" name="galeria" style="none" />
			<?php endif; ?>
		</div>
		<div class="row-fluid">
			<?php if ($this->countModules('izquierda')) : ?>
				<div id="left" class="span3">
					<jdoc:include type="modules" name="izquierda" style="xhtml" />
				</div>
			<?php endif; ?>
			<main id="content" role="main" class="<?php echo $span; ?>">
				<jdoc:include type="modules" name="arriba" style="xhtml" />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="abajo" style="none" />
			</main>
			<?php if ($this->countModules('derecha')) : ?>
				<div id="right" class="span3">
					<jdoc:include type="modules" name="derecha" style="well" />
				</div>
			<?php endif; ?>
		</div>
	</div>
	<footer class="footer" role="contentinfo">
		<div class="container">
			<?php if ($this->countModules('footer')) : ?>
				<div id="footer" class="row-fluid">
					<jdoc:include type="modules" name="footer" style="xhtml" />
				</div>
			<?php endif; ?>
		</div>
	</footer>
</body>
</html>
