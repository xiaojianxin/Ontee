;(function (undefined) {
    function SelectHandler(el) {
        this.el = el;
        this.parent = el.parent(SVG.Nested) || el.parent(SVG.Doc);
        el.remember('_selectHandler', this);
        this.pointSelection = {isSelected: false};
        this.rectSelection = {isSelected: false};
    }
    SelectHandler.prototype.init = function (value, options) {
        var bbox = this.el.bbox();
        this.options = {};
        // Merging the defaults and the options-object together
        for (var i in this.el.select.defaults) {
            this.options[i] = this.el.select.defaults[i];
            if (options[i] !== undefined) {
                this.options[i] = options[i];
            }
        }
        this.nested = (this.nested || this.parent.nested()).size(bbox.width || 1, bbox.height || 1).transform(this.el.ctm()).move(bbox.x, bbox.y);
        this.selectRect(value);
        this.observe();
        this.cleanup();
    };

    // create the point-array which contains the 2 points of a line or simply the points-array of polyline/polygon
    SelectHandler.prototype.getPointArray = function () {
        var bbox = this.el.bbox();

        return this.el.array().valueOf().map(function (el) {
            return [el[0] - bbox.x, el[1] - bbox.y];
        });
    };

    // every time a circle is moved, we have to update the positions of our circle
    SelectHandler.prototype.updatePointSelection = function () {
        var array = this.getPointArray();
        this.pointSelection.set.each(function (i) {
            if (this.cx() === array[i][0] && this.cy() === array[i][1]) {
                return;
            }
            this.center(array[i][0], array[i][1]);
        });
    };

    SelectHandler.prototype.updateRectSelection = function () {
        var bbox = this.el.bbox();

        this.rectSelection.set.get(0).attr({
            width: bbox.width+10,
            height: bbox.height+20,
            x:-5,
            y:-5
        });
        this.rectSelection.set.get(0).addClass("centerRect");

        // set.get(1) is always in the upper left corner. no need to move it
        if (this.options.points) {
            this.rectSelection.set.get(1).center(0, bbox.height+15);
            this.rectSelection.set.get(3).center(bbox.width,0);
        }
        if (this.options.rotationPoint) {
            this.rectSelection.set.get(2).center(bbox.width, bbox.height+15);
        }
    };

    SelectHandler.prototype.selectRect = function (value) {

        var _this = this, bbox = this.el.bbox();

        this.rectSelection.isSelected = value;

        // when set is already p
        this.rectSelection.set = this.rectSelection.set || this.parent.set();

        // helperFunction to create a mouse-down function which triggers the event specified in `eventName`
        function getMoseDownFunc(eventName) {
            return function (ev) {
                ev = ev || window.event;
                ev.preventDefault ? ev.preventDefault() : ev.returnValue = false;
                _this.el.fire(eventName, {x: ev.pageX, y: ev.pageY, event: ev});
            };
        }

        // create the selection-rectangle and add the css-class
        if (!this.rectSelection.set.get(0)) {
            this.rectSelection.set.add(this.nested.rect(bbox.width+10, bbox.height+20).addClass(this.options.classRect));
        }
        // Draw Points at the edges, if enabled
        if (this.options.points && !this.rectSelection.set.get(1)) {
            this.rectSelection.set.add(this.nested.image("../img/la.png").attr('class', this.options.classPoints + '_lb').mousedown(getMoseDownFunc('lb')));
            this.rectSelection.set.each(function () {
                this.addClass(_this.options.classPoints);
            });
        }
        // draw rotationPint, if enabled
        if (this.options.rotationPoint && !this.rectSelection.set.get(2)) {
            this.rectSelection.set.add(this.nested.image("../img/rotate.png").center(bbox.width, bbox.height).attr('class', this.options.classPoints + '_rot')
                .mousedown(function (ev) {
                    ev = ev || window.event;
                    ev.preventDefault ? ev.preventDefault() : ev.returnValue = false;
                    _this.el.fire('rot', {x: ev.pageX, y: ev.pageY, event: ev});
                }));

        }
        if (this.options.points && !this.rectSelection.set.get(3)) {
            this.rectSelection.set.add(this.nested.image("../img/delete.png").attr('class', this.options.classPoints + '_rt').mousedown(getMoseDownFunc('rt')));
            this.rectSelection.set.each(function () {
                this.addClass(_this.options.classPoints);
            });
        }



    };

    SelectHandler.prototype.handler = function () {

        var bbox = this.el.bbox();
        this.nested.size(bbox.width+10 || 1, bbox.height+20 || 1).transform(this.el.ctm()).move(bbox.x, bbox.y);

        if (this.rectSelection.isSelected) {
            this.updateRectSelection();
        }

        if (this.pointSelection.isSelected) {
            this.updatePointSelection();
        }

    };

    SelectHandler.prototype.observe = function () {
        var _this = this;

        if (MutationObserver) {
            if (this.rectSelection.isSelected || this.pointSelection.isSelected) {
                this.observerInst = this.observerInst || new MutationObserver(function () {
                        _this.handler();
                    });
                this.observerInst.observe(this.el.node, {attributes: true});
            } else {
                try {
                    this.observerInst.disconnect();
                    delete this.observerInst;
                } catch (e) {
                }
            }
        } else {
            this.el.off('DOMAttrModified.select');

            if (this.rectSelection.isSelected || this.pointSelection.isSelected) {
                this.el.on('DOMAttrModified.select', function () {
                    _this.handler();
                });
            }
        }
    };

    SelectHandler.prototype.cleanup = function () {

        //var _this = this;

        if (!this.rectSelection.isSelected && this.rectSelection.set) {
            // stop watching the element, remove the selection
            this.rectSelection.set.each(function () {
                this.remove();
            });

            this.rectSelection.set.clear();
            delete this.rectSelection.set;
        }

        if (!this.pointSelection.isSelected && this.pointSelection.set) {
            // Remove all points, clear the set, stop watching the element
            this.pointSelection.set.each(function () {
                this.remove();
            });

            this.pointSelection.set.clear();
            delete this.pointSelection.set;
        }
        if (!this.pointSelection.isSelected && !this.rectSelection.isSelected) {
            this.nested.remove();
            delete this.nested;
        }
    };
    SVG.extend(SVG.Element, {
        // Select element with mouse
        select: function (value, options) {
            // Check the parameters and reassign if needed
            if (typeof value === 'object') {
                options = value;
                value = true;
            }
            var selectHandler = this.remember('_selectHandler') || new SelectHandler(this);
            selectHandler.init(value === undefined ? true : value, options || {});
            return this;
        }
    });
    SVG.Element.prototype.select.defaults = {
        points: true,                            // If true, points at the edges are drawn. Needed for resize!
        classRect: 'svg_select_boundingRect',    // Css-class added to the rect
        classPoints: 'svg_select_points',        // Css-class added to the points
        radius: 7,                               // radius of the points
        rotationPoint: true,                     // If true, rotation point is drawn. Needed for rotation!
        deepSelect: false                        // If true, moving of single points is possible (only line, polyline, polyon)
    };

    function ResizeHandler(el) {

        el.remember('_resizeHandler', this);

        this.el = el;
        this.parent = el.parent(SVG.Nested) || el.parent(SVG.Doc);

        this.parameters = {};
        this.lastUpdateCall = null;
        this.p = el.doc().node.createSVGPoint();
    }
    ResizeHandler.prototype.transformPoint = function(x, y, m){

        this.p.x = x - (this.offset.x - window.pageXOffset);
        this.p.y = y - (this.offset.y - window.pageYOffset);

        return this.p.matrixTransform(m || this.m);

    };

    ResizeHandler.prototype.init = function (options) {

        var _this = this;
        this.stop();

        if (options === 'stop') {
            return;
        }

        this.options = {};

        // Merge options and defaults
        for (var i in this.el.resize.defaults) {
            this.options[i] = this.el.resize.defaults[i];
            if (typeof options[i] !== 'undefined') {
                this.options[i] = options[i];
            }
        }

        // We listen to all these events which are specifying different edges

        this.el.on('lb.resize', function(e){ _this.resize(e || window.event); });  // Left-Bottom
        this.el.on('rt.resize', function(e){ _this.resize(e || window.event); });  // Left-Bottom
        this.el.on('rot.resize', function(e){ _this.resize(e || window.event); }); // Rotation
        this.update();

    };

    ResizeHandler.prototype.stop = function(){

        this.el.off('lb.resize');
        this.el.off('rt.resize');
        this.el.off('rot.resize');
        return this;
    };

    ResizeHandler.prototype.resize = function (event) {

        var _this = this;

        this.m = this.el.node.getScreenCTM().inverse();
        this.offset = { x: window.pageXOffset, y: window.pageYOffset };

        this.parameters = {
            p: this.transformPoint(event.detail.event.clientX,event.detail.event.clientY),
            x: event.detail.x,      // x-position of the mouse when resizing started
            y: event.detail.y,      // y-position of the mouse when resizing started
            box: this.el.bbox(),    // The bounding-box of the element
            rotation: this.el.transform().rotation  // The current rotation of the element
        };

        // the i-param in the event holds the index of the point which is moved, when using `deepSelect`
        if (event.detail.i !== undefined) {

            // get the point array
            var array = this.el.array().valueOf();

            // Save the index and the point which is moved
            this.parameters.i = event.detail.i;
            this.parameters.pointCoords = [array[event.detail.i][0], array[event.detail.i][1]];
        }

        // Lets check which edge of the bounding-box was clicked and resize the this.el according to this
        switch (event.type) {
            // Left-Bottom
            case 'lb':
                // s.a.
                this.calc = function (diffX, diffY) {
                    var snap = this.snapToGrid(diffX, diffY, 1);
                    if (this.parameters.box.width - snap[0] > 0 && this.parameters.box.height + snap[1] > 0) {
                        this.el.move(this.parameters.box.x + snap[0], this.parameters.box.y).size(this.parameters.box.width - snap[0], this.parameters.box.height + snap[1]);
                    }
                };
                break;
            case 'rt':
                // s.a.
                this.calc = function (diffX, diffY) {
                    this.el.remove();
                    var svg=$("#upPicFront").prev().attr("id");
                    if(svg.indexOf("Svg")+1){
                        $("#upPicFront").prev().remove();
                    }
                };
                break;
            // Rotation
            case 'rot':
                // s.a.
                this.calc = function (diffX, diffY) {

                    // yes this is kinda stupid but we need the mouse coords back...
                    var current = {x: diffX + this.parameters.p.x, y: diffY + this.parameters.p.y};

                    // start minus middle
                    var sAngle = Math.atan2((this.parameters.p.y - this.parameters.box.y - this.parameters.box.height / 2), (this.parameters.p.x - this.parameters.box.x - this.parameters.box.width / 2));

                    // end minus middle
                    var pAngle = Math.atan2((current.y - this.parameters.box.y - this.parameters.box.height / 2), (current.x - this.parameters.box.x - this.parameters.box.width / 2));

                    var angle = (pAngle - sAngle) * 180 / Math.PI;

                    // We have to move the element to the center of the box first and change the rotation afterwards
                    // because rotation always works around a rotation-center, which is changed when moving the element
                    // We also set the new rotation center to the center of the box.
                    this.el.center(this.parameters.box.cx, this.parameters.box.cy).rotate(this.parameters.rotation + angle - angle % this.options.snapToAngle, this.parameters.box.cx, this.parameters.box.cy);
                };
        }
        if(event.type=="rt"){
            SVG.on(window, 'mousedown.resize', function (e) {
                _this.update(e || window.event);

            });    // mousemove to keep track of the changes and...
            SVG.on(window, 'mouseup.resize', function () {
                this.lastUpdateCall = null;
                SVG.off(window, 'mousedown.resize');
                SVG.off(window, 'mouseup.resize');
            });
        }
        else{
            // When resizing started, we have to register events for...
            SVG.on(window, 'mousemove.resize', function (e) {
                _this.update(e || window.event);

            });    // mousemove to keep track of the changes and...
            SVG.on(window, 'mouseup.resize', function () {
                _this.done();
            });

        }

    };
    // The update-function redraws the element every time the mouse is moving
    ResizeHandler.prototype.update = function (event) {

        if (!event) {
            if (this.lastUpdateCall) {
                this.calc(this.lastUpdateCall[0], this.lastUpdateCall[1]);
            }
            return;
        }

        // Calculate the difference between the mouseposition at start and now
        var p = this.transformPoint(event.clientX, event.clientY);
        var diffX = p.x - this.parameters.p.x,
            diffY = p.y - this.parameters.p.y;

        this.lastUpdateCall = [diffX, diffY];

        // Calculate the new position and height / width of the element
        this.calc(diffX, diffY);
    };

    // Is called on mouseup.
    // Removes the update-function from the mousemove event
    ResizeHandler.prototype.done = function () {
        this.lastUpdateCall = null;
        SVG.off(window, 'mousemove.resize');
        SVG.off(window, 'mouseup.resize');
        this.el.fire('resizedone');
    };

    // The flag is used to determine whether the resizing is used with a left-Point (first bit) and top-point (second bit)
    // In this cases the temp-values are calculated differently
    ResizeHandler.prototype.snapToGrid = function (diffX, diffY, flag, pointCoordsY) {

        var temp;

        // If `pointCoordsY` is given, a single Point has to be snapped (deepSelect). That's why we need a different temp-value
        if (pointCoordsY) {
            // Note that flag = pointCoordsX in this case
            temp = [(flag + diffX) % this.options.snapToGrid, (pointCoordsY + diffY) % this.options.snapToGrid];
        } else {
            // We check if the flag is set and if not we set a default-value (both bits set - which means upper-left-edge)
            flag = flag == null ? 1 | 1 << 1 : flag;
            temp = [(this.parameters.box.x + diffX + (flag & 1 ? 0 : this.parameters.box.width)) % this.options.snapToGrid, (this.parameters.box.y + diffY + (flag & (1 << 1) ? 0 : this.parameters.box.height)) % this.options.snapToGrid];
        }

        diffX -= (Math.abs(temp[0]) < this.options.snapToGrid / 2 ? temp[0] : temp[0] - this.options.snapToGrid) + (temp[0] < 0 ? this.options.snapToGrid : 0);
        diffY -= (Math.abs(temp[1]) < this.options.snapToGrid / 2 ? temp[1] : temp[1] - this.options.snapToGrid) + (temp[1] < 0 ? this.options.snapToGrid : 0);
        return [diffX, diffY];

    };

    SVG.extend(SVG.Element, {
        // Resize element with mouse
        resize: function (options) {

            (this.remember('_resizeHandler') || new ResizeHandler(this)).init(options || {});

            return this;

        }

    });

    SVG.Element.prototype.resize.defaults = {
        snapToAngle: 0.1,    // Specifies the speed the rotation is happening when moving the mouse
        snapToGrid: 1        // Snaps to a grid of `snapToGrid` Pixels
    };
}).call(this);