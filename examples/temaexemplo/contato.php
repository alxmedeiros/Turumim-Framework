<?php /* Template Name: Contato */ ?>
<?php get_header(); ?>
<section id="main-content" class="grid_16">
    <?php while(have_posts()): the_post(); ?>
	   <article>
            <header>
                <h2><?php the_title(); ?></h2>
            </header>

            <?php the_content(); ?>
            
            <?php
                // Cria o formulário
                $formulario = new FormularioContato("sergiovilar.r@gmail.com", "Portal PMJP", "noreply@joaopessoa.pb.gov.br", "Envio a partir do site");
                $formulario->showForm(get_permalink()."?post=true","contato","contato-form");

                // Define os campos
                $formulario->text("nome","Nome",true);
                $formulario->text("email","Email",true,"email-field");
                $formulario->select("genero","Gênero",array("Masculino","Feminino","Lésbica","Gay","Bissexual","Transexual"));
                $formulario->select("etnia","Etnia",array("Branca","Afro-brasileira","Negra","Oriental","Indígena"));
                $formulario->text("datanasc","Data de nascimento",false,"data-field");
                $formulario->textarea("endereco","Endereço");
                $formulario->text("foneresidencial","Telefone Residencial",false,"fone-field");
                $formulario->text("fonecomercial","Telefone Comercial",false,"fone-field");
                $formulario->text("fonecelular","Celular",false,"fone-field");
                $formulario->textarea("mensagem","Mensagem");

                // Botão de enviar
                $formulario->closeForm("Enviar");
            ?>

        </article>
    <?php endwhile; ?>

</section>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>            