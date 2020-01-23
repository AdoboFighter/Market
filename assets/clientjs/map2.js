$('#world-map').vectorMap({
  backgroundColor: 'transparent',
   zoomButtons : false,
   onRegionClick: function (event, code) {
    $('#basicExampleModal').modal('show');
  },
});
