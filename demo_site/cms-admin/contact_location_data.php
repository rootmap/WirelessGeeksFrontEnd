<?php $table="contact_location"; ?><?php
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
            <h1 class="content-heading bg-white border-bottom">Contact Location Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="contact_location.php">Create New Contact Location</a></li>
                    <li class="active"><a href="#">Contact Location Data List</a></li>
                </ul>
            </div>
            <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="contact_location_30"></div>
            </div>
        </div>
        <!-- // Contact Location END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Contact Location wrapper END -->

        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_contact_location" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-edit" href="contact_location.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
    </script>
    <script id="delete_contact_location" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>
    <script type="text/javascript">
        function deleteClick(contact_location_id) {
            var c = confirm("Do you want to delete?");
            if (c === true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./json_data/banner_list.php",
                    data: {id: contact_location_id, table: "contact_location", acst: 3},
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
                                    "table": "contact_location_view",
                                    "cond": 0,
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
                            id: {type: "number"}, name: {type: "string"}, map: {type: "string"}, detail: {type: "string"}, hours: {type: "string"}, telephone: {type: "string"}, address: {type: "string"}, email: {type: "string"}, adds: {type: "string"},
                            date: {type: "string"}
                        }
                    }
                }
            });
            jQuery("#contact_location_30").kendoGrid({
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
                columns: [{field: "id", title: "ID NO"}, {field: "name", title: "Name"}, {field: "hours", title: "Hours"}, {field: "telephone", title: "Telephone"}, {field: "email", title: "Email"},
                    {field: "date", title: "Record Added", width: "150px"},
                    {
                        title: "Edit",
                        template: kendo.template($("#edit_contact_location").html())
                    },
                    {
                        title: "Delete",
                        template: kendo.template($("#delete_contact_location").html())
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