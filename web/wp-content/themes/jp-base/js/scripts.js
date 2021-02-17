"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

// Set up the config object
window.lazySizesConfig = window.lazySizesConfig || {}; // load all elements after the window onload event

window.lazySizesConfig.preloadAfterLoad = true; // load not so near view elements

window.lazySizesConfig.loadMode = 3;
!function (e) {
  if ("object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "undefined" != typeof module) module.exports = e();else if ("function" == typeof define && define.amd) define([], e);else {
    var t;
    t = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this, t.hoverintent = e();
  }
}(function () {
  return function e(t, n, o) {
    function r(u, f) {
      if (!n[u]) {
        if (!t[u]) {
          var s = "function" == typeof require && require;
          if (!f && s) return s(u, !0);
          if (i) return i(u, !0);
          var c = new Error("Cannot find module '" + u + "'");
          throw c.code = "MODULE_NOT_FOUND", c;
        }

        var a = n[u] = {
          exports: {}
        };
        t[u][0].call(a.exports, function (e) {
          var n = t[u][1][e];
          return r(n || e);
        }, a, a.exports, e, t, n, o);
      }

      return n[u].exports;
    }

    for (var i = "function" == typeof require && require, u = 0; u < o.length; u++) {
      r(o[u]);
    }

    return r;
  }({
    1: [function (e, t, n) {
      "use strict";

      var o = e("xtend");

      t.exports = function (e, t, n) {
        function r(e, t) {
          return p && (p = clearTimeout(p)), d = 0, n.call(e, t);
        }

        function i(e) {
          c = e.clientX, a = e.clientY;
        }

        function u(e, n) {
          if (p && (p = clearTimeout(p)), Math.abs(v - c) + Math.abs(l - a) < y.sensitivity) return d = 1, t.call(e, n);
          v = c, l = a, p = setTimeout(function () {
            u(e, n);
          }, y.interval);
        }

        function f(t) {
          return p && (p = clearTimeout(p)), e.removeEventListener("mousemove", i, !1), 1 !== d && (v = t.clientX, l = t.clientY, e.addEventListener("mousemove", i, !1), p = setTimeout(function () {
            u(e, t);
          }, y.interval)), this;
        }

        function s(t) {
          return p && (p = clearTimeout(p)), e.removeEventListener("mousemove", i, !1), 1 === d && (p = setTimeout(function () {
            r(e, t);
          }, y.timeout)), this;
        }

        var c,
            a,
            v,
            l,
            m = {},
            d = 0,
            p = 0,
            y = {
          sensitivity: 7,
          interval: 100,
          timeout: 0
        };
        return m.options = function (e) {
          return y = o({}, y, e), m;
        }, m.remove = function () {
          e && (e.removeEventListener("mouseover", f, !1), e.removeEventListener("mouseout", s, !1));
        }, e && (e.addEventListener("mouseover", f, !1), e.addEventListener("mouseout", s, !1)), m;
      };
    }, {
      xtend: 2
    }],
    2: [function (e, t, n) {
      function o() {
        for (var e = {}, t = 0; t < arguments.length; t++) {
          var n = arguments[t];

          for (var o in n) {
            r.call(n, o) && (e[o] = n[o]);
          }
        }

        return e;
      }

      t.exports = o;
      var r = Object.prototype.hasOwnProperty;
    }, {}]
  }, {}, [1])(1);
});
/*
 * Simple checker for the question "is an element in view?"
 *
 * Add the 'inView' class to your elements, this script will
 * loop through them to see if they are in the widow enough
 * to be considered "in view". If they are they get the class
 * "is-inView" and "touched-inView". The class "is-inView" is
 * removed when an element is no longer in view, but the
 * "touched-inView" class will remain.
 *
 */

/*
 * You can modify the percentage of the window you want to
 * consider "in view". This is the threshold where an element
 * must scroll into this area before it is in view.
 *
 * For example, if the window is 900px in height, then 80% of
 * the screen is 720px. So a section would have to be
 * within that 720px to get the 'is-inView' class applied to
 * it.
 */

var activeScreenPercentage = 0.8; // Use a decimal value.
// Retrieve all the sections using the `inView` class.

var sections = document.querySelectorAll('.inView'); // Run the check on page load, scrolls, and resize. That should cover all the instances where the elements' positions need to be checked.

jp_checkInView();
window.addEventListener('scroll', jp_checkInView, {
  passive: true
});
window.addEventListener('resize', jp_checkInView, {
  passive: true
});

function jp_checkInView() {
  try {
    // Check the top/bottom borders of each section compared to the window dimensions. This determines if the section is "in view" or not.
    for (var i = 0; i < sections.length; i++) {
      var thresholdTop = window.innerHeight * activeScreenPercentage;
      var thresholdBottom = window.innerHeight * (1 - activeScreenPercentage);

      if (sections[i].getBoundingClientRect().top < thresholdTop && sections[i].getBoundingClientRect().bottom >= thresholdBottom) {
        sections[i].classList.add('is-inView');
        sections[i].classList.add('touched-inView');
      } else {
        sections[i].classList.remove('is-inView');
      }
    }
  } catch (error) {
    console.log(error);
  }
}
/* Simple helper listener to determine if the user is scrolling up or down, you can check this at any point in your code.
 * Examples:
 * window.jp_scrollDirection === 'up'
 * or
 * window.jp_scrollDirection === 'down'
 */


window.jp_lastScrollTop = 0;
window.jp_scrollDirection = 'down';
window.addEventListener('scroll', function () {
  try {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > window.jp_lastScrollTop) {
      window.jp_scrollDirection = 'down';
    } else {
      window.jp_scrollDirection = 'up';
    }

    window.jp_lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Set the last scrollTop value, and make sure the scrolling doesn't go negative.
    //  console.log(window.jp_scrollDirection);
  } catch (error) {
    console.log('Error with scroll direction detection.');
    console.log(error);
  }
}, {
  passive: true
});

