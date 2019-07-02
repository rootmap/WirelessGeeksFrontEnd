<ul>
    <!--dynamic menu start from here-->
    <?php
    $sqlnavt=$obj->FlyQuery("SELECT id,menu_name,menu_link,priority FROM second_navigation_bar ORDER BY priority ASC");
    if (!empty($sqlnavt)) {
        foreach ($sqlnavt as $dm):
            ?>
            <li><a href="<?php echo $dm->menu_link; ?>"><?php echo $dm->menu_name; ?></a>
                <?php
                $sqlnvsub=$obj->FlyQuery("SELECT id,main_menu,menu_name,menu_link,priority FROM second_navigation_sub_menu WHERE main_menu='" . $dm->id . "' ORDER BY priority ASC");
                if (!empty($sqlnvsub)) {
                    ?>
                    <ul>
                        <?php
                        foreach ($sqlnvsub as $sdm):
                            ?>
                            <li><a href="<?php echo $sdm->menu_link; ?>"><?php echo $sdm->menu_name; ?></a></li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </li>
            <?php
        endforeach;
    }
    ?>
</ul>


