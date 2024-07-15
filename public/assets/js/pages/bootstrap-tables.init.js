function invoiceFormatter(e, t) {
  return '<a href="#" class="btn-link" > Order #' + e + "</a>";
}
function nameFormatter(e, t) {
  return '<a href="#" class="btn-link" > ' + e + "</a>";
}
function dateFormatter(e, t) {
  t.id;
  return '<span class="text-muted"> ' + e + "</span>";
}
function statusFormatter(e, t) {
  var n;
  "Paid" == e
    ? (n = "success")
    : "Unpaid" == e
    ? (n = "warning")
    : "Shipped" == e
    ? (n = "info")
    : "Refunded" == e && (n = "danger");
  t.id;
  return '<div class="badge label-table bg-' + n + '"> ' + e + "</div>";
}
function priceSorter(e, t) {
  return (e = +e.substring(1)), (t = +t.substring(1)) < e ? 1 : e < t ? -1 : 0;
}
  $(window).on("load", function () {
    $('[data-toggle="table"]').show();
  })
  ,
  (window.icons = {
    refresh: "mdi mdi-refresh",
    toggle: "fa-refresh",
    toggleOn: "fa-toggle-on",
    toggleOff: "fa-toggle-on",
    columns: "fas fa-th-list",
    paginationSwitchDown: "glyphicon-collapse-down icon-chevron-down",
  });
