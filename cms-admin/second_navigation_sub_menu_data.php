<?php $table="second_navigation_sub_menu"; ?><?php
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
        <?php
        echo $plugin->softwareTitle();
        echo $plugin->TableCss();
        echo $plugin->KendoCss();
        ?>
    </head>
    <body class="">
        <?php
        include('include/topnav.php');
        include('include/mainnav.php');
        ?>
        <div id="content">
            <h1 class="content-heading bg-white border-bottom">Second Navigation Sub Menu Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="second_navigation_sub_menu.php">Create New Second Navigation Sub Menu</a></li>
                    <li class="active"><a href="#">Second Navigation Sub Menu Data List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="second_navigation_sub_menu_54"></div>
            </div>
        </div>
        <!-- // Second Navigation Sub Menu END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Second Navigation Sub Menu wrapper END -->

        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_second_navigation_sub_menu" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-edit" href="second_navigation_sub_menu.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
    </script>
    <script id="delete_second_navigation_sub_menu" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>
    <script type="text/javascript">
        function deleteClick(second_navigation_sub_menu_id) {
            var c = confirm("Do you want to delete?");
            if (c === true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./json_data/banner_list.php",
                    data: {id: second_navigation_sub_menu_id, table: "second_navigation_sub_menu", acst: 3},
                    success: function (result) {
                        if (result == 1)
                        {
                            location.reload();
                        }
                        else
                        {
                            $(".k-i-refresh").click();
                        }
                    }
                });
            }
        }

    </script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var postarray = {"id": 1};
            var dataSource = new kendo.data.DataSource({
                pageSize: 5,
                transport: {
                    read: {
                        url: "./json_data/banner_list.php",
                        type: "POST",
                        data:
                                {
                                    "acst": 1, //action status sending to json file
                                    "table": "SELECT a.`id`,snb.menu_name as `main_menu`,a.`menu_name`,a.`menu_link`,a.`priority`,a.`date`,a.`status` FROM `second_navigation_sub_menu` as a LEFT JOIN second_navigation_bar as snb ON snb.id=a.main_menu",
                                    "cond": 2,
                                    "multi": postarray

                                }
                    }
                },
                autoSync: false,
                schema: {
                    data: "data",
                    total: "data.length",
                    model: {
                        id: "id",
                        fields: {
                            id: {type: "number"}, main_menu: {type: "string"}, menu_name: {type: "string"}, menu_link: {type: "string"}, priority: {type: "string"},
                            date: {type: "string"}
                        }
                    }
                }
            });
            jQuery("#second_navigation_sub_menu_54").kendoGrid({
                dataSource: dataSource,
                filterable: true,
                pageable: {
                    refresh: true,
                    input: true,
                    numeric: false,
                    pageSizes: true,
                    pageSizes: [5, 10, 20, 50],
                },
                sortable: true,
                groupable: true,
                columns: [{field: "id", title: "ID", width: "50px"},
                    {field: "main_menu", title: "Main Menu", width: "150px"},
                    {field: "menu_name", title: "Menu Name", width: "150px"},
                    {field: "menu_link", title: "Menu Link"},
                    {field: "priority", title: "Priority", width: "80px"},
                    {field: "date", title: "Record Added", width: "100px"},
                    {
                        title: "Edit",
                        width: "80px",
                        template: kendo.template($("#edit_second_navigation_sub_menu").html())
                    },
                    {
                        title: "Delete",
                        width: "90px",
                        template: kendo.template($("#delete_second_navigation_sub_menu").html())
                    }
                ]
            });
        });

    </script>
    <?php
    echo $plugin->TableJs();
    echo $plugin->KendoJS();
    ?>

</body>
</html>