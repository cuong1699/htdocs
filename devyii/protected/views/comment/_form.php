<div class="form">
<?php $form=$this->beginWidget('CActiveForm',array('id'=>'comment-form','enableAjaxValidation'=>false));?>
<p class="note">Field width <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model);?>
<div class="row">
<?php echo $form->labelEx($model,'content');?>
<?php echo $form->textArea($model,'content',array('rows'=>5,'cols'=>45));?>
<?php echo $form->error($model,'content');?>
</div>
<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
</div>
<?php $this->endWidget();?>
</div>