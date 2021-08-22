<?php

if(!function_exists('sp_get_post_thumbnail')) {
    function sp_get_post_thumbnail($default = null) {
        // has_post_thumbnail nous permet de savoir si un article a une image de mise en avant. Nous utilisons ici l'id de l'article pour savoir si ce dernier a une image

        // get_the_id() est le template tag nous permettant de récupérer l'id de l'article
        $articleId = get_the_id();

        // has_post_thumbnail nous permet de savoir si un article a une image de mise en avant. Nous utilisons ici l'id de l'article pour savoir si ce dernier a une image
        $hasImage = has_post_thumbnail($articleId);

        // si l'article a une image, on récupère l'url de l'image
        if($hasImage) {
            $imageURL = get_the_post_thumbnail_url();
        }
        else {
            if($default) {
                return $default;
            }
            else {
                return false;
            }
        }

        return $imageURL;
    }
}