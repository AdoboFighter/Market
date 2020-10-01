

// $(document).ready(function () {
//     showmap()
// });
window.onload = function () {
    showmap()
};


function showmap() {
    $('#map').empty();


    var map = "spcmap",
        regions1 = {
            "district1": "#f09427",
            "district2": "#ff6680",
            "district3": "#c3d334",
            "district4": "#80db7d",
            "district5": "#90ACB2",
            "district6": "#9f5391",
            "district7": "#ffff7d",

        };


    $("#map").vectorMap({
        map: map,
        regionStyle: {
            initial: {
                fill: "white",
                "fill-opacity": 1,
                stroke: "white",
                "stroke-width": 2,
                "stroke-opacity": 1,
            }
        },
        series: {
            regions: [{

                attribute: "fill",
                values: {
                    "district1": "#f09427",
                    "district2": "#ff6680",
                    "district3": "#c3d334",
                    "district4": "#80db7d",
                    "district5": "#90ACB2",
                    "district6": "#9f5391",
                    "district7": "#ffff7d",

                },

            }],

        },
        onRegionClick: function (event, code) {


            switch (code) {
                case "district1":
                    console.log(code);
                    $('#map').empty();
                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {

                            Marker1 = [

                                { coords: [600, 500], brgy: 'SAN BUENAVENTURA', id: '043424043', type: 'Positive', name: 'Positive Cases: ' + res['SAN BUENAVENTURA']['Positive'], style: { r: res['SAN BUENAVENTURA']['Positive'] == '1' ? 0 : 7 } },
                                { coords: [700, 500], brgy: 'SAN BUENAVENTURA', type: 'Probable', id: '043424043', name: 'Probable Cases: ' + res['SAN BUENAVENTURA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN BUENAVENTURA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [700, 425], brgy: 'SAN BUENAVENTURA', type: 'Suspect', id: '043424043', name: 'Suspect Cases: ' + res['SAN BUENAVENTURA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN BUENAVENTURA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [620, 425], brgy: 'SAN BUENAVENTURA', type: 'Recovered', id: '043424043', name: 'Recovered: ' + res['SAN BUENAVENTURA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN BUENAVENTURA']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [7000, 3900], brgy: 'VI-D', type: 'Positve', id: '043424027', name: 'Positive Cases: ' + res['Brgy. VI-D']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VI-D']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [7400, 3600], brgy: 'VI-D', type: 'Probable', id: '043424027', name: 'Probable Cases: ' + res['Brgy. VI-D']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VI-D']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [7900, 3800], brgy: 'VI-D', type: 'Suspect', id: '043424027', name: 'Suspect Cases: ' + res['Brgy. VI-D']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VI-D']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [8400, 3600], brgy: 'VI-D', type: 'Recovered', id: '043424027', name: 'Recovered: ' + res['Brgy. VI-D']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VI-D']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [7300, 4400], brgy: 'VI-C', type: 'Positive', id: '043424002', name: 'Positive Cases: ' + res['Brgy. VI-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VI-C']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [7400, 5000], brgy: 'VI-C', type: 'Probable', id: '043424002', name: 'Probable Cases: ' + res['Brgy. VI-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VI-C']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [7700, 4500], brgy: 'VI-C', type: 'Suspect', id: '043424002', name: 'Suspect Cases: ' + res['Brgy. VI-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VI-C']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [7800, 4800], brgy: 'VI-C', type: 'Recovered', id: '043424002', name: 'Recovered: ' + res['Brgy. VI-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VI-C']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [8400, 4100], brgy: 'VI-B', type: 'Positive', id: '043424025', name: 'Positive Cases: ' + res['Brgy. VI-B']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VI-B']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [8100, 4300], brgy: 'VI-B', type: 'Probable', id: '043424025', name: 'Probable Cases: ' + res['Brgy. VI-B']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VI-B']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [8150, 4700], brgy: 'VI-B', type: 'Suspect', id: '043424025', name: 'Suspect Cases: ' + res['Brgy. VI-B']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VI-B']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [8400, 4500], brgy: 'VI-B', type: 'Recovered', id: '043424025', name: 'Recovered: ' + res['Brgy. VI-B']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VI-B']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [8700, 4400], brgy: 'V-A', type: 'Positive', id: '043424020', name: 'Positive Cases: ' + res['Brgy. V-A']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. V-A']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [8700, 4700], brgy: 'V-A', type: 'Probable', id: '043424020', name: 'Probable Cases: ' + res['Brgy. V-A']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. V-A']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [8750, 4900], brgy: 'V-A', type: 'Suspect', id: '043424020', name: 'Suspect Cases: ' + res['Brgy. V-A']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. V-A']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [8700, 4100], brgy: 'V-A', type: 'Recovered', id: '043424020', name: 'Recovered: ' + res['Brgy. V-A']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. V-A']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [6500, 4100], brgy: 'VI-E', type: 'Positive', id: '043424028', name: 'Positive Cases: ' + res['Brgy. VI-E']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VI-E']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [6200, 4400], brgy: 'VI-E', type: 'Probable', id: '043424028', name: 'Probable Cases: ' + res['Brgy. VI-E']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VI-E']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [6500, 4700], brgy: 'VI-E', type: 'Suspect', id: '043424028', name: 'Suspect Cases: ' + res['Brgy. VI-E']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VI-E']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [6800, 4800], brgy: 'VI-E', type: 'Recovered', id: '043424028', name: 'Recovered: ' + res['Brgy. VI-E']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VI-E']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [5900, 5250], brgy: 'I-A', type: 'Positive', id: '043424028', name: 'Positive Cases: ' + res['Brgy. I-A']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. I-A']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [6200, 5150], brgy: 'I-A', type: 'Probable', id: '043424028', name: 'Probable Cases: ' + res['Brgy. I-A']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. I-A']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [5700, 5100], brgy: 'I-A', type: 'Suspect', id: '043424028', name: 'Suspect Cases: ' + res['Brgy. I-A']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. I-A']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [6450, 5300], brgy: 'I-A', type: 'Recovered', id: '043424028', name: 'Recovered: ' + res['Brgy. I-A']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. I-A']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [6750, 6000], brgy: 'I-C', type: 'Positive', id: '043424001', name: 'Positive Cases: ' + res['Brgy. I-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. I-C']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [7000, 6350], brgy: 'I-C', type: 'Probable', id: '043424001', name: 'Probable Cases: ' + res['Brgy. I-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. I-C']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [6600, 6500], brgy: 'I-C', type: 'Suspect', id: '043424001', name: 'Suspect Cases: ' + res['Brgy. I-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. I-C']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [7000, 6700], brgy: 'I-C', type: 'Recovered', id: '043424001', name: 'Recovered: ' + res['Brgy. I-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. I-C']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [5500, 6000], brgy: 'I-B', type: 'Positive', id: '043424004', name: 'Positive Cases: ' + res['Brgy. I-B']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. I-B']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [5900, 5700], brgy: 'I-B', type: 'Probable', id: '043424004', name: 'Probable Cases: ' + res['Brgy. I-B']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. I-B']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [5900, 6300], brgy: 'I-B', type: 'Suspect', id: '043424004', name: 'Suspect Cases: ' + res['Brgy. I-B']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. I-B']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [5600, 6600], brgy: 'I-B', type: 'Recovered', id: '043424004', name: 'Recovered: ' + res['Brgy. I-B']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. I-B']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [7600, 5600], brgy: 'VI-A', type: 'Positive', id: '043424024', name: 'Positive Cases: ' + res['Brgy. VI-A']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VI-A']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [7900, 5600], brgy: 'VI-A', type: 'Probable', id: '043424024', name: 'Probable Cases: ' + res['Brgy. VI-A']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VI-A']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [8300, 5300], brgy: 'VI-A', type: 'Suspect', id: '043424024', name: 'Suspect Cases: ' + res['Brgy. VI-A']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VI-A']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [8300, 5600], brgy: 'VI-A', type: 'Recovered', id: '043424024', name: 'Recovered: ' + res['Brgy. VI-A']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VI-A']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [7450, 6600], brgy: 'VII-A', type: 'Positive', id: '043424029', name: 'Positive Cases: ' + res['Brgy. VII-A']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VII-A']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [7450, 6100], brgy: 'VII-A', type: 'Probable', id: '043424029', name: 'Probable Cases: ' + res['Brgy. VII-A']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VI-A']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [7700, 6200], brgy: 'VII-A', type: 'Suspect', id: '043424029', name: 'Suspect Cases: ' + res['Brgy. VII-A']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VII-A']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [7700, 6500], brgy: 'VII-A', type: 'Recovered', id: '043424029', name: 'Recovered: ' + res['Brgy. VII-A']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VII-A']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [8100, 6500], brgy: 'VII-B', type: 'Positive', id: '043424030', name: 'Positive Cases: ' + res['Brgy. VII-B']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VII-B']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8100, 6900], brgy: 'VII-B', type: 'Probable', id: '043424030', name: 'Probable Cases: ' + res['Brgy. VII-B']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VII-B']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [7900, 6800], brgy: 'VII-B', type: 'Suspect', id: '043424030', name: 'Suspect Cases: ' + res['Brgy. VII-B']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VII-B']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8100, 6700], brgy: 'VII-B', type: 'Recovered', id: '043424030', name: 'Recovered: ' + res['Brgy. VII-B']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VII-B']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [8600, 5700], brgy: 'V-B', type: 'Positive', id: '043424021', name: 'Positive Cases: ' + res['Brgy. V-B']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. V-B']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8400, 5900], brgy: 'V-B', type: 'Probable', id: '043424021', name: 'Probable Cases: ' + res['Brgy. V-B']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. V-B']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [8700, 5500], brgy: 'V-B', type: 'Suspect', id: '043424021', name: 'Suspect Cases: ' + res['Brgy. V-B']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. V-B']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8250, 6100], brgy: 'V-B', type: 'Recovered', id: '043424021', name: 'Recovered: ' + res['Brgy. V-B']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. V-B']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [8950, 5500], brgy: 'V-C', type: 'Positive', id: '043424022', name: 'Positive Cases: ' + res['Brgy. V-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. V-C']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8750, 5800], brgy: 'V-C', type: 'Probable', id: '043424022', name: 'Probable Cases: ' + res['Brgy. V-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. V-C']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [8610, 6000], brgy: 'V-C', type: 'Suspect', id: '043424022', name: 'Suspect Cases: ' + res['Brgy. V-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. V-C']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8470, 6200], brgy: 'V-C', type: 'Recovered', id: '043424022', name: 'Recovered: ' + res['Brgy. V-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. V-C']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [9000, 5800], brgy: 'V-D', type: 'Positive', id: '043424023', name: 'Positive Cases: ' + res['Brgy. V-D']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. V-D']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8900, 6000], brgy: 'V-D', type: 'Probable', id: '043424023', name: 'Probable Cases: ' + res['Brgy. V-D']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. V-D']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [8700, 6300], brgy: 'V-D', type: 'Suspect', id: '043424023', name: 'Suspect Cases: ' + res['Brgy. V-D']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. V-D']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [9190, 5500], brgy: 'V-D', type: 'Recovered', id: '043424023', name: 'Recovered: ' + res['Brgy. V-D']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. V-D']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [9200, 6000], brgy: 'IV-C', type: 'Positive', id: '043424019', name: 'Positive Cases: ' + res['Brgy. IV-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. IV-C']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [9000, 6200], brgy: 'IV-C', type: 'Probable', id: '043424019', name: 'Probable Cases: ' + res['Brgy. IV-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. IV-C']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [9300, 5800], brgy: 'IV-C', type: 'Suspect', id: '043424019', name: 'Suspect Cases: ' + res['Brgy. IV-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. IV-C']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8800, 6500], brgy: 'IV-C', type: 'Recovered', id: '043424019', name: 'Recovered: ' + res['Brgy. IV-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. IV-C']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [9100, 6500], brgy: 'IV-B', type: 'Positive', id: '043424018', name: 'Positive Cases: ' + res['Brgy. IV-B']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. IV-B']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [9700, 5900], brgy: 'IV-B', type: 'Probable', id: '043424018', name: 'Probable Cases: ' + res['Brgy. IV-B']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. IV-B']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [9400, 6100], brgy: 'IV-B', type: 'Suspect', id: '043424018', name: 'Suspect Cases: ' + res['Brgy. IV-B']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. IV-B']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [9400, 6300], brgy: 'IV-B', type: 'Recovered', id: '043424018', name: 'Recovered: ' + res['Brgy. IV-B']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. IV-B']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [11000, 6100], brgy: 'IV-A', type: 'Positive', id: '043424017', name: 'Positive Cases: ' + res['Brgy. IV-A']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. IV-A']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [10000, 6100], brgy: 'IV-A', type: 'Probable', id: '043424017', name: 'Probable Cases: ' + res['Brgy. IV-A']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. IV-A']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [10500, 6300], brgy: 'IV-A', type: 'Suspect', id: '043424017', name: 'Suspect Cases: ' + res['Brgy. IV-A']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. IV-A']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [11500, 6300], brgy: 'IV-A', type: 'Recovered', id: '043424017', name: 'Recovered: ' + res['Brgy. IV-A']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. IV-A']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [10200, 6800], brgy: 'III-D', type: 'Positive', id: '043424014', name: 'Positive Cases: ' + res['Brgy. III-D']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. III-D']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [10800, 6800], brgy: 'III-D', type: 'Probable', id: '043424014', name: 'Probable Cases: ' + res['Brgy. III-D']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. III-D']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [10500, 7200], brgy: 'III-D', type: 'Suspect', id: '043424014', name: 'Suspect Cases: ' + res['Brgy. III-D']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. III-D']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [10800, 7200], brgy: 'III-D', type: 'Recovered', id: '043424014', name: 'Recovered: ' + res['Brgy. III-D']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. III-D']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [11250, 7100], brgy: 'III-E', type: 'Positive', id: '043424015', name: 'Positive Cases: ' + res['Brgy. III-E']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. III-E']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [12100, 6600], brgy: 'III-E', type: 'Probable', id: '043424015', name: 'Probable Cases: ' + res['Brgy. III-E']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. III-E']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [11800, 6600], brgy: 'III-E', type: 'Suspect', id: '043424015', name: 'Suspect Cases: ' + res['Brgy. III-E']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. III-E']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [11500, 6750], brgy: 'III-E', type: 'Recovered', id: '043424015', name: 'Recovered: ' + res['Brgy. III-E']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. III-E']['Recovered'] == '0' ? 0 : 5 } },


                                { coords: [9500, 8000], brgy: 'III-C', type: 'Positive', id: '043424013', name: 'Positive Cases: ' + res['Brgy. III-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. III-C']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [9800, 7700], brgy: 'III-C', type: 'Probable', id: '043424013', name: 'Probable Cases: ' + res['Brgy. III-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. III-C']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [10100, 7700], brgy: 'III-C', type: 'Suspect', id: '043424013', name: 'Suspect Cases: ' + res['Brgy. III-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. III-C']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [10000, 7400], brgy: 'III-C', type: 'Recovered', id: '043424013', name: 'Recovered: ' + res['Brgy. III-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. III-C']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [9700, 7000], brgy: 'III-F', type: 'Positive', id: '043424016', name: 'Positive Cases: ' + res['Brgy. III-F']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. III-F']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [9700, 7200], brgy: 'III-F', type: 'Probable', id: '043424016', name: 'Probable Cases: ' + res['Brgy. III-F']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. III-F']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [9500, 7400], brgy: 'III-F', type: 'Suspect', id: '043424016', name: 'Suspect Cases: ' + res['Brgy. III-F']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. III-F']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [9400, 7600], brgy: 'III-F', type: 'Recovered', id: '043424016', name: 'Recovered: ' + res['Brgy. III-F']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. III-F']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [9300, 6800], brgy: 'III-B', type: 'Positive', id: '043424012', name: 'Positive Cases: ' + res['Brgy. III-B']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. III-B']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [9100, 6900], brgy: 'III-B', type: 'Probable', id: '043424012', name: 'Probable Cases: ' + res['Brgy. III-B']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. III-B']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [9250, 7100], brgy: 'III-B', type: 'Suspect', id: '043424012', name: 'Suspect Cases: ' + res['Brgy. III-B']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. III-B']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [9100, 7250], brgy: 'III-B', type: 'Recovered', id: '043424012', name: 'Recovered: ' + res['Brgy. III-B']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. III-B']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [9000, 8000], brgy: 'III-A', type: 'Positive', id: '043424011', name: 'Positive Cases: ' + res['Brgy. III-A']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. III-A']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [8800, 7850], brgy: 'III-A', type: 'Probable', id: '043424011', name: 'Probable Cases: ' + res['Brgy. III-A']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. III-A']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [8800, 7650], brgy: 'III-A', type: 'Suspect', id: '043424011', name: 'Suspect Cases: ' + res['Brgy. III-A']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. III-A']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [9200, 7750], brgy: 'III-A', type: 'Recovered', id: '043424011', name: 'Recovered: ' + res['Brgy. III-A']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. III-A']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [8800, 7050], brgy: 'VII-D', type: 'Positive', id: '043424032', name: 'Positive Cases: ' + res['Brgy. VII-D']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VII-D']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8700, 7140], brgy: 'VII-D', type: 'Probable', id: '043424032', name: 'Probable Cases: ' + res['Brgy. VII-D']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VII-D']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [8550, 7240], brgy: 'VII-D', type: 'Suspect', id: '043424032', name: 'Suspect Cases: ' + res['Brgy. VII-D']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VII-D']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8550, 7340], brgy: 'VII-D', type: 'Recovered', id: '043424032', name: 'Recovered: ' + res['Brgy. VII-D']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VII-D']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [8550, 6800], brgy: 'VII-C', type: 'Positive', id: '043424031', name: 'Positive Cases: ' + res['Brgy. VII-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VII-C']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8400, 7000], brgy: 'VII-C', type: 'Probable', id: '043424031', name: 'Probable Cases: ' + res['Brgy. VII-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VII-C']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [8400, 6900], brgy: 'VII-C', type: 'Suspect', id: '043424031', name: 'Suspect Cases: ' + res['Brgy. VII-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VII-C']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8250, 7100], brgy: 'VII-C', type: 'Recovered', id: '043424031', name: 'Recovered: ' + res['Brgy. VII-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VII-C']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [7800, 7100], brgy: 'VII-E', type: 'Positive', id: '043424033', name: 'Positive Cases: ' + res['Brgy. VII-E']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. VII-E']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [8000, 7200], brgy: 'VII-E', type: 'Probable', id: '043424033', name: 'Probable Cases: ' + res['Brgy. VII-E']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. VII-E']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [7870, 7310], brgy: 'VII-E', type: 'Suspect', id: '043424033', name: 'Suspect Cases: ' + res['Brgy. VII-E']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. VII-E']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [8100, 7310], brgy: 'VII-E', type: 'Recovered', id: '043424033', name: 'Recovered: ' + res['Brgy. VII-E']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. VII-E']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [7900, 7500], brgy: 'II-D', type: 'Positive', id: '043424008', name: 'Positive Cases: ' + res['Brgy. II-D']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. II-D']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [7600, 7400], brgy: 'II-D', type: 'Probable', id: '043424008', name: 'Probable Cases: ' + res['Brgy. II-D']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. II-D']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [7870, 7650], brgy: 'II-D', type: 'Suspect', id: '043424008', name: 'Suspect Cases: ' + res['Brgy. II-D']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. II-D']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [7700, 7500], brgy: 'II-D', type: 'Recovered', id: '043424008', name: 'Recovered: ' + res['Brgy. II-D']['Recovrerd'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. II-D']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [7100, 8100], brgy: 'II-C', type: 'Positive', id: '043424007', name: 'Positive Cases: ' + res['Brgy. II-C']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. II-C']['Positive'] == '0' ? 0 : 4 } },
                                { coords: [7300, 7900], brgy: 'II-C', type: 'Probable', id: '043424007', name: 'Probable Cases: ' + res['Brgy. II-C']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. II-C']['Probable'] == '0' ? 0 : 4 } },
                                { coords: [7400, 8310], brgy: 'II-C', type: 'Suspect', id: '043424007', name: 'Suspect Cases: ' + res['Brgy. II-C']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. II-C']['Suspect'] == '0' ? 0 : 4 } },
                                { coords: [7600, 7900], brgy: 'II-C', type: 'Recovered', id: '043424007', name: 'Recovered: ' + res['Brgy. II-C']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. II-C']['Recovered'] == '0' ? 0 : 4 } },

                                { coords: [8000, 8100], brgy: 'II-E', type: 'Positive', id: '043424009', name: 'Positive Cases: ' + res['Brgy. II-E']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. II-E']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [8300, 8100], brgy: 'II-E', type: 'Probable', id: '043424009', name: 'Probable Cases: ' + res['Brgy. II-E']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. II-E']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [8300, 8400], brgy: 'II-E', type: 'Suspect', id: '043424009', name: 'Suspect Cases: ' + res['Brgy. II-E']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. II-E']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [8000, 8600], brgy: 'II-E', type: 'Recovered', id: '043424009', name: 'Recovered: ' + res['Brgy. II-E']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. II-E']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [6700, 10000], brgy: 'II-F', type: 'Positive', id: '043424010', name: 'Positive Cases: ' + res['Brgy. II-F']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. II-F']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [7000, 9500], brgy: 'II-F', type: 'Probable', id: '043424010', name: 'Probable Cases: ' + res['Brgy. II-F']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. II-F']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [7000, 9200], brgy: 'II-F', type: 'Suspect', id: '043424010', name: 'Suspect Cases: ' + res['Brgy. II-F']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. II-F']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [7500, 8900], brgy: 'II-F', type: 'Recovered', id: '043424010', name: 'Recovered: ' + res['Brgy. II-F']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. II-F']['Recovered'] == '0' ? 0 : 5 } },

                                { coords: [6800, 8900], brgy: 'II-D', type: 'Positive', id: '043424008', name: 'Positive Cases: ' + res['Brgy. II-D']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['Brgy. II-D']['Positive'] == '0' ? 0 : 5 } },
                                { coords: [6650, 8700], brgy: 'II-D', type: 'Probable', id: '043424008', name: 'Probable Cases: ' + res['Brgy. II-D']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['Brgy. II-D']['Probable'] == '0' ? 0 : 5 } },
                                { coords: [6800, 8400], brgy: 'II-D', type: 'Suspect', id: '043424008', name: 'Suspect Cases: ' + res['Brgy. II-D']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['Brgy. II-D']['Suspect'] == '0' ? 0 : 5 } },
                                { coords: [7100, 8500], brgy: 'II-D', type: 'Recovered', id: '043424008', name: 'Recovered: ' + res['Brgy. II-D']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['Brgy. II-D']['Recovered'] == '0' ? 0 : 5 } },


                            ]

                            var map = "district1A",
                                regions1 = {
                                    "sixD": "#f09427",
                                    "sixB": "#9f5391",
                                    "sixC": "#17a8e1",
                                    "fiveA": "#80db7d",
                                    "sixA": "#ff4040",
                                    "park": "#1e9bBc",
                                    "tresmartires": "#1e9bBc",
                                    "fiveB": "#bbc931",
                                    "fiveC": "#55e590",
                                    "fiveD": "#ffff7d",
                                    "fourC": "#ff6680",
                                    "fourB": "#d680b5",
                                    "sixE": "#c3d334",
                                    "dikasali1": "#90acb2",
                                    "oneA": "#00dbff",
                                    "oneC": "#ff6680",
                                    "oneB": "#ffff7d",
                                    "dikasali2": "#90acb2",
                                    "dikasali3": "#90acb2",
                                    "dikasali4": "#90acb2",
                                    "dikasali5": "#90acb2",
                                    "sevenA": "#5a4fe8",
                                    "sevenB": "#7fe5e5",
                                    "sevenC": "#80db7d",
                                    "sevenD": "#f09427",
                                    "sevenE": "#1e9b8c",
                                    "twoD": "#ff4040",
                                    "fourA": "#f09427",
                                    "threeD": "#c3d334",
                                    "threeE": "#17a8e1",
                                    "threeC": "#9f5391",
                                    "threeB": "#1083bc",
                                    "threeF": "#ec5d6f",
                                    "threeA": "#40a346",
                                    "twoC": "#17abe1",
                                    "twoE": "#ffca32",
                                    "twoB": "#cc7b44",
                                    "twoF": "#c3d334",

                                };



                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 2,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{

                                        attribute: "fill",
                                        values: {
                                            "sixD": "#f09427",
                                            "sixB": "#9f5391",
                                            "sixC": "#17a8e1",
                                            "fiveA": "#80db7d",
                                            "sixA": "#ff4040",
                                            "park": "#1e9bBc",
                                            "tresmartires": "#1e9bBc",
                                            "fiveB": "#bbc931",
                                            "fiveC": "#55e590",
                                            "fiveD": "#ffff7d",
                                            "fourC": "#ff6680",
                                            "fourB": "#d680b5",
                                            "sixE": "#c3d334",
                                            "dikasali1": "#90acb2",
                                            "oneA": "#00dbff",
                                            "oneC": "#ff6680",
                                            "oneB": "#ffff7d",
                                            "dikasali2": "#90acb2",
                                            "dikasali3": "#90acb2",
                                            "dikasali4": "#90acb2",
                                            "dikasali5": "#90acb2",
                                            "sevenA": "#5a4fe8",
                                            "sevenB": "#7fe5e5",
                                            "sevenC": "#80db7d",
                                            "sevenD": "#f09427",
                                            "sevenE": "#1e9b8c",
                                            "twoD": "#ff4040",
                                            "fourA": "#f09427",
                                            "threeD": "#c3d334",
                                            "threeE": "#17a8e1",
                                            "threeC": "#9f5391",
                                            "threeB": "#1083bc",
                                            "threeF": "#ec5d6f",
                                            "threeA": "#40a346",
                                            "twoC": "#17abe1",
                                            "twoE": "#ffca32",
                                            "twoB": "#cc7b44",
                                            "twoF": "#c3d334",

                                        },

                                    }],

                                },
                                onRegionClick: function (event, code) {

                                    switch (code) {
                                        case "oneA":
                                            normaldmodal('043424003')
                                            break;
                                        case "oneB":
                                            normaldmodal('043424004')
                                            break;
                                        case "oneC":
                                            normaldmodal('043424001')
                                            break;
                                        case "twoA":
                                            normaldmodal('043424005')
                                            break;
                                        case "twoB":
                                            normaldmodal('043424006')
                                            break;
                                        case "twoC":
                                            normaldmodal('043424007')
                                            break;
                                        case "twoD":
                                            normaldmodal('043424008')
                                            break;
                                        case "twoE":
                                            normaldmodal('043424009')
                                            break;
                                        case "twoF":
                                            normaldmodal('043424010')
                                            break;
                                        case "threeA":
                                            normaldmodal('043424011')
                                            break;
                                        case "threeB":
                                            normaldmodal('043424012')
                                            break;
                                        case "threeC":
                                            normaldmodal('043424013')
                                            break;
                                        case "threeD":
                                            normaldmodal('043424014')
                                            break;
                                        case "threeE":
                                            normaldmodal('043424015')
                                            break;
                                        case "threeF":
                                            normaldmodal('043424016')
                                            break;
                                        case "fourA":
                                            normaldmodal('043424017')
                                            break;
                                        case "fourB":
                                            normaldmodal('043424018')
                                            break;
                                        case "fourC":
                                            normaldmodal('043424019')
                                            break;
                                        case "fiveA":
                                            normaldmodal('043424020')
                                            break;
                                        case "fiveB":
                                            normaldmodal('043424021')
                                            break;
                                        case "fiveC":
                                            normaldmodal('043424022')
                                            break;
                                        case "fiveD":
                                            normaldmodal('043424023')
                                            break;
                                        case "sixA":
                                            normaldmodal('043424024')
                                            break;
                                        case "sixB":
                                            normaldmodal('043424025')
                                            break;
                                        case "sixC":
                                            normaldmodal('043424002')
                                            break;
                                        case "sixD":
                                            normaldmodal('043424027')
                                            break;
                                        case "sixE":
                                            normaldmodal('043424028')
                                            break;
                                        case "sevenA":
                                            normaldmodal('043424029')
                                            break;
                                        case "sevenB":
                                            normaldmodal('043424030')
                                            break;
                                        case "sevenC":
                                            normaldmodal('043424031')
                                            break;
                                        case "sevenD":
                                            normaldmodal('043424032')
                                            break;
                                        case "sevenE":
                                            normaldmodal('043424033')
                                            break;


                                        default:
                                        // code block
                                    }


                                },

                                onMarkerClick: function (event, index) {

                                    switch (Marker1[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker1[index].id, Marker1[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker1[index].id, Marker1[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker1[index].id, Marker1[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker1[index].id, Marker1[index].type);

                                            break;
                                        default:
                                        // code block
                                    }


                                },


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions1[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                }, markerStyle: {
                                    initial: {
                                        fill: '#FF0000',
                                        stroke: '#383f47'
                                    }
                                },
                                backgroundColor: '#383f47',
                                markers: Marker1,

                            });



                        }
                    });

                    break;


                case "district2":

                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {
                            $('#map').empty();
                            Marker2 = [
                                { coords: [900, 220], brgy: 'STA. CATALINA', id: '043424067', type: 'Positive', name: 'Positive Cases: ' + res['STA. CATALINA']['Positive'], style: { r: res['STA. CATALINA']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [850, 310], brgy: 'STA. CATALINA', type: 'Probable', id: '043424067', name: 'Probable Cases: ' + res['STA. CATALINA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. CATALINA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [800, 340], brgy: 'STA. CATALINA', type: 'Suspect', id: '043424067', name: 'Suspect Cases: ' + res['STA. CATALINA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. CATALINA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [900, 340], brgy: 'STA. CATALINA', type: 'Recovered', id: '043424067', name: 'Recovered: ' + res['STA. CATALINA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. CATALINA']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [960, 480], brgy: 'SAN LORENZO', id: '043424055', type: 'Positive', name: 'Positive Cases: ' + res['SAN LORENZO']['Positive'], style: { r: res['SAN LORENZO']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [900, 480], brgy: 'SAN LORENZO', type: 'Probable', id: '043424055', name: 'Probable Cases: ' + res['SAN LORENZO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN LORENZO']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [900, 550], brgy: 'SAN LORENZO', type: 'Suspect', id: '043424055', name: 'Suspect Cases: ' + res['SAN LORENZO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN LORENZO']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [950, 530], brgy: 'SAN LORENZO', type: 'Recovered', id: '043424055', name: 'Recovered: ' + res['SAN LORENZO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN LORENZO']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [1200, 530], brgy: 'STO. ANGEL', id: '043424076', type: 'Positive', name: 'Positive Cases: ' + res['STO. ANGEL']['Positive'], style: { r: res['STO. ANGEL']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1100, 540], brgy: 'STO. ANGEL', type: 'Probable', id: '043424076', name: 'Probable Cases: ' + res['STO. ANGEL']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STO. ANGEL']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1050, 620], brgy: 'STO. ANGEL', type: 'Suspect', id: '043424076', name: 'Suspect Cases: ' + res['STO. ANGEL']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STO. ANGEL']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1100, 680], brgy: 'STO. ANGEL', type: 'Recovered', id: '043424076', name: 'Recovered: ' + res['STO. ANGEL']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STO. ANGEL']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [1100, 740], brgy: 'SAN DIEGO', id: '043424046', type: 'Positive', name: 'Positive Cases: ' + res['SAN DIEGO']['Positive'], style: { r: res['SAN DIEGO']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1020, 740], brgy: 'SAN DIEGO', type: 'Probable', id: '043424046', name: 'Probable Cases: ' + res['SAN DIEGO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN DIEGO']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1200, 680], brgy: 'SAN DIEGO', type: 'Suspect', id: '043424046', name: 'Suspect Cases: ' + res['SAN DIEGO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN DIEGO']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1300, 760], brgy: 'SAN DIEGO', type: 'Recovered', id: '043424046', name: 'Recovered: ' + res['SAN DIEGO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN DIEGO']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [900, 740], brgy: 'SANTA ISABEL', id: '043424070', type: 'Positive', name: 'Positive Cases: ' + res['STA. ISABEL']['Positive'], style: { r: res['STA. ISABEL']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [940, 800], brgy: 'SANTA ISABEL', type: 'Probable', id: '043424070', name: 'Probable Cases: ' + res['STA. ISABEL']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. ISABEL']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1000, 840], brgy: 'SANTA ISABEL', type: 'Suspect', id: '043424070', name: 'Suspect Cases: ' + res['STA. ISABEL']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. ISABEL']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1200, 840], brgy: 'SANTA ISABEL', type: 'Recovered', id: '043424070', name: 'Recovered: ' + res['STA. ISABEL']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. ISABEL']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [600, 650], brgy: 'DOLORES', id: '043424037', type: 'Positive', name: 'Positive Cases: ' + res['DOLORES']['Positive'], style: { r: res['DOLORES']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [740, 580], brgy: 'DOLORES', type: 'Probable', id: '043424037', name: 'Probable Cases: ' + res['DOLORES']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['DOLORES']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [700, 580], brgy: 'DOLORES', type: 'Suspect', id: '043424037', name: 'Suspect Cases: ' + res['DOLORES']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['DOLORES']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [620, 600], brgy: 'DOLORES', type: 'Recovered', id: '043424037', name: 'Recovered: ' + res['DOLORES']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['DOLORES']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [760, 730], brgy: 'SAN PEDRO', id: '043424062', type: 'Positive', name: 'Positive Cases: ' + res['SAN PEDRO']['Positive'], style: { r: res['SAN PEDRO']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [760, 675], brgy: 'SAN PEDRO', type: 'Probable', id: '043424062', name: 'Probable Cases: ' + res['SAN PEDRO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN PEDRO']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [700, 675], brgy: 'SAN PEDRO', type: 'Suspect', id: '043424062', name: 'Suspect Cases: ' + res['SAN PEDRO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN PEDRO']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [800, 730], brgy: 'SAN PEDRO', type: 'Recovered', id: '043424062', name: 'Recovered: ' + res['SAN PEDRO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN PEDRO']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [840, 790], brgy: 'CONCEPCION', id: '043424035', type: 'Positive', name: 'Positive Cases: ' + res['CONCEPCION']['Positive'], style: { r: res['CONCEPCION']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [760, 790], brgy: 'CONCEPCION', type: 'Probable', id: '043424035', name: 'Probable Cases: ' + res['CONCEPCION']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['CONCEPCION']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [840, 900], brgy: 'CONCEPCION', type: 'Suspect', id: '043424035', name: 'Suspect Cases: ' + res['CONCEPCION']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['CONCEPCION']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [800, 900], brgy: 'CONCEPCION', type: 'Recovered', id: '043424035', name: 'Recovered: ' + res['CONCEPCION']['Positive'], style: { fill: 'rgba(0,128,0)', r: res['CONCEPCION']['Recovered'] == '0' ? 0 : 7 } },

                            ]


                            var map = "District2",
                                regions1 = {
                                    "stacatalina": "#f09427",
                                    "sanbuenaventura": "#1e9b8c",
                                    "mojikap": "#B9F2FF",
                                    "mojikapside": "#007E93",
                                    "palakpakinlake": "#B9F2FF",
                                    "palakpakinside": "#007E93",
                                    "dolores": "#ff6680",
                                    "sanlorenzo": "#c3d334",
                                    "stoangel": "#80db7d",
                                    "sandiego": "#90ACB2",
                                    "yambolake": "#B9F2FF",
                                    "yamboside": "#007E93",
                                    "pandinlake": "#B9F2FF",
                                    "pandinside": "#007E93",
                                    "bunotlake": "#B9F2FF",
                                    "bunotside": "#007E93",
                                    "kalibatolake": "#B9F2FF",
                                    "kalibatoside": "#007E93",
                                    "staisabel": "#9f5391",
                                    "concepcion": "#f09427",
                                    "sanpedro": "#ffff7d",

                                };


                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 2,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{

                                        attribute: "fill",
                                        values: {
                                            "stacatalina": "#f09427",
                                            "sanbuenaventura": "#1e9b8c",
                                            "mojikap": "#B9F2FF",
                                            "mojikapside": "#007E93",
                                            "palakpakinlake": "#B9F2FF",
                                            "palakpakinside": "#007E93",
                                            "dolores": "#ff6680",
                                            "sanlorenzo": "#c3d334",
                                            "stoangel": "#80db7d",
                                            "sandiego": "#90ACB2",
                                            "yambolake": "#B9F2FF",
                                            "yamboside": "#007E93",
                                            "pandinlake": "#B9F2FF",
                                            "pandinside": "#007E93",
                                            "bunotlake": "#B9F2FF",
                                            "bunotside": "#007E93",
                                            "kalibatolake": "#B9F2FF",
                                            "kalibatoside": "#007E93",
                                            "staisabel": "#9f5391",
                                            "concepcion": "#f09427",
                                            "sanpedro": "#ffff7d",
                                        },

                                    }],

                                },
                                onRegionClick: function (event, code) {


                                    switch (code) {
                                        case "stacatalina":
                                            normaldmodal('043424067')
                                            break;
                                        case "sanbuenaventura":
                                            normaldmodal('043424043')
                                            break;
                                        case "sanlorenzo":
                                            normaldmodal('043424055')
                                            break;
                                        case "dolores":
                                            normaldmodal('043424037')
                                            break;
                                        case "sanpedro":
                                            normaldmodal('043424062')
                                            break;
                                        case "concepcion":
                                            normaldmodal('043424035')
                                            break;
                                        case "staisabel":
                                            normaldmodal('043424070')
                                            break;
                                        case "sandiego":
                                            normaldmodal('043424046')
                                            break;
                                        case "stoangel":
                                            normaldmodal('043424076')
                                            break;

                                        default:
                                        // code block
                                    }
                                },
                                onMarkerClick: function (event, index) {

                                    switch (Marker2[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker2[index].id, Marker2[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker2[index].id, Marker2[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker2[index].id, Marker2[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker2[index].id, Marker2[index].type);

                                            break;
                                        default:
                                        // code block
                                    }
                                },


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions1[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                }, markerStyle: {
                                    initial: {
                                        fill: '#FF0000',
                                        stroke: '#383f47'
                                    }
                                },
                                backgroundColor: '#383f47',
                                markers: Marker2,

                            });


                        }
                    });

                    break;

                case "district3":
                    $('#map').empty();
                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {

                            Marker3 = [
                                { coords: [400, 800.9700232], brgy: 'Sta Cruz', id: '043424068', type: 'Positive', name: 'Positive Cases: ' + res['STA. CRUZ']['Positive'], style: { r: res['STA. CRUZ']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [450.6786228, 880.9700232], id: '043424068', type: 'Probable', name: 'Probable Cases: ' + res['STA. CRUZ']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. CRUZ']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [500.6786228, 850.9700232], id: '043424068', type: 'Suspect', name: 'Suspect Cases: ' + res['STA. CRUZ']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. CRUZ']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [500.6786228, 810.9700232], id: '043424068', type: 'Recovered', name: 'Recovered: ' + res['STA. CRUZ']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. CRUZ']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [695, 580], brgy: 'Sta Elena', id: '043424081', type: 'Positive', name: 'Positive Cases: ' + res['STA. ELENA']['Recovered'], style: { r: res['STA. ELENA']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [650, 580], index: 1, id: '043424081', type: 'Probable', name: 'Probable Cases: ' + res['STA. ELENA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. ELENA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [605., 640], type: 'Suspect', id: '043424081', name: 'Suspect Cases: ' + res['STA. ELENA']['SUSPECT'], style: { fill: 'rgba(255,255,0)', r: res['STA. ELENA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [560, 640], type: 'Recovered', id: '043424081', name: 'Recovered: ' + res['STA. ELENA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. ELENA']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [700, 350.9700232], id: '043424078', brgy: 'Sto Nino', type: 'Positive', name: 'Positive Cases: ' + res['STO. NIÑO']['Positive'], style: { r: res['STO. NIÑO']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [650.6786228, 350.9700232], id: '043424078', type: 'Probable', index: 1, name: 'Probable Cases: ' + res['STO. NIÑO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STO. NIÑO']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [750.6786228, 350.9700232], id: '043424078', type: 'Suspect', name: 'Suspect Cases: ' + res['STO. NIÑO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STO. NIÑO']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [800.6786228, 350.9700232], id: '043424078', type: 'Recovered', name: 'Recovered: ' + res['STO. NIÑO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STO. NIÑO']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [850, 650.9700232], id: '043424045', brgy: 'San Cristobal', type: 'Positive', name: 'Positive Cases: ' + res['SAN CRISTOBAL']['Positive'], style: { r: res['SAN CRISTOBAL']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [890.6786228, 700], index: 1, id: '043424045', type: 'Probable', name: 'Probable Cases: ' + res['SAN CRISTOBAL']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN CRISTOBAL']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1001.6786228, 680.9700232], id: '043424045', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN CRISTOBAL']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN CRISTOBAL']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1050.6786228, 680.9700232], id: '043424045', type: 'Recovered', name: 'Recovered: ' + res['SAN CRISTOBAL']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN CRISTOBAL']['Recovered'] == '0' ? 0 : 7 } },
                            ]


                            var map = "District_3",
                                regions = {
                                    "SanCristobal": "#f09427",
                                    "StaCruz": "#1e9b8c",
                                    "StoNino": "#80db7d",
                                    "StaElena": "#9f5391",
                                };

                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 2,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{

                                        attribute: "fill",
                                        values: {
                                            "SanCristobal": '#f09427',
                                            "StaCruz": '#1e9b8c',
                                            "StoNino": "#80db7d",
                                            "StaElena": "#9f5391",
                                        },

                                    }],

                                }, onRegionClick: function (event, code) {

                                    switch (code) {
                                        case "StaCruz":
                                            normaldmodal('043424068')
                                            break;
                                        case "StaElena":
                                            normaldmodal('043424081')
                                            break;
                                        case "SanCristobal":
                                            normaldmodal('043424045')
                                            break;
                                        case "StoNino":
                                            normaldmodal('043424078')
                                            break;


                                        default:
                                        // code block
                                    }


                                },

                                onMarkerClick: function (event, index) {

                                    switch (Marker3[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker3[index].id, Marker3[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker3[index].id, Marker3[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker3[index].id, Marker3[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker3[index].id, Marker3[index].type);

                                            break;
                                        default:
                                        // code block
                                    }
                                },


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                }, markerStyle: {
                                    initial: {
                                        fill: '#FF0000',
                                        stroke: '#383f47'
                                    }
                                },
                                backgroundColor: '#383f47',
                                markers: Marker3,

                            });

                        }
                    });

                    break;
                case "district4":
                    $('#map').empty();
                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {

                            Marker4 = [
                                { coords: [870, 700], brgy: 'SANTIAGO 2', id: '043424074', type: 'Positive', name: 'Positive Cases: ' + res['SANTIAGO II']['Positive'], style: { r: res['SANTIAGO II']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [840, 650], brgy: 'SANTIAGO 2', id: '043424074', type: 'Probable', name: 'Probable Cases: ' + res['SANTIAGO II']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SANTIAGO II']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [700, 770], brgy: 'SANTIAGO 2', id: '043424074', type: 'Suspect', name: 'Suspect Cases: ' + res['SANTIAGO II']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SANTIAGO II']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [750, 810], brgy: 'SANTIAGO 2', id: '043424074', type: 'Recovered', name: 'Recovered: ' + res['SANTIAGO II']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SANTIAGO II']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [750, 895], brgy: 'BAUTISTA', id: '043424034', type: 'Positive', name: 'Positive Cases: ' + res['BAUTISTA']['Positive'], style: { r: res['BAUTISTA']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [840, 840], brgy: 'BAUTISTA', id: '043424034', type: 'Probable', name: 'Probable Cases: ' + res['BAUTISTA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['BAUTISTA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [720, 950], brgy: 'BAUTISTA', id: '043424034', type: 'Suspect', name: 'Suspect Cases: ' + res['BAUTISTA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['BAUTISTA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [905, 820], brgy: 'BAUTISTA', id: '043424034', type: 'Recovered', name: 'Recovered: ' + res['BAUTISTA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['BAUTISTA']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [950, 670], brgy: 'SANTIAGO 1', id: '043424073', type: 'Positive', name: 'Positive Cases: ' + res['SANTIAGO I']['Positive'], style: { r: res['SANTIAGO I']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [910, 640], brgy: 'SANTIAGO 1', id: '043424073', type: 'Probable', name: 'Probable Cases: ' + res['SANTIAGO I']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SANTIAGO I']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [850, 570], brgy: 'SANTIAGO 1', id: '043424073', type: 'Suspect', name: 'Suspect Cases: ' + res['SANTIAGO I']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SANTIAGO I']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [860, 530], brgy: 'SANTIAGO 1', id: '043424073', type: 'Recovered', name: 'Recovered: ' + res['SANTIAGO I']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SANTIAGO I']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [980, 470], brgy: 'SAN BARTOLOME', id: '043424042', type: 'Positive', name: 'Positive Cases: ' + res['SAN BARTOLOME']['Positive'], style: { r: res['SAN BARTOLOME']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [940, 470], brgy: 'SAN BARTOLOME', id: '043424042', type: 'Probable', name: 'Probable Cases: ' + res['SAN BARTOLOME']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN BARTOLOME']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [925, 520], brgy: 'SAN BARTOLOME', id: '043424042', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN BARTOLOME']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN BARTOLOME']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [980, 535], brgy: 'SAN BARTOLOME', id: '043424042', type: 'Recovered', name: 'Recovered: ' + res['SAN BARTOLOME']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN BARTOLOME']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [940, 395], brgy: 'STA. VERONICA', id: '043424072', type: 'Positive', name: 'Positive Cases: ' + res['STA. VERONICA']['Positive'], style: { r: res['STA. VERONICA']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [990, 395], brgy: 'STA. VERONICA', id: '043424072', type: 'Probable', name: 'Probable Cases: ' + res['STA. VERONICA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. VERONICA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [940, 340], brgy: 'STA. VERONICA', id: '043424072', type: 'Suspect', name: 'Suspect Cases: ' + res['STA. VERONICA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. VERONICA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [990, 320], brgy: 'STA. VERONICA', id: '043424072', type: 'Recovered', name: 'Recovered: ' + res['STA. VERONICA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. VERONICA']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [1050, 320], brgy: 'STA. MONICA', id: '043424083', type: 'Positive', name: 'Positive Cases: ' + res['STA. MONICA']['Positive'], style: { r: res['STA. MONICA']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1090, 290], brgy: 'STA. MONICA', id: '043424083', type: 'Probable', name: 'Probable Cases: ' + res['STA. MONICA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. MONICA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1090, 230], brgy: 'STA. MONICA', id: '043424083', type: 'Suspect', name: 'Suspect Cases: ' + res['STA. MONICA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. MONICA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1120, 210], brgy: 'STA. MONICA', id: '043424083', type: 'Recovered', name: 'Recovered: ' + res['STA. MONICA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. MONICA']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [1120, 165], brgy: 'SAN ROQUE', id: '043424064', type: 'Positive', name: 'Positive Cases: ' + res['SAN ROQUE']['Positive'], style: { r: res['SAN ROQUE']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1170, 165], brgy: 'SAN ROQUE', id: '043424064', type: 'Probable', name: 'Probable Cases: ' + res['SAN ROQUE']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN ROQUE']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1198, 140], brgy: 'SAN ROQUE', id: '043424064', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN ROQUE']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN ROQUE']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1210, 80], brgy: 'SAN ROQUE', id: '043424064', type: 'Recovered', name: 'Recovered: ' + res['SAN ROQUE']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN ROQUE']['Recovered'] == '0' ? 0 : 7 } },

                            ]

                            var map = "District4",
                                regions = {
                                    "sanroque": "#1e9b8c",
                                    "stamonica": "#ff6680",
                                    "staveronica": "#80db7d",
                                    "sanbartolome": "#c3d334",
                                    "santiago1": "#f09427",
                                    "santiago2": "#ffff7d",
                                    "bautista": "#90ACB2",
                                };


                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 2,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{

                                        attribute: "fill",
                                        values: {
                                            "sanroque": "#1e9b8c",
                                            "stamonica": "#ff6680",
                                            "staveronica": "#80db7d",
                                            "sanbartolome": "#c3d334",
                                            "santiago1": "#f09427",
                                            "santiago2": "#ffff7d",
                                            "bautista": "#90ACB2",

                                        },

                                    }],

                                },
                                onRegionClick: function (event, code) {

                                    switch (code) {
                                        case "sanroque":
                                            normaldmodal('043424064')
                                            break;
                                        case "stamonica":
                                            normaldmodal('043424083')
                                            break;
                                        case "staveronica":
                                            normaldmodal('043424072')
                                            break;
                                        case "sanbartolome":
                                            normaldmodal('043424042')
                                            break;
                                        case "santiago1":
                                            normaldmodal('043424073')
                                            break;
                                        case "santiago2":
                                            normaldmodal('043424074')
                                            break;
                                        case "bautista":
                                            normaldmodal('043424034')
                                            break;

                                        default:
                                        // code block
                                    }


                                },
                                onMarkerClick: function (event, index) {

                                    switch (Marker4[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker4[index].id, Marker4[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker4[index].id, Marke43[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker4[index].id, Marker4[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker4[index].id, Marker4[index].type);

                                            break;
                                        default:
                                        // code block
                                    }
                                },


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                }, markerStyle: {
                                    initial: {
                                        fill: '#FF0000',
                                        stroke: '#383f47'
                                    }
                                },
                                backgroundColor: '#383f47',
                                markers: Marker4,

                            });

                        }
                    });

                    break;
                case "district5":
                    $('#map').empty();
                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {

                            Marker5 = [
                                { coords: [750, 700], brgy: 'SAN CRISPIN', id: '043424044', type: 'Positive', name: 'Positive Cases: ' + res['SAN CRISPIN']['Positive'], style: { r: res['SAN CRISPIN']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [700, 600], brgy: 'SAN CRISPIN', id: '043424044', type: 'Probable', name: 'Probable Cases: ' + res['SAN CRISPIN']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN CRISPIN']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [680, 750], brgy: 'SAN CRISPIN', id: '043424044', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN CRISPIN']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN CRISPIN']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [650, 720], brgy: 'SAN CRISPIN', id: '043424044', type: 'Recovered', name: 'Recovered: ' + res['SAN CRISPIN']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN CRISPIN']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [880, 950], brgy: 'SAN NICOLAS', id: '043424061', type: 'Positive', name: 'Positive Cases: ' + res['SAN NICOLAS']['Positive'], style: { r: res['SAN NICOLAS']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [900, 780], brgy: 'SAN NICOLAS', id: '043424061', type: 'Probable', name: 'Probable Cases: ' + res['SAN NICOLAS']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN NICOLAS']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [850, 900], brgy: 'SAN NICOLAS', id: '043424061', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN NICOLAS']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN NICOLAS']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [830, 800], brgy: 'SAN NICOLAS', id: '043424061', type: 'Recovered', name: 'Recovered: ' + res['SAN NICOLAS']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN NICOLAS']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1050, 800], brgy: 'SAN RAFAEL', id: '043424063', type: 'Positive', name: 'Positive Cases: ' + res['SAN RAFAEL']['Positive'], style: { r: res['SAN RAFAEL']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1100, 690], brgy: 'SAN RAFAEL', id: '043424063', type: 'Probable', name: 'Probable Cases: ' + res['SAN RAFAEL']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN RAFAEL']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [980, 650], brgy: 'SAN RAFAEL', id: '043424063', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN RAFAEL']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN RAFAEL']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1120, 800], brgy: 'SAN RAFAEL', id: '043424063', type: 'Recovered', name: 'Recovered: ' + res['SAN RAFAEL']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN RAFAEL']['Recovered'] == '0' ? 0 : 6 } },


                                { coords: [750, 500], brgy: 'SANTA FILOMENA', id: '043424069', type: 'Positive', name: 'Positive Cases: ' + res['STA. FILOMENA']['Positive'], style: { r: res['STA. FILOMENA']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [850, 550], brgy: 'SANTA FILOMENA', id: '043424069', type: 'Probable', name: 'Probable Cases: ' + res['STA. FILOMENA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. FILOMENA']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [750, 400], brgy: 'SANTA FILOMENA', id: '043424069', type: 'Suspect', name: 'Suspect Cases: ' + res['STA. FILOMENA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. FILOMENA']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [900, 600], brgy: 'SANTA FILOMENA', id: '043424069', type: 'Recovered', name: 'Recovered: ' + res['STA. FILOMENA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. FILOMENA']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [850, 300], brgy: 'SAN JUAN', id: '043424054', type: 'Positive', name: 'Positive Cases: ' + res['SAN JUAN']['Positive'], style: { r: res['SAN JUAN']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [900, 360], brgy: 'SAN JUAN', id: '043424054', type: 'Probable', name: 'Probable Cases: ' + res['SAN JUAN']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN JUAN']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [950, 430], brgy: 'SAN JUAN', id: '043424054', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN JUAN']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN JUAN']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1000, 470], brgy: 'SAN JUAN', id: '043424054', type: 'Recovered', name: 'Recovered: ' + res['SAN JUAN']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN JUAN']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1100, 520], brgy: 'DEL REMEDIO', id: '043424036', type: 'Positive', name: 'Positive Cases: ' + res['DEL REMEDIO']['Positive'], style: { r: res['DEL REMEDIO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1180, 600], brgy: 'DEL REMEDIO', id: '043424036', type: 'Probable', name: 'Probable Cases: ' + res['DEL REMEDIO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['DEL REMEDIO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1180, 500], brgy: 'DEL REMEDIO', id: '043424036', type: 'Suspect', name: 'Suspect Cases: ' + res['DEL REMEDIO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['DEL REMEDIO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1250, 460], brgy: 'DEL REMEDIO', id: '043424036', type: 'Recovered', name: 'Recovered: ' + res['DEL REMEDIO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['DEL REMEDIO']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1350, 460], brgy: 'SAN LUCAS 2', id: '043424057', type: 'Positive', name: 'Positive Cases: ' + res['SAN LUCAS II']['Positive'], style: { r: res['DEL REMEDIO']['Recovered'] == '0' ? 0 : 6 } },
                                { coords: [1410, 400], brgy: 'SAN LUCAS 2', id: '043424057', type: 'Probable', name: 'Probable Cases: ' + res['SAN LUCAS II']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['DEL REMEDIO']['Recovered'] == '0' ? 0 : 6 } },
                                { coords: [1410, 460], brgy: 'SAN LUCAS 2', id: '043424057', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN LUCAS II']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['DEL REMEDIO']['Recovered'] == '0' ? 0 : 6 } },
                                { coords: [1460, 460], brgy: 'SAN LUCAS 2', id: '043424057', type: 'Recovered', name: 'Recovered: ' + res['SAN LUCAS II']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['DEL REMEDIO']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1350, 570], brgy: 'SAN LUCAS 1', id: '043424056', type: 'Positive', name: 'Positive Cases: ' + res['SAN LUCAS I']['Positive'], style: { r: res['SAN LUCAS I']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1500, 510], brgy: 'SAN LUCAS 1', id: '043424056', type: 'Probable', name: 'Probable Cases: ' + res['SAN LUCAS I']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN LUCAS I']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1410, 530], brgy: 'SAN LUCAS 1', id: '043424056', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN LUCAS I']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN LUCAS I']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1460, 510], brgy: 'SAN LUCAS 1', id: '043424056', type: 'Recovered', name: 'Recovered: ' + res['SAN LUCAS I']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN LUCAS I']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1100, 400], brgy: 'SANTA MARIA MAGDALENA', id: '043424071', type: 'Positive', name: 'Positive Cases: ' + res['STA. MA. MAGDALENA']['Positive'], style: { r: res['STA. MA. MAGDALENA']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1280, 270], brgy: 'SANTA MARIA MAGDALENA', id: '043424071', type: 'Probable', name: 'Probable Cases: ' + res['STA. MA. MAGDALENA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. MA. MAGDALENA']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1180, 350], brgy: 'SANTA MARIA MAGDALENA', id: '043424071', type: 'Suspect', name: 'Suspect Cases: ' + res['STA. MA. MAGDALENA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. MA. MAGDALENA']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1250, 330], brgy: 'SANTA MARIA MAGDALENA', id: '043424071', type: 'Recovered', name: 'Recovered: ' + res['STA. MA. MAGDALENA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. MA. MAGDALENA']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [950, 250], brgy: 'SAN MARCOS', id: '043424058', type: 'Positive', name: 'Positive Cases: ' + res['SAN MARCOS']['Positive'], style: { r: res['SAN MARCOS']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [970, 290], brgy: 'SAN MARCOS', id: '043424058', type: 'Probable', name: 'Probable Cases: ' + res['SAN MARCOS']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN MARCOS']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1150, 210], brgy: 'SAN MARCOS', id: '043424058', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN MARCOS']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN MARCOS']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1200, 220], brgy: 'SAN MARCOS', id: '043424058', type: 'Recovered', name: 'Recovered: ' + res['SAN MARCOS']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN MARCOS']['Recovered'] == '0' ? 0 : 6 } },


                                { coords: [870, 150], brgy: 'SAN MATEO', id: '043424059', type: 'Positive', name: 'Positive Cases: ' + res['SAN MATEO']['Positive'], style: { r: res['SAN MATEO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [910, 110], brgy: 'SAN MATEO', id: '043424059', type: 'Probable', name: 'Probable Cases: ' + res['SAN MATEO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN MATEO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [980, 90], brgy: 'SAN MATEO', id: '043424059', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN MATEO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN MATEO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1100, 150], brgy: 'SAN MATEO', id: '043424059', type: 'Recovered', name: 'Recovered: ' + res['SAN MATEO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN MATEO']['Recovered'] == '0' ? 0 : 6 } },


                            ]


                            var map = "District5",
                                regions5 = {
                                    "sancrispin": "#5335ff",
                                    "sannicolas": "#197024",
                                    "stafilomena": "#733c14",
                                    "sanrafael": "#751120",
                                    "delremedio": "#D70A93",
                                    "sanjuan": "#E97980",
                                    "sanlucas1": "#0977AE",
                                    "sanlucas2": "#C0DD07",
                                    "tikewlake": "#B9F2FF",
                                    "tikewside": "#007E93",
                                    "sanmarcos": "#7BE90C",
                                    "sanmateo": "#DD9207",
                                    "stamariamagdalena": "#5335ff",


                                };




                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 2,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{

                                        attribute: "fill",
                                        values: {
                                            "sancrispin": "#5335ff",
                                            "sannicolas": "#197024",
                                            "stafilomena": "#733c14",
                                            "sanrafael": "#751120",
                                            "delremedio": "#D70A93",
                                            "sanjuan": "#E97980",
                                            "sanlucas1": "#0977AE",
                                            "sanlucas2": "#C0DD07",
                                            "tikewlake": "#B9F2FF",
                                            "tikewside": "#007E93",
                                            "sanmarcos": "#7BE90C",
                                            "stamariamagdalena": "#5335ff",
                                            "sanmateo": "#DD9207",


                                        },

                                    }],

                                },
                                onRegionClick: function (event, code) {

                                    switch (code) {
                                        case "sanmateo":
                                            normaldmodal('043424059')
                                            break;
                                        case "sanmarcos":
                                            normaldmodal('043424058')
                                            break;
                                        case "stamariamagdalena":
                                            normaldmodal('043424071')
                                            break;
                                        case "sanjuan":
                                            normaldmodal('043424054')
                                            break;
                                        case "stafilomena":
                                            normaldmodal('043424069')
                                            break;
                                        case "sancrispin":
                                            normaldmodal('043424044')
                                            break;
                                        case "sannicolas":
                                            normaldmodal('043424061')
                                            break;
                                        case "sanrafael":
                                            normaldmodal('043424063')
                                            break;
                                        case "delremedio":
                                            normaldmodal('043424036')
                                            break;
                                        case "sanlucas1":
                                            normaldmodal('043424056')
                                            break;
                                        case "sanlucas2":
                                            normaldmodal('043424057')
                                            break;

                                        default:
                                        // code block
                                    }
                                },
                                onMarkerClick: function (event, index) {


                                    switch (Marker5[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker5[index].id, Marker5[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker5[index].id, Marker5[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker5[index].id, Marker5[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker5[index].id, Marker5[index].type);

                                            break;
                                        default:
                                        // code block
                                    }
                                },


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions5[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                }, markerStyle: {
                                    initial: {
                                        fill: '#FF0000',
                                        stroke: '#383f47'
                                    }
                                },
                                backgroundColor: '#383f47',
                                markers: Marker5,

                            });
                        }
                    });

                    break;
                case "district6":
                    $('#map').empty();
                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {


                            Marker6 = [
                                { coords: [900, 870], brgy: 'SANTISIMO ROSARIO', id: '043424075', type: 'Positive', name: 'Positive Cases: ' + res['STO. ROSARIO']['Positive'], style: { r: res['STO. ROSARIO']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1070, 740], brgy: 'SANTISIMO ROSARIO', id: '043424075', type: 'Probable', name: 'Probable Cases: ' + res['STO. ROSARIO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STO. ROSARIO']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1090, 700], brgy: 'SANTISIMO ROSARIO', id: '043424075', type: 'Suspect', name: 'Suspect Cases: ' + res['STO. ROSARIO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STO. ROSARIO']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1000, 760], brgy: 'SANTISIMO ROSARIO', id: '043424075', type: 'Recovered', name: 'Recovered: ' + res['STO. ROSARIO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STO. ROSARIO']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [1220, 400], brgy: 'STA. MARIA', id: '043424082', type: 'Positive', name: 'Positive Cases: ' + res['STA. MARIA']['Positive'], style: { r: res['STA. MARIA']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1120, 500], brgy: 'STA. MARIA', id: '043424082', type: 'Probable', name: 'Probable Cases: ' + res['STA. MARIA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. MARIA']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1050, 600], brgy: 'STA. MARIA', id: '043424082', type: 'Suspect', name: 'Suspect Cases: ' + res['STA. MARIA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. MARIA']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1120, 550], brgy: 'STA. MARIA', id: '043424082', type: 'Recovered', name: 'Recovered: ' + res['STA. MARIA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. MARIA']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [980, 500], brgy: 'SAN MIGUEL', id: '043424060', type: 'Positive', name: 'Positive Cases: ' + res['SAN MIGUEL']['Positive'], style: { r: res['SAN MIGUEL']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1020, 450], brgy: 'SAN MIGUEL', id: '043424060', type: 'Probable', name: 'Probable Cases: ' + res['SAN MIGUEL']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN MIGUEL']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1020, 350], brgy: 'SAN MIGUEL', id: '043424060', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN MIGUEL']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN MIGUEL']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1080, 320], brgy: 'SAN MIGUEL', id: '043424060', type: 'Recovered', name: 'Recovered: ' + res['SAN MIGUEL']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN MIGUEL']['Recovered'] == '0' ? 0 : 7 } },


                                { coords: [1140, 350], brgy: 'SOLEDAD', id: '043424079', type: 'Positive', name: 'Positive Cases: ' + res['SOLEDAD']['Positive'], style: { r: res['SOLEDAD']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1190, 320], brgy: 'SOLEDAD', id: '043424079', type: 'Probable', name: 'Probable Cases: ' + res['SOLEDAD']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SOLEDAD']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1190, 260], brgy: 'SOLEDAD', id: '043424079', type: 'Suspect', name: 'Suspect Cases: ' + res['SOLEDAD']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SOLEDAD']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1200, 220], brgy: 'SOLEDAD', id: '043424079', type: 'Recovered', name: 'Recovered: ' + res['SOLEDAD']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SOLEDAD']['Recovered'] == '0' ? 0 : 7 } },

                                { coords: [1080, 200], brgy: 'SAN GABRIEL', id: '043424048', type: 'Positive', name: 'Positive Cases: ' + res['SAN GABRIEL']['Positive'], style: { r: res['SAN GABRIEL']['Positive'] == '0' ? 0 : 7 } },
                                { coords: [1140, 200], brgy: 'SAN GABRIEL', id: '043424048', type: 'Probable', name: 'Probable Cases: ' + res['SAN GABRIEL']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN GABRIEL']['Probable'] == '0' ? 0 : 7 } },
                                { coords: [1090, 135], brgy: 'SAN GABRIEL', id: '043424048', type: 'Suspect', name: 'Suspect Cases: ' + res['SAN GABRIEL']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN GABRIEL']['Suspect'] == '0' ? 0 : 7 } },
                                { coords: [1140, 120], brgy: 'SAN GABRIEL', id: '043424048', type: 'Recovered', name: 'Recovered: ' + res['SAN GABRIEL']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN GABRIEL']['Recovered'] == '0' ? 0 : 7 } },
                            ]

                            var map = "District6",

                                regions6 = {
                                    "sangabriel": '#5335ff',
                                    "soledad": '#197024',
                                    "sanmiguel": "#733c14",
                                    "stamaria": "#751120",
                                    "santisimo": "#7BE90C",

                                };


                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 4,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{
                                        attribute: "fill",
                                        values: {
                                            "sangabriel": '#5335ff',
                                            "soledad": '#197024',
                                            "sanmiguel": "#733c14",
                                            "stamaria": "#751120",
                                            "santisimo": "#7BE90C",



                                        },

                                    }]
                                },
                                onRegionClick: function (event, code) {

                                    switch (code) {
                                        case "sangabriel":
                                            normaldmodal('043424048')
                                            break;
                                        case "sanmiguel":
                                            normaldmodal('043424060')
                                            break;
                                        case "soledad":
                                            normaldmodal('043424079')
                                            break;
                                        case "stamaria":
                                            normaldmodal('043424082')
                                            break;
                                        case "santisimo":
                                            normaldmodal('043424075')
                                            break;

                                        default:
                                        // code block
                                    }
                                },
                                onMarkerClick: function (event, index) {

                                    switch (Marker6[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker6[index].id, Marker6[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker6[index].id, Marker6[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker6[index].id, Marker6[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker6[index].id, Marker6[index].type);

                                            break;
                                        default:
                                        // code block
                                    }
                                },


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions6[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                },
                                markerStyle: {
                                    initial: {
                                        fill: '#FF0000',
                                        stroke: '#383f47'
                                    }
                                },
                                backgroundColor: '#383f47',
                                markers: Marker6,

                            });
                        }
                    });

                    break;
                case "district7":
                    $('#map').empty();
                    $.ajax({
                        type: "POST",
                        url: "/getcount",
                        data: "data",
                        dataType: "json",
                        success: function (res) {


                            Marker7 = [
                                { coords: [400, 1040], brgy: 'SAN ISIDRO', type: 'Positive', id: '043424051', name: 'Positive Cases: ' + res['SAN ISIDRO']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN ISIDRO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [450, 1000], brgy: 'SAN ISIDRO', type: 'Probable', id: '043424051', name: 'Probable Cases: ' + res['SAN ISIDRO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN ISIDRO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [550, 980], brgy: 'SAN ISIDRO', type: 'Suspect', id: '043424051', name: 'Suspect Cases: ' + res['SAN ISIDRO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN ISIDRO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [600, 1000], brgy: 'SAN ISIDRO', type: 'Recovered', id: '043424051', name: 'Recovered: ' + res['SAN ISIDRO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN ISIDRO']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1000, 780], brgy: 'SAN ANTONIO 2', type: 'Positive', id: '043424041', name: 'Positive Cases: ' + res['SAN ANTONIO II']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN ANTONIO II']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [950, 780], brgy: 'SAN ANTONIO 2', type: 'Probable', id: '043424041', name: 'Probable Cases: ' + res['SAN ANTONIO II']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN ANTONIO II']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [950, 850], brgy: 'SAN ANTONIO 2', type: 'Suspect', id: '043424041', name: 'Suspect Cases: ' + res['SAN ANTONIO II']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN ANTONIO II']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [920, 880], brgy: 'SAN ANTONIO 2', type: 'Recovered', id: '043424041', name: 'Recovered: ' + res['SAN ANTONIO II']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN ANTONIO II']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1100, 650], brgy: 'SAN ANTONIO 1', type: 'Positive', id: '043424040', name: 'Positive Cases: ' + res['SAN ANTONIO I']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN ANTONIO I']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1050, 670], brgy: 'SAN ANTONIO 1', type: 'Probable', id: '043424040', name: 'Probable Cases: ' + res['SAN ANTONIO I']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN ANTONIO I']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [900, 760], brgy: 'SAN ANTONIO 1', type: 'Suspect', id: '043424040', name: 'Suspect Cases: ' + res['SAN ANTONIO I']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN ANTONIO I']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [950, 720], brgy: 'SAN ANTONIO 1', type: 'Recovered', id: '043424040', name: 'Recovered: ' + res['SAN ANTONIO I']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN ANTONIO I']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [860, 630], brgy: 'STA. ANA', type: 'Positive', id: '043424066', name: 'Positive Cases: ' + res['STA. ANA']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['STA. ANA']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [860, 700], brgy: 'STA. ANA', type: 'Probable', id: '043424066', name: 'Probable Cases: ' + res['STA. ANA']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STA. ANA']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [900, 630], brgy: 'STA. ANA', type: 'Suspect', id: '043424066', name: 'Suspect Cases: ' + res['STA. ANA']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STA. ANA']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [980, 640], brgy: 'STA. ANA', type: 'Recovered', id: '043424066', name: 'Recovered: ' + res['STA. ANA']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STA. ANA']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1050, 580], brgy: 'SAN VICENTE', type: 'Positive', id: '043424065', name: 'Positive Cases: ' + res['SAN VICENTE']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN VICENTE']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [970, 580], brgy: 'SAN VICENTE', type: 'Probable', id: '043424065', name: 'Probable Cases: ' + res['SAN VICENTE']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN VICENTE']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1050, 520], brgy: 'SAN VICENTE', type: 'Suspect', id: '043424065', name: 'Suspect Cases: ' + res['SAN VICENTE']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN VICENTE']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1050, 485], brgy: 'SAN VICENTE', type: 'Recovered', id: '043424065', name: 'Recovered: ' + res['SAN VICENTE']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN VICENTE']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [930, 485], brgy: 'SAN JOAQUIN', type: 'Positive', id: '043424052', name: 'Positive Cases: ' + res['SAN JOAQUIN']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN JOAQUIN']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [970, 485], brgy: 'SAN JOAQUIN', type: 'Probable', id: '043424052', name: 'Probable Cases: ' + res['SAN JOAQUIN']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN JOAQUIN']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [900, 540], brgy: 'SAN JOAQUIN', type: 'Suspect', id: '043424052', name: 'Suspect Cases: ' + res['SAN JOAQUIN']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN JOAQUIN']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [870, 570], brgy: 'SAN JOAQUIN', type: 'Recovered', id: '043424052', name: 'Recovered: ' + res['SAN JOAQUIN']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN JOAQUIN']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1200, 150], brgy: 'SAN IGNACIO', type: 'Positive', id: '043424050', name: 'Positive Cases: ' + res['SAN IGNACIO']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN IGNACIO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1150, 200], brgy: 'SAN IGNACIO', type: 'Probable', id: '043424050', name: 'Probable Cases: ' + res['SAN IGNACIO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN IGNACIO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1100, 240], brgy: 'SAN IGNACIO', type: 'Suspect', id: '043424050', name: 'Suspect Cases: ' + res['SAN IGNACIO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN IGNACIO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1060, 320], brgy: 'SAN IGNACIO', type: 'Recovered', id: '043424050', name: 'Recovered: ' + res['SAN IGNACIO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN JOAQUIN']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [910, 320], brgy: 'SAN GREGORIO', type: 'Positive', id: '043424049', name: 'Positive Cases: ' + res['SAN GREGORIO']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN GREGORIO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [950, 300], brgy: 'SAN GREGORIO', type: 'Probable', id: '043424049', name: 'Probable Cases: ' + res['SAN GREGORIO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN GREGORIO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [950, 340], brgy: 'SAN GREGORIO', type: 'Suspect', id: '043424049', name: 'Suspect Cases: ' + res['SAN GREGORIO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN GREGORIO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [910, 400], brgy: 'SAN GREGORIO', type: 'Recovered', id: '043424049', name: 'Recovered: ' + res['SAN GREGORIO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN GREGORIO']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [940, 210], brgy: 'SAN FRANCISCO', type: 'Positive', id: '043424047', name: 'Positive Cases: ' + res['SAN FRANCISCO']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN FRANCISCO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1000, 210], brgy: 'SAN FRANCISCO', type: 'Probable', id: '043424047', name: 'Probable Cases: ' + res['SAN FRANCISCO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN FRANCISCO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1010, 280], brgy: 'SAN FRANCISCO', type: 'Suspect', id: '043424047', name: 'Suspect Cases: ' + res['SAN FRANCISCO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN FRANCISCO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [870, 280], brgy: 'SAN FRANCISCO', type: 'Recovered', id: '043424047', name: 'Recovered: ' + res['SAN FRANCISCO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN FRANCISCO']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1080, 175], brgy: 'STO. CRISTO', type: 'Positive', id: '043424077', name: 'Positive Cases: ' + res['STO. CRISTO']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['STO. CRISTO']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1040, 175], brgy: 'STO. CRISTO', type: 'Probable', id: '043424077', name: 'Probable Cases: ' + res['STO. CRISTO']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['STO. CRISTO']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1040, 120], brgy: 'STO. CRISTO', type: 'Suspect', id: '043424077', name: 'Suspect Cases: ' + res['STO. CRISTO']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['STO. CRISTO']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1000, 120], brgy: 'STO. CRISTO', type: 'Recovered', id: '043424077', name: 'Recovered: ' + res['STO. CRISTO']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['STO. CRISTO']['Recovered'] == '0' ? 0 : 6 } },

                                { coords: [1300, 130], brgy: 'SAN JOSE', type: 'Positive', id: '043424053', name: 'Positive Cases: ' + res['SAN JOSE']['Positive'], style: { fill: 'rgba(255, 0, 0)', r: res['SAN JOSE']['Positive'] == '0' ? 0 : 6 } },
                                { coords: [1400, 130], brgy: 'SAN JOSE', type: 'Probable', id: '043424053', name: 'Probable Cases: ' + res['SAN JOSE']['Probable'], style: { fill: 'rgba(0, 0, 255)', r: res['SAN JOSE']['Probable'] == '0' ? 0 : 6 } },
                                { coords: [1450, 100], brgy: 'SAN JOSE', type: 'Suspect', id: '043424053', name: 'Suspect Cases: ' + res['SAN JOSE']['Suspect'], style: { fill: 'rgba(255,255,0)', r: res['SAN JOSE']['Suspect'] == '0' ? 0 : 6 } },
                                { coords: [1500, 140], brgy: 'SAN JOSE', type: 'Recovered', id: '043424053', name: 'Recovered: ' + res['SAN JOSE']['Recovered'], style: { fill: 'rgba(0,128,0)', r: res['SAN JOSE']['Recovered'] == '0' ? 0 : 6 } },

                            ]

                            var map = "District_7",

                                regions2 = {
                                    "SanIsidro": '#90acb2',
                                    "SanAntonio2": '#f09427',
                                    "SanAnotnio1": "#ffff7d",
                                    "StaElena": "#751120",
                                    "StaAna": "#c3d334",
                                    "SanVicente": "#9f5391",
                                    "SanJoaquin": "#ff6680",
                                    "SanIgnacio": "#80db7d",
                                    "SanGreogorio": "#17a8e1",
                                    "SanFrancisco": "#1e9b8c",
                                    "StoCristo": "#c3d334",
                                    "SanJose": "#f09427",
                                };


                            $("#map").vectorMap({
                                map: map,
                                regionStyle: {
                                    initial: {
                                        fill: "white",
                                        "fill-opacity": 1,
                                        stroke: "white",
                                        "stroke-width": 2,
                                        "stroke-opacity": 1,
                                    }
                                },
                                series: {
                                    regions: [{
                                        attribute: "fill",
                                        values: {
                                            "SanIsidro": '#90acb2',
                                            "SanAntonio2": '#f09427',
                                            "SanAnotnio1": "#ffff7d",
                                            "StaElena": "#751120",
                                            "StaAna": "#c3d334",
                                            "SanVicente": "#9f5391",
                                            "SanJoaquin": "#ff6680",
                                            "SanIgnacio": "#80db7d",
                                            "SanGreogorio": "#17a8e1",
                                            "SanFrancisco": "#1e9b8c",
                                            "StoCristo": "#c3d334",
                                            "SanJose": "#f09427",


                                        },

                                    }]
                                },
                                onRegionClick: function (event, code) {

                                    switch (code) {
                                        case "SanJose":
                                            normaldmodal('043424053')
                                            break;
                                        case "StoCristo":
                                            normaldmodal('043424077')
                                            break;
                                        case "SanFrancisco":
                                            normaldmodal('043424047')
                                            break;
                                        case "SanIgnacio":
                                            normaldmodal('043424050')
                                            break;
                                        case "SanGreogorio":
                                            normaldmodal('043424049')
                                            break;
                                        case "SanJoaquin":
                                            normaldmodal('043424052')
                                            break;
                                        case "SanVicente":
                                            normaldmodal('043424065')
                                            break;
                                        case "StaAna":
                                            normaldmodal('043424066')
                                            break;
                                        case "SanAnotnio1":
                                            normaldmodal('043424040')
                                            break;
                                        case "SanAntonio2":
                                            normaldmodal('043424041')
                                            break;
                                        case "SanIsidro":
                                            normaldmodal('043424051')
                                            break;

                                        default:
                                        // code block
                                    }
                                },
                                onMarkerClick: function (event, index) {



                                    switch (Marker7[index].type) {
                                        case 'Positive':

                                            positivemodal(Marker7[index].id, Marker7[index].type);

                                            break;
                                        case 'Probable':

                                            probablemodal(Marker7[index].id, Marker7[index].type);

                                            break;
                                        case 'Suspect':

                                            suspectmodal(Marker7[index].id, Marker7[index].type);

                                            break;
                                        case 'Recovered':

                                            recoveredmodal(Marker7[index].id, Marker7[index].type);

                                            break;
                                        default:
                                        // code block
                                    }
                                },
                                markers: Marker7,


                                labels: {
                                    regions: {
                                        render: function (code) {
                                            return regions2[code] && jvm.Map.maps[map].paths[code].name;
                                        }
                                    }
                                }
                            });
                        }
                    });


                    break;

                default:

            }
        },

        labels: {
            regions: {
                render: function (code) {
                    return regions1[code] && jvm.Map.maps[map].paths[code].name;
                }
            }
        }, markerStyle: {
            initial: {
                fill: '#FF0000',
                stroke: '#383f47'
            }
        },
        backgroundColor: '#383f47',


    });


}


