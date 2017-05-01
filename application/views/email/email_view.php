<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Envoyer un e-mail</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <form class="form-group" method="POST" action="<?php echo site_url('SendEmail_Controller'); ?>/send">
              <label>Destinataire :</label>
              <input type="email" class="form-control" placeholder="destinataire" name="destinataire" required="1" />

              <label>Sujet :</label>
              <input type="text" class="form-control" placeholder="Sujet" name="sujet" required="1" />

              <label>Message :</label>
              <textarea class="form-control" name="message" required="1"></textarea>

              <button type="submit" class="btn btn-success myButton-success">Envoyer</button>
              
            </form>
        </div>

    </div>
</div>