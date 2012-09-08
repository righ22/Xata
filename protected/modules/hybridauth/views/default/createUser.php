<div class="form">
	<h1>Choose a username and an email address</h1>

	<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'create-user-form',
			'enableAjaxValidation'=>false,
		)); 
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($user); ?>
  <?php
     $user_data=array('displayName'=>'','email'=>'');//null;
     $ha = Yii::app()->getModule('hybridauth')->getHybridAuth();
     if($ha){
       $google = $ha->getAdapter('google');
       if($google->isUserConnected())
         $user_data=$google->getUserProfile();
       $yahoo = $ha->getAdapter('yahoo');
       if($yahoo->isUserConnected())
         $user_data=$yahoo->getUserProfile();
       $fb = $ha->getAdapter('facebook');
       if($fb->isUserConnected())
         $user_data=$fb->getUserProfile();
         
     }
  ?>
	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('value'=>trim($user_data->displayName),'size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password'); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php 
    $eml_par=array('value'=>$user_data->email,'size'=>60,'maxlength'=>128);
    if($user_data->email!=='')
            $eml_par['readonly']='true';
    echo $form->textField($user,'email',$eml_par); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->