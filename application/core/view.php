<?php

class View
{

    function generate($content_view, $template_view, $publicationData = null, $tagsDataArray = null,$pagination=null)
    {
        include(ROOT . '/application/views/' . $template_view);
    }
}

?>