(function (window, factory) {
  var lazySizes = factory(window, window.document);
  window.lazySizes = lazySizes;

  if ((typeof module === "undefined" ? "undefined" : _typeof(module)) == 'object' && module.exports) {
    module.exports = lazySizes;
  }
})(window, function l(window, document) {
  'use strict';
  /*jshint eqnull:true */

  if (!document.getElementsByClassName) {
    return;
  }

  var lazysizes, lazySizesConfig;
  var docElem = document.documentElement;
  var Date = window.Date;
  var supportPicture = window.HTMLPictureElement;
  var _addEventListener = 'addEventListener';
  var _getAttribute = 'getAttribute';
  var addEventListener = window[_addEventListener];
  var setTimeout = window.setTimeout;
  var requestAnimationFrame = window.requestAnimationFrame || setTimeout;
  var requestIdleCallback = window.requestIdleCallback;
  var regPicture = /^picture$/i;
  var loadEvents = ['load', 'error', 'lazyincluded', '_lazyloaded'];
  var regClassCache = {};
  var forEach = Array.prototype.forEach;

  var hasClass = function hasClass(ele, cls) {
    if (!regClassCache[cls]) {
      regClassCache[cls] = new RegExp('(\\s|^)' + cls + '(\\s|$)');
    }

    return regClassCache[cls].test(ele[_getAttribute]('class') || '') && regClassCache[cls];
  };

  var addClass = function addClass(ele, cls) {
    if (!hasClass(ele, cls)) {
      ele.setAttribute('class', (ele[_getAttribute]('class') || '').trim() + ' ' + cls);
    }
  };

  var removeClass = function removeClass(ele, cls) {
    var reg;

    if (reg = hasClass(ele, cls)) {
      ele.setAttribute('class', (ele[_getAttribute]('class') || '').replace(reg, ' '));
    }
  };

  var addRemoveLoadEvents = function addRemoveLoadEvents(dom, fn, add) {
    var action = add ? _addEventListener : 'removeEventListener';

    if (add) {
      addRemoveLoadEvents(dom, fn);
    }

    loadEvents.forEach(function (evt) {
      dom[action](evt, fn);
    });
  };

  var triggerEvent = function triggerEvent(elem, name, detail, noBubbles, noCancelable) {
    var event = document.createEvent('CustomEvent');

    if (!detail) {
      detail = {};
    }

    detail.instance = lazysizes;
    event.initCustomEvent(name, !noBubbles, !noCancelable, detail);
    elem.dispatchEvent(event);
    return event;
  };

  var updatePolyfill = function updatePolyfill(el, full) {
    var polyfill;

    if (!supportPicture && (polyfill = window.picturefill || lazySizesConfig.pf)) {
      polyfill({
        reevaluate: true,
        elements: [el]
      });
    } else if (full && full.src) {
      el.src = full.src;
    }
  };

  var getCSS = function getCSS(elem, style) {
    return (getComputedStyle(elem, null) || {})[style];
  };

  var getWidth = function getWidth(elem, parent, width) {
    width = width || elem.offsetWidth;

    while (width < lazySizesConfig.minSize && parent && !elem._lazysizesWidth) {
      width = parent.offsetWidth;
      parent = parent.parentNode;
    }

    return width;
  };

  var rAF = function () {
    var running, waiting;
    var firstFns = [];
    var secondFns = [];
    var fns = firstFns;

    var run = function run() {
      var runFns = fns;
      fns = firstFns.length ? secondFns : firstFns;
      running = true;
      waiting = false;

      while (runFns.length) {
        runFns.shift()();
      }

      running = false;
    };

    var rafBatch = function rafBatch(fn, queue) {
      if (running && !queue) {
        fn.apply(this, arguments);
      } else {
        fns.push(fn);

        if (!waiting) {
          waiting = true;
          (document.hidden ? setTimeout : requestAnimationFrame)(run);
        }
      }
    };

    rafBatch._lsFlush = run;
    return rafBatch;
  }();

  var rAFIt = function rAFIt(fn, simple) {
    return simple ? function () {
      rAF(fn);
    } : function () {
      var that = this;
      var args = arguments;
      rAF(function () {
        fn.apply(that, args);
      });
    };
  };

  var throttle = function throttle(fn) {
    var running;
    var lastTime = 0;
    var gDelay = 125;
    var rICTimeout = lazySizesConfig.ricTimeout;

    var run = function run() {
      running = false;
      lastTime = Date.now();
      fn();
    };

    var idleCallback = requestIdleCallback && lazySizesConfig.ricTimeout ? function () {
      requestIdleCallback(run, {
        timeout: rICTimeout
      });

      if (rICTimeout !== lazySizesConfig.ricTimeout) {
        rICTimeout = lazySizesConfig.ricTimeout;
      }
    } : rAFIt(function () {
      setTimeout(run);
    }, true);
    return function (isPriority) {
      var delay;

      if (isPriority = isPriority === true) {
        rICTimeout = 33;
      }

      if (running) {
        return;
      }

      running = true;
      delay = gDelay - (Date.now() - lastTime);

      if (delay < 0) {
        delay = 0;
      }

      if (isPriority || delay < 9 && requestIdleCallback) {
        idleCallback();
      } else {
        setTimeout(idleCallback, delay);
      }
    };
  }; //based on http://modernjavascript.blogspot.de/2013/08/building-better-debounce.html


  var debounce = function debounce(func) {
    var timeout, timestamp;
    var wait = 99;

    var run = function run() {
      timeout = null;
      func();
    };

    var later = function later() {
      var last = Date.now() - timestamp;

      if (last < wait) {
        setTimeout(later, wait - last);
      } else {
        (requestIdleCallback || run)(run);
      }
    };

    return function () {
      timestamp = Date.now();

      if (!timeout) {
        timeout = setTimeout(later, wait);
      }
    };
  };

  (function () {
    var prop;
    var lazySizesDefaults = {
      lazyClass: 'lazyload',
      loadedClass: 'lazyloaded',
      loadingClass: 'lazyloading',
      preloadClass: 'lazypreload',
      errorClass: 'lazyerror',
      //strictClass: 'lazystrict',
      autosizesClass: 'lazyautosizes',
      srcAttr: 'data-src',
      srcsetAttr: 'data-srcset',
      sizesAttr: 'data-sizes',
      //preloadAfterLoad: false,
      minSize: 40,
      customMedia: {},
      init: true,
      expFactor: 1.5,
      hFac: 0.8,
      loadMode: 2,
      loadHidden: true,
      ricTimeout: 300
    };
    lazySizesConfig = window.lazySizesConfig || window.lazysizesConfig || {};

    for (prop in lazySizesDefaults) {
      if (!(prop in lazySizesConfig)) {
        lazySizesConfig[prop] = lazySizesDefaults[prop];
      }
    }

    window.lazySizesConfig = lazySizesConfig;
    setTimeout(function () {
      if (lazySizesConfig.init) {
        init();
      }
    });
  })();

  var loader = function () {
    var preloadElems, isCompleted, resetPreloadingTimer, loadMode, started;
    var eLvW, elvH, eLtop, eLleft, eLright, eLbottom;
    var defaultExpand, preloadExpand, hFac;
    var regImg = /^img$/i;
    var regIframe = /^iframe$/i;
    var supportScroll = 'onscroll' in window && !/glebot/.test(navigator.userAgent);
    var shrinkExpand = 0;
    var currentExpand = 0;
    var isLoading = 0;
    var lowRuns = -1;

    var resetPreloading = function resetPreloading(e) {
      isLoading--;

      if (e && e.target) {
        addRemoveLoadEvents(e.target, resetPreloading);
      }

      if (!e || isLoading < 0 || !e.target) {
        isLoading = 0;
      }
    };

    var isNestedVisible = function isNestedVisible(elem, elemExpand) {
      var outerRect;
      var parent = elem;
      var visible = getCSS(document.body, 'visibility') == 'hidden' || getCSS(elem, 'visibility') != 'hidden';
      eLtop -= elemExpand;
      eLbottom += elemExpand;
      eLleft -= elemExpand;
      eLright += elemExpand;

      while (visible && (parent = parent.offsetParent) && parent != document.body && parent != docElem) {
        visible = (getCSS(parent, 'opacity') || 1) > 0;

        if (visible && getCSS(parent, 'overflow') != 'visible') {
          outerRect = parent.getBoundingClientRect();
          visible = eLright > outerRect.left && eLleft < outerRect.right && eLbottom > outerRect.top - 1 && eLtop < outerRect.bottom + 1;
        }
      }

      return visible;
    };

    var checkElements = function checkElements() {
      var eLlen, i, rect, autoLoadElem, loadedSomething, elemExpand, elemNegativeExpand, elemExpandVal, beforeExpandVal;
      var lazyloadElems = lazysizes.elements;

      if ((loadMode = lazySizesConfig.loadMode) && isLoading < 8 && (eLlen = lazyloadElems.length)) {
        i = 0;
        lowRuns++;

        if (preloadExpand == null) {
          if (!('expand' in lazySizesConfig)) {
            lazySizesConfig.expand = docElem.clientHeight > 500 && docElem.clientWidth > 500 ? 500 : 370;
          }

          defaultExpand = lazySizesConfig.expand;
          preloadExpand = defaultExpand * lazySizesConfig.expFactor;
        }

        if (currentExpand < preloadExpand && isLoading < 1 && lowRuns > 2 && loadMode > 2 && !document.hidden) {
          currentExpand = preloadExpand;
          lowRuns = 0;
        } else if (loadMode > 1 && lowRuns > 1 && isLoading < 6) {
          currentExpand = defaultExpand;
        } else {
          currentExpand = shrinkExpand;
        }

        for (; i < eLlen; i++) {
          if (!lazyloadElems[i] || lazyloadElems[i]._lazyRace) {
            continue;
          }

          if (!supportScroll) {
            unveilElement(lazyloadElems[i]);
            continue;
          }

          if (!(elemExpandVal = lazyloadElems[i][_getAttribute]('data-expand')) || !(elemExpand = elemExpandVal * 1)) {
            elemExpand = currentExpand;
          }

          if (beforeExpandVal !== elemExpand) {
            eLvW = innerWidth + elemExpand * hFac;
            elvH = innerHeight + elemExpand;
            elemNegativeExpand = elemExpand * -1;
            beforeExpandVal = elemExpand;
          }

          rect = lazyloadElems[i].getBoundingClientRect();

          if ((eLbottom = rect.bottom) >= elemNegativeExpand && (eLtop = rect.top) <= elvH && (eLright = rect.right) >= elemNegativeExpand * hFac && (eLleft = rect.left) <= eLvW && (eLbottom || eLright || eLleft || eLtop) && (lazySizesConfig.loadHidden || getCSS(lazyloadElems[i], 'visibility') != 'hidden') && (isCompleted && isLoading < 3 && !elemExpandVal && (loadMode < 3 || lowRuns < 4) || isNestedVisible(lazyloadElems[i], elemExpand))) {
            unveilElement(lazyloadElems[i]);
            loadedSomething = true;

            if (isLoading > 9) {
              break;
            }
          } else if (!loadedSomething && isCompleted && !autoLoadElem && isLoading < 4 && lowRuns < 4 && loadMode > 2 && (preloadElems[0] || lazySizesConfig.preloadAfterLoad) && (preloadElems[0] || !elemExpandVal && (eLbottom || eLright || eLleft || eLtop || lazyloadElems[i][_getAttribute](lazySizesConfig.sizesAttr) != 'auto'))) {
            autoLoadElem = preloadElems[0] || lazyloadElems[i];
          }
        }

        if (autoLoadElem && !loadedSomething) {
          unveilElement(autoLoadElem);
        }
      }
    };

    var throttledCheckElements = throttle(checkElements);

    var switchLoadingClass = function switchLoadingClass(e) {
      addClass(e.target, lazySizesConfig.loadedClass);
      removeClass(e.target, lazySizesConfig.loadingClass);
      addRemoveLoadEvents(e.target, rafSwitchLoadingClass);
      triggerEvent(e.target, 'lazyloaded');
    };

    var rafedSwitchLoadingClass = rAFIt(switchLoadingClass);

    var rafSwitchLoadingClass = function rafSwitchLoadingClass(e) {
      rafedSwitchLoadingClass({
        target: e.target
      });
    };

    var changeIframeSrc = function changeIframeSrc(elem, src) {
      try {
        elem.contentWindow.location.replace(src);
      } catch (e) {
        elem.src = src;
      }
    };

    var handleSources = function handleSources(source) {
      var customMedia;

      var sourceSrcset = source[_getAttribute](lazySizesConfig.srcsetAttr);

      if (customMedia = lazySizesConfig.customMedia[source[_getAttribute]('data-media') || source[_getAttribute]('media')]) {
        source.setAttribute('media', customMedia);
      }

      if (sourceSrcset) {
        source.setAttribute('srcset', sourceSrcset);
      }
    };

    var lazyUnveil = rAFIt(function (elem, detail, isAuto, sizes, isImg) {
      var src, srcset, parent, isPicture, event, firesLoad;

      if (!(event = triggerEvent(elem, 'lazybeforeunveil', detail)).defaultPrevented) {
        if (sizes) {
          if (isAuto) {
            addClass(elem, lazySizesConfig.autosizesClass);
          } else {
            elem.setAttribute('sizes', sizes);
          }
        }

        srcset = elem[_getAttribute](lazySizesConfig.srcsetAttr);
        src = elem[_getAttribute](lazySizesConfig.srcAttr);

        if (isImg) {
          parent = elem.parentNode;
          isPicture = parent && regPicture.test(parent.nodeName || '');
        }

        firesLoad = detail.firesLoad || 'src' in elem && (srcset || src || isPicture);
        event = {
          target: elem
        };

        if (firesLoad) {
          addRemoveLoadEvents(elem, resetPreloading, true);
          clearTimeout(resetPreloadingTimer);
          resetPreloadingTimer = setTimeout(resetPreloading, 2500);
          addClass(elem, lazySizesConfig.loadingClass);
          addRemoveLoadEvents(elem, rafSwitchLoadingClass, true);
        }

        if (isPicture) {
          forEach.call(parent.getElementsByTagName('source'), handleSources);
        }

        if (srcset) {
          elem.setAttribute('srcset', srcset);
        } else if (src && !isPicture) {
          if (regIframe.test(elem.nodeName)) {
            changeIframeSrc(elem, src);
          } else {
            elem.src = src;
          }
        }

        if (isImg && (srcset || isPicture)) {
          updatePolyfill(elem, {
            src: src
          });
        }
      }

      if (elem._lazyRace) {
        delete elem._lazyRace;
      }

      removeClass(elem, lazySizesConfig.lazyClass);
      rAF(function () {
        if (!firesLoad || elem.complete && elem.naturalWidth > 1) {
          if (firesLoad) {
            resetPreloading(event);
          } else {
            isLoading--;
          }

          switchLoadingClass(event);
        }
      }, true);
    });

    var unveilElement = function unveilElement(elem) {
      var detail;
      var isImg = regImg.test(elem.nodeName); //allow using sizes="auto", but don't use. it's invalid. Use data-sizes="auto" or a valid value for sizes instead (i.e.: sizes="80vw")

      var sizes = isImg && (elem[_getAttribute](lazySizesConfig.sizesAttr) || elem[_getAttribute]('sizes'));

      var isAuto = sizes == 'auto';

      if ((isAuto || !isCompleted) && isImg && (elem[_getAttribute]('src') || elem.srcset) && !elem.complete && !hasClass(elem, lazySizesConfig.errorClass) && hasClass(elem, lazySizesConfig.lazyClass)) {
        return;
      }

      detail = triggerEvent(elem, 'lazyunveilread').detail;

      if (isAuto) {
        autoSizer.updateElem(elem, true, elem.offsetWidth);
      }

      elem._lazyRace = true;
      isLoading++;
      lazyUnveil(elem, detail, isAuto, sizes, isImg);
    };

    var onload = function onload() {
      if (isCompleted) {
        return;
      }

      if (Date.now() - started < 999) {
        setTimeout(onload, 999);
        return;
      }

      var afterScroll = debounce(function () {
        lazySizesConfig.loadMode = 3;
        throttledCheckElements();
      });
      isCompleted = true;
      lazySizesConfig.loadMode = 3;
      throttledCheckElements();
      addEventListener('scroll', function () {
        if (lazySizesConfig.loadMode == 3) {
          lazySizesConfig.loadMode = 2;
        }

        afterScroll();
      }, true);
    };

    return {
      _: function _() {
        started = Date.now();
        lazysizes.elements = document.getElementsByClassName(lazySizesConfig.lazyClass);
        preloadElems = document.getElementsByClassName(lazySizesConfig.lazyClass + ' ' + lazySizesConfig.preloadClass);
        hFac = lazySizesConfig.hFac;
        addEventListener('scroll', throttledCheckElements, true);
        addEventListener('resize', throttledCheckElements, true);

        if (window.MutationObserver) {
          new MutationObserver(throttledCheckElements).observe(docElem, {
            childList: true,
            subtree: true,
            attributes: true
          });
        } else {
          docElem[_addEventListener]('DOMNodeInserted', throttledCheckElements, true);

          docElem[_addEventListener]('DOMAttrModified', throttledCheckElements, true);

          setInterval(throttledCheckElements, 999);
        }

        addEventListener('hashchange', throttledCheckElements, true); //, 'fullscreenchange'

        ['focus', 'mouseover', 'click', 'load', 'transitionend', 'animationend', 'webkitAnimationEnd'].forEach(function (name) {
          document[_addEventListener](name, throttledCheckElements, true);
        });

        if (/d$|^c/.test(document.readyState)) {
          onload();
        } else {
          addEventListener('load', onload);

          document[_addEventListener]('DOMContentLoaded', throttledCheckElements);

          setTimeout(onload, 20000);
        }

        if (lazysizes.elements.length) {
          checkElements();

          rAF._lsFlush();
        } else {
          throttledCheckElements();
        }
      },
      checkElems: throttledCheckElements,
      unveil: unveilElement
    };
  }();

  var autoSizer = function () {
    var autosizesElems;
    var sizeElement = rAFIt(function (elem, parent, event, width) {
      var sources, i, len;
      elem._lazysizesWidth = width;
      width += 'px';
      elem.setAttribute('sizes', width);

      if (regPicture.test(parent.nodeName || '')) {
        sources = parent.getElementsByTagName('source');

        for (i = 0, len = sources.length; i < len; i++) {
          sources[i].setAttribute('sizes', width);
        }
      }

      if (!event.detail.dataAttr) {
        updatePolyfill(elem, event.detail);
      }
    });

    var getSizeElement = function getSizeElement(elem, dataAttr, width) {
      var event;
      var parent = elem.parentNode;

      if (parent) {
        width = getWidth(elem, parent, width);
        event = triggerEvent(elem, 'lazybeforesizes', {
          width: width,
          dataAttr: !!dataAttr
        });

        if (!event.defaultPrevented) {
          width = event.detail.width;

          if (width && width !== elem._lazysizesWidth) {
            sizeElement(elem, parent, event, width);
          }
        }
      }
    };

    var updateElementsSizes = function updateElementsSizes() {
      var i;
      var len = autosizesElems.length;

      if (len) {
        i = 0;

        for (; i < len; i++) {
          getSizeElement(autosizesElems[i]);
        }
      }
    };

    var debouncedUpdateElementsSizes = debounce(updateElementsSizes);
    return {
      _: function _() {
        autosizesElems = document.getElementsByClassName(lazySizesConfig.autosizesClass);
        addEventListener('resize', debouncedUpdateElementsSizes);
      },
      checkElems: debouncedUpdateElementsSizes,
      updateElem: getSizeElement
    };
  }();

  var init = function init() {
    if (!init.i) {
      init.i = true;

      autoSizer._();

      loader._();
    }
  };

  lazysizes = {
    cfg: lazySizesConfig,
    autoSizer: autoSizer,
    loader: loader,
    init: init,
    uP: updatePolyfill,
    aC: addClass,
    rC: removeClass,
    hC: hasClass,
    fire: triggerEvent,
    gW: getWidth,
    rAF: rAF
  };
  return lazysizes;
});
/*
 * Based on https://zurb.com/playground/responsive-tables
 *
 * Just add the class `responsive` to the <table> element,
 * the JS will take it from there to allow horizontal
 * scrolling on small screens.
 *
 * Related CSS is in <theme>/styles/scss/_responsive-tables.scss
 * 									 OR
 * 									 <theme>/modules/table/scss/_responsive-tables.scss
 *
 * NOTE: Modified from the original script so it stops throwing JS errors.
 * - Removed the outer document.ready function, since our scripts
 * are compiled and loaded at the bottom of the HTML anyway.
 * - Added try/catch blocks.
 * - Replaced jQuery code with ES6 syntax.
*/


