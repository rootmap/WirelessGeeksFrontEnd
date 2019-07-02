<?php $table="repair_devices"; ?><?php
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
            <h1 class="content-heading bg-white border-bottom">Repair Devices Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="repair_devices.php">Create New Repair Devices</a></li>
                    <li class="active"><a href="#">Repair Devices Data List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="repair_devices_32"></div>
            </div>
        </div>
        <!-- // Repair Devices END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Repair Devices wrapper END -->

        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_repair_devices" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-edit" href="repair_devices.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
    </script>
    <script id="delete_repair_devices" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>
    <script type="text/javascript">
        function deleteClick(repair_devices_id) {
            var c = confirm("Do you want to delete?");
            if (c === true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./json_data/banner_list.php",
                    data: {id: repair_devices_id, table: "repair_devices", acst: 3},
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
                                    "table": "SELECT a.id,a.name,a.repair_page_heading,a.repair_page_sub_heading,a.device_photo, CASE a.photo_position WHEN 1 THEN 'left' ELSE CASE a.photo_position WHEN 2 THEN 'right' ELSE 'left' END END AS photo_position,a.device_detail,a.priority,a.date,a.status FROM repair_devices as a",
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
                            id: {type: "number"}, name: {type: "string"}, repair_page_heading: {type: "string"}, repair_page_sub_heading: {type: "string"}, device_photo: {type: "string"}, photo_position: {type: "string"}, device_detail: {type: "string"}, priority: {type: "string"},
                            date: {type: "string"}
                        }
                    }
                }
            });
            jQuery("#repair_devices_32").kendoGrid({
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
                columns: [{field: "id", title: "#"}, {field: "name", title: "Name"}, {field: "photo_position", title: "Photo Position"}, {field: "priority", title: "Priority"},
                    {field: "date", title: "Record Added", width: "150px"},
                    {
                        title: "Edit",
                        template: kendo.template($("#edit_repair_devices").html())
                    },
                    {
                        title: "Delete",
                        template: kendo.template($("#delete_repair_devices").html())
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