//COORDS
let coord = [45.87023881566037, 12.374845713747328];
//INIT MAP
var map = L.map('map').setView(coord, 13);
//SET MAP GREYSCALE
L.TileLayer.Grayscale = L.TileLayer.extend({
    options: {
        quotaRed: 21,
        quotaGreen: 71,
        quotaBlue: 8,
        quotaDividerTune: 0,
        quotaDivider: function() {
            return this.quotaRed + this.quotaGreen + this.quotaBlue + this.quotaDividerTune;
        }
    },

    initialize: function(url, options) {
        options = options || {}
        options.crossOrigin = true;
        L.TileLayer.prototype.initialize.call(this, url, options);

        this.on('tileload', function(e) {
            this._makeGrayscale(e.tile);
        });
    },

    _createTile: function() {
        var tile = L.TileLayer.prototype._createTile.call(this);
        tile.crossOrigin = "Anonymous";
        return tile;
    },

    _makeGrayscale: function(img) {
        if (img.getAttribute('data-grayscaled'))
            return;

        img.crossOrigin = '';
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var imgd = ctx.getImageData(0, 0, canvas.width, canvas.height);
        var pix = imgd.data;
        for (var i = 0, n = pix.length; i < n; i += 4) {
            pix[i] = pix[i + 1] = pix[i + 2] = (this.options.quotaRed * pix[i] + this.options.quotaGreen * pix[i + 1] + this.options.quotaBlue * pix[i + 2]) / this.options.quotaDivider();
        }
        ctx.putImageData(imgd, 0, 0);
        img.setAttribute('data-grayscaled', true);
        img.src = canvas.toDataURL();
    }
});

L.tileLayer.grayscale = function(url, options) {
    return new L.TileLayer.Grayscale(url, options);
};

//ADD GRAYSCALE LAYER ON MAP
L.tileLayer.grayscale('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

//SET ICON
let icon = new L.Icon.Default();
icon.options.shadowSize = [0, 0];

//PUT ICON ON MAP
L.marker(coord, { icon: icon }).addTo(map);