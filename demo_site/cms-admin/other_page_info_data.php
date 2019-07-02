<?php $table="other_page_info"; ?><?php
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
            <h1 class="content-heading bg-white border-bottom">Other Page Info Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="other_page_info.php">Create New Other Page Info</a></li>
                    <li class="active"><a href="#">Other Page Info Data List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="other_page_info_40"></div>
            </div>
        </div>
        <!-- // Other Page Info END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Other Page Info wrapper END -->

        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_other_page_info" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-edit" href="other_page_info.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
    </script>
    <script id="delete_other_page_info" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>
    <script type="text/javascript">
        function deleteClick(other_page_info_id) {
            var c = confirm("Do you want to delete?");
            if (c === true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./json_data/banner_list.php",
                    data: {id: other_page_info_id, table: "other_page_info", acst: 3},
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
                                    "table": "SELECT a.`id`,a.`page_name`,a.`page_moto`,a.`heading`,a.`photo`,CASE a.`photo_position` WHEN '1' THEN 'left' ELSE CASE a.`photo_position` WHEN '1' THEN 'left' ELSE 'left' END END AS photo_position, a.`page_content`,a.`date`,a.`status` FROM `other_page_info` as a",
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
                            id: {type: "number"}, page_name: {type: "string"}, page_moto: {type: "string"}, heading: {type: "string"}, photo: {type: "string"}, photo_position: {type: "string"}, page_content: {type: "string"},
                            date: {type: "string"}
                        }
                    }
                }
            });
            jQuery("#other_page_info_40").kendoGrid({
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
                columns: [{field: "id", title: "#", width: "50px"}, {field: "page_name", title: "Page Name"}, {field: "page_moto", title: "Page Moto"}, {field: "heading", title: "Heading"}, {field: "photo", title: "Photo"}, {field: "photo_position", title: "Photo Position"},
                    {field: "date", title: "Record Added", width: "150px"},
                    {
                        title: "Edit",
                        template: kendo.template($("#edit_other_page_info").html())
                    },
                    {
                        title: "Delete",
                        template: kendo.template($("#delete_other_page_info").html())
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