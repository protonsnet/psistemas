<?php
  require_once 'app/config/conexao.php';
  require_once 'app/header.php';
?>
  <!-- BEGIN content -->
  <div id="content">
    <!-- begin post -->
    <div class="single">
      <h2>Contato</h2>
      <p>Estamos ansiosos para colaborar com você em seu próximo projeto de software. Se você tiver uma ideia ou desafio que gostaria de abordar, entre em contato com a PSistemas hoje e vamos tornar essa visão realidade.</p>
    </div>
    <!-- end post -->
    <!-- begin comments -->
    <div id="comments">
      <div id="respond">
        <form action="#" method="post" id="commentform">
          <p>
            <input type="text" name="author" id="author" value="" size="22" tabindex="1" />
            <label for="author"><small>Nome</small></label>
          </p>
          <p>
            <input type="text" name="email" id="email" value="" size="22" tabindex="2" />
            <label for="email"><small>Email</small></label>
          </p>
          <p>
            <input type="text" name="url" id="url" value="" size="22" tabindex="3" />
            <label for="url"><small>Website</small></label>
          </p>
          <p>
            <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
          </p>
          <p>
            <button name="submit" type="submit" id="submit">Enviar</button>
          </p>
        </form>
      </div>
    </div>
    <!-- end comments -->
  </div>
  <!-- END content -->
<?php
  require_once 'app/right.php';
  require_once 'app/footer.php';
?>