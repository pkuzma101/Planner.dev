// create a circle object
var circle = {
    radius: 5,
    getArea: function () {
        var area = Math.round(Math.PI * Math.pow(this.radius, 2));
        // todo: finish this method
        // hint: area = pi * radius^2
        return area;
    },
    logInfo: function (round) {
        if(round == true)
        // todo: complete this method. if round is true, round the result to the nearest integer.
        console.log('Area of a circle with radius: ' + this.radius + ', is: ' + this.getArea());
    }
};

// log info about the circle
circle.logInfo(false);
circle.logInfo(true);

// todo:
// Change the radius of the circle to 5.

// log info about the circle
circle.logInfo(false);
circle.logInfo(true);