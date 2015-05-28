$(function () {
    $("div[id^='paragraph_']").each(function () {
        var paragraph = $(this);

        paragraph.find('div > div > div > button').click(function () {
            paragraph.remove()
        })
    });

    $('#add-paragraph').click(function () {
        var num = $('#num-paragraphs').html();

        num ++;

        $('#paragraphs-editor').append(
            $("<div>", {
                class: "row",
                id: "paragraph_" + num
            }).append(
                $("<div>", {class: "col-lg-12"}).append(
                    $("<div>", {class: "row paragraph-top"}).append(
                        $("<div>", {class: "col-sm-12"}).append(
                            $("<h3>", {class: "text-uppercase col-sm-2"}).append(
                                $("<small>").html("Párrafo " + num)
                            )
                        ).append(
                            $("<button>", {
                                class: "close",
                                type: "button",
                                'aria-label': "Close"
                            }).click(function () {
                                $("#paragraph_" + num).remove()
                            }).append(
                                $("<span>", {'aria-hidden': true}).html("&times;")
                            )
                        )
                    )
                ).append(
                    $("<div>", {class: "row paragraph-content"}).append(
                        $("<div>", {class: "col-sm-12"}).append(
                            $("<div>", {class: "form-group"}).append(
                                $("<label>", {
                                    class: "col-sm-2 control-label text-left",
                                    for: "paragraph.headline_" + num
                                }).html('Encabezado')
                            ).append(
                                $("<div>", {class: "col-sm-10"}).append(
                                    $("<input>", {
                                        id: "paragraph.headline_" + num,
                                        type: "text",
                                        placeholder: "Encabezdo párrafo " + num,
                                        name:"paragraphs[" + num + "][headline]",
                                        autocomplete: "off",
                                        class: "form-control"
                                    })
                                )
                            )
                        ).append(
                            $("<div>", {class: "form-group"}).append(
                                $("<div>", {class: "col-sm-12"}).append(
                                    $("<textarea>", {
                                        id:"paragraph_title_" + num,
                                        class:"form-control",
                                        placeholder:"Encabezado párrafo " + num,
                                        cols:"10",
                                        name:"paragraphs[" + num + "][content]",
                                        rows:"10"
                                    })
                                )
                            )
                        ).append(
                            $("<div>", {class: "form-group"}).append(
                                $("<div>", {class: "col-sm-12"}).append(
                                    $("<div>", {class: "form-group"}).append(
                                        $("<div>", {class: "col-sm-12"})
                                    )
                                )
                            ).append(
                                $("<div>", {class: "col-sm-6"}).append(
                                    $("<input>", {
                                        type: "file",
                                        name: "paragraphs[" + num + "][image][file]",
                                        class: "col-sm-12",
                                        autocomplete: "off",
                                        id: "paragraph_image_uri_" + num
                                    })
                                )
                            ).append($("<div>", {class: "col-sm-6"}).append(
                                    $("<div>", {class: "btn-group", 'data-toggle': "buttons"}).append(
                                        $("<label>", {class: "btn btn-default"}).append(
                                            $("<input>", {
                                                type: "radio",
                                                name: "paragraphs[" + num + "][image][position]",
                                                class: "btn btn-default",
                                                autocomplete: "off",
                                                id: "paragraph_image_position_" + num + "_1",
                                                value: "left"
                                            })
                                        ).append('Izquierda')
                                    ).append(
                                        $("<label>", {class: "btn btn-default"}).append(
                                            $("<input>", {
                                                type: "radio",
                                                name: "paragraphs[" + num + "][image][position]",
                                                class: "btn btn-default",
                                                autocomplete: "off",
                                                id: "paragraph_image_position_" + num + "_2",
                                                value: "center"
                                            })
                                        ).append('Centrado')
                                    ).append(
                                        $("<label>", {class: "btn btn-default"}).append(
                                            $("<input>", {
                                                type: "radio",
                                                name: "paragraphs[" + num + "][image][position]",
                                                class: "btn btn-default",
                                                autocomplete: "off",
                                                id: "paragraph_image_position_" + num + "_3",
                                                value: "right"
                                            })
                                        ).append('Derecha')
                                    )
                                )
                            )
                        )
                    )
                ).append(
                    $("<input>", {
                        name: "paragraphs[" + num + "][id]",
                        type: "hidden"
                    })
                )
            )
        );

        $('#num-paragraphs').html(num);
    });

    $('#editUrlButton').click(function () {
        if ($('#editUrlButton').attr('aria-expanded') == 'false') {
            $('#editUrlButton').html('Generar manualmente')
        } else {
            $('#editUrlButton').html('Generar automáticamente')
        }
    })
})
//# sourceMappingURL=app.js.map