function positivemodal(brgycode, type) {

    $('#PositiveModal').modal('show');

    PositiveTable = $('#positive_table').DataTable({
        "dom": '<"pull-left"l><"pull-right"f>t<"pull-right"p><"pull-left"i>',
        "ajax": {
            method: 'POST',
            url: global.settings.url + 'getpositive',
            data: {
                brgycode: brgycode,
                type: type,
            },
        },
        "columns": [{
            "data": "full_name"
        },
        {
            "data": "brgy"
        },
        {
            "data": "number"

        },
        {
            "data": "btn"
        }
        ]
    });


    PositiveTable.destroy();

}


function probablemodal(brgycode, type) {
    $('#ProbableModal').modal('show');

    ProbableTable = $('#probable_table').DataTable({
        "dom": '<"pull-left"l><"pull-right"f>t<"pull-right"p><"pull-left"i>',
        "ajax": {
            method: 'POST',
            url: global.settings.url + 'getprobable',
            data: {
                brgycode: brgycode,
                type: type,
            },
        },
        "columns": [{
            "data": "full_name"
        },
        {
            "data": "brgy"
        },
        {
            "data": "number"

        },
        {
            "data": "btn"
        }
        ]
    });

    ProbableTable.destroy();

}


function suspectmodal(brgycode, type) {
    $('#SuspectModal').modal('show');

    Suspectable = $('#suspect_table').DataTable({
        "dom": '<"pull-left"l><"pull-right"f>t<"pull-right"p><"pull-left"i>',
        "ajax": {
            method: 'POST',
            url: global.settings.url + 'getsuspect',
            data: {
                brgycode: brgycode,
                type: type,
            },
        },
        "columns": [{
            "data": "full_name"
        },
        {
            "data": "brgy"
        },
        {
            "data": "number"

        },
        {
            "data": "btn"
        }
        ]
    });


    Suspectable.destroy();

}


