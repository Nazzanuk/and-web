<div data-component="flex">
    <div ng-controller="FlexController">


            <?php if( get_row_layout() == 'hero' ): ?>

                <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                <div class="<?php the_sub_field('size') ?>">
                    <div class="<?php the_sub_field('size') ?> parallax" style="background-image: url('<?php echo $image[0] ?>')"></div>
                    <h1 class="hero-title"><?php the_sub_field('title') ?></h1>
                </div>

            <?php elseif( get_row_layout() == 'content' ): ?>

                <div class="quote" style="min-height: initial;">
                    <?php if (get_sub_field('title')) { ?>
                    <div class="title"><?php the_sub_field('title') ?></div>
                    <?php } ?>

                    <div class="quote-center-text">
                        <p><?php the_sub_field('text') ?></p>

                        <?php if( have_rows('link') ): while ( have_rows('link') ) : the_row(); ?>

                        <a class="and-button" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>

                        <?php endwhile; endif; ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'content-html' ): ?>

                <div class="quote" style="min-height: initial;">
                    <?php if (get_sub_field('title')) { ?>
                    <div class="title"><?php the_sub_field('title') ?></div>
                    <?php } ?>

                    <div class="container" style="text-align: left">
                        <p><?php the_sub_field('text') ?></p>

                        <?php if( have_rows('link') ): while ( have_rows('link') ) : the_row(); ?>

                        <a class="and-button" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>

                        <?php endwhile; endif; ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'carousel' ): ?>

                <div class="quote" style="min-height: initial;">
                    <?php if (get_sub_field('title')) { ?>
                        <div class="title"><?php the_sub_field('title') ?></div>
                    <?php } ?>

                    <div class="owl-carousel and-carousel">
                        <?php if( have_rows('images') ): while ( have_rows('images') ) : the_row(); ?>
                            <div>
                                <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                                <img src="<?php echo $image[0] ?>"/>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'divider' ): ?>

                <div class="divider"></div>

            <?php elseif( get_row_layout() == 'links' ): ?>

                <div class="sub-pages">
                    <?php if( have_rows('links') ): while ( have_rows('links') ) : the_row(); ?>
                        <a class="sub-page <?php the_sub_field('active') ?>" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>
                    <?php endwhile; endif; ?>
                </div>

            <?php elseif( get_row_layout() == 'people' ): ?>

                <div class="people" ng-controller="PeopleController">
                    <?php if( have_rows('links') ): while ( have_rows('links') ) : the_row(); ?>
                        <a class="sub-page <?php the_sub_field('active') ?>" href="<?php the_sub_field('url') ?>"><?php the_sub_field('text') ?></a>
                    <?php endwhile; endif; ?>
                </div>

            <?php endif; ?>


    </div>
</div>