var switched = false;

var updateTables = function updateTables() {
  try {
    var responsiveTables = Array.from(document.querySelectorAll('table.responsive'));

    if (window.innerWidth <= 767 && !switched) {
      switched = true;

      for (var i = 0; i < responsiveTables.length; i++) {
        splitTable(responsiveTables[i]);
      }

      return true;
    } else if (switched && window.innerWidth > 767) {
      switched = false;

      for (var _i = 0; _i < responsiveTables.length; _i++) {
        unsplitTable(responsiveTables[_i]);
      }
    }
  } catch (e) {
    console.log('Error updating tables.');
    console.log(e);
  }
}; // Initialize


try {
  if (document.querySelectorAll('table.responsive').length) {
    updateTables();
    window.addEventListener('redraw', function () {
      switched = false;
      updateTables();
    });
    window.addEventListener('resize', updateTables);
  }
} catch (e) {
  console.log(e);
}

function splitTable(original) {
  // `original` should be an element == table.responsive
  // console.log('INSIDE splitTable()');
  // console.log('original = ');
  // console.log(original);
  try {
    // Save a copy of the original's parent so we can alter its HTML contents later.
    var original_parent = original.parentNode; // Set up 3 <div>s. div.table-wrapper will contain the other two <div>s. The other two <div>s will contain the original or cloned version of the <table>.

    var wrap = document.createElement('div');
    wrap.classList.add('table-wrapper');
    var scrollable = document.createElement('div');
    scrollable.classList.add('scrollable');
    var pinned = document.createElement('div');
    pinned.classList.add('pinned');
    wrap.appendChild(scrollable);
    wrap.appendChild(pinned); // Make a copy of the original <table>, this will be modified to allow for the horizontal scrolling.

    var copy = original.cloneNode(true);
    var cells = Array.from(copy.querySelectorAll("td:not(:first-child), th:not(:first-child)"));

    for (var i = 0; i < cells.length; i++) {
      cells[i].style.display = 'none';
    }

    copy.classList.remove('responsive'); // Add the original table to the new div.scrollable container, and the copy goes in div.pinned.

    scrollable.appendChild(original);
    pinned.appendChild(copy); // Now `wrap` should have the `scrollable` and `pinned` containers, which themselves have the original and cloned tables respectively. Replace the original's parent's HTML with this new `wrap`'s HTML.

    original_parent.innerHTML = wrap.outerHTML; // The cell heights in the cloned/original tables need to match for the effect to work.

    setCellHeights(original, copy);
  } catch (error) {
    console.log('Error in splitTable().');
    console.log(error);
  }
}

