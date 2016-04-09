function ddcubeclass(settings){
	var defaults = {cubecount: 1, fxduration: 0.5}
	var s = $.extend({}, defaults, settings)
	if (typeof ddcubeclass.utils.transform3d == "function"){
		ddcubeclass.utils.transform3d = ddcubeclass.utils.transform3d()
	}
	var transformstylestr = ''
	this.s = s
	this.translateZval = parseInt(s.size[1])/2 + 'em'
	this.$cubes = $()
	this.transformstylestr = ''
	for (var i = 0; i<s.cubecount; i++){
		var $cube = $(ddcubeclass.utils.createcube())
		$cube.css({width: s.size[0], height: s.size[1]})
		if (!transformstylestr){
			transformstylestr = $cube.find('ul:eq(0)').css('transformStyle') // 'preserve-3d' or 'flat'
		}
		$cube.find('ul:eq(0)').css({ transform: 'translate3D(0,0,-' + this.translateZval + ')' })
		if (transformstylestr == 'flat'){ // IE 7x to 11
			$cube.find('ul:eq(0)').css({perspective: '1000px'})
		}
		this.$cubes = this.$cubes.add( $cube )
		this.showSide(i, 1)
	}
}

ddcubeclass.prototype = {

	populate: function($selector){
		$selector.html( this.$cubes )
	},

	getcubes: function(){
		return this.$cubes
	},

	rotateBy: function(cubeindex, deg){
		var $cube = this.$cubes.eq(cubeindex)
		var thisinst = this
		var startdeg = 0
		if ($cube.length == 1){
			var $sides = $cube.find('li').each(function(i){
				var $side = $(this)
				var sidedegree = deg + (i * -90)
				var sidetransform = ddcubeclass.utils.constructTransform(sidedegree, 0, 0, thisinst.translateZval)
				$side.css('transform', sidetransform)
			})
		}
	},

	showSide: function(cubeindex, side){
		var degree = (side-1) * 90
		this.rotateBy(cubeindex, degree)
	}

}

ddcubeclass.utils = {

	transform3d: function() { // transform3d support http://stackoverflow.com/questions/5661671/detecting-transform-translate3d-support
		if (!window.getComputedStyle) {
			return false;
		}
		
		var el = document.createElement('p'), 
			has3d,
		 	transforms = {
				'webkitTransform':'-webkit-transform',
				'OTransform':'-o-transform',
				'msTransform':'-ms-transform',
				'MozTransform':'-moz-transform',
				'transform':'transform'
			};
		
		// Add it to the body to get the computed style.
		document.body.insertBefore(el, null);
		
		for (var t in transforms) {
			if (el.style[t] !== undefined) {
			    el.style[t] = "translate3d(1px,1px,1px)";
			    has3d = window.getComputedStyle(el).getPropertyValue(transforms[t]);
			}
		}
		
		document.body.removeChild(el);
		return (has3d !== undefined && has3d.length > 0 && has3d !== "none");
	},

	createcube: function(){
		var cubeclass = "ddcubeclass" + ((ddcubeclass.utils.transform3d)? "" : " nocubesupport")
		var cubehtml = '<div class="' + cubeclass +'">\n'
		cubehtml += '<ul>\n'
		cubehtml += '<li></li>\n'
		if (ddcubeclass.utils.transform3d){
			cubehtml += '<li></li>\n'
			cubehtml += '<li></li>\n'
			cubehtml += '<li></li>\n'
		}
		cubehtml += '</ul>\n'
		cubehtml += '</div>\n'
		return cubehtml
	},

	constructTransform: function(deg, x, y, z){
		return 'rotateX(' + deg + 'deg) translate3D(' + x + ',' + y + ',' + z +')'
	}
}