"use strict";

$(document).ready(function () {
  // var SITEURL = "{{ url('/') }}";
  var SITEURL = "/dashboard";
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  var calendar = $("#calendar").fullCalendar({
    editable: false,
    events: SITEURL + "/event",
    displayEventTime: true,
    eventRender: function (event, element, view) {

      if (event.allDay === true) {
        event.allDay = true;
      } else {
        event.allDay = false;
      }
    },
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
      var title = prompt("Event Title:");
      if (title) {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
        $.ajax({
          url: SITEURL + "/eventAjax",
          data: "title=" + title + "&start=" + start + "&end=" + end,
          "&type=" : "add",
          type: "POST",
          success: function (data) {
            calendar.fullCalendar(
              "renderEvent",
              {
                
                title: title,
                start: start,
                end: end,
                allDay: allDay,
              },
              true // make the event "stick"
            );
          },
        });
      }
      calendar.fullCalendar("unselect");
    },

    eventDrop: function (event, revertFunc) {
      event.start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
      event.end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
      $.ajax({
        url: SITEURL + "/eventAjax",
        data: {
          id: event.id,
          start: event.start,
          end: event.end,
          type: "update",
        },
        type: "POST",
        success: function (response) {
          if (response.status != "success") {
            revertFunc();
          }
        },
      });
    },
    eventClick: function (event) {
      if (confirm("Are you sure you want to remove it?")) {
        $.ajax({
          url: SITEURL + "/eventAjax",
          data: {
            id: event.id,
            type: "delete",
          },
          type: "POST",
          success: function (response) {
            calendar.fullCalendar("removeEvents", event.id);
            response.forEach(function (event) {
              calendar.fullCalendar("renderEvent", event, true);
            });
          },
        });
      }
      calendar.fullCalendar("unselect");
    },
    eventResize: function (event, revertFunc) {
      event.start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
      event.end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
      $.ajax({
        url: SITEURL + "/eventAjax",
        data: {
          id: event.id,
          start: event.start,
          end: event.end,
          type: "update",
        },
        type: "POST",
        success: function (response) {
          if (response.status != "success") {
            revertFunc();
          }
        },
      });
    },
  });
});

//   if (event.allDay === "true") {
//     event.allDay = true;
//   } else {
//     event.allDay = false;
//   }
// },
// selectable: true,
// selectHelper: true,
// select: function (start, end, allDay) {
//   var title = prompt("Event Title:");

//   console.log(title);
//   if (title) {
//     var start = moment(start).format('YYYY-MM-DD');
//     var end = moment(end).format('YYYY-MM-DD');
//     $.ajax({
//       url: SITEURL + "/eventAjax",
//       data: {
//         title: title,
//         start: start,
//         end: end,
//         allDay: allDay,
//         _token: $('meta[name="csrf-token"]').attr('content'),
//         type: "add"
//       },
//       type: "POST",
//       success: function (data) {
//         displayMessage("Added Successfully");
//         calendar.fullCalendar("renderEvent",
//         {
//           title: title,
//           start: start,
//           end: end,
//           allDay: allDay,
//           "id": data.id
//         }, true
//         );
//           calendar.fullCalendar("unselect");
//       }
//     });

// if (title) {
//   var start = $.fullCalendar.formatDate(start, "YY-MM-DD");
//   var end = $.fullCalendar.formatDate(end, "YY-MM-DD");

//   $.ajax({
//     url: "/dashboard/eventAjax",
//     data: {
//       title: title,
//       start: start,
//       end: end,
//       type: "add",
//     },
//     type: "POST",
//     success: function (data) {
//       displayMessage("Event Created Successfully");
//       calendar.fullCalendar(
//         "renderEvent",
//         {
//           id: data.id,
//           title: title,
//           start: start,
//           end: end,
//           allDay: allDay,
//         },
//         true
//       );
//       calendar.fullCalendar("unselect");
//     },
//   });
//       }
//     },
//     eventDrop: function (event, delta, revertFunc) {
//       event.start = moment(event.start).format('YYYY-MM-DD');
//       event.end = moment(event.end).format('YYYY-MM-DD');
//       var start = moment(event.start).format('YYYY-MM-DD');
//       var end = moment(event.end).format('YYYY-MM-DD');
//       $.ajax({
//         url: SITEURL + "/eventAjax",
//         data: {
//           title: event.title,
//           start: start,
//           end: end,
//           id: event.id,
//           type: "update"
//         },
//         type: "POST",
//         success: function (data) {
//           displayMessage("Event Updated Successfully");
//         }
//       });
//     }
//     ,
//     eventClick: function (event) {
//       var title = prompt("Event Title:", event.title);
//       if (title) {
//         var start = moment(event.start).format('YYYY-MM-DD');
//         var end = moment(event.end).format('YYYY-MM-DD');
//         $.ajax({
//           url: SITEURL + "/eventAjax",
//           data: {
//             title: title,
//             start: start,
//             end: end,
//             id: event.id,
//             type: "delete"
//           },
//           type: "POST",
//           success: function (data) {
//             displayMessage("Event Deleted Successfully");
//             calendar.fullCalendar("removeEvents", event.id);
//           }
//         });
//       }
//     },
//       eventDrop: function (event, delta, revertFunc) {
//       event.start = moment(event.start).format('YYYY-MM-DD');
//       event.end = moment(event.end).format('YYYY-MM-DD');
//       var start = moment(event.start).format('YYYY-MM-DD');
//       var end = moment(event.end).format('YYYY-MM-DD');
//       $.ajax({
//         url: SITEURL + "/eventAjax",
//         data: {
//           title: event.title,
//           start: start,
//           end: end,
//           id: event.id,
//           type: "update"
//         },
//         type: "POST",
//         success: function (data) {
//           displayMessage("Event Updated Successfully");
//         }
//       });
//     }
//     ,

//     eventDrop: function (event, delta) {
//       var start = $.fullCalendar.formatDate(event.start, "YY-MM-DD");
//       var end = $.fullCalendar.formatDate(event.end, "YY-MM-DD");
//       $.ajax({
//         url: "/dashboard/eventAjax",
//         data: {
//           title: event.title,
//           start: start,
//           end: end,
//           id: event.id,
//           type: "update",
//         },
//         type: "POST",
//         success: function (response) {
//           displayMessage("Event Updated Successfully");
//         },
//       });
//     },
//     eventClick: function (event) {
//       var deleteMsg = confirm("Do you really want to delete?");
//       if (deleteMsg) {
//         $.ajax({
//           type: "POST",
//           url: "/dashboard/eventAjax",
//           data: {
//             id: event.id,
//             type: "delete",
//           },
//           success: function (response) {
//             calendar.fullCalendar("removeEvents", event.id);

//             displayMessage("Event Deleted Successfully");
//           },
//         });
//       }
//     },
//   });
// });

// function displayMessage(message) {
//   toastr.success(message, "Event");
// }

// console.log("");
