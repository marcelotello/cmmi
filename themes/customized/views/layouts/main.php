<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->language;?>" lang="<?php echo Yii::app()->language;?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="<?php echo Yii::app()->charset;?>" />
	<meta name="language" content="<?php echo Yii::app()->language;?>" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
<?php $logo=Yii::app()->theme->baseUrl . '/images/cmmiup.png'; ?>

	<div id="header">
		  
		 <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		 
		 <div id="logo"><?php echo '<img src ="'. $logo .'">'; ?></div> 
		 
		 	
	</div><!-- header -->
	<div id="mainMbMenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Dashboard', 'url'=>array('/dashboard')),
                array('label'=>'CMMI Model',
                  'items'=>array(
				    array('label'=>'Generic Goals','url'=>array('/GenericGoals/admin')),
					array('label'=>'Generic Practices','url'=>array('/GenericPractices/admin')),
                    array('label'=>'Process Area Categories','url'=>array('/ProcessAreaCategory/admin')),
					array('label'=>'Maturity Levels','url'=>array('/MaturityLevel/admin')),
					array('label'=>'Process Area','url'=>array('/ProcessArea/admin')),
					
					
                  ),
                ),
				 array('label'=>'Projects',
                  'items'=>array(
				    array('label'=>'Roles','url'=>array('/Roles/admin')),
					array('label'=>'Departments','url'=>array('/Departments/admin')),
                    array('label'=>'Projects','url'=>array('/Projects/admin')),
					array('label'=>'Projects teams','url'=>array('/ProjectsRoles/admin')),
					
                  ),
                ),
				 array('label'=>'Reviews',
                  'items'=>array(
				    array('label'=>'Reviews types','url'=>array('/ReviewTypes/admin')),
				    array('label'=>'Reviews tasks','url'=>array('/ReviewTasks/admin')),
					array('label'=>'Tasks coverages','url'=>array('/ReviewTaskCoverage/admin')),
					array('label'=>'Manage Reviews','url'=>array('/ProjectsReviews/admin')),
					array('label'=>'Calendar', 'url'=>array('/Calendar/index')),
					
                  ),
                ),
				 array('label'=>'Incidents',
                  'items'=>array(
				    array('label'=>'Incidents','url'=>array('/Incidents/admin')),
				  ),
                ),
                array('label'=>'PIIDB',
                  'items'=>array(
                    array('label'=>'Sub 1', 'url'=>array('/site/page','view'=>'sub1')),
                    array('label'=>'Sub 2',
                      'items'=>array(
                        array('label'=>'Sub sub 1', 'url'=>array('/site/page','view'=>'subsub1')),
                        array('label'=>'Sub sub 2', 'url'=>array('/site/page','view'=>'subsub2')),
                      ),
                    ),
                  ),
                ),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				 /* array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), */
        /* array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest), */
        /*array('label'=>'Rights', 'url'=>array('/rights'), 'visible'=>!Yii::app()->user->isGuest), */
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
				/*array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)*/
				
            ),
    )); ?>
	
	</div><!-- mainMBmenu -->
		 <!--?php
        $this->widget('ext.slider.slider', array(
            'container'=>'slideshow',
            'width'=>1280, 
            'height'=>240, 
            'timeout'=>6000,
            'infos'=>true,
            'constrainImage'=>true,
            'images'=>array('01.jpg','02.jpg','03.jpg','04.jpg'),
            'alts'=>array('CMMI UP','CMMIP UP','CMMI UP','CMMI UP'),
            'defaultUrl'=>Yii::app()->request->hostInfo
            )
        );
        ?>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