function unsplitTable(original) {
  // console.log('INSIDE unsplitTable()');
  // console.log('original = ');
  // console.log(original);
  try {
    // `original` should be a <table> element within div.scrollable, which is within div.table-wrapper. The goal here is to get the parent immediately beyond div.table-wrapper.
    var parent_container = original;

    do {
      parent_container = parent_container.parentNode;
    } while ((parent_container.matches('.table-wrapper') || parent_container.matches('.scrollable')) && parent_container !== document.body); // With that outer parent, set its contents to the original <table>'s HTML.


    parent_container.innerHTML = original.outerHTML;
  } catch (error) {
    console.log('Error in unsplitTable().');
    console.log(error);
  }
}

function setCellHeights(original, copy) {
  try {
    var tr = Array.from(original.querySelectorAll('tr'));
    var tr_copy = Array.from(copy.querySelectorAll('tr'));
    var heights = [];

    for (var i = 0; i < tr.length; i++) {
      var _self = tr[i];

      var tx = _self.querySelectorAll('th, td');

      for (var j = 0; j < tx.length; j++) {
        var height = parseInt(window.getComputedStyle(tx[j]).height);
        heights[i] = heights[i] || 0;

        if (height > heights[i]) {
          heights[i] = height;
        }
      }
    }

    for (var _i2 = 0; _i2 < tr_copy.length; _i2++) {
      tr_copy[_i2].style.height = heights[_i2] + 'px';
    }
  } catch (error) {
    console.log('Error in setCellHeights().');
    console.log(error);
  }
} // Based on https://css-tricks.com/snippets/jquery/smooth-scrolling/


var jp_jump_links = document.querySelectorAll('a[data-jump-link="1"]');

for (var i = 0; i < jp_jump_links.length; i++) {
  jp_jump_links[i].addEventListener('click', jp_jump_link_cb);
}

function jp_jump_link_cb(event) {
  // console.log('clicked jump link');
  // console.log(event);
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = document.querySelectorAll(this.hash);
    target = target.length ? target : document.querySelectorAll('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

    if (target.length) {
      event.preventDefault();
      target[0].scrollIntoView({
        behavior: 'smooth'
      });
    }
  }
}

