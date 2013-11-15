TeaPress - How to create Theme
=====================

1. Copy "MyTheme" module
2. Change name "MyTheme" with your theme's name
3. Change namespace in Module.php
4. Surcharge phtml file for your template
    1. For layout, error page, partial like paginator your must write in module.config.php

`'template_map' => array(
    'layout/layout'            => __DIR__ . '/../view/layout/layout_2col_right.phtml',
)`

    2. For other page / file just look view repository from module and copy directory

`view/post/single.phtml` for single view of post