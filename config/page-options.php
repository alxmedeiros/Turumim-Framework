<?php

function register_admin_pages(){
    wd_page('Site options') // Page title
        ->add(Form::text('video_limit')->setLabel('Video pages show at most: '))
        ->init();

    wd_page('Social Network', 'site-options') // this page is child of Site options ("site-options" is the slug of "Site options")
        ->add(Form::text('facebook_link')->setLabel('Facebook: '))
        ->add(Form::text('twitter_link')->setLabel('Twitter: '))
        ->add(Form::text('flickr_link')->setLabel('Flickr: '))
        ->add(Form::text('youtube_link')->setLabel('Youtube: '))
        ->init();
}

add_action('_admin_menu', 'register_admin_pages');

?>