function recoveredmodal(brgycode, type) {
    $('#RecoveredModal').modal('show');

    RecoveredleTable = $('#recovered_table').DataTable({
        "dom": '<"pull-left"l><"pull-right"f>t<"pull-right"p><"pull-left"i>',
        "ajax": {
            method: 'POST',
            url: global.settings.url + 'getrecovered',
            data: {
                brgycode: brgycode,
                type: type,
            },
        },
        "columns": [{
            "data": "full_name"
        },
        {
            "data": "brgy"
        },
        {
            "data": "number"

        },
        {
            "data": "btn"
        }
        ]
    });

    RecoveredleTable.destroy();

}

function normaldmodal(brgycode) {

    $('#NormalModal').modal('show');


    RecoveredleTable = $('#normal_table').DataTable({
        "dom": '<"pull-left"l><"pull-right"f>t<"pull-right"p><"pull-left"i>',
        "ajax": {
            method: 'POST',
            url: global.settings.url + 'getnormal',
            data: {
                brgycode: brgycode,
                type: "Normal",
            },
        },
        "columns": [{
            "data": "full_name"
        },
        {
            "data": "brgy"
        },
        {
            "data": "number"

        },
        {
            "data": "btn"
        }
        ]
    });

    RecoveredleTable.destroy();

}


function gethistory(id) {

    $('#HistoryModal').modal('show');


    HistoryTable = $('#history_table').DataTable({
        "dom": '<"pull-left"l><"pull-right"f>t<"pull-right"p><"pull-left"i>',
        "ajax": {
            method: 'POST',
            url: global.settings.url + 'gethistory',
            data: {
                id: id,
            },
        },
        "columns": [{
            "data": "establishment_bin"
        },
        {
            "data": "establishment_name"
        },
        {
            "data": "establishment_location"

        },
        {
            "data": "establishment_owner"
        }
        ]
    });

    HistoryTable.destroy();

}
