<?php
/**
* createContest layout
*/

use Core\Language;

?>


<!-- Main content -->
<section class="content">

<!-- boxes -->
<div class="row">

<div class="col-md-12">

    <?php
    if ($data['saved_correctly'])
        {
    ?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Le concour à été enregistré correctement</h3>
        </div>
    </div>

    <?php } ?>

	<?php if($data['is_error'])
		{
	?>
	<div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Erreurs dans le formulaire</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
          	<?php
          		foreach ($data['is_valid'] as $value) {
			?>
  			<div class="form-group has-error">
	      		<label class="col-sm-10 control-label">
	      			<i class="fa fa-times-circle-o" style="padding-right: 15px;"></i>
	      			<?php echo $value; ?>
	      		</label>
		      </div>
		      <?php 
		  		} ?>
		  </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <?php 
		} 
	?>

	<!-- Horizontal Form -->
	<div class="box box-info">
	  <div class="box-header with-border">
	    <h3 class="box-title">Information générals</h3>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->
	  <form action="/backoffice/contest/create" method="post" class="form-horizontal">
	    <div class="box-body">
	      <div class="form-group">
	        <label for="titre" class="col-sm-2 control-label">Titre *</label>
	        <div class="col-sm-10">
	          <input class="form-control" id="titre" name="titre" placeholder="Entrer titre..."
	          		 value="<?php if(isset($data['post'])) echo $data['post']['titre']; ?>">
	        </div>
	      </div>
	      <div class="form-group">
	      	<label for="dateDebut" class="col-sm-2 control-label">Date de début *</label>
	        <div class="col-sm-10">
		        <div class="input-group">
		          <div class="input-group-addon">
	                <i class="fa fa-calendar"></i>
	              </div>
	              <input id="dateDebut" name="dateD" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" 
	              		 data-mask="" value="<?php if(isset($data['post'])) echo $data['post']['dateD'];?>">
	            </div>
	            <!-- /.input group -->
		      </div>
	      </div>
	      <div class="form-group">
	      	<label for="dateFin" class="col-sm-2 control-label">Date de fin *</label>
	        <div class="col-sm-10">
		        <div class="input-group">
		          <div class="input-group-addon">
	                <i class="fa fa-calendar"></i>
	              </div>
	              <input id="dateFin" name="dateF" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" 
	              		 value="<?php if(isset($data['post'])) echo $data['post']['dateF'];?>" data-mask="">
	            </div>
	            <!-- /.input group -->
		      </div>
	      </div>
	      <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input name="participeAvant" type="checkbox" value="Yes"
                            <?php if(isset($data['post']) && ($data['participeAvant'] == "Yes")) echo "checked"; ?>> Participer AVANT la date de lancement du concour
                      </label>
                    </div>
                  </div>
                </div>
	      <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
              <textarea id="description" class="form-control" rows="3" placeholder="Enter description..." 
              			name="description"><?php if(isset($data['post'])) echo $data['post']['description'];?></textarea>
          	</div>
          </div>
         <div class="form-group">
            <label for="reglement" class="col-sm-2 control-label">Réglement</label>
            <div class="col-sm-10">
              <textarea id="reglement" class="form-control" rows="3" placeholder="Enter réglement..." name="reglement">
              	<?php if(isset($data['post'])) echo $data['post']['reglement'];?></textarea>
          	</div>
          </div>
          <div class="form-group">
            <label for="lots" class="col-sm-2 control-label">Prix à gagner</label>
            <div class="col-sm-10">
              <textarea id="lots" class="form-control" rows="3" placeholder="Enter réglement..." name="lots">
              	<?php if(isset($data['post'])) echo $data['post']['lots'];?></textarea>
          	</div>
          </div>
          <div class="form-group">
	        <label for="participantsMax" class="col-sm-2 control-label">Nombres de participants maximum *</label>
	        <div class="col-sm-10">
	          <input class="form-control" id="participantsMax" name="nbParticipantsMax" 
	          		 value="<?php if(isset($data['post'])) echo $data['post']['nbParticipantsMax'];?>" placeholder="Entrer le nombre de participants max...">
	        </div>
	      </div>
            <div class="form-group">
                <label for="nbvotesParParticipantsMax" class="col-sm-2 control-label">Nombres de votes par participants maximum *</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nb_votes_max" name="nb_votes_max"
                           value="<?php if(isset($data['post'])) echo $data['post']['nb_votes_max'];?>" placeholder="Entrer le nombre de votes par participants max...">
                </div>
            </div>
	      <div class="form-group">
	        <label for="themeConcour" class="col-sm-2 control-label">Thème du concour</label>
	        <div class="col-sm-10">
	          <input class="form-control" id="themeConcour" name="theme" placeholder="Entrer le thème du concour..."
	          		 value="<?php if(isset($data['post'])) echo $data['post']['theme'];?>">
	        </div>
	      </div>
	      <div class="form-group">
            <label for="imageConcour" class="col-sm-2 control-label">Image du concour *</label>
            <div class="col-sm-10">
	            <input type="file" id="imageConcour" name="image_concours">
	            <p class="help-block">Cette image s'affichera lorsque les utilisateurs voudront accéder au concour</p>
        	</div>
          </div>
        </div>
		<div class="box-footer">
	      <button type="submit" class="btn btn-default">Cancel</button>
	      <button type="submit" class="btn btn-info pull-right">Sauvegarder</button>
	    </div>
	    <!-- /.box-footer -->
	</div>
	<!-- /.box-body -->
	    
	  </form>
	</div>
	<!-- /.box -->
</div>	

</div><!-- /.row -->
</section><!-- /.content -->
