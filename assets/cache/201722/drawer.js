var a = $(".x-drawer-button"),
    b = $(".x-drawer"),
    c = "_drawer-opened",
    d = $(".x-drawer-backdrop"),
    e = "layout__drawer-backdrop--show";
a.click(function() {
        b.addClass(c), d.addClass(e)
});
$(".drawer__close, .x-drawer-backdrop").click(function() {
        b.removeClass(c), d.removeClass(e)
});