!function () {
  "use strict";

  function o() {
    var o = window,
        t = document;

    if (!("scrollBehavior" in t.documentElement.style && !0 !== o.__forceSmoothScrollPolyfill__)) {
      var l,
          e = o.HTMLElement || o.Element,
          r = 468,
          i = {
        scroll: o.scroll || o.scrollTo,
        scrollBy: o.scrollBy,
        elementScroll: e.prototype.scroll || n,
        scrollIntoView: e.prototype.scrollIntoView
      },
          s = o.performance && o.performance.now ? o.performance.now.bind(o.performance) : Date.now,
          c = (l = o.navigator.userAgent, new RegExp(["MSIE ", "Trident/", "Edge/"].join("|")).test(l) ? 1 : 0);
      o.scroll = o.scrollTo = function () {
        void 0 !== arguments[0] && (!0 !== f(arguments[0]) ? h.call(o, t.body, void 0 !== arguments[0].left ? ~~arguments[0].left : o.scrollX || o.pageXOffset, void 0 !== arguments[0].top ? ~~arguments[0].top : o.scrollY || o.pageYOffset) : i.scroll.call(o, void 0 !== arguments[0].left ? arguments[0].left : "object" != _typeof(arguments[0]) ? arguments[0] : o.scrollX || o.pageXOffset, void 0 !== arguments[0].top ? arguments[0].top : void 0 !== arguments[1] ? arguments[1] : o.scrollY || o.pageYOffset));
      }, o.scrollBy = function () {
        void 0 !== arguments[0] && (f(arguments[0]) ? i.scrollBy.call(o, void 0 !== arguments[0].left ? arguments[0].left : "object" != _typeof(arguments[0]) ? arguments[0] : 0, void 0 !== arguments[0].top ? arguments[0].top : void 0 !== arguments[1] ? arguments[1] : 0) : h.call(o, t.body, ~~arguments[0].left + (o.scrollX || o.pageXOffset), ~~arguments[0].top + (o.scrollY || o.pageYOffset)));
      }, e.prototype.scroll = e.prototype.scrollTo = function () {
        if (void 0 !== arguments[0]) if (!0 !== f(arguments[0])) {
          var o = arguments[0].left,
              t = arguments[0].top;
          h.call(this, this, void 0 === o ? this.scrollLeft : ~~o, void 0 === t ? this.scrollTop : ~~t);
        } else {
          if ("number" == typeof arguments[0] && void 0 === arguments[1]) throw new SyntaxError("Value could not be converted");
          i.elementScroll.call(this, void 0 !== arguments[0].left ? ~~arguments[0].left : "object" != _typeof(arguments[0]) ? ~~arguments[0] : this.scrollLeft, void 0 !== arguments[0].top ? ~~arguments[0].top : void 0 !== arguments[1] ? ~~arguments[1] : this.scrollTop);
        }
      }, e.prototype.scrollBy = function () {
        void 0 !== arguments[0] && (!0 !== f(arguments[0]) ? this.scroll({
          left: ~~arguments[0].left + this.scrollLeft,
          top: ~~arguments[0].top + this.scrollTop,
          behavior: arguments[0].behavior
        }) : i.elementScroll.call(this, void 0 !== arguments[0].left ? ~~arguments[0].left + this.scrollLeft : ~~arguments[0] + this.scrollLeft, void 0 !== arguments[0].top ? ~~arguments[0].top + this.scrollTop : ~~arguments[1] + this.scrollTop));
      }, e.prototype.scrollIntoView = function () {
        if (!0 !== f(arguments[0])) {
          var l = function (o) {
            var l, e, r, i;

            do {
              l = (o = o.parentNode) === t.body;
            } while (!1 === l && !1 === (r = p(e = o, "Y") && a(e, "Y"), i = p(e, "X") && a(e, "X"), r || i));

            return l = null, o;
          }(this),
              e = l.getBoundingClientRect(),
              r = this.getBoundingClientRect();

          l !== t.body ? (h.call(this, l, l.scrollLeft + r.left - e.left, l.scrollTop + r.top - e.top), "fixed" !== o.getComputedStyle(l).position && o.scrollBy({
            left: e.left,
            top: e.top,
            behavior: "smooth"
          })) : o.scrollBy({
            left: r.left,
            top: r.top,
            behavior: "smooth"
          });
        } else i.scrollIntoView.call(this, void 0 === arguments[0] || arguments[0]);
      };
    }

    function n(o, t) {
      this.scrollLeft = o, this.scrollTop = t;
    }

    function f(o) {
      if (null === o || "object" != _typeof(o) || void 0 === o.behavior || "auto" === o.behavior || "instant" === o.behavior) return !0;
      if ("object" == _typeof(o) && "smooth" === o.behavior) return !1;
      throw new TypeError("behavior member of ScrollOptions " + o.behavior + " is not a valid value for enumeration ScrollBehavior.");
    }

    function p(o, t) {
      return "Y" === t ? o.clientHeight + c < o.scrollHeight : "X" === t ? o.clientWidth + c < o.scrollWidth : void 0;
    }

    function a(t, l) {
      var e = o.getComputedStyle(t, null)["overflow" + l];
      return "auto" === e || "scroll" === e;
    }

    function d(t) {
      var l,
          e,
          i,
          c,
          n = (s() - t.startTime) / r;
      c = n = n > 1 ? 1 : n, l = .5 * (1 - Math.cos(Math.PI * c)), e = t.startX + (t.x - t.startX) * l, i = t.startY + (t.y - t.startY) * l, t.method.call(t.scrollable, e, i), e === t.x && i === t.y || o.requestAnimationFrame(d.bind(o, t));
    }

    function h(l, e, r) {
      var c,
          f,
          p,
          a,
          h = s();
      l === t.body ? (c = o, f = o.scrollX || o.pageXOffset, p = o.scrollY || o.pageYOffset, a = i.scroll) : (c = l, f = l.scrollLeft, p = l.scrollTop, a = n), d({
        scrollable: c,
        method: a,
        startTime: h,
        startX: f,
        startY: p,
        x: e,
        y: r
      });
    }
  }

  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "undefined" != typeof module ? module.exports = {
    polyfill: o
  } : o();
}(); // There is a CSS custom property (CSS variable) that defines the header height so that elements targeted by a jump link will offset the scroll jump to account for the sticky header's height.

function taoti_set_header_height_css() {
  var new_height = 0;
  var header_height = document.getElementById('header').getBoundingClientRect().height;

  if (header_height) {
    new_height += header_height;
  } // console.log( document.getElementById('wpadminbar') );
  // if( document.getElementById('wpadminbar') ){
  // 	let admin_bar_height = document.getElementById('wpadminbar').getBoundingClientRect().height;
  // 	if( admin_bar_height ){
  // 		new_height += admin_bar_height;
  // 		// console.log('found wpadminbar, new_height = ' + new_height );
  // 	}
  // }


  if (new_height) {
    document.documentElement.style.setProperty('--header-height', new_height + 'px');
  }
} // Set the header height variable on page load...


taoti_set_header_height_css(); // ... and also whenever the window is resized.

var taoti_header_height_timeout = false;
window.addEventListener('resize', function () {
  if (taoti_header_height_timeout) {
    clearTimeout(taoti_header_height_timeout);
  }

  taoti_header_height_timeout = setTimeout(taoti_set_header_height_css, 500);
});
/* Simple helper lisener to determine if the user is scrolling up or down, you can check this at any point in your code.
 * Examples: `window.taoti_scrollDirection === 'up'`
 * or `window.taoti_scrollDirection === 'down'`
 */

window.taoti_lastScrollTop = 0;
window.taoti_scrollDirection = 'down';
window.addEventListener("scroll", function () {
  var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"

  if (st > window.taoti_lastScrollTop) {
    window.taoti_scrollDirection = 'down';
  } else {
    window.taoti_scrollDirection = 'up';
  }

  window.taoti_lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  //  console.log(window.taoti_scrollDirection);
}, {
  passive: true
});
/* Web Font Loader v1.6.28 - (c) Adobe Systems, Google. License: Apache 2.0 */

(function () {
  function aa(a, b, c) {
    return a.call.apply(a.bind, arguments);
  }

  function ba(a, b, c) {
    if (!a) throw Error();

    if (2 < arguments.length) {
      var d = Array.prototype.slice.call(arguments, 2);
      return function () {
        var c = Array.prototype.slice.call(arguments);
        Array.prototype.unshift.apply(c, d);
        return a.apply(b, c);
      };
    }

    return function () {
      return a.apply(b, arguments);
    };
  }

  function p(a, b, c) {
    p = Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? aa : ba;
    return p.apply(null, arguments);
  }

  var q = Date.now || function () {
    return +new Date();
  };

  function ca(a, b) {
    this.a = a;
    this.o = b || a;
    this.c = this.o.document;
  }

  var da = !!window.FontFace;

  function t(a, b, c, d) {
    b = a.c.createElement(b);
    if (c) for (var e in c) {
      c.hasOwnProperty(e) && ("style" == e ? b.style.cssText = c[e] : b.setAttribute(e, c[e]));
    }
    d && b.appendChild(a.c.createTextNode(d));
    return b;
  }

  function u(a, b, c) {
    a = a.c.getElementsByTagName(b)[0];
    a || (a = document.documentElement);
    a.insertBefore(c, a.lastChild);
  }

  function v(a) {
    a.parentNode && a.parentNode.removeChild(a);
  }

  function w(a, b, c) {
    b = b || [];
    c = c || [];

    for (var d = a.className.split(/\s+/), e = 0; e < b.length; e += 1) {
      for (var f = !1, g = 0; g < d.length; g += 1) {
        if (b[e] === d[g]) {
          f = !0;
          break;
        }
      }

      f || d.push(b[e]);
    }

    b = [];

    for (e = 0; e < d.length; e += 1) {
      f = !1;

      for (g = 0; g < c.length; g += 1) {
        if (d[e] === c[g]) {
          f = !0;
          break;
        }
      }

      f || b.push(d[e]);
    }

    a.className = b.join(" ").replace(/\s+/g, " ").replace(/^\s+|\s+$/, "");
  }

  function y(a, b) {
    for (var c = a.className.split(/\s+/), d = 0, e = c.length; d < e; d++) {
      if (c[d] == b) return !0;
    }

    return !1;
  }

  function ea(a) {
    return a.o.location.hostname || a.a.location.hostname;
  }

  function z(a, b, c) {
    function d() {
      m && e && f && (m(g), m = null);
    }

    b = t(a, "link", {
      rel: "stylesheet",
      href: b,
      media: "all"
    });
    var e = !1,
        f = !0,
        g = null,
        m = c || null;
    da ? (b.onload = function () {
      e = !0;
      d();
    }, b.onerror = function () {
      e = !0;
      g = Error("Stylesheet failed to load");
      d();
    }) : setTimeout(function () {
      e = !0;
      d();
    }, 0);
    u(a, "head", b);
  }

  function A(a, b, c, d) {
    var e = a.c.getElementsByTagName("head")[0];

    if (e) {
      var f = t(a, "script", {
        src: b
      }),
          g = !1;

      f.onload = f.onreadystatechange = function () {
        g || this.readyState && "loaded" != this.readyState && "complete" != this.readyState || (g = !0, c && c(null), f.onload = f.onreadystatechange = null, "HEAD" == f.parentNode.tagName && e.removeChild(f));
      };

      e.appendChild(f);
      setTimeout(function () {
        g || (g = !0, c && c(Error("Script load timeout")));
      }, d || 5E3);
      return f;
    }

    return null;
  }

  ;

  function B() {
    this.a = 0;
    this.c = null;
  }

  function C(a) {
    a.a++;
    return function () {
      a.a--;
      D(a);
    };
  }

  function E(a, b) {
    a.c = b;
    D(a);
  }

  function D(a) {
    0 == a.a && a.c && (a.c(), a.c = null);
  }

  ;

  function F(a) {
    this.a = a || "-";
  }

  F.prototype.c = function (a) {
    for (var b = [], c = 0; c < arguments.length; c++) {
      b.push(arguments[c].replace(/[\W_]+/g, "").toLowerCase());
    }

    return b.join(this.a);
  };

  function G(a, b) {
    this.c = a;
    this.f = 4;
    this.a = "n";
    var c = (b || "n4").match(/^([nio])([1-9])$/i);
    c && (this.a = c[1], this.f = parseInt(c[2], 10));
  }

  function fa(a) {
    return H(a) + " " + (a.f + "00") + " 300px " + I(a.c);
  }

  function I(a) {
    var b = [];
    a = a.split(/,\s*/);

    for (var c = 0; c < a.length; c++) {
      var d = a[c].replace(/['"]/g, "");
      -1 != d.indexOf(" ") || /^\d/.test(d) ? b.push("'" + d + "'") : b.push(d);
    }

    return b.join(",");
  }

  function J(a) {
    return a.a + a.f;
  }

  function H(a) {
    var b = "normal";
    "o" === a.a ? b = "oblique" : "i" === a.a && (b = "italic");
    return b;
  }

  function ga(a) {
    var b = 4,
        c = "n",
        d = null;
    a && ((d = a.match(/(normal|oblique|italic)/i)) && d[1] && (c = d[1].substr(0, 1).toLowerCase()), (d = a.match(/([1-9]00|normal|bold)/i)) && d[1] && (/bold/i.test(d[1]) ? b = 7 : /[1-9]00/.test(d[1]) && (b = parseInt(d[1].substr(0, 1), 10))));
    return c + b;
  }

  ;

  function ha(a, b) {
    this.c = a;
    this.f = a.o.document.documentElement;
    this.h = b;
    this.a = new F("-");
    this.j = !1 !== b.events;
    this.g = !1 !== b.classes;
  }

  function ia(a) {
    a.g && w(a.f, [a.a.c("wf", "loading")]);
    K(a, "loading");
  }

  function L(a) {
    if (a.g) {
      var b = y(a.f, a.a.c("wf", "active")),
          c = [],
          d = [a.a.c("wf", "loading")];
      b || c.push(a.a.c("wf", "inactive"));
      w(a.f, c, d);
    }

    K(a, "inactive");
  }

  function K(a, b, c) {
    if (a.j && a.h[b]) if (c) a.h[b](c.c, J(c));else a.h[b]();
  }

  ;

  function ja() {
    this.c = {};
  }

  function ka(a, b, c) {
    var d = [],
        e;

    for (e in b) {
      if (b.hasOwnProperty(e)) {
        var f = a.c[e];
        f && d.push(f(b[e], c));
      }
    }

    return d;
  }

  ;

  function M(a, b) {
    this.c = a;
    this.f = b;
    this.a = t(this.c, "span", {
      "aria-hidden": "true"
    }, this.f);
  }

  function N(a) {
    u(a.c, "body", a.a);
  }

  function O(a) {
    return "display:block;position:absolute;top:-9999px;left:-9999px;font-size:300px;width:auto;height:auto;line-height:normal;margin:0;padding:0;font-variant:normal;white-space:nowrap;font-family:" + I(a.c) + ";" + ("font-style:" + H(a) + ";font-weight:" + (a.f + "00") + ";");
  }

  ;

  function P(a, b, c, d, e, f) {
    this.g = a;
    this.j = b;
    this.a = d;
    this.c = c;
    this.f = e || 3E3;
    this.h = f || void 0;
  }

  P.prototype.start = function () {
    var a = this.c.o.document,
        b = this,
        c = q(),
        d = new Promise(function (d, e) {
      function f() {
        q() - c >= b.f ? e() : a.fonts.load(fa(b.a), b.h).then(function (a) {
          1 <= a.length ? d() : setTimeout(f, 25);
        }, function () {
          e();
        });
      }

      f();
    }),
        e = null,
        f = new Promise(function (a, d) {
      e = setTimeout(d, b.f);
    });
    Promise.race([f, d]).then(function () {
      e && (clearTimeout(e), e = null);
      b.g(b.a);
    }, function () {
      b.j(b.a);
    });
  };

  function Q(a, b, c, d, e, f, g) {
    this.v = a;
    this.B = b;
    this.c = c;
    this.a = d;
    this.s = g || "BESbswy";
    this.f = {};
    this.w = e || 3E3;
    this.u = f || null;
    this.m = this.j = this.h = this.g = null;
    this.g = new M(this.c, this.s);
    this.h = new M(this.c, this.s);
    this.j = new M(this.c, this.s);
    this.m = new M(this.c, this.s);
    a = new G(this.a.c + ",serif", J(this.a));
    a = O(a);
    this.g.a.style.cssText = a;
    a = new G(this.a.c + ",sans-serif", J(this.a));
    a = O(a);
    this.h.a.style.cssText = a;
    a = new G("serif", J(this.a));
    a = O(a);
    this.j.a.style.cssText = a;
    a = new G("sans-serif", J(this.a));
    a = O(a);
    this.m.a.style.cssText = a;
    N(this.g);
    N(this.h);
    N(this.j);
    N(this.m);
  }

  var R = {
    D: "serif",
    C: "sans-serif"
  },
      S = null;

  function T() {
    if (null === S) {
      var a = /AppleWebKit\/([0-9]+)(?:\.([0-9]+))/.exec(window.navigator.userAgent);
      S = !!a && (536 > parseInt(a[1], 10) || 536 === parseInt(a[1], 10) && 11 >= parseInt(a[2], 10));
    }

    return S;
  }

  Q.prototype.start = function () {
    this.f.serif = this.j.a.offsetWidth;
    this.f["sans-serif"] = this.m.a.offsetWidth;
    this.A = q();
    U(this);
  };

  function la(a, b, c) {
    for (var d in R) {
      if (R.hasOwnProperty(d) && b === a.f[R[d]] && c === a.f[R[d]]) return !0;
    }

    return !1;
  }

  function U(a) {
    var b = a.g.a.offsetWidth,
        c = a.h.a.offsetWidth,
        d;
    (d = b === a.f.serif && c === a.f["sans-serif"]) || (d = T() && la(a, b, c));
    d ? q() - a.A >= a.w ? T() && la(a, b, c) && (null === a.u || a.u.hasOwnProperty(a.a.c)) ? V(a, a.v) : V(a, a.B) : ma(a) : V(a, a.v);
  }

  function ma(a) {
    setTimeout(p(function () {
      U(this);
    }, a), 50);
  }

  function V(a, b) {
    setTimeout(p(function () {
      v(this.g.a);
      v(this.h.a);
      v(this.j.a);
      v(this.m.a);
      b(this.a);
    }, a), 0);
  }

  ;

  function W(a, b, c) {
    this.c = a;
    this.a = b;
    this.f = 0;
    this.m = this.j = !1;
    this.s = c;
  }

  var X = null;

  W.prototype.g = function (a) {
    var b = this.a;
    b.g && w(b.f, [b.a.c("wf", a.c, J(a).toString(), "active")], [b.a.c("wf", a.c, J(a).toString(), "loading"), b.a.c("wf", a.c, J(a).toString(), "inactive")]);
    K(b, "fontactive", a);
    this.m = !0;
    na(this);
  };

  W.prototype.h = function (a) {
    var b = this.a;

    if (b.g) {
      var c = y(b.f, b.a.c("wf", a.c, J(a).toString(), "active")),
          d = [],
          e = [b.a.c("wf", a.c, J(a).toString(), "loading")];
      c || d.push(b.a.c("wf", a.c, J(a).toString(), "inactive"));
      w(b.f, d, e);
    }

    K(b, "fontinactive", a);
    na(this);
  };

  function na(a) {
    0 == --a.f && a.j && (a.m ? (a = a.a, a.g && w(a.f, [a.a.c("wf", "active")], [a.a.c("wf", "loading"), a.a.c("wf", "inactive")]), K(a, "active")) : L(a.a));
  }

  ;

  function oa(a) {
    this.j = a;
    this.a = new ja();
    this.h = 0;
    this.f = this.g = !0;
  }

  oa.prototype.load = function (a) {
    this.c = new ca(this.j, a.context || this.j);
    this.g = !1 !== a.events;
    this.f = !1 !== a.classes;
    pa(this, new ha(this.c, a), a);
  };

  function qa(a, b, c, d, e) {
    var f = 0 == --a.h;
    (a.f || a.g) && setTimeout(function () {
      var a = e || null,
          m = d || null || {};
      if (0 === c.length && f) L(b.a);else {
        b.f += c.length;
        f && (b.j = f);
        var h,
            l = [];

        for (h = 0; h < c.length; h++) {
          var k = c[h],
              n = m[k.c],
              r = b.a,
              x = k;
          r.g && w(r.f, [r.a.c("wf", x.c, J(x).toString(), "loading")]);
          K(r, "fontloading", x);
          r = null;
          if (null === X) if (window.FontFace) {
            var x = /Gecko.*Firefox\/(\d+)/.exec(window.navigator.userAgent),
                xa = /OS X.*Version\/10\..*Safari/.exec(window.navigator.userAgent) && /Apple/.exec(window.navigator.vendor);
            X = x ? 42 < parseInt(x[1], 10) : xa ? !1 : !0;
          } else X = !1;
          X ? r = new P(p(b.g, b), p(b.h, b), b.c, k, b.s, n) : r = new Q(p(b.g, b), p(b.h, b), b.c, k, b.s, a, n);
          l.push(r);
        }

        for (h = 0; h < l.length; h++) {
          l[h].start();
        }
      }
    }, 0);
  }

  function pa(a, b, c) {
    var d = [],
        e = c.timeout;
    ia(b);
    var d = ka(a.a, c, a.c),
        f = new W(a.c, b, e);
    a.h = d.length;
    b = 0;

    for (c = d.length; b < c; b++) {
      d[b].load(function (b, d, c) {
        qa(a, f, b, d, c);
      });
    }
  }

  ;

  function ra(a, b) {
    this.c = a;
    this.a = b;
  }

  ra.prototype.load = function (a) {
    function b() {
      if (f["__mti_fntLst" + d]) {
        var c = f["__mti_fntLst" + d](),
            e = [],
            h;
        if (c) for (var l = 0; l < c.length; l++) {
          var k = c[l].fontfamily;
          void 0 != c[l].fontStyle && void 0 != c[l].fontWeight ? (h = c[l].fontStyle + c[l].fontWeight, e.push(new G(k, h))) : e.push(new G(k));
        }
        a(e);
      } else setTimeout(function () {
        b();
      }, 50);
    }

    var c = this,
        d = c.a.projectId,
        e = c.a.version;

    if (d) {
      var f = c.c.o;
      A(this.c, (c.a.api || "https://fast.fonts.net/jsapi") + "/" + d + ".js" + (e ? "?v=" + e : ""), function (e) {
        e ? a([]) : (f["__MonotypeConfiguration__" + d] = function () {
          return c.a;
        }, b());
      }).id = "__MonotypeAPIScript__" + d;
    } else a([]);
  };

  function sa(a, b) {
    this.c = a;
    this.a = b;
  }

  sa.prototype.load = function (a) {
    var b,
        c,
        d = this.a.urls || [],
        e = this.a.families || [],
        f = this.a.testStrings || {},
        g = new B();
    b = 0;

    for (c = d.length; b < c; b++) {
      z(this.c, d[b], C(g));
    }

    var m = [];
    b = 0;

    for (c = e.length; b < c; b++) {
      if (d = e[b].split(":"), d[1]) for (var h = d[1].split(","), l = 0; l < h.length; l += 1) {
        m.push(new G(d[0], h[l]));
      } else m.push(new G(d[0]));
    }

    E(g, function () {
      a(m, f);
    });
  };

  function ta(a, b) {
    a ? this.c = a : this.c = ua;
    this.a = [];
    this.f = [];
    this.g = b || "";
  }

  var ua = "https://fonts.googleapis.com/css";

  function va(a, b) {
    for (var c = b.length, d = 0; d < c; d++) {
      var e = b[d].split(":");
      3 == e.length && a.f.push(e.pop());
      var f = "";
      2 == e.length && "" != e[1] && (f = ":");
      a.a.push(e.join(f));
    }
  }

  function wa(a) {
    if (0 == a.a.length) throw Error("No fonts to load!");
    if (-1 != a.c.indexOf("kit=")) return a.c;

    for (var b = a.a.length, c = [], d = 0; d < b; d++) {
      c.push(a.a[d].replace(/ /g, "+"));
    }

    b = a.c + "?family=" + c.join("%7C");
    0 < a.f.length && (b += "&subset=" + a.f.join(","));
    0 < a.g.length && (b += "&text=" + encodeURIComponent(a.g));
    return b;
  }

  ;

  function ya(a) {
    this.f = a;
    this.a = [];
    this.c = {};
  }

  var za = {
    latin: "BESbswy",
    "latin-ext": "\xE7\xF6\xFC\u011F\u015F",
    cyrillic: "\u0439\u044F\u0416",
    greek: "\u03B1\u03B2\u03A3",
    khmer: "\u1780\u1781\u1782",
    Hanuman: "\u1780\u1781\u1782"
  },
      Aa = {
    thin: "1",
    extralight: "2",
    "extra-light": "2",
    ultralight: "2",
    "ultra-light": "2",
    light: "3",
    regular: "4",
    book: "4",
    medium: "5",
    "semi-bold": "6",
    semibold: "6",
    "demi-bold": "6",
    demibold: "6",
    bold: "7",
    "extra-bold": "8",
    extrabold: "8",
    "ultra-bold": "8",
    ultrabold: "8",
    black: "9",
    heavy: "9",
    l: "3",
    r: "4",
    b: "7"
  },
      Ba = {
    i: "i",
    italic: "i",
    n: "n",
    normal: "n"
  },
      Ca = /^(thin|(?:(?:extra|ultra)-?)?light|regular|book|medium|(?:(?:semi|demi|extra|ultra)-?)?bold|black|heavy|l|r|b|[1-9]00)?(n|i|normal|italic)?$/;

  function Da(a) {
    for (var b = a.f.length, c = 0; c < b; c++) {
      var d = a.f[c].split(":"),
          e = d[0].replace(/\+/g, " "),
          f = ["n4"];

      if (2 <= d.length) {
        var g;
        var m = d[1];
        g = [];
        if (m) for (var m = m.split(","), h = m.length, l = 0; l < h; l++) {
          var k;
          k = m[l];

          if (k.match(/^[\w-]+$/)) {
            var n = Ca.exec(k.toLowerCase());
            if (null == n) k = "";else {
              k = n[2];
              k = null == k || "" == k ? "n" : Ba[k];
              n = n[1];
              if (null == n || "" == n) n = "4";else var r = Aa[n],
                  n = r ? r : isNaN(n) ? "4" : n.substr(0, 1);
              k = [k, n].join("");
            }
          } else k = "";

          k && g.push(k);
        }
        0 < g.length && (f = g);
        3 == d.length && (d = d[2], g = [], d = d ? d.split(",") : g, 0 < d.length && (d = za[d[0]]) && (a.c[e] = d));
      }

      a.c[e] || (d = za[e]) && (a.c[e] = d);

      for (d = 0; d < f.length; d += 1) {
        a.a.push(new G(e, f[d]));
      }
    }
  }

  ;

  function Ea(a, b) {
    this.c = a;
    this.a = b;
  }

  var Fa = {
    Arimo: !0,
    Cousine: !0,
    Tinos: !0
  };

  Ea.prototype.load = function (a) {
    var b = new B(),
        c = this.c,
        d = new ta(this.a.api, this.a.text),
        e = this.a.families;
    va(d, e);
    var f = new ya(e);
    Da(f);
    z(c, wa(d), C(b));
    E(b, function () {
      a(f.a, f.c, Fa);
    });
  };

  function Ga(a, b) {
    this.c = a;
    this.a = b;
  }

  Ga.prototype.load = function (a) {
    var b = this.a.id,
        c = this.c.o;
    b ? A(this.c, (this.a.api || "https://use.typekit.net") + "/" + b + ".js", function (b) {
      if (b) a([]);else if (c.Typekit && c.Typekit.config && c.Typekit.config.fn) {
        b = c.Typekit.config.fn;

        for (var e = [], f = 0; f < b.length; f += 2) {
          for (var g = b[f], m = b[f + 1], h = 0; h < m.length; h++) {
            e.push(new G(g, m[h]));
          }
        }

        try {
          c.Typekit.load({
            events: !1,
            classes: !1,
            async: !0
          });
        } catch (l) {}

        a(e);
      }
    }, 2E3) : a([]);
  };

  function Ha(a, b) {
    this.c = a;
    this.f = b;
    this.a = [];
  }

  Ha.prototype.load = function (a) {
    var b = this.f.id,
        c = this.c.o,
        d = this;
    b ? (c.__webfontfontdeckmodule__ || (c.__webfontfontdeckmodule__ = {}), c.__webfontfontdeckmodule__[b] = function (b, c) {
      for (var g = 0, m = c.fonts.length; g < m; ++g) {
        var h = c.fonts[g];
        d.a.push(new G(h.name, ga("font-weight:" + h.weight + ";font-style:" + h.style)));
      }

      a(d.a);
    }, A(this.c, (this.f.api || "https://f.fontdeck.com/s/css/js/") + ea(this.c) + "/" + b + ".js", function (b) {
      b && a([]);
    })) : a([]);
  };

  var Y = new oa(window);

  Y.a.c.custom = function (a, b) {
    return new sa(b, a);
  };

  Y.a.c.fontdeck = function (a, b) {
    return new Ha(b, a);
  };

  Y.a.c.monotype = function (a, b) {
    return new ra(b, a);
  };

  Y.a.c.typekit = function (a, b) {
    return new Ga(b, a);
  };

  Y.a.c.google = function (a, b) {
    return new Ea(b, a);
  };

  var Z = {
    load: p(Y.load, Y)
  };
  "function" === typeof define && define.amd ? define(function () {
    return Z;
  }) : "undefined" !== typeof module && module.exports ? module.exports = Z : (window.WebFont = Z, window.WebFontConfig && Y.load(window.WebFontConfig));
})(); // For JS that happens on every page. Otherwise make JS files with the same name as the template or site feature that the code is for. E.g., `front-page.js` or `part-pagination.js`.
// Put functions that you'll need to use in other JS files in this theme. Stuff like parsing a URL or getting a post ID.
// Use lazysizes to get lazy loading on css background images.


document.addEventListener('lazybeforeunveil', function (e) {
  var bg = e.target.getAttribute('data-bg');

  if (bg) {
    e.target.style.backgroundImage = 'url(' + bg + ')';
  }
}); // Use this to load fonts from Google Fonts, Typekit, Fonts.com, and Fontdeck, as well as self-hosted web fonts
// https://github.com/typekit/webfontloader

WebFont.load({// GOOGLE FONTS
  // google: {
  //     families: ['Open Sans:400,400i,700']
  // }
  // OR TYPEKIT
  // typekit: { id: '1234567' },
  // CALLBACK WHEN FONTS LOAD
  // active: taoti_fonts_active_cb
}); // Callback function for when the fonts are loaded.

function taoti_fonts_active_cb() {} // Not necessarily specific to this module, but there is a library in use for responsive tables - /js/development/libs/responsive-tables.js
// https://zurb.com/playground/responsive-tables