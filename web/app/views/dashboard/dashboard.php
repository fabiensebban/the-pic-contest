<?php
/**
* dashboard layout
*/

use Core\Language;

?>

<!-- Main content -->
<section class="content">

<!-- boxes -->
<div class="row">

<div class="col-md-12">
	<!-- Horizontal Form -->
	<div class="box box-info">
	  <div class="box-header with-border">
	    <h3 class="box-title">Information générals</h3>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->
	  <form class="form-horizontal">
	    <div class="box-body">
	      <div class="form-group">
	        <label for="titre" class="col-sm-2 control-label">Titre</label>
	        <div class="col-sm-10">
	          <input type="email" class="form-control" id="titre" name="titre" placeholder="Entrer titre...">
	        </div>
	      </div>
	      <div class="form-group">
	      	<label for="dateDebut" class="col-sm-2 control-label">Date de début</label>
	        <div class="col-sm-10">
		        <div class="input-group">
		          <div class="input-group-addon">
	                <i class="fa fa-calendar"></i>
	              </div>
	              <input id="dateDebut" name="dateD" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="">
	            </div>
	            <!-- /.input group -->
		      </div>
	      </div>
	      <div class="form-group">
	      	<label for="dateFin" class="col-sm-2 control-label">Date de fin</label>
	        <div class="col-sm-10">
		        <div class="input-group">
		          <div class="input-group-addon">
	                <i class="fa fa-calendar"></i>
	              </div>
	              <input id="dateFin" name="dateF" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="">
	            </div>
	            <!-- /.input group -->
		      </div>
	      </div>
	      <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input name="participeAvant" type="checkbox"> Participer AVANT la date de lancement du concour
                      </label>
                    </div>
                  </div>
                </div>
	      <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
              <textarea id="description" class="form-control" rows="3" placeholder="Enter description..." name="description"></textarea>
          	</div>
          </div>
         <div class="form-group">
            <label for="reglement" class="col-sm-2 control-label">Réglement</label>
            <div class="col-sm-10">
              <textarea id="reglement" class="form-control" rows="3" placeholder="Enter réglement..." name="reglement"></textarea>
          	</div>
          </div>
          <div class="form-group">
            <label for="lots" class="col-sm-2 control-label">Prix à gagner</label>
            <div class="col-sm-10">
              <textarea id="lots" class="form-control" rows="3" placeholder="Enter réglement..." name="lots"></textarea>
          	</div>
          </div>
          <div class="form-group">
	        <label for="participantsMax" class="col-sm-2 control-label">Nombres de participants maximum</label>
	        <div class="col-sm-10">
	          <input class="form-control" id="participantsMax" name="nbParticipantsMax" placeholder="Entrer le nombre de participants max...">
	        </div>
	      </div>
	      <div class="form-group">
	        <label for="themeConcour" class="col-sm-2 control-label">Thème du concour</label>
	        <div class="col-sm-10">
	          <input class="form-control" id="themeConcour" name="theme" placeholder="Entrer le thème du concour...">
	        </div>
	      </div>
	      <div class="form-group">
            <label for="imageConcour" class="col-sm-2 control-label">Image du concour</label>
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