(function ($) {
    $(document).ready(function () {
        $(document).on('click', 'button#widget_image_upload', function (e) {
            var widget_ID = $(this).data("widget-id");
            e.preventDefault();
            var mediaUploader;
            mediaUploader = wp.media({
                "title": "Upload Gallery Widget",
                "button": {
                    "text": "Set Image"
                },
                "multiple": true
            });
            mediaUploader.open();
            mediaUploader.on("select", function () {
                var links = mediaUploader.state().get("selection").map(function (attachment) {
                    attachment = attachment.toJSON();
                    return attachment.url;
                }).join();
                window.document.getElementsByClassName("widget-" + widget_ID + "-custom_widget_image_url")[0].value = links;
            })
        });
        $(document).on('click', 'button.img-delete', function (e) {
            var widget_ID = $(this).data("widget-id");
            var img_order = $(this).data("order");
            var img_list = window.document.getElementById("widget-" + widget_ID + "-custom_widget_image_url").value;
            var img_array = img_list.split(',');
            var index = img_array.indexOf(widget_ID);
            img_array.splice(index, 1);
            var result = img_array.join(',');
            result = result.replace(",,", ",");
            const elements = document.getElementsByClassName(img_order + "-" + widget_ID);
            while (elements.length > 0) {
                elements[0].parentNode.removeChild(elements[0]);
            }
            window.document.getElementsByClassName("widget-" + widget_ID + "-custom_widget_image_url")[0].value = result;
        });
    });

}(jQuery));
