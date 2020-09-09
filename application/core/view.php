<?php

class View
{

    function generate($content_view, $template_view, $publicationData = null, $tagsDataArray = null)
    {
        include(ROOT . '/application/views/' . $template_view);
    }
}

?>