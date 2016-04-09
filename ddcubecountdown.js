/**
 * 3D Cube countdown Script
 * By Dynamic Drive (http://www.dynamicdrive.com)
 * Created: Oct 19th, 15'  
 */


window.requestAnimationFrame = window.requestAnimationFrame
                               || window.mozRequestAnimationFrame
                               || window.webkitRequestAnimationFrame
                               || window.msRequestAnimationFrame
                               || function(f){return setTimeout(f, 1000/60)}

window.cancelAnimationFrame = window.cancelAnimationFrame
                              || window.mozCancelAnimationFrame
                              || function(requestID){clearTimeout(requestID)} //fall back

// Production steps of ECMA-262, Edition 5, 15.4.4.14
// Reference: http://es5.github.io/#x15.4.4.14
// Array.indexOf Polyfill
if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function(searchElement, fromIndex) {
    var k;
    if (this == null) {
      throw new TypeError('"this" is null or not defined');
    }

    var O = Object(this);
    var len = O.length >>> 0;
    if (len === 0) {
      return -1;
    }

    var n = +fromIndex || 0;

    if (Math.abs(n) === Infinity) {
      n = 0;
    }

    if (n >= len) {
      return -1;
    }

    k = Math.max(n >= 0 ? n : len - Math.abs(n), 0);

    while (k < len) {
      if (k in O && O[k] === searchElement) {
        return k;
      }
      k++;
    }
    return -1;
  };
}


var cubecountdown = (function($){

	var transform3d = typeof $(document.documentElement).css('perspective') != "undefined" // test for support for 3D transform
	var timeclasses = ['days', 'hours', 'minutes', 'seconds']
	var defaults = { unit: ['days', 'seconds'], size:['8em', '6em'], fxduration:0.5 }
	var transform3dsupport = null // Boolean on whether browser supports translate3d

	function getdiff(seconds, unit){
		var oneMinute = 60 //minute unit in seconds
		var oneHour = 60*60 //hour unit in seconds
		var oneDay = 60*60*24 //day unit in seconds
		var days = (unit == 'days')? Math.floor(seconds/oneDay) : 0
		var hours = ( /(hours)|(days)/i.test(unit) )? Math.floor( (seconds - days*oneDay)/oneHour ) : 0
		var minutes = ( /(minutes)|(hours)|(days)/i.test(unit) )? Math.floor( (seconds - days*oneDay - hours*oneHour)/oneMinute ) : 0
		var seconds = (unit == 'seconds')? Math.floor(seconds) : Math.floor( seconds - days*oneDay - hours*oneHour - minutes*oneMinute )
		return {days:days, hours:hours, minutes:minutes, seconds:seconds}
	}

	function cubecountdown(settings){
		var thisinst = this
		this.s = $.extend({}, defaults, settings)
		this.$container = $('#' + this.s.containerid)
		this.onCount = this.onCount || function(formatdiff){}
		this.onEnd = this.onEnd || function(){}
		this.s.unit = (typeof this.s.unit.length == 1)? this.s.unit.concat('seconds') : this.s.unit
		this.fxduration = Math.min(this.s.fxduration, 0.8)
		this.targetdate = new Date( this.s.targetdate )
		var targetcssclasses = timeclasses.slice( timeclasses.indexOf( this.s.unit[0] ) )
		var cubeclass = new ddcubeclass({
			cubecount: targetcssclasses.length,
			size: this.s.size
		})
		this.$cubes = cubeclass.getcubes().each(function(i){
			var $cube = $(this)
			$cube.addClass( 'ddcubecountdown ' + targetcssclasses[i] )
				.data({curdeg:0, activeside:0, val:null}) // sides start at 1 for side1, 2 for side2 etc versus 0
				.find('li').css({transitionDuration: thisinst.fxduration + 's'})
		})
		transform3dsupport = ddcubeclass.utils.transform3d
		this.$container.html( cubeclass.getcubes() )
		this.targetcssclasses = targetcssclasses
		this.cubeclass = cubeclass
		this.timer = setInterval(function(){
			requestAnimationFrame(function(){ thisinst.countdown() })
		}, 1000)
	}

	cubecountdown.prototype = {
		countdown: function(){
			var diff = Math.max(0, (this.targetdate - new Date())/1000 ) // time diff in seconds
			var formatdiff = getdiff(diff, this.s.unit)
			var units = this.targetcssclasses
			for (i=0; i<units.length; i++){
				var $cube = this.$cubes.eq(i)
				var cubedata = $cube.data()
				var $sides = $cube.find('li')

				if (cubedata.val == null){
					$sides.eq(cubedata.activeside).html('<div>' + formatdiff[units[i]] + '</div><span>' + units[i] + '</span>')
				}
				else if (formatdiff[units[i]] != cubedata.val){
					if (transform3dsupport){
						cubedata.activeside = (cubedata.activeside < 3)? cubedata.activeside + 1 : 0
						cubedata.curdeg += 90
						$sides.eq(cubedata.activeside).html('<div>' + formatdiff[units[i]] + '</div><span>' + units[i] + '</span>')
						this.cubeclass.rotateBy(i, cubedata.curdeg)
					}
					else{
						$sides.eq(cubedata.activeside).html('<div>' + formatdiff[units[i]] + '</div><span>' + units[i] + '</span>')
					}
				}
				cubedata.val = formatdiff[units[i]]
			}
			this.onCount(diff, formatdiff)
			if (diff < 1){
				clearTimeout(this.timer)
				this.onEnd()
			}
		}

	}
	
	return cubecountdown

})(jQuery);