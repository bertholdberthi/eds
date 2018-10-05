<?php
/*
Template Name: Contact
*/
?>
<?php get_header()?>
<?php while (have_posts()) : the_post();?>
  <!--CONTENU!-->
  <div class="row">
            <div class="col-12">
            <h1><?php the_title();?></h1>
            <?php the_content();
                                $form  = get_field("contact_form");
                                //var_dump($form); 
                                $formulaireID = $form[0]->ID; 
                               // var_dump($formulaireID);
                               // echo do_shortcode( '  [contact-form-7 id="19" title="Formulaire de contact 1"]    ' );
                            ?>
         
            <div class="contact-map">
                
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.6579475449275!2d5.511763515737369!3d50.61489317949846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0f9717eca2d49%3A0x3986771b65068b3f!2sC.M.I.+s.a.!5e0!3m2!1sfr!2sbe!4v1538559107948" frameborder="0" style="border:0" allowfullscreen></iframe>             
            </div>
        </div>
        <!--FIN CONTENU!-->
<?php endwhile;?>
<?php get_footer()?>