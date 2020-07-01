<?php

add_action('widgets_init', 'registraAlPatrocinadoresPalestrasWidget');

function registraAlPatrocinadoresPalestrasWidget()
{
    register_widget(AlPatrocinadoresPalestrasWidget::class);
}

class AlPatrocinadoresPalestrasWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'AlPatrocinadoresPalestrasWidget',
            'Patrocinadores palestra',
            ['description' => 'Selecione os patrocinadores da palestra']
        );
    }

    public function form($instance)
    {
        ?>

        <p>
            <input type="checkbox" 
                id="<?= $this->get_field_id('caelum'); ?>"
                name="<?= $this->get_field_name('caelum'); ?>"
                value="1" <?php checked(1, $instance['caelum']) ?>>
            <label for="<?= $this->get_field_id('caelum'); ?>">Caelum</label>
        </p>

        <p>
            <input type="checkbox" 
                id="<?= $this->get_field_id('casa-do-codigo'); ?>"
                name="<?= $this->get_field_name('casa-do-codigo'); ?>"
                value="1" <?php checked(1, $instance['casa-do-codigo']) ?>>
            <label for="<?= $this->get_field_id('casa-do-codigo'); ?>">Casa do Código</label>
        </p>

        <p>
            <input type="checkbox" 
                id="<?= $this->get_field_id('hipsters'); ?>"
                name="<?= $this->get_field_name('hipsters'); ?>"
                value="1" <?php checked(1, $instance['hipsters']) ?>>
            <label for="<?= $this->get_field_id('hipsters'); ?>">Hipsters</label>
        </p>
        <?php
    }

    public function widget( $args, $instance ) {
        ?>

        <section class="patrocinadores-principais">
            <h3 class="titulo-patrocinadores">Patrocinadores</h3>
            <ul class="lista-patrocinadores">
                <?php if(!empty($instance['caelum'])){ ?>
                    <li><img src="<?= plugin_dir_url(__FILE__) . '../images/caelum.svg'; ?>" alt="Caelum"></li>
                <?php } ?>

                <?php if(!empty($instance['casa-do-codigo'])){ ?>
                    <li><img src="<?= plugin_dir_url(__FILE__) . '../images/cdc.svg'; ?>" alt="Casa do Código"></li>
                <?php } ?>

                <?php if(!empty($instance['hipsters'])){ ?>
                    <li><img src="<?= plugin_dir_url(__FILE__) . '../images/hipsters.svg'; ?>" alt="Hipsters"></li>
                <?php } ?>
            </ul>
        </section>


        <?php
    } 

    public function update($new_instance, $old_instance)
    {
        $instance = Array();
        $instance['caelum'] = !empty($new_instance['caelum']) ? strip_tags($new_instance['caelum']) : '';
        $instance['casa-do-codigo'] = !empty($new_instance['casa-do-codigo']) ? strip_tags($new_instance['casa-do-codigo']) : '';
        $instance['hipsters'] = !empty($new_instance['hipsters']) ? strip_tags($new_instance['hipsters']) : '';
        return $instance;
    }
    
}

?>