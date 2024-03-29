"use strict";
$(function () {
    var t,
        e = $(".task-due-date"),
        a = $(".sidebar-todo-modal"),
        o = $("#form-modal-todo"),
        s = $(".todo-item-favorite"),
        l = $(".modal-title"),
        i = $(".add-todo-item"),
        n = $(".add-task button"),
        d = $(".update-todo-item"),
        r = $(".update-btn"),
        c = $("#task-desc"),
        m = $("#task-assigned"),
        p = $("#task-tag"),
        h = $(".body-content-overlay"),
        u = $(".menu-toggle"),
        v = $(".sidebar-toggle"),
        f = $(".sidebar-left"),
        g = $(".sidebar-menu-list"),
        w = $("#todo-search"),
        b = $(".sort-asc"),
        k = $(".sort-desc"),
        C = $(".todo-task-list"),
        y = $(".todo-task-list-wrapper"),
        x = $(".list-group-filters"),
        T = $(".no-results"),
        D = 100,
        j = "rtl" === $("html").attr("data-textdirection"),
        M = "../../../app-assets/";
    if (
        ("laravel" === $("body").attr("data-framework") &&
            (M = $("body").attr("data-asset-path")),
        $.app.menu.is_touch_device())
    )
        g.css("overflow", "scroll"), y.css("overflow", "scroll");
    else {
        if (g.length > 0) new PerfectScrollbar(g[0], { theme: "dark" });
        if (y.length > 0) new PerfectScrollbar(y[0], { theme: "dark" });
    }
    x.length &&
        x.find("a").on("click", function () {
            x.find("a").hasClass("active") && x.find("a").removeClass("active"),
                $(this).addClass("active");
        });
    var S = document.getElementById("todo-task-list");
    function q(t) {
        return t.id
            ? '<div class="d-flex align-items-center"><img class="d-block rounded-circle me-50" src="' +
                  $(t.element).data("img") +
                  '" height="26" width="26" alt="' +
                  t.text +
                  '"><p class="mb-0">' +
                  t.text +
                  "</p></div>"
            : t.text;
    }
    if (
        (void 0 !== typeof S &&
            null !== S &&
            dragula([S], {
                moves: function (t, e, a) {
                    return a.classList.contains("drag-icon");
                },
            }),
        u.length &&
            u.on("click", function (t) {
                f.removeClass("show"), h.removeClass("show");
            }),
        v.length &&
            v.on("click", function (t) {
                t.stopPropagation(), f.toggleClass("show"), h.addClass("show");
            }),
        h.length &&
            h.on("click", function (t) {
                f.removeClass("show"),
                    h.removeClass("show"),
                    $(a).modal("hide");
            }),
        m.length &&
            (m.wrap('<div class="position-relative"></div>'),
            m.select2({
                placeholder: "Unassigned",
                dropdownParent: m.parent(),
                templateResult: q,
                templateSelection: q,
                escapeMarkup: function (t) {
                    return t;
                },
            })),
        p.length &&
            (p.wrap('<div class="position-relative"></div>'),
            p.select2({ placeholder: "Select tag" })),
        s.length &&
            $(s).on("click", function () {
                $(this).toggleClass("text-warning");
            }),
        e.length &&
            e.flatpickr({
                dateFormat: "Y-m-d",
                defaultDate: "today",
                onReady: function (t, e, a) {
                    a.isMobile && $(a.mobileInput).attr("step", null);
                },
            }),
        c.length)
    )
        new Quill("#task-desc", {
            bounds: "#task-desc",
            modules: { formula: !0, syntax: !0, toolbar: ".desc-toolbar" },
            placeholder: "Write Your Description",
            theme: "snow",
        });
    n.length &&
        n.on("click", function (t) {
            i.removeClass("d-none"),
                r.addClass("d-none"),
                l.text("Add Task"),
                f.removeClass("show"),
                h.removeClass("show"),
                a.find(".new-todo-item-title").val(""),
                (c.find(".ql-editor")[0].innerHTML = "");
        }),
        o.length &&
            (o.validate({
                ignore: ".ql-container *",
                rules: {
                    todoTitleAdd: { required: !0 },
                    "task-assigned": { required: !0 },
                    "task-due-date": { required: !0 },
                },
            }),
            o.on("submit", function (t) {
                if ((t.preventDefault(), o.valid())) {
                    D++;
                    var e = $("#task-assigned").val(),
                        s = "",
                        l = {
                            "Phill Buffer":
                                M + "images/portrait/small/avatar-s-3.jpg",
                            "Chandler Bing":
                                M + "images/portrait/small/avatar-s-1.jpg",
                            "Ross Geller":
                                M + "images/portrait/small/avatar-s-4.jpg",
                            "Monica Geller":
                                M + "images/portrait/small/avatar-s-6.jpg",
                            "Joey Tribbiani":
                                M + "images/portrait/small/avatar-s-2.jpg",
                            "Rachel Green":
                                M + "images/portrait/small/avatar-s-11.jpg",
                        },
                        i = $(".sidebar-todo-modal .new-todo-item-title").val(),
                        n = $(".sidebar-todo-modal .task-due-date").val(),
                        d = new Date(n),
                        r =
                            new Intl.DateTimeFormat("en", {
                                month: "short",
                            }).format(d) +
                            " " +
                            new Intl.DateTimeFormat("en", {
                                day: "2-digit",
                            }).format(d),
                        c = $(".task-tag").val(),
                        m = {
                            Team: "primary",
                            Low: "success",
                            Medium: "warning",
                            High: "danger",
                            Update: "info",
                        };
                    $.each(c, function (t, e) {
                        s +=
                            '<span class="badge rounded-pill badge-light-' +
                            m[e] +
                            ' me-50">' +
                            e +
                            "</span>";
                    }),
                        "" != i &&
                            $(C).prepend(
                                '<li class="todo-item"><div class="todo-title-wrapper"><div class="todo-title-area">' +
                                    feather.icons["more-vertical"].toSvg({
                                        class: "drag-icon",
                                    }) +
                                    '<div class="title-wrapper"><div class="form-check"><input type="checkbox" class="form-check-input" id="customCheck' +
                                    D +
                                    '" /><label class="form-check-label" for="customCheck' +
                                    D +
                                    '"></label></div><span class="todo-title">' +
                                    i +
                                    '</span></div></div><div class="todo-item-action"><span class="badge-wrapper me-1">' +
                                    s +
                                    '</span><small class="text-nowrap text-muted me-1">' +
                                    r +
                                    '</small><div class="avatar"><img src="' +
                                    l[e] +
                                    '" alt="' +
                                    e +
                                    '" height="28" width="28"></div></div></div></li>'
                            ),
                        toastr.success("Data Saved", "💾 Task Action!", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            rtl: j,
                        }),
                        $(a).modal("hide"),
                        h.removeClass("show");
                }
            })),
        y.on("change", ".form-check", function (t) {
            var e = $(this).find("input");
            e.prop("checked")
                ? (e.closest(".todo-item").addClass("completed"),
                  toastr.success("Task Completed", "Congratulations!! 🎉", {
                      closeButton: !0,
                      tapToDismiss: !1,
                      rtl: j,
                  }))
                : e.closest(".todo-item").removeClass("completed");
        }),
        y.on("click", ".form-check", function (t) {
            t.stopPropagation();
        }),
        // $(document).on(
        //     "click",
        //     ".todo-task-list-wrapper .todo-item",
        //     function (e) {
        //         a.modal("show"),
        //             i.addClass("d-none"),
        //             r.removeClass("d-none"),
        //             $(this).hasClass("completed")
        //                 ? l.html(
        //                       '<button type="button" class="btn btn-sm btn-outline-success complete-todo-item waves-effect waves-float waves-light" data-bs-dismiss="modal">Completed</button>'
        //                   )
        //                 : l.html(
        //                       '<button type="button" class="btn btn-sm btn-outline-secondary complete-todo-item waves-effect waves-float waves-light" data-bs-dismiss="modal">Mark Complete</button>'
        //                   ),
        //             p.val("").trigger("change"),
        //             ($("#task-desc .ql-editor")[0].innerHTML =
        //                 "Chocolate cake topping bonbon jujubes donut sweet wafer. Marzipan gingerbread powder brownie bear claw. Chocolate bonbon sesame snaps jelly caramels oat cake."),
        //             (t = $(this).find(".todo-title"));
        //         var s = $(this).find(".todo-title").html();
        //         o.find(".new-todo-item-title").val(s);
        //     }
        // ),
        d.length &&
            d.on("click", function (e) {
                var s = o.valid();
                if ((e.preventDefault(), s)) {
                    var l = o.find(".new-todo-item-title").val();
                    $(t).text(l),
                        toastr.success("Data Saved", "💾 Task Action!", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            rtl: j,
                        }),
                        $(a).modal("hide");
                }
            }),
        b.length &&
            b.on("click", function () {
                y.find("li")
                    .sort(function (t, e) {
                        return $(e).find(".todo-title").text().toUpperCase() <
                            $(t).find(".todo-title").text().toUpperCase()
                            ? 1
                            : -1;
                    })
                    .appendTo(C);
            }),
        k.length &&
            k.on("click", function () {
                y.find("li")
                    .sort(function (t, e) {
                        return $(e).find(".todo-title").text().toUpperCase() >
                            $(t).find(".todo-title").text().toUpperCase()
                            ? 1
                            : -1;
                    })
                    .appendTo(C);
            }),
        w.length &&
            w.on("keyup", function () {
                var t = $(this).val().toLowerCase();
                "" !== t
                    ? ($(".todo-item").filter(function () {
                          $(this).toggle(
                              $(this).text().toLowerCase().indexOf(t) > -1
                          );
                      }),
                      0 == $(".todo-item:visible").length
                          ? $(T).hasClass("show") || $(T).addClass("show")
                          : $(T).removeClass("show"))
                    : ($(".todo-item").show(),
                      $(T).hasClass("show") && $(T).removeClass("show"));
            }),
        $(window).width() > 992 && h.hasClass("show") && h.removeClass("show");
}),
    $(window).on("resize", function () {
        $(window).width() > 992 &&
            $(".body-content-overlay").hasClass("show") &&
            ($(".sidebar-left").removeClass("show"),
            $(".body-content-overlay").removeClass("show"),
            $(".sidebar-todo-modal").modal("hide"));
    });
