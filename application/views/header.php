<?if($this->session->flashdata('flashSuccess')):?>
<p class='flashMsg flashSuccess'> <?=$this->session->flashdata('flashSuccess')?> </p>
<?endif?>
 
<?if($this->session->flashdata('flashError')):?>
<p class='flashMsg flashError'> <?=$this->session->flashdata('flashError')?> </p>
<?endif?>
 
<?if($this->session->flashdata('flashInfo')):?>
<p class='flashMsg flashInfo'> <?=$this->session->flashdata('flashInfo')?> </p>
<?endif?>
 
<?if($this->session->flashdata('flashWarning')):?>
<p class='flashMsg flashWarning'> <?=$this->session->flashdata('flashWarning')?> </p>
<?endif?>