(function ($) {
    "use strict";
    $(document).ready(function () {
        $(document).on('widget-updated',function(event,widget){
            var widget_id = $(widget).attr('id');
            if(widget_id.indexOf('demowidget_advertisement')!=-1){
                prefetch();
            }
        });

        $("body").off("click",".widgetuploader");
        $("body").on("click",".widgetuploader", function () {
            var that = this;

            var file_frame = wp.media.frames.file_frame = wp.media({
                frame: 'post',
                state: 'insert',
                multiple: false
            });

            file_frame.on('insert', function () {

                var data = file_frame.state().get('selection');
                var jdata = data.toJSON();
                var selected_ids = _.pluck(jdata, "id");
                var container = $(that).siblings("p.imgpreview");

                if (selected_ids.length > 0) {
                    $(that).css("marginTop", "10px");
                    $(that).val("Change Image");
                }
                $(that).prev('input').val(selected_ids.join(","));
                $(that).prev('input').trigger('change');
                container.html("");

                data.map(function (attachment) {
                    if (attachment.attributes.subtype == "png" || attachment.attributes.subtype == "jpeg" || attachment.attributes.subtype == "jpg") {
                        try {
                            //console.log(attachment.attributes.sizes);
                            container.append("<img src='" + attachment.attributes.sizes.thumbnail.url + "'/>");
                        } catch (e) {
                        }
                    }
                });
            });

            file_frame.on('open', function () {
                var selection = file_frame.state().get('selection');
                var ats = $(that).prev("input").val().split(",");

                for (var i = 0; i < ats.length; i++) {
                    if (ats[i] > 0)
                        selection.add(wp.media.attachment(ats[i]));
                }
            });

            file_frame.open();
        });

        function prefetch(){
            $(".imgph").each(function(){
                var attid = $(this).val();
                var container= $(this).prev();
                container.html("");
                if(attid){
                    $(this).next().val("Change Image");
                    var attachment = new wp.media.model.Attachment.get(attid);
                    attachment.fetch({success: function (att) {
                        container.append("<img src='" + att.attributes.sizes.thumbnail.url + "'/>");
                    }});
                }
            });
        }

        if(wp.customize !== undefined){
            $(".customize-control").on("expand",function(e){
                var widget_id = $(this).attr('id');
                if(widget_id.indexOf('demowidget_advertisement')!==-1){
                    prefetch();
                }
            });
        }

        prefetch();
    });
})(jQuery);