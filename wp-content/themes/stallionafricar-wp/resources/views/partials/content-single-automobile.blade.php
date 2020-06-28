<?php 
$categories = get_the_terms($post->ID, 'automobile_category');
?>
<section id="automobile-single">
    <div class="container">
        <div class="automobile-description">
            <div class="flex justify-start w-full items-center">
                <div class="w-full lg:w-2/3">
                    <img src="<?= get_field('main_image', $post->ID) ?>" alt="<?= $post->post_title ?>" />
                    <div class="subtext">
                        <p>Click the above image to watch the video</p>
                    </div>
                    <div class="automobile-engine">
                        <div class="flex">
                            <div class="w-full lg:w-1/3 text-center attributes">
                                <p><strong>5.6</strong><sub>L</sub>
                                    <br />
                                    Engine </p>
                            </div>
                            <div class="w-full lg:w-1/3 attributes text-center">
                                <p><strong>7</strong><sub>-Speed AT</sub>
                                    <br />
                                    Transmission </p>
                            </div>
                            <div class="w-full lg:w-1/3 attributes text-center">
                                <p><strong>298</strong><sub>kw@</sub><strong>500</strong><sub>rpm</sub>
                                    <br />
                                    Power </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="flex justify-center items-center flex-col">
                        <div class="auto-title">
                            <p><?= $post->post_title ?> | <a href="<?= get_category_link($categories[0]->term_id) ?>" title="Other Models">Other <?= $categories[0]->name; ?> Models </a></p>
                        </div> 
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#specification">Specification</a>
                        </div>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#specification">Purchase Price: <?= get_field('price', $post) ?></a>
                        </div>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#quote">Request for Quote</a>
                        </div>
                        <div class="auto-quicklinks w-full">
                            <a class="text-black auto-single-button flex justify-center" href="#specification">Book a Test Drive</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="exterior" class="automobile-view w-screen h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col">
            <?php 
                $exterior = acf_photo_gallery('exterior', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section id="interior" class="automobile-view w-screen h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col">
            <?php 
                $exterior = acf_photo_gallery('interior', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section id="top_view" class="automobile-view w-screen h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col">
            <?php 
                $exterior = acf_photo_gallery('top_view', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<section id="side_view" class="automobile-view w-screen h-screen relative">
    <div class="automobile-view-container">
        <div class="flex justify-center items-center flex-col">
            <?php 
                $exterior = acf_photo_gallery('side_view', $post->ID);
                if(count($exterior) ):
                    foreach($exterior as $image):
                        $id = $image['id'];
                        $title = $image['title'];
                        $full_image_url = $image['full_image_url'];

            ?>
                    <img src="<?= $full_image_url; ?>" alt="<?= $title; ?>" title="<?= $title; ?>